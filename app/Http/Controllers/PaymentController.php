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
        return view('print_page.payment', compact('doc'));
    }

    public function pay($id)
    {
        $doc = Document::findOrFail($id);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $doc->id,
                'gross_amount' => $doc->total_price,
            ],
            'customer_details' => [
                'first_name' => 'Customer',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');

        $hashed = hash(
            'sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $orderId = $request->order_id;
        $id = str_replace('ORDER-', '', $orderId);

        $doc = Document::find($id);

        if (!$doc) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        if (
            $request->transaction_status == 'settlement' ||
            $request->transaction_status == 'capture'
        ) {
            $doc->update([
                'payment_status' => 'paid',
                'print_status' => 'waiting'
            ]);
        }

        if (
            $request->transaction_status == 'expire' ||
            $request->transaction_status == 'cancel'
        ) {
            $doc->update([
                'payment_status' => 'failed'
            ]);
        }

        return response()->json(['success' => true]);
    }
}
