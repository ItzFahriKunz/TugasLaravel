<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    public function index()
    {
        $databuku = Buku::all();
        return view('buku.bukutampil', ['databuku' => $databuku]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('buku.bukutambah', ['penulis' => $penulis, 'penerbit' => $penerbit]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Buku::create([
            'judul_buku' => $request->judul_buku,
            'isbn' => $request->isbn,
            'id_penulis' => $request->id_penulis,
            'id_penerbit' => $request->id_penerbit
        ]);

        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('buku.bukuedit', ['databuku' => $buku, 'penulis' => $penulis, 'penerbit' => $penerbit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Buku::where('id_buku', $id)->update([
            'judul_buku' => $request->judul_buku,
            'isbn' => $request->isbn,
            'id_penulis' => $request->id_penulis,
            'id_penerbit' => $request->id_penerbit
        ]);

        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Buku::where('id_buku', $id)->delete();
        return redirect('/buku');
    }
}
