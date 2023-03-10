<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Payment {
    public static function getToken() {
        return Http::post(config('blink.server').'/token',
        [
            'api_key' => config('blink.api_key'),
            'secret_key' => config('blink.secret_key'),
        ]);
    }

    public static function getIntent($token) {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post(config('blink.server').'/intent',
        [
            'amount' => 1.01,
            'payment_type' => 'credit-card',
            'currency' => 'GBP',
            'return_url' => config('blink.return_url'),
            'notification_url' => config('blink.notification_url'),
        ]);
    }

    public static function getElement($token, $intent) {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post(config('blink.server').'/element',
        [
            'payment_intent' => $intent,
        ]);
    }
 
}
