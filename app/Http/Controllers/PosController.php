<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class PosController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function index()
    {
        return view('js.pos');
    }

    public function cariBarang(Request $request)
    {
        $barang = Barang::where('id_barang', $request->kode)->first();

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        return response()->json(['data' => $barang]);
    }

    public function bayar(Request $request)
    {
        if (!$request->items || count($request->items) == 0) {
            return response()->json(['message' => 'Keranjang kosong'], 422);
        }

        $customer = Customer::create([
            'name' => Customer::generateGuestName(),
        ]);

        $total = 0;
        $orderItems = [];

        foreach ($request->items as $item) {

            $barang = Barang::where('id_barang', $item['id'])->first();

            if (!$barang) {
                return response()->json(['message' => 'Barang tidak ditemukan'], 404);
            }

            $subtotal = $barang->harga * $item['qty'];
            $total += $subtotal;

            $orderItems[] = [
                'barang_id' => $barang->id_barang,
                'quantity' => $item['qty'],
                'price' => $barang->harga,
                'subtotal' => $subtotal,
            ];
        }

        // SIMPAN ORDER → RIWAYAT
        $order = Order::create([
            'order_code' => 'ORD-' . strtoupper(Str::random(8)),
            'customer_id' => $customer->id,
            'total_amount' => $total,
            'payment_status' => $request->payment_method === 'tunai' ? 'lunas' : 'pending'
        ]);

        $order->items()->createMany($orderItems);

        // =====================
        // TUNAI
        // =====================
        if ($request->payment_method === 'tunai') {
            return response()->json([
                'success' => true,
                'type' => 'tunai',
                'order_code' => $order->order_code,
                'total' => $total
            ]);
        }

        // =====================
        // MIDTRANS
        // =====================
        try {
            $snapToken = Snap::getSnapToken([
                'transaction_details' => [
                    'order_id' => $order->order_code,
                    'gross_amount' => $total,
                ],
                'customer_details' => [
                    'first_name' => $customer->name,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Midtrans error',
                'error' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'success' => true,
            'type' => 'midtrans',
            'snap_token' => $snapToken,
            'order_code' => $order->order_code,
            'total' => $total
        ]);
    }

    public function riwayat()
    {
        $orders = Order::latest()->get();
        return view('pos.riwayat', compact('orders'));
    }
}