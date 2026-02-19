<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\PrinterBox;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function uploadForm()
    {
        $printers = PrinterBox::all();
        return view('print_page.upload', compact('printers'));
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $path = $file->store('documents','public');

        $doc = Document::create([
            'name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'printer_box_id' => $request->printer_box_id
        ]);

        return redirect()->route('range.form',$doc->id);
    }

    public function rangeForm($id)
    {
        $doc = Document::findOrFail($id);
        return view('print_page.range',compact('doc'));
    }

    public function setRange(Request $request,$id)
    {
        $doc = Document::findOrFail($id);
        $printer = PrinterBox::find($doc->printer_box_id);

        $totalPage = 10; // sementara dummy

        $start = $request->start_page;
        $end   = $request->end_page;

        if(!$start && !$end){
            $count = $totalPage;
        }else{
            $count = ($end - $start) + 1;
        }

        $price = $request->print_type == 'colored'
            ? $printer->colored_price
            : $printer->black_price;

        $doc->update([
            'start_page'=>$start,
            'end_page'=>$end,
            'count_print_page'=>$count,
            'print_type'=>$request->print_type,
            'total_price'=>$count * $price
        ]);

        return redirect()->route('payment.form',$doc->id);
    }
}
