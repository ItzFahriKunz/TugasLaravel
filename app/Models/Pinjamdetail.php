<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjamdetail extends Model
{
   protected $table = 'tbl_pinjamdetail';
   protected $primaryKey = 'id_pinjamdetail';
   protected $fillable = [
                           'id_pinjam',
                           'id_buku',
    ];

    public function pinjam()
    {
        return $this->belongsTo(Pinjam::class, 'id_pinjam', 'id_pinjam');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku')->withTrashed();
    }
}
