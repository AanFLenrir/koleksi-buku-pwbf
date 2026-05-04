<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    /**
     * Tampilkan halaman verifikasi OTP
     */
    public function show()
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('verifyOtp'); // pastikan view ada di resources/views/verifyOtp.blade.php
    }

    /**
     * Verifikasi OTP
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6', // OTP 6 digit
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.digits' => 'Kode OTP harus 6 digit.',
        ]);

        $user = Auth::user();

        // Cek OTP
        if ($request->otp != $user->otp) {
            return back()->with('error', 'Kode OTP Salah!');
        }

        // Reset OTP agar tidak bisa dipakai lagi
        $user->update(['otp' => null]);

        // Ambil role user dan simpan di session
        $role = Role::where('id_role', $user->id_role)->first();
        if ($role) {
            Session::put([
                'user_role' => $role->role,
                'user_id_role' => $role->id_role,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }
}