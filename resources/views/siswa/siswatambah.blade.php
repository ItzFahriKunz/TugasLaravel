<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/siswa" class="back-link">← Kembali ke Daftar Siswa</a>
        
        <div class="form-icon">📝</div>
        <h1 class="mb-2">Tambah Data Siswa</h1>
        <p class="form-description">Lengkapi formulir di bawah ini</p>

        <form action="/siswa/store" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nis" class="form-label"><strong>NIS (Nomor Induk Siswa)</strong></label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label"><strong>Nama Lengkap</strong></label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label"><strong>Kelas</strong></label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Contoh: X IPA 1" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label"><strong>Alamat Lengkap</strong></label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" required>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label"><strong>Nomor HP</strong></label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Contoh: 081234567890" required>
            </div>

            <button type="submit" class="btn btn-submit w-100">💾 Simpan Data</button>
        </form>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>