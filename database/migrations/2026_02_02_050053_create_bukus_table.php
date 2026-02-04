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
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->engine('InnoDB');
            $table->id('id_buku');
            $table->string('kode_buku', 20)->unique();
            $table->string('judul_buku');
            $table->integer('stok_buku');

            $table->foreignId('id_penulis')->constrained('tbl_penulis', 'id_penulis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_penerbit')->constrained('tbl_penerbit', 'id_penerbit')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_buku');
    }
};
