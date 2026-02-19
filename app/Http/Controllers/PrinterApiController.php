<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\PrinterBox;
use Illuminate\Http\Request;

class PrinterApiController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'printer_code' => 'required',
            'pin' => 'required'
        ]);

        $printer = PrinterBox::where('printer_code', $request->printer_code)
            ->where('pin', $request->pin)
            ->first();

        if (!$printer) {
            return response()->json([
                'status' => false,
                'message' => 'Printer code atau PIN salah'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'printer' => $printer
        ]);
    }

    public function getDocuments($printerCode)
    {
        $printer = PrinterBox::where('printer_code', $printerCode)->first();

        if (!$printer) {
            return response()->json([
                'status' => false,
                'message' => 'Printer tidak ditemukan'
            ], 404);
        }

        $documents = Document::where('printer_box_id', $printer->id)
            ->where('payment_status', 'paid')
            ->where('print_status', 'waiting')
            ->get();

        return response()->json([
            'status' => true,
            'documents' => $documents
        ]);
    }

    public function download($id)
    {
        $doc = Document::findOrFail($id);

        $path = storage_path('app/public/' . $doc->file_path);

        if (!file_exists($path)) {
            return response()->json([
                'status' => false,
                'message' => 'File tidak ditemukan'
            ], 404);
        }

        return response()->download($path);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $doc = Document::find($request->id);

        if (!$doc) {
            return response()->json([
                'status' => false,
                'message' => 'Document tidak ditemukan'
            ]);
        }

        $doc->print_status = 'printed';
        $doc->save();

        return response()->json([
            'status' => true
        ]);
    }
}
