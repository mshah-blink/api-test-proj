<?php

namespace App\Http\Controllers;

use App\Services\Payment;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function store(Request $request)
    {
        echo $request->res;
    }
}
