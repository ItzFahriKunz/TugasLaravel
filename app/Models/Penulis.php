<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'tbl_penulis';
    protected $primaryKey = 'id_penulis';
    protected $fillable = [
                            'id_penulis',
                            'nama_penulis',
                            'no_hp_penulis',
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_penulis', 'id_penulis');
    }
}
