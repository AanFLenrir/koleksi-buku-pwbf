<?php

namespace App\Http\Controllers;

use App\Models\DetailPesananModel;
use App\Models\Keranjang;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction; // Tambahkan ini

class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function goCheckOut(Request $request)
    {
        $keranjangs = Keranjang::with('menu')->get();
        if ($keranjangs->isEmpty()) {
            return redirect()->route('cart-show')->with('error', 'Keranjang kosong');
        }

        $total = $keranjangs->sum(fn($item) => $item->menu->harga * $item->quantity);
        $itemDetails = $keranjangs->map(fn($item) => [
            'id' => $item->idmenu,
            'price' => (int) $item->menu->harga,
            'quantity' => (int) $item->quantity,
            'name' => $item->menu->nama_menu,
        ])->toArray();

        $orderId = 'ORD-' . uniqid();
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $total,
            ],
            'item_details' => $itemDetails,
            'enabled_payments' => [
                'gopay', 'shopeepay', 'other_qris', 'bank_transfer', 'credit_card'
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
        } catch (\Exception $e) {
            return redirect()->route('cart-show')->with('error', 'Error: ' . $e->getMessage());
        }

        $cart_items = $keranjangs;
        return view('guest.checkout', compact('cart_items', 'total', 'snapToken', 'orderId'));
    }

    public function saveOrder(Request $request)
    {
        $cart_items = is_string($request['cart_items']) ? json_decode($request['cart_items'], true) : $request['cart_items'];
        $orderId = $request['order_id'];

        $pesanan = PesananModel::create([
            'order_id' => $orderId,
            'nama' => $request['nama_pelanggan'],
            'nomor_meja' => $request['nomor_meja'],
            'metode_bayar' => PesananModel::METODE[$request['payment_method']] ?? 'Unknown',
            'catatan' => $request['catatan'],
            'total' => collect($cart_items)->sum('subtotal'),
            'status_bayar' => 1, // pending
        ]);

        foreach ($cart_items as $item) {
            DetailPesananModel::create([
                'idpesanan' => $pesanan->idpesanan,
                'idmenu' => $item['idmenu'],
                'harga' => $item['harga'],
                'jumlah' => $item['quantity'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        // Hapus keranjang yang sudah di-checkout
        $menuIds = collect($cart_items)->pluck('idmenu')->toArray();
        Keranjang::whereIn('idmenu', $menuIds)->delete();

        return response()->json(['message' => 'OK', 'order_id' => $orderId]);
    }

    // Tambah method cek status
    public function checkStatus($orderId)
    {
        try {
            $status = Transaction::status($orderId);
            return response()->json([
                'success' => true,
                'status' => $status->transaction_status,
                'message' => $status->status_message,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function errorCheckout()
    {
        return view('guest.error-checkout');
    }

    public function suksesShow($id)
    {
        $orderId = $id;
        $pesanan = PesananModel::where('order_id', $orderId)->first();
        if (!$pesanan) {
            return redirect('/')->with('error', 'Data pesanan tidak ditemukan.');
        }
        return view('guest.success-checkout', compact('pesanan'));
    }
}