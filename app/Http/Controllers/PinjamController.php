<?php

namespace App\Http\Controllers;

use App\Models\Pinjamdetail;
use App\Models\Siswa;
use App\Models\Buku;
use App\Models\Petugas;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapinjam = Pinjam::all();
        return view('pinjam.pinjamtampil', ['datapinjam' => $datapinjam]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $petugas = Petugas::all();
        $buku = Buku::with('penulis')->get();

        return view('pinjam/pinjamtambah', [
            'datasiswa' => $siswa,
            'datapetugas' => $petugas,
            'databuku' => $buku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:tbl_siswa,id_siswa',
            'id_petugas' => 'required|exists:tbl_petugas,id_petugas',
            'waktu_pinjam' => 'required|date',
            'id_buku' => 'required|array|min:1',
            'id_buku.*' => 'exists:tbl_buku,id_buku'
        ], [
            'id_buku.required' => 'Pilih minimal 1 buku!',
            'id_buku.min' => 'Pilih minimal 1 buku!'
        ]);

        $pinjam = Pinjam::create([
            'id_siswa' => $request->id_siswa,
            'id_petugas' => $request->id_petugas,
            'waktu_pinjam' => $request->waktu_pinjam
        ]);

        foreach ($request->id_buku as $id_buku) {
            Pinjamdetail::create([
                'id_pinjam' => $pinjam->id_pinjam,
                'id_buku'   => $id_buku
            ]);
        }

        return redirect('/pinjam')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pinjam = Pinjam::with('pinjamdetail')->where('id_pinjam', $id)->firstOrFail();
        $siswa = Siswa::all();
        $petugas = Petugas::all();
        $buku = Buku::with('penulis')->get();

        return view('pinjam/pinjamedit', [
            'pinjam' => $pinjam,
            'datasiswa' => $siswa,
            'datapetugas' => $petugas,
            'databuku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pinjam' => 'required|exists:tbl_pinjam,id_pinjam',
            'id_siswa' => 'required|exists:tbl_siswa,id_siswa',
            'id_petugas' => 'required|exists:tbl_petugas,id_petugas',
            'waktu_pinjam' => 'required|date',
            'id_buku' => 'required|array|min:1',
            'id_buku.*' => 'exists:tbl_buku,id_buku'
        ], [
            'id_buku.required' => 'Pilih minimal 1 buku!',
            'id_buku.min' => 'Pilih minimal 1 buku!'
        ]);

        Pinjam::where('id_pinjam', $request->id_pinjam)->update([
            'id_siswa' => $request->id_siswa,
            'id_petugas' => $request->id_petugas,
            'waktu_pinjam' => $request->waktu_pinjam
        ]);

        Pinjamdetail::where('id_pinjam', $request->id_pinjam)->delete();

        foreach ($request->id_buku as $id_buku) {
            Pinjamdetail::create([
                'id_pinjam' => $request->id_pinjam,
                'id_buku'   => $id_buku
            ]);
        }

        return redirect('/pinjam')->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pinjam = Pinjam::where('id_pinjam', $id)->firstOrFail();
        Pinjamdetail::where('id_pinjam', $pinjam->id_pinjam)->delete();
        Pinjam::where('id_pinjam', $pinjam->id_pinjam)->delete();

        return redirect('/pinjam')->with('success', 'Data peminjaman berhasil dihapus!');
    }

    public function pinjamdetail($id)
    {
        $pinjam = Pinjam::with('siswa', 'petugas', 'pinjamdetail.buku')
                        ->where('id_pinjam', $id)
                        ->firstOrFail();

        return view('pinjam/pinjamdetail', ['pinjam' => $pinjam]);
    }
}
