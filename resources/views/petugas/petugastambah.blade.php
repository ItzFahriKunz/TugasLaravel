<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Petugas</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/petugas" class="back-link">← Kembali ke Daftar Petugas</a>
        
        <div class="form-icon">📝</div>
        <h1 class="mb-2">Tambah Data Petugas</h1>
        <p class="form-description">Lengkapi formulir di bawah ini</p>

        <form action="/petugas/store" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nip" class="form-label"><strong>NIP</strong></label>
                <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP petugas" required>
            </div>

            <div class="mb-3">
                <label for="nama_petugas" class="form-label"><strong>Nama Petugas</strong></label>
                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukkan nama petugas" required>
            </div>

            <div class="mb-3">
                <label for="no_hp_petugas" class="form-label"><strong>Nomor HP</strong></label>
                <input type="text" class="form-control" id="no_hp_petugas" name="no_hp_petugas" placeholder="Masukkan nomor HP petugas" required>
            </div>

            <button type="submit" class="btn btn-submit w-100">💾 Simpan Data</button>
        </form>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>