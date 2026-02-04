<?php

namespace Database\Seeders;
use App\Models\Penerbit;
use Faker\Factory as Faker; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $penerbit = [
            ['nama' => 'Gramedia Pustaka Utama', 'kota' => 'Jakarta'],
            ['nama' => 'Bentang Pustaka', 'kota' => 'Yogyakarta'],
            ['nama' => 'Mizan', 'kota' => 'Bandung'],
            ['nama' => 'Erlangga', 'kota' => 'Jakarta'],
            ['nama' => 'Republika Penerbit', 'kota' => 'Jakarta'],
            ['nama' => 'Gagas Media', 'kota' => 'Jakarta'],
            ['nama' => 'Grasindo', 'kota' => 'Jakarta'],
            ['nama' => 'Bentang Pustaka', 'kota' => 'Yogyakarta'],
            ['nama' => 'Coconut Books', 'kota' => 'Yogyakarta'],
            ['nama' => 'Penerbit Haru', 'kota' => 'Yogyakarta'],
            ['nama' => 'Spring', 'kota' => 'Jakarta'],
            ['nama' => 'Noura Books', 'kota' => 'Jakarta'],
            ['nama' => 'Kepustakaan Populer Gramedia', 'kota' => 'Jakarta'],
            ['nama' => 'Gramedia Widiasarana Indonesia', 'kota' => 'Jakarta'],
            ['nama' => 'Bhuana Ilmu Populer', 'kota' => 'Jakarta']
        ];
        
        foreach ($penerbit as $p) {
            Penerbit::create([
                'nama_penerbit' => $p['nama'],
                'asal_kota' => $p['kota'],
                'isbn' => $faker->unique()->numerify('978-###-###-###-#'),
            ]);
        }

        $this->command->info('✅ 15 Penerbit berhasil ditambahkan!');
    }
}
