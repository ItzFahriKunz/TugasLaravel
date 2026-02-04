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
        Schema::create('tbl_pinjam', function (Blueprint $table) {
    $table->id('id_pinjam');

    $table->unsignedBigInteger('id_siswa');
    $table->unsignedBigInteger('id_petugas');

    $table->date('waktu_pinjam');
    $table->timestamps();

    $table->foreign('id_siswa')
          ->references('id_siswa')
          ->on('tbl_siswa')
          ->onDelete('cascade')
          ->onUpdate('cascade');

    $table->foreign('id_petugas')
          ->references('id_petugas')
          ->on('tbl_petugas')
          ->onDelete('cascade')
          ->onUpdate('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pinjam');
    }
};
