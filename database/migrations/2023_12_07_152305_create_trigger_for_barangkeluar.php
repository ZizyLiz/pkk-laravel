<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TRIGGER barang_stok_after_barangkeluar_insert
            AFTER INSERT ON barangkeluar
            FOR EACH ROW
                UPDATE barang
                SET stok = stok - NEW.qty_keluar
                WHERE id = NEW.barang_id
        ");
        DB::statement("
            CREATE TRIGGER barang_stok_after_barangkeluar_delete
            AFTER DELETE ON barangkeluar
            FOR EACH ROW
                UPDATE barang
                SET stok = stok + OLD.qty_keluar
                WHERE id = OLD.qty_keluar
        ");
        DB::statement("
            CREATE TRIGGER barang_stok_after_barangkeluar_update
            AFTER UPDATE ON barangkeluar
            FOR EACH ROW
                UPDATE barang
                SET stok = stok + OLD.qty_keluar - NEW.qty_keluar
                WHERE id = NEW.barang_id
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS barang_stok_after_barangkeluar_insert");
    }
};
