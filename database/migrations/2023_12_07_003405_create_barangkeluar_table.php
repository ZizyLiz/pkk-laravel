<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barangkeluar', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->date('tgl_keluar')->default(date('Y-m-d'));
            $table->integer('barang_id');
            $table->integer('qty_keluar');
            $table->foreign('barang_id')
                ->references('id')->on('barang')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangkeluar');
    }
};