<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
   public function petugastampil()
    {
        $petugas = Petugas::all();

        return view('petugas/petugastampil', ['datapetugas' => $petugas]);
    }

    public function petugastambah()
    {
        return view('petugas/petugastambah');
    }

    public function petugasstore(Request $request)
    {
        Petugas::create([
            'nip' => $request->nip,
            'nama_petugas' => $request->nama_petugas,
            'no_hp_petugas' => $request->no_hp_petugas
        ]);

        return redirect('/petugas');
    }

    public function petugasedit($id)
    {
        $petugas = Petugas::where('id_petugas', $id)->get();

        return view('petugas/petugasedit', ['datapetugas' => $petugas]);
    }   

    public function petugasupdate(Request $request)
    {
        Petugas::where('id_petugas', $request->id)->update([
            'nip' => $request->nip,
            'nama_petugas' => $request->nama_petugas,
            'no_hp_petugas' => $request->no_hp_petugas,
        ]);

        return redirect('/petugas');
    }

    public function petugashapus($id)
    {
        Petugas::where('id_petugas', $id)->delete();

        return redirect('/petugas');
    }
}
