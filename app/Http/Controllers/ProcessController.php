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

        ])->post(config('blink.server') . '/' . $request->method . '/process', Payment::getPayload($request));

        if ($request->type == 1) {
            if (isset($response['acsform'])) {
                return view('threeDs', ['element' => $response['acsform']]);
            } else {
                return 'ACS form not found. Please start again.';
            }
        } elseif ($request->type == 2) {
            return redirect()->away($response['url'] ?? $response['redirect_url']);
        } else {
            return "Invalid type";
        }

        // dd($response->body());
        // $a = explode("res=", $response['url']);
        // echo base64_decode($a[1]);
        // $transaction_id = base64_decode($a[1]);
        // $return = Payment::getTransaction(Session::get('access_token'), $a[1]);
        // dd($return->body());
    }
}
