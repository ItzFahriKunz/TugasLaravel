<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body class="form-page">
    <div class="container p-5" style="max-width: 600px;">
        <a href="/siswa" class="back-link">← Kembali ke Daftar Siswa</a>
        
        <div class="form-icon">✏️</div>
        <h1 class="mb-2">Edit Data Siswa</h1>
        <p class="form-description">Perbarui data siswa sesuai kebutuhan</p>

        @foreach($datasiswa as $s)
        <div class="alert alert-info info-badge mb-4">
            📋 Mengedit data siswa: <strong>{{ $s->nama }}</strong>
        </div>

        <form action="/siswa/update" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="nis" class="form-label"><strong>NIS (Nomor Induk Siswa)</strong></label>
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $s->nis }}" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label"><strong>Nama Lengkap</strong></label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $s->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label"><strong>Kelas</strong></label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $s->kelas }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label"><strong>Alamat Lengkap</strong></label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $s->alamat }}" required>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label"><strong>Nomor HP</strong></label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $s->no_hp }}" required>
            </div>

            <input type="hidden" name="id" value="{{ $s->id_siswa }}">

            <button type="submit" class="btn btn-submit w-100">✓ Update Data</button>
        </form>
        @endforeach
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>