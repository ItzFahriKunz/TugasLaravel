<?php

namespace Database\Seeders;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penulis;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Daftar judul buku populer Indonesia
        $judulBuku = [
            'Laskar Pelangi',
            'Sang Pemimpi',
            'Edensor',
            'Maryamah Karpov',
            'Negeri 5 Menara',
            'Ranah 3 Warna',
            'Rantau 1 Muara',
            'Hafalan Shalat Delisa',
            'Ayat-Ayat Cinta',
            'Ketika Cinta Bertasbih',
            'Bumi Manusia',
            'Anak Semua Bangsa',
            'Jejak Langkah',
            'Rumah Kaca',
            'Perahu Kertas',
            'Rectoverso',
            'Filosofi Kopi',
            'Supernova: Ksatria, Puteri, dan Bintang Jatuh',
            'Cantik Itu Luka',
            'Lelaki Harimau',
            'Pulang',
            'Hujan',
            'Rindu',
            'Bumi',
            'Bulan',
            'Matahari',
            'Bintang',
            'Komet',
            'Komet Minor',
            'Tentang Kamu',
            'Dilan 1990',
            'Dilan 1991',
            'Milea: Suara dari Dilan',
            'Kambing Jantan',
            'Cinta Brontosaurus',
            'Koala Kumal',
            'Ubur-Ubur Lembur',
            'Manusia Setengah Salmon',
            'Hujan Bulan Juni',
            'Aku',
            'Surat Kecil untuk Tuhan',
            'Catatan Najwa',
            'Indonesia Dalam Api dan Bara',
            'Atheis',
            'Ronggeng Dukuh Paruk',
            'Gadis Pantai',
            'Para Priyayi',
            'Orang-Orang Proyek',
            'Telegram',
            'The Alchemist (Indonesia)',
            'Harry Potter dan Batu Bertuah',
            'Murder on the Orient Express',
            'The Da Vinci Code (Indonesia)',
            'Midnight Sun',
            'Ganjil Genap',
            'Laut Bercerita',
            'Seperti Dendam, Rindu Harus Dibayar Tuntas',
            'Si Anak Badai',
            'Jangan Ucapkan Cinta',
            'Dear Nathan',
            'Hanya Aku yang Bisa',
            'Surga yang Tak Dirindukan',
            'Wedding Agreement',
            'London Love Story',
            'Critical Eleven',
            'Divortiare',
            'Pergi',
            'Keajaiban Toko Kelontong Namiya',
            'Selamat Tinggal',
            'Kasih',
            'Ancika: Dia yang Bersamaku 1995',
            'Marmut Merah Jambu',
            'Dunia Sophie',
            'Sebuah Seni untuk Bersikap Bodo Amat',
            'Atomic Habits (Indonesia)',
            'Filosofi Teras',
            'The Subtle Art of Not Giving a F*ck (Indonesia)',
            'Sapiens (Indonesia)',
            'Mindset (Indonesia)'
        ];

        $penulisIds = Penulis::pluck('id_penulis')->toArray();
        $penerbitIds = Penerbit::pluck('id_penerbit')->toArray();

        foreach ($judulBuku as $index => $judul) {
            Buku::create([
                'kode_buku' => 'BK-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'judul_buku' => $judul,
                'stok_buku' => $faker->numberBetween(3, 20),
                'id_penulis' => $faker->randomElement($penulisIds),
                'id_penerbit' => $faker->randomElement($penerbitIds),
            ]);
        }

        $this->command->info('✅ ' . count($judulBuku) . ' Buku berhasil ditambahkan!');
    }
}
