<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapenulis = Penulis::all();
        return view('penulis.penulistampil', ['datapenulis' => $datapenulis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penulis.penulistambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Penulis::create([
            'nama_penulis' => $request->nama_penulis,
            'no_hp_penulis' => $request->no_hp_penulis
        ]);

        return redirect('/penulis');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penulis $penulis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penulis = Penulis::where('id_penulis', $id)->firstOrFail();
        return view('penulis.penulisedit', ['penulis' => $penulis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Penulis::where('id_penulis', $id)->update([
            'nama_penulis' => $request->nama_penulis,
            'no_hp_penulis' => $request->no_hp_penulis
        ]);

        return redirect('/penulis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Penulis::where('id_penulis', $id)->delete();
        return redirect('/penulis');
    }
}
