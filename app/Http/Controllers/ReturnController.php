<?php

namespace App\Http\Controllers;

use App\Services\Payment;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function store(Request $request)
    {
        print_r($request->res . '<br />');
        print_r($request->status . '<br />');
        print_r($request->note . '<br />');
        print_r(urldecode($request->merchant_data) . '<br />');
    }
}
