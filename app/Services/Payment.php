<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Payment
{
    public static function getToken()
    {
        return Http::post(
            config('blink.server') . '/tokens',
            [
                'api_key' => config('blink.api_key'),
                'secret_key' => config('blink.secret_key'),
            ]
        );
    }

    public static function getIntent($token)
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post(
            config('blink.server') . '/intents',
            [
                'amount' => 1.01,
                'payment_type' => 'credit-card',
                'currency' => 'GBP',
                'return_url' => config('blink.return_url'),
                'notification_url' => config('blink.notification_url'),
            ]
        );
    }

    public static function getElement($token, $intent)
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post(
            config('blink.server') . '/elements',
            [
                'payment_intent' => $intent,
            ]
        );
    }

    public static function getTransaction($token, $transaction_id)
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(
            config('blink.server') . '/transactions/' . $transaction_id
        );
    }

    public static function getPayload(Request $request)
    {
        if ($request->resource == 'creditcards') {
            if ($request->type == 1) {
                $result = [
                    'payment_intent' => $request->payment_intent,
                    'paymentToken' => $request->paymentToken,
                    'type' => $request->type,
                    'raw_amount' => $request->raw_amount,
                    'customer_email' => $request->customer_email,
                    'customer_name' => $request->customer_name,
                    'transaction_unique' => $request->transaction_unique,
                    'device_timezone' => $request->device_timezone,
                    'device_capabilities' => $request->device_capabilities,
                    'device_accept_language' => $request->device_accept_language,
                    'device_screen_resolution' => $request->device_screen_resolution,
                    'remote_address' => $request->remote_address,
                ];
            } elseif ($request->type == 2) {
                $result = [
                    'payment_intent' => $request->payment_intent,
                    'paymentToken' => $request->paymentToken,
                    'type' => $request->type,
                    'raw_amount' => $request->raw_amount,
                    'customer_email' => $request->customer_email,
                    'customer_name' => $request->customer_name,
                    'transaction_unique' => $request->transaction_unique,
                ];
            } else {
                echo 'Invalid credit card type';
            }
        } elseif ($request->resource == 'openbankings') {
            $result = [
                'merchant_id' => $request->merchant_id,
                'payment_intent' => $request->payment_intent,
                'user_name' => $request->user_name,
                'user_email' => $request->user_email,
            ];
        } elseif ($request->resource == 'directdebits') {
            $result = [
                'payment_intent' => $request->payment_intent,
                'given_name' => $request->given_name,
                'family_name' => $request->family_name,
                'company_name' => $request->company_name,
                'email' => $request->email,
                'account_holder_name' => $request->account_holder_name,
                'branch_code' => $request->branch_code,
                'account_number' => $request->account_number,
                'iban' => $request->iban,
            ];
        } else {
            echo 'Invalid payment method';
        }
        return $result;
    }
}
