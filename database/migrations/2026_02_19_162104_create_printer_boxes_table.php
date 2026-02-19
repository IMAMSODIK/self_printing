<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('printer_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('printer_code')->unique();
            $table->string('pin');
            $table->integer('colored_price');
            $table->integer('black_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printer_boxes');
    }
};
