<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penulis</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body>
    <div class="container py-5">
        <div class="stats-card">
            <h1 class="mb-2">✏️ Data Penulis</h1>
            <p class="mb-0">Kelola data penulis buku</p>
        </div>

        <a href="/index" class="back-link mb-3 d-inline-block">← Kembali ke Home</a>
        
        <div class="header-actions d-flex justify-content-between align-items-center mb-4">
            <div class="text-muted">
                <strong>Total Penulis:</strong> {{ count($datapenulis) }} orang
            </div>
            <a href="/penulis/tambah" class="btn btn-primary">
                <strong>+</strong> Tambah Penulis Baru
            </a>
        </div>

        <div class="table-wrapper">
            <table class="table table-hover mb-0">
                <thead>
                    <tr class="table-header">
                        <th style="width: 50px;">No</th>
                        <th>Nama Penulis</th>
                        <th>No. HP</th>
                        <th class="text-center" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($datapenulis as $isiPenulis)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><strong>{{ $isiPenulis->nama_penulis }}</strong></td>
                        <td>{{ $isiPenulis->no_hp_penulis }}</td>
                        <td>
                            <div class="action-buttons text-center justify-content-center">
                                <a href="/penulis/edit/{{ $isiPenulis->id_penulis }}" 
                                   class="btn btn-success btn-sm"
                                   title="Edit data">
                                    ✏️ Edit
                                </a>
                                <a href="/penulis/hapus/{{ $isiPenulis->id_penulis }}" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus data {{ $isiPenulis->nama_penulis }}?')"
                                   title="Hapus data">
                                    🗑️ Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="no-data text-center py-5">
                            <div style="font-size: 3rem; opacity: 0.3;">✏️</div>
                            <p class="mb-0">Belum ada data penulis</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>