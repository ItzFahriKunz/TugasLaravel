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

        <div class="text-center">
            <div class="form-icon">✏️</div>
            <h1 class="mb-2">Edit Data Siswa</h1>
            <p class="form-description">Perbarui data siswa sesuai kebutuhan</p>
        </div>

        @foreach($datasiswa as $s)
        <div class="alert alert-info info-badge mb-4">
            📋 Mengedit data siswa: <strong>{{ $s->nama }}</strong>
        </div>

        <form action="{{ route('siswa.update', $s->id_siswa) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label"><strong>NIS</strong></label>
                <input type="text" class="form-control" name="nis" value="{{ $s->nis }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Nama</strong></label>
                <input type="text" class="form-control" name="nama" value="{{ $s->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Kelas</strong></label>
                <input type="text" class="form-control" name="kelas" value="{{ $s->kelas }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Alamat</strong></label>
                <input type="text" class="form-control" name="alamat" value="{{ $s->alamat }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>No HP</strong></label>
                <input type="text" class="form-control" name="no_hp" value="{{ $s->no_hp }}" required>
            </div>

            <button type="submit" class="btn btn-submit w-100">✓ Update Data</button>
        </form>
        @endforeach
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
