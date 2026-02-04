<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'tbl_petugas';
    protected $primaryKey = 'id_petugas';
    protected $fillable = [
                            'id_petugas',
                            'nip',
                            'nama_petugas',
                            'no_hp_petugas',
    ];

    public function pinjam()
    {
        return $this->hasMany(Pinjam::class, 'id_petugas', 'id_petugas');
    }
}
