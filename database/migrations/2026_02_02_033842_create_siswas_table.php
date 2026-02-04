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
       Schema::create('tbl_siswa', function (Blueprint $table) {
        $table->id('id_siswa');
        $table->string('nis', 20)->unique();
        $table->string('nama');
        $table->string('kelas', 50);
        $table->string('alamat');
        $table->string('no_hp', 15);
        $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_siswa');
    }
};
