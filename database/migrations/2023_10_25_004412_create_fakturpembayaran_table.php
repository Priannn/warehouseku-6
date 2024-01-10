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
        Schema::create('fakturpembayaran', function (Blueprint $table) {
            $table->id();
            $table->integer('fakturpembelian_id');
            $table->string('pembayaran');
            $table->string('status')->default('Selesai');
            $table->string('status_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakturpembayaran');
    }
};
