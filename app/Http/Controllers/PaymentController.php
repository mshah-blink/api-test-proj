<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index()
    {
        $token = $this->getToken();
        $intent = $this->getIntent($token['access_token']);
        $element = $this->getElement($token['access_token'], $intent['payment_intent']);

        Session::put('access_token', $token['access_token']);

        return view('payment', [
            'ccElement' => $element['element']['ccElement'],
            'rawAmount' => $element['raw_amount'],
            'transactionUnique' => $element['transaction_unique']
        ]);
    }

    private function getToken() {
        return Http::post(config('blink.server').'/token',
        [
            'api_key' => config('blink.api_key'),
            'secret_key' => config('blink.secret_key'),
        ]);
    }

    private function getIntent($token) {
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

    private function getElement($token, $intent) {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post(config('blink.server').'/element',
        [
            'payment_intent' => $intent,
        ]);
    }
}
