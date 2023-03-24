<?php

namespace App\Http\Controllers;

use App\Services\Payment;
use Illuminate\Support\Facades\Session;

class DdPaymentController extends Controller
{
    public function index()
    {
        $token = Payment::getToken();
        $intent = Payment::getIntent($token['access_token']);

        Session::put('access_token', $token['access_token']);

        return view('payment', [
            'element' => $intent['element']['ddElement'],
            'rawAmount' => $intent['amount'],
            'transactionUnique' => $intent['transaction_unique'],
            'method' => 'directdebits'
        ]);
    }
}
