<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function store(Request $request)
    {
        if ($request->header('api_key') == config('blink.api_key') && $request->header('secret_key') == config('blink.secret_key')) {
            echo $request->transaction_id;
        } else {
            echo "Invalid keys";
        }
    }
}
