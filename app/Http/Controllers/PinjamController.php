<?php

namespace App\Http\Controllers;
use App\Models\Pinjam;
use App\Models\Pinjamdetail;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Buku;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function pinjamtampil()
    {
        $datapinjam = Pinjam::with('siswa', 'petugas', 'pinjamdetail.buku')->get();
        return view('pinjam/pinjamtampil', ['datapinjam' => $datapinjam]);
    }

    public function pinjamtambah()
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

    public function pinjamstore(Request $request)
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

    public function pinjamedit($id)
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

    public function pinjamupdate(Request $request)
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

        return redirect('/pinjam')->with('success', 'Data peminjaman berhasil diupdate!');
    }

    public function pinjamhapus($id)
    {
        Pinjamdetail::where('id_pinjam', $id)->delete();

        Pinjam::where('id_pinjam', $id)->delete();

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