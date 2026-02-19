<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;

    protected $fillable = [
        'name','file_path','total_page',
        'start_page','end_page','count_print_page',
        'print_type','total_price',
        'payment_status','print_status',
        'printer_box_id'
    ];
}
