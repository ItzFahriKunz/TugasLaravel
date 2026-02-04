<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'tbl_siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
                            'id_siswa',
                            'nis',
                            'nama',
                            'kelas',
                            'alamat',
                            'no_hp',
    ];

    public function pinjam()
    {
        return $this->hasMany(Pinjam::class, 'id_siswa', 'id_siswa');
    }
}
