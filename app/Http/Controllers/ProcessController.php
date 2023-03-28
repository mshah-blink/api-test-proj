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

            'Accept' => $request->header('accept'),
            'Accept-Charset' => $request->header('accept-charset'),
            'Accept-Encoding' => $request->header('accept-encoding'),
            'User-Agent' => $request->header('user-agent'),

        ])->post(config('blink.server') . '/' . $request->resource, Payment::getPayload($request));

        if ($request->type == 1) {
            if (isset($response['acsform'])) {
                return view('threeDs', ['element' => $response['acsform']]);
            } else {
                return 'ACS form not found. Please start again.';
            }
        } else {
            return redirect()->away($response['url'] ?? $response['redirect_url']);
        }
    }
}
