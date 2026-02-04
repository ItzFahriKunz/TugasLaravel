<?php

namespace Database\Seeders;
use App\Models\Petugas;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $namaPetugas = [
            'Siti Nurhaliza',
            'Ahmad Fauzi',
            'Dewi Kartika',
            'Budi Santoso',
            'Rina Marlina',
            'Joko Widodo',
            'Linda Sari',
            'Hendra Gunawan'
        ];
        
        foreach ($namaPetugas as $nama) {
            Petugas::create([
                'nip' => $faker->unique()->numerify('199#########'),
                'nama_petugas' => $nama,
                'no_hp_petugas' => $faker->numerify('08##########'),
            ]);
        }

        $this->command->info('✅ 8 Petugas berhasil ditambahkan!');
    }
}
