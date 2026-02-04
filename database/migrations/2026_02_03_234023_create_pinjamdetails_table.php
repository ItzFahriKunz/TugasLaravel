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
        Schema::create('tbl_pinjamdetail', function (Blueprint $table) {
    $table->id('id_pinjamdetail');

    $table->unsignedBigInteger('id_pinjam');
    $table->unsignedBigInteger('id_buku');

    $table->foreign('id_pinjam')
          ->references('id_pinjam')
          ->on('tbl_pinjam')
          ->cascadeOnDelete()
          ->cascadeOnUpdate();

    $table->foreign('id_buku')
          ->references('id_buku')
          ->on('tbl_buku')
          ->cascadeOnDelete()
          ->cascadeOnUpdate();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pinjamdetail');
    }
};
