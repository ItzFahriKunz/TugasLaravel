<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Buku</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/crudstyle.css') }}">
    <style>
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="stats-card">
            <h1 class="mb-2">📚 Manajemen Peminjaman Buku</h1>
            <p class="mb-0">Kelola data peminjaman buku perpustakaan</p>
        </div>

        <a href="/index" class="back-link mb-3 d-inline-block">← Kembali ke Home</a>

        <div class="header-actions d-flex justify-content-between align-items-center mb-4">
            <div class="text-muted">
                <strong>Total Peminjaman:</strong> {{ count($datapinjam) }} transaksi
            </div>
            <a href="/pinjam/create" class="btn btn-primary">
                <strong>+</strong> Tambah Peminjaman Baru
            </a>
        </div>

        <div class="table-wrapper">
            <table class="table table-hover mb-0">
                <thead>
                    <tr class="table-header">
                        <th style="width: 50px;">No</th>
                        <th>Nama Siswa</th>
                        <th>Petugas</th>
                        <th>Tanggal Pinjam</th>
                        <th style="width: 300px;">Buku Dipinjam</th>
                        <th class="text-center" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($datapinjam as $pinjam)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <strong>{{ $pinjam->siswa->nama }}</strong><br>
                            <small class="text-muted">NIS: {{ $pinjam->siswa->nis }}</small>
                        </td>
                        <td>{{ $pinjam->petugas->nama_petugas }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ \Carbon\Carbon::parse($pinjam->waktu_pinjam)->format('d M Y') }}
                            </span>
                        </td>
                        <td>
                            <div class="book-list">
                                @foreach ($pinjam->pinjamdetail as $detail)
                                    <span class="badge-book">📖 {{ $detail->buku->judul_buku }}</span>
                                @endforeach
                            </div>
                            <small class="text-muted">
                                Total: {{ count($pinjam->pinjamdetail) }} buku
                            </small>
                        </td>
                        <td>
                            <div class="action-buttons justify-content-center text-center">
                                <a href="/pinjam/{{ $pinjam->id_pinjam }}/edit"
                                   class="btn btn-success btn-sm"
                                   title="Edit data">
                                    ✏️ Edit
                                </a>
                                <form action="/pinjam/{{ $pinjam->id_pinjam }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus peminjaman atas nama {{ $pinjam->siswa->nama }}?\n\nBuku yang dipinjam:\n@foreach($pinjam->pinjamdetail as $detail)- {{ $detail->buku->judul_buku }}\n@endforeach')" title="Hapus data">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="no-data text-center py-5">
                            <div style="font-size: 3rem; opacity: 0.3;">📚</div>
                            <p class="mb-0">Belum ada data peminjaman</p>
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
