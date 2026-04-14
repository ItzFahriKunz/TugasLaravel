<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penerbit</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/penerbit" class="back-link">← Kembali ke Daftar Penerbit</a>

        <div class="form-icon">✏️</div>
        <h1 class="mb-2">Edit Data Penerbit</h1>
        <p class="form-description">Perbarui data penerbit sesuai kebutuhan</p>

        <div class="alert alert-info info-badge mb-4">
            📋 Mengedit data penerbit: <strong>{{ $penerbit->nama_penerbit }}</strong>
        </div>

        <form action="/penerbit" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_penerbit" class="form-label"><strong>Nama Penerbit</strong></label>
                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="{{ $penerbit->nama_penerbit }}" required>
            </div>

            <div class="mb-3">
                <label for="asal_kota" class="form-label"><strong>Asal Kota</strong></label>
                <input type="text" class="form-control" id="asal_kota" name="asal_kota" value="{{ $penerbit->asal_kota }}" required>
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label"><strong>ISBN</strong></label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $penerbit->isbn }}" required>
            </div>

            <input type="hidden" name="id_penerbit" value="{{ $penerbit->id_penerbit }}">

            <button type="submit" class="btn btn-submit w-100">✓ Update Data</button>
        </form>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
