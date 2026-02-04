<?php

namespace App\Http\Controllers;
use App\Models\Penulis;

use Illuminate\Http\Request;

class PenulisController extends Controller
{
  public function penulistampil()
    {
        $datapenulis = Penulis::all();
        return view('penulis/penulistampil', ['datapenulis' => $datapenulis]);
    }

    public function penulistambah()
    {
        return view('penulis/penulistambah');
    }

    public function penulisstore(Request $request)
    {
        Penulis::create([
            'nama_penulis' => $request->nama_penulis,
            'no_hp_penulis' => $request->no_hp_penulis
        ]);

        return redirect('/penulis');
    }

    public function penulisedit($id)
    {
        $penulis = Penulis::where('id_penulis', $id)->first();
        return view('penulis/penulisedit', ['penulis' => $penulis]);
    }

    public function penulisupdate(Request $request)
    {
        Penulis::where('id_penulis', $request->id_penulis)->update([
            'nama_penulis' => $request->nama_penulis,
            'no_hp_penulis' => $request->no_hp_penulis
        ]);

        return redirect('/penulis');
    }

    public function penulushapus($id)
    {
        Penulis::where('id_penulis', $id)->delete();
        return redirect('/penulis');
    }
}
