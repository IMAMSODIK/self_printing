<?php

namespace App\Http\Controllers;

use App\Models\PrinterBox;
use App\Http\Requests\StorePrinterBoxRequest;
use App\Http\Requests\UpdatePrinterBoxRequest;
use App\Models\Document;
use Illuminate\Http\Request;

class PrinterBoxController extends Controller
{
    public function login(Request $request)
    {
        $printer = PrinterBox::where('printer_code',$request->printer_code)
            ->where('pin',$request->pin)
            ->first();

        if(!$printer){
            return response()->json(['error'=>'Invalid'],401);
        }

        return response()->json($printer);
    }

    public function getDocuments($printerCode)
    {
        $printer = PrinterBox::where('printer_code',$printerCode)->first();

        $docs = Document::where('printer_box_id',$printer->id)
            ->where('payment_status','paid')
            ->where('print_status','waiting')
            ->get();

        return response()->json($docs);
    }

    public function updateStatus(Request $request)
    {
        $doc = Document::find($request->document_id);

        $doc->update([
            'print_status'=>$request->status
        ]);

        return response()->json(['success'=>true]);
    }
}
