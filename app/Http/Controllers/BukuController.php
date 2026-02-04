<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function bukutampil()
    {
        $databuku = Buku::with(['penulis', 'penerbit'])->get();
        return view('buku/bukutampil', ['databuku' => $databuku]);
    }

    public function bukutambah()
    {
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('buku/bukutambah', ['penulis' => $penulis, 'penerbit' => $penerbit]);
    }

    public function bukustore(Request $request)
    {
        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'stok_buku' => $request->stok_buku,
            'id_penulis' => $request->id_penulis,
            'id_penerbit' => $request->id_penerbit
        ]);

        return redirect('/buku');
    }

    public function bukuedit($id)
    {
        $buku = Buku::where('id_buku', $id)->first();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('buku/bukuedit', ['buku' => $buku, 'penulis' => $penulis, 'penerbit' => $penerbit]);
    }

    public function bukuupdate(Request $request)
    {
        Buku::where('id_buku', $request->id_buku)->update([
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'stok_buku' => $request->stok_buku,
            'id_penulis' => $request->id_penulis,
            'id_penerbit' => $request->id_penerbit
        ]);

        return redirect('/buku');
    }

    public function bukuhapus($id)
    {
        Buku::where('id_buku', $id)->delete();
        return redirect('/buku');
    }
}
