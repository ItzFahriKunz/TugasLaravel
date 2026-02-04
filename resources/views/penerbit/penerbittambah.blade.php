<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penerbit</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/penerbit" class="back-link">← Kembali ke Daftar Penerbit</a>
        
        <div class="form-icon">📝</div>
        <h1 class="mb-2">Tambah Data Penerbit</h1>
        <p class="form-description">Lengkapi formulir di bawah ini</p>

        <form action="/penerbit/store" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nama_penerbit" class="form-label"><strong>Nama Penerbit</strong></label>
                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" placeholder="Masukkan nama penerbit" required>
            </div>

            <div class="mb-3">
                <label for="asal_kota" class="form-label"><strong>Asal Kota</strong></label>
                <input type="text" class="form-control" id="asal_kota" name="asal_kota" placeholder="Contoh: Jakarta" required>
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label"><strong>ISBN</strong></label>
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan ISBN" required>
            </div>

            <button type="submit" class="btn btn-submit w-100">💾 Simpan Data</button>
        </form>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>