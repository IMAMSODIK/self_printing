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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->integer('total_page')->nullable();
            $table->integer('start_page')->nullable();
            $table->integer('end_page')->nullable();
            $table->integer('count_print_page')->nullable();
            $table->enum('print_type', ['colored', 'bw'])->nullable();
            $table->integer('total_price')->nullable();
            $table->enum('payment_status', ['waiting', 'paid', 'failed'])->default('waiting');
            $table->enum('print_status', ['waiting', 'printing', 'done'])->default('waiting');
            $table->foreignId('printer_box_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
