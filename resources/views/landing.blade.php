<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="header-section">
            <div class="library-icon">📚</div>
            <h1>Perpustakaan Digital</h1>
            <p class="subtitle">Sistem Manajemen Perpustakaan</p>
        </div>

    <div class="cards-grid">
        <a href="/siswa" class="menu-card">
            <span class="card-icon"><i class="bi bi-people"></i></span>
            <h3 class="card-title">Data Siswa</h3>
            <p class="card-description">Kelola informasi siswa perpustakaan</p>
            <span class="card-arrow">-></span>
        </a>
        <a href="/petugas" class="menu-card">
            <span class="card-icon"><i class="bi bi-person-badge"></i></span>
            <h3 class="card-title">Data Petugas</h3>
            <p class="card-description">Kelola informasi petugas perpustakaan</p>
            <span class="card-arrow">-></span>
        </a>
        <a href="/penerbit" class="menu-card">
            <span class="card-icon"><i class="bi bi-building"></i></span>
            <h3 class="card-title">Data Penerbit</h3>
            <p class="card-description">Kelola informasi penerbit perpustakaan</p>
            <span class="card-arrow">-></span>
        </a>
        <a href="/penulis" class="menu-card">
            <span class="card-icon"><i class="bi bi-person"></i></span>
            <h3 class="card-title">Data Penulis</h3>
            <p class="card-description">Kelola informasi penulis perpustakaan</p>
            <span class="card-arrow">-></span>
        </a>
        <a href="/buku" class="menu-card">
            <span class="card-icon"><i class="bi bi-book"></i></span>
            <h3 class="card-title">Data Buku</h3>
            <p class="card-description">Kelola informasi buku perpustakaan</p>
            <span class="card-arrow">-></span>
        </a>
        <a href="/pinjam" class="menu-card">
            <span class="card-icon"><i class="bi bi-journal-bookmark"></i></span>
            <h3 class="card-title">Data Peminjaman</h3>
            <p class="card-description">Kelola informasi peminjaman perpustakaan</p>
            <span class="card-arrow">-></span>
        </a>
    </div>
    <div class="footer">
        <p>© 2026 Perpustakaan Digital. All rights reserved.</p>
    </div>
</div>
</body>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</html>