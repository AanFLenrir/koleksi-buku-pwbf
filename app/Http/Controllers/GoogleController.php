<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect ke Google OAuth
     */
    public function redirect()
    {
        // Tambahkan prompt consent agar user bisa pilih akun
        return Socialite::driver('google')
            ->with(['prompt' => 'consent'])
            ->redirect();
    }

    /**
     * Callback setelah login Google
     */
    public function callback()
    {
        try {
            // Ambil data user dari Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            if (!$googleUser->getEmail()) {
                return redirect('/')->with('error', 'Tidak dapat mendapatkan email dari Google.');
            }

            // Update existing user atau buat baru
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'id_google' => $googleUser->getId(),
                    'password' => bcrypt(strval(rand(111111, 999999))), // password random
                    'id_role' => 1 // default role user
                ]
            );

            // Buat OTP 6 digit
            $otp = rand(111111, 999999);

            // Simpan OTP di user
            $user->update(['otp' => $otp]);

            // Login user
            Auth::login($user);

            // Kirim OTP ke email
            Mail::to($user->email)->send(new OtpMail($otp));

            return redirect()->route('verify-otp-show')->with('success', 'OTP telah dikirim ke email Anda.');
        } catch (\Exception $e) {
            // Jika error OAuth
            return redirect('/')->with('error', 'Login Google gagal: ' . $e->getMessage());
        }
    }
}