<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function siswatampil()
    {
        $siswa = Siswa::all();

        return view('siswa/siswatampil', ['datasiswa' => $siswa]);
    }

    public function siswatambah()
    {
        return view('siswa/siswatambah');
    }

    public function siswastore(Request $request)
    {
        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/siswa');
    }

    public function siswaedit($id)
    {
        $siswa = Siswa::where('id_siswa', $id)->get();

        return view('siswa/siswaedit', ['datasiswa' => $siswa]);
    }

    public function siswaupdate(Request $request)
    {
        Siswa::where('id_siswa', $request->id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/siswa');
    }

    public function siswahapus($id)
    {
        Siswa::where('id_siswa', $id)->delete();

        return redirect('/siswa');
    }
}
