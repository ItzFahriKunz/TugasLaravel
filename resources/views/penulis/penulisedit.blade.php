<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penulis</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/penulis" class="back-link">← Kembali ke Daftar Penulis</a>
        
        <div class="form-icon">✏️</div>
        <h1 class="mb-2">Edit Data Penulis</h1>
        <p class="form-description">Perbarui data penulis sesuai kebutuhan</p>
        <div class="alert alert-info info-badge mb-4">
            📋 Mengedit data penulis: <strong>{{ $penulis->nama_penulis }}</strong>
        </div>

        <form action="/penulis/update" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="nama_penulis" class="form-label"><strong>Nama Penulis</strong></label>
                <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" value="{{ $penulis->nama_penulis }}" required>
            </div>

            <div class="mb-3">
                <label for="no_hp_penulis" class="form-label"><strong>Nomor HP</strong></label>
                <input type="text" class="form-control" id="no_hp_penulis" name="no_hp_penulis" value="{{ $penulis->no_hp_penulis }}" required>
            </div>

            <input type="hidden" name="id_penulis" value="{{ $penulis->id_penulis }}">
            <button type="submit" class="btn btn-submit w-100">✓ Update Data</button>
        </form>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>