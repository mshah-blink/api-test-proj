<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProcessController extends Controller
{
    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . Session::get('access_token'),
        ])->post(config('blink.server').'/cc/process',
        [
            'payment_intent' => $request->payment_intent,
            'paymentToken' => $request->paymentToken,
            'type' => 2,
            'raw_amount' => $request->raw_amount,
            'customer_email' => $request->customer_email,
            'customer_name' => $request->customer_name,
            'transaction_unique' => $request->transaction_unique,
        ]);
        return redirect()->away($response['url']);
    }
}
