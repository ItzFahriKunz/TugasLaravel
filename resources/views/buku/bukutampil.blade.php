<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
</head>
<body>
    <div class="container py-5">
        <div class="stats-card">
            <h1 class="mb-2">📚 Koleksi Buku Perpustakaan</h1>
            <p class="mb-0">Kelola data buku perpustakaan</p>
        </div>

        <a href="/index" class="back-link mb-3 d-inline-block">← Kembali ke Home</a>

        <div class="header-actions d-flex justify-content-between align-items-center mb-4">
            <div class="text-muted">
                <strong>Total Buku:</strong> {{ count($databuku) }} judul
            </div>
            <a href="/buku/create" class="btn btn-primary">
                <strong>+</strong> Tambah Buku Baru
            </a>
        </div>

        <div class="table-wrapper">
            <table class="table table-hover mb-0">
                <thead>
                    <tr class="table-header">
                        <th style="width: 50px;">No</th>
                        <th>Kode</th>
                        <th>Judul Buku</th>
                        <th>Stok</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th class="text-center" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($databuku as $isiBuku)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><strong>{{ $isiBuku->kode_buku }}</strong></td>
                        <td>
                            <strong>{{ $isiBuku->judul_buku }}</strong><br>
                            <small class="text-muted">ID: {{ $isiBuku->id_buku }}</small>
                        </td>
                        <td>
                            <span class="badge {{ $isiBuku->stok_buku > 5 ? 'bg-success' : 'bg-warning' }}">
                                {{ $isiBuku->stok_buku }} unit
                            </span>
                        </td>
                        <td>{{ $isiBuku->penulis->nama_penulis }}</td>
                        <td>{{ $isiBuku->penerbit->nama_penerbit }}</td>
                        <td>
                            <div class="action-buttons text-center justify-content-center">
                                <a href="/buku/{{ $isiBuku->id_buku }}/edit"
                                   class="btn btn-success btn-sm"
                                   title="Edit data">
                                    ✏️ Edit
                                </a>
                                <form action="/buku/{{ $isiBuku->id_buku }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus data {{ $isiBuku->judul_buku }}?');">
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
                        <td colspan="7" class="no-data text-center py-5">
                            <div style="font-size: 3rem; opacity: 0.3;">📚</div>
                            <p class="mb-0">Belum ada data buku</p>
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
