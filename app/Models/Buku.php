<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use SoftDeletes;

    // Nama tabel (karena bukan default "bukus")
    protected $table = 'tbl_buku';

    // Primary key custom
    protected $primaryKey = 'id_buku';

    // Kalau PK auto increment (pakai $table->id)
    public $incrementing = true;

    // Tipe PK
    protected $keyType = 'int';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'stok_buku',
        'id_penulis',
        'id_penerbit',
    ];

    
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis', 'id_penulis');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit', 'id_penerbit');
    }

    public function pinjamdetail()
    {
        return $this->hasMany(Pinjamdetail::class, 'id_buku', 'id_buku');
    }
}
