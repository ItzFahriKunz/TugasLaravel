<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penulis</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/penulis" class="back-link">← Kembali ke Daftar Penulis</a>

        <div class="form-icon">📝</div>
        <h1 class="mb-2">Tambah Data Penulis</h1>
        <p class="form-description">Lengkapi formulir di bawah ini</p>

        <form action="/penulis" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_penulis" class="form-label"><strong>Nama Penulis</strong></label>
                <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" placeholder="Masukkan nama penulis" required>
            </div>

            <div class="mb-3">
                <label for="no_hp_penulis" class="form-label"><strong>Nomor HP</strong></label>
                <input type="text" class="form-control" id="no_hp_penulis" name="no_hp_penulis" placeholder="Masukkan nomor HP penulis" required>
            </div>

            <button type="submit" class="btn btn-submit w-100">💾 Simpan Data</button>
        </form>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
