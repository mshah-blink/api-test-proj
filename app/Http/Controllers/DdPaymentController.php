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
        $element = Payment::getElement($token['access_token'], $intent['payment_intent']);

        Session::put('access_token', $token['access_token']);

        return view('payment', [
            'element' => $element['element']['ddElement'],
            'rawAmount' => $element['raw_amount'],
            'transactionUnique' => $element['transaction_unique'],
            'method' => 'dd'
        ]);
    }
}
