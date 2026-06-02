<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrinterBox extends Model
{
    /** @use HasFactory<\Database\Factories\PrinterBoxFactory> */
    use HasFactory;

    protected $fillable = [
        'name','printer_code','pin',
        'colored_price','black_price'
    ];
}
