<?php
<<<<<<< HEAD
return [
    'server_key'    => env('MIDTRANS_SERVER_KEY'),
    'client_key'    => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sanitized'  => env('MIDTRANS_IS_SANITIZED', true), // ✅ FIX
    'is_3ds'        => env('MIDTRANS_IS_3DS', true),       // ✅ FIX
=======

return [
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),

    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sanitized' => true,
    'is_3ds' => true,

    'append_notif_url' => null,
    'overrideNotifUrl' => null,
    'payment_idempotency_key' => null,

    'curl_options' => null,
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
];