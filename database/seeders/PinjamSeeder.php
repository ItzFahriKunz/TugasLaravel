<?php

namespace Database\Seeders;
use App\Models\Pinjam;
use App\Models\Pinjamdetail;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Buku;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PinjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $siswaIds = Siswa::pluck('id_siswa')->toArray();
        $petugasIds = Petugas::pluck('id_petugas')->toArray();
        $bukuIds = Buku::pluck('id_buku')->toArray();

        // Buat 50 transaksi peminjaman
        for ($i = 0; $i < 50; $i++) {
            // Generate tanggal random dalam 3 bulan terakhir
            $tanggalPinjam = Carbon::now()->subDays($faker->numberBetween(1, 90));

            // Buat data pinjam
            $pinjam = Pinjam::create([
                'id_siswa' => $faker->randomElement($siswaIds),
                'id_petugas' => $faker->randomElement($petugasIds),
                'waktu_pinjam' => $tanggalPinjam->format('Y-m-d'),
            ]);

            // Setiap peminjaman bisa pinjam 1-5 buku
            $jumlahBuku = $faker->numberBetween(1, 5);
            
            // Ambil random buku tanpa duplikat dalam 1 transaksi
            $bukuDipilih = $faker->randomElements($bukuIds, $jumlahBuku);

            // Simpan detail peminjaman untuk setiap buku
            foreach ($bukuDipilih as $id_buku) {
                Pinjamdetail::create([
                    'id_pinjam' => $pinjam->id_pinjam,
                    'id_buku' => $id_buku,
                ]);
            }
        }

        $this->command->info('✅ 50 Transaksi Peminjaman berhasil ditambahkan!');
        $this->command->info('📚 Dengan total ' . Pinjamdetail::count() . ' detail buku yang dipinjam!');
    }
}
