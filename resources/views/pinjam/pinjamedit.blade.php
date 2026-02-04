<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman Buku</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
    <style>
        
    </style>
</head>
<body class="form-page">

<div class="container p-5" style="max-width: 750px;">
    <a href="/pinjam" class="back-link">← Kembali ke Daftar Peminjaman</a>

    <div class="text-center">
        <div class="form-icon">✏️</div>
        <h1 class="mb-2">Edit Data Peminjaman</h1>
        <p class="text-muted mb-4">Perbarui informasi peminjaman buku</p>
    </div>

    <div class="alert alert-info mb-4">
        <strong>📋 Data Saat Ini:</strong><br>
        Siswa: <strong>{{ $pinjam->siswa->nama }}</strong> | 
        Tanggal: <strong>{{ \Carbon\Carbon::parse($pinjam->waktu_pinjam)->format('d M Y') }}</strong> |
        Jumlah Buku: <strong>{{ count($pinjam->pinjamdetail) }}</strong>
    </div>

    <form action="/pinjam/update" method="POST" id="formPinjam">
        @csrf
        <input type="hidden" name="id_pinjam" value="{{ $pinjam->id_pinjam }}">

        <div class="mb-4">
            <label class="form-label">
                <strong>👤 Pilih Siswa</strong> <span class="text-danger">*</span>
            </label>
            <select name="id_siswa" class="form-select" required>
                @foreach ($datasiswa as $siswa)
                    <option value="{{ $siswa->id_siswa }}"
                        {{ $siswa->id_siswa == $pinjam->id_siswa ? 'selected' : '' }}>
                        {{ $siswa->nama }} (NIS: {{ $siswa->nis }}) - {{ $siswa->kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label">
                <strong>👨‍💼 Petugas yang Melayani</strong> <span class="text-danger">*</span>
            </label>
            <select name="id_petugas" class="form-select" required>
                @foreach ($datapetugas as $petugas)
                    <option value="{{ $petugas->id_petugas }}"
                        {{ $petugas->id_petugas == $pinjam->id_petugas ? 'selected' : '' }}>
                        {{ $petugas->nama_petugas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label">
                <strong>📅 Tanggal Pinjam</strong> <span class="text-danger">*</span>
            </label>
            <input type="date" name="waktu_pinjam" class="form-control"
                   value="{{ $pinjam->waktu_pinjam }}" required>
        </div>

        <div class="mb-4">
            <label class="form-label">
                <strong>📖 Pilih Buku yang Dipinjam</strong> <span class="text-danger">*</span>
            </label>
            
            <div class="selected-count" id="selectedCount">
                Dipilih: <strong>0</strong> buku
            </div>

            <div class="search-box">
                <input type="text" 
                       id="searchBook" 
                       class="form-control" 
                       placeholder="🔍 Cari judul buku...">
            </div>

            <div class="book-selection-container" id="bookContainer">
                @php
                    $selectedBooks = $pinjam->pinjamdetail->pluck('id_buku')->toArray();
                @endphp

                @foreach ($databuku as $buku)
                <div class="book-item {{ in_array($buku->id_buku, $selectedBooks) ? 'selected' : '' }}" 
                     data-book-title="{{ strtolower($buku->judul_buku) }}">
                    <input type="checkbox" 
                           name="id_buku[]" 
                           value="{{ $buku->id_buku }}" 
                           id="book_{{ $buku->id_buku }}"
                           class="book-checkbox"
                           {{ in_array($buku->id_buku, $selectedBooks) ? 'checked' : '' }}>
                    <label for="book_{{ $buku->id_buku }}" class="book-info mb-0" style="cursor: pointer;">
                        <div class="book-title">{{ $buku->judul_buku }}</div>
                        <div class="book-stock">
                            Stok: <strong>{{ $buku->stok_buku }}</strong> | 
                            Penulis: {{ $buku->penulis->nama_penulis ?? '-' }}
                        </div>
                    </label>
                </div>
                @endforeach
            </div>

            <small class="text-muted d-block mt-2">
                💡 Klik pada buku untuk memilih/membatalkan pilihan
            </small>
        </div>

        <button type="submit" class="btn btn-submit w-100" id="btnSubmit">
            ✅ Update Peminjaman
        </button>
    </form>
</div>

<script src="{{ asset('assets/js/view.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>