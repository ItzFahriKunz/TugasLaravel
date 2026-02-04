<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Petugas</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/petugas" class="back-link">← Kembali ke Daftar Petugas</a>
        
        <div class="form-icon">✏️</div>
        <h1 class="mb-2">Edit Data Petugas</h1>
        <p class="form-description">Perbarui data petugas sesuai kebutuhan</p>
        <div class="alert alert-info info-badge mb-4">
            📋 Mengedit data petugas: <strong>{{ $datapetugas[0]->nama_petugas }}</strong>
        </div>

        <form action="/petugas/update" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="nip" class="form-label"><strong>NIP</strong></label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ $datapetugas[0]->nip }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_petugas" class="form-label"><strong>Nama Petugas</strong></label>
                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ $datapetugas[0]->nama_petugas }}" required>
            </div>

            <div class="mb-3">
                <label for="no_hp_petugas" class="form-label"><strong>Nomor HP</strong></label>
                <input type="text" class="form-control" id="no_hp_petugas" name="no_hp_petugas" value="{{ $datapetugas[0]->no_hp_petugas }}" required>
            </div>

            <input type="hidden" name="id_petugas" value="{{ $datapetugas[0]->id_petugas }}">

            <button type="submit" class="btn btn-submit w-100">✓ Update Data</button>
        </form>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>