<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'tbl_pinjam';
    protected $primaryKey = 'id_pinjam';
    protected $fillable = [
                            'id_siswa',
                            'id_petugas',
                            'waktu_pinjam',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id_petugas');
    }

    public function pinjamdetail()
    {
        return $this->hasMany(Pinjamdetail::class, 'id_pinjam', 'id_pinjam');
    }
}
