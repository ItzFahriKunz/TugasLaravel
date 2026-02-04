<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
   public function penerbittampil()
    {
        $datapenerbit = Penerbit::all();
        return view('penerbit/penerbittampil', ['penerbit' => $datapenerbit]);
    }

    public function penerbittambah()
    {
        return view('penerbit/penerbittambah');
    }

    public function penerbitstore(Request $request)
    {
        Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit,
            'asal_kota' => $request->asal_kota,
            'isbn' => $request->isbn
        ]);

        return redirect('/penerbit');
    }

    public function penerbitedit($id)
    {
        $penerbit = Penerbit::where('id_penerbit', $id)->first();
        return view('penerbit/penerbitedit', ['penerbit' => $penerbit]);
    }

    public function penerbitupdate(Request $request)
    {
        Penerbit::where('id_penerbit', $request->id_penerbit)->update([
            'nama_penerbit' => $request->nama_penerbit,
            'asal_kota' => $request->asal_kota,
            'isbn' => $request->isbn
        ]);

        return redirect('/penerbit');
    }

    public function penerbithapus($id)
    {
        Penerbit::where('id_penerbit', $id)->delete();
        return redirect('/penerbit');
    }
}
