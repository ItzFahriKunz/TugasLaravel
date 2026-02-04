<?php

namespace Database\Seeders;
use App\Models\Siswa;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $kelas = ['X RPL 1', 'X RPL 2', 'XI RPL 1', 'XI RPL 2', 'XII RPL 1', 'XII RPL 2', 
                  'X TKJ 1', 'XI TKJ 1', 'XII TKJ 1', 'X MM 1', 'XI MM 1', 'XII MM 1'];
        
        for ($i = 1; $i <= 30; $i++) {
            Siswa::create([
                'nis' => $faker->unique()->numerify('2024####'),
                'nama' => $faker->name(),
                'kelas' => $faker->randomElement($kelas),
                'alamat' => $faker->address(),
                'no_hp' => $faker->numerify('08##########'),
            ]);
        }
        $this->command->info('✅ 30 Siswa berhasil ditambahkan!');
    }
}
