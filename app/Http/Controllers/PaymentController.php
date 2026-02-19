<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function paymentForm($id)
    {
        $doc = Document::findOrFail($id);
        return view('payment',compact('doc'));
    }

    public function pay($id)
    {
        $doc = Document::findOrFail($id);

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-'.$doc->id,
                'gross_amount' => $doc->total_price,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token'=>$snapToken]);
    }

    public function callback(Request $request)
    {
        $id = str_replace('ORDER-','',$request->order_id);
        $doc = Document::find($id);

        if($request->transaction_status == 'settlement'){
            $doc->update(['payment_status'=>'paid']);
        }

        return response()->json(['success'=>true]);
    }
}
