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
        Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemesan');
        $table->string('jenis_kelamin');
        $table->string('nomor_identitas', 16);
        $table->foreignId('room_id')->constrained('rooms');
        $table->date('tanggal_pesan');
        $table->integer('durasi_menginap');
        $table->boolean('breakfast')->default(false);
        $table->integer('total_bayar');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
