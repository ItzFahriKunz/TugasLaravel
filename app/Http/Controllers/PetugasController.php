<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.petugastampil', ['datapetugas' => $petugas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.petugastambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Petugas::create([
            'nip' => $request->nip,
            'nama_petugas' => $request->nama_petugas,
            'no_hp_petugas' => $request->no_hp_petugas
        ]);

        return redirect('/petugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $petugas = Petugas::where('id_petugas', $id)->firstOrFail();
        return view('petugas.petugasedit', ['datapetugas' => $petugas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            Petugas::where('id_petugas', $id)->update([
            'nip' => $request->nip,
            'nama_petugas' => $request->nama_petugas,
            'no_hp_petugas' => $request->no_hp_petugas,
        ]);

        return redirect('/petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id)
        {
        Petugas::where('id_petugas', $id)->delete();
        return redirect('/petugas');
    }
}
