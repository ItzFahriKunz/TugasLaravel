<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/buku" class="back-link">← Kembali ke Daftar Buku</a>
        
        <div class="form-icon">✏️</div>
        <h1 class="mb-2">Edit Data Buku</h1>
        <p class="form-description">Perbarui data buku sesuai kebutuhan</p>

        <div class="alert alert-info info-badge mb-4">
            📋 Mengedit data buku: <strong>{{ $buku->judul_buku }}</strong>
        </div>

        <form action="/buku/update" method="POST">
            @csrf

            <input type="hidden" name="id_buku" value="{{ $buku->id_buku }}">
            
            <div class="mb-3">
                <label for="kode_buku" class="form-label"><strong>Kode Buku</strong></label>
                <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="{{ $buku->kode_buku }}" placeholder="Masukkan kode buku" required>
            </div>

            <div class="mb-3">
                <label for="judul_buku" class="form-label"><strong>Judul Buku</strong></label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ $buku->judul_buku }}" placeholder="Masukkan judul buku" required>
            </div>

            <div class="mb-3">
                <label for="stok_buku" class="form-label"><strong>Stok Buku</strong></label>
                <input type="number" class="form-control" id="stok_buku" name="stok_buku" value="{{ $buku->stok_buku }}" placeholder="Masukkan stok buku" required>
            </div>

            <div class="mb-3">
                <label for="id_penulis" class="form-label"><strong>Penulis</strong></label>
                <select class="form-select" id="id_penulis" name="id_penulis" required>
                    <option value="">Pilih Penulis</option>
                    @foreach ($penulis as $item)
                        <option value="{{ $item->id_penulis }}" {{ $item->id_penulis == $buku->id_penulis ? 'selected' : '' }}>{{ $item->nama_penulis }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_penerbit" class="form-label"><strong>Penerbit</strong></label>
                <select class="form-select" id="id_penerbit" name="id_penerbit" required>
                    <option value="">Pilih Penerbit</option>
                    @foreach ($penerbit as $item)
                        <option value="{{ $item->id_penerbit }}" {{ $item->id_penerbit == $buku->id_penerbit ? 'selected' : '' }}>{{ $item->nama_penerbit }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-submit w-100">✓ Update Data</button>
        </form>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>