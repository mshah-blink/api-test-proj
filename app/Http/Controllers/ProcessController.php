<?php

namespace App\Http\Controllers;

use App\Services\Payment;
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
        ])->post(config('blink.server').'/'.$request->method.'/process', Payment::getPayload($request));
        
        return redirect()->away($response['url'] ?? $response['redirect_url']);
    }
}
