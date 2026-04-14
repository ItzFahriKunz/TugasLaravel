<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body>
    <div class="container py-5">
        <div class="stats-card">
            <h1 class="mb-2">👨‍💼 Data Petugas Perpustakaan</h1>
            <p class="mb-0">Kelola data petugas perpustakaan</p>
        </div>

        <a href="/index" class="back-link mb-3 d-inline-block">← Kembali ke Home</a>

        <div class="header-actions d-flex justify-content-between align-items-center mb-4">
            <div class="text-muted">
                <strong>Total Petugas:</strong> {{ count($datapetugas) }} orang
            </div>
            <a href="/petugas/create" class="btn btn-primary">
                <strong>+</strong> Tambah Petugas Baru
            </a>
        </div>

        <div class="table-wrapper">
            <table class="table table-hover mb-0">
                <thead>
                    <tr class="table-header">
                        <th style="width: 50px;">No</th>
                        <th>NIP</th>
                        <th>Nama Petugas</th>
                        <th>No. HP</th>
                        <th class="text-center" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($datapetugas as $isiPetugas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><strong>{{ $isiPetugas->nip }}</strong></td>
                        <td>{{ $isiPetugas->nama_petugas }}</td>
                        <td>{{ $isiPetugas->no_hp_petugas }}</td>
                        <td>
                            <div class="action-buttons text-center justify-content-center">
                                <a href="/petugas/{{ $isiPetugas->id_petugas }}/edit"
                                   class="btn btn-success btn-sm"
                                   title="Edit data">
                                    ✏️ Edit
                                </a>
                                <form action="/petugas/{{ $isiPetugas->id_petugas }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus data">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="no-data text-center py-5">
                            <div style="font-size: 3rem; opacity: 0.3;">👨‍💼</div>
                            <p class="mb-0">Belum ada data petugas</p>
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
