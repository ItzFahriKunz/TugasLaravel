<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapenerbit = Penerbit::all();
        return view('penerbit.penerbittampil', ['datapenerbit' => $datapenerbit]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.penerbittambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit,
            'alamat_penerbit' => $request->alamat_penerbit,
            'no_hp_penerbit' => $request->no_hp_penerbit
        ]);

        return redirect('/penerbit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penerbit = Penerbit::where('id_penerbit', $id)->firstOrFail();
        return view('penerbit.penerbitedit', ['penerbit' => $penerbit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Penerbit::where('id_penerbit', $id)->update([
            'nama_penerbit' => $request->nama_penerbit,
            'alamat_penerbit' => $request->alamat_penerbit,
            'no_hp_penerbit' => $request->no_hp_penerbit
        ]);

        return redirect('/penerbit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Penerbit::where('id_penerbit', $id)->delete();
        return redirect('/penerbit');
    }
}
