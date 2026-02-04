<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'nis' => '5544332211',
            'nama' => 'Dewi Kartika',
            'kelas' => '10B',
            'alamat' => 'Jl. Diponegoro No. 4',
            'no_hp' => '085544332211',
        ]);

        Siswa::create([
            'nis' => '6677889900',
            'nama' => 'Rina Susanti',
            'kelas' => '11A',
            'alamat' => 'Jl. Gatot Subroto No. 5',
            'no_hp' => '086677889900',
        ]);

        Siswa::create([
            'nis' => '0099887766',
            'nama' => 'Agus Suratna',
            'kelas' => '12B',
            'alamat' => 'Jl. Sisingamangaraja No. 6',
            'no_hp' => '080099887766',
        ]);

        Siswa::create([
            'nis' => '3344556677',
            'nama' => 'Lina Marlina',
            'kelas' => '10C',
            'alamat' => 'Jl. Pahlawan No. 7',
            'no_hp' => '083344556677',
        ]);
    }
}
