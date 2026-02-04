<?php

namespace Database\Seeders;
use App\Models\Penulis;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $namaPenulis = [
            'Andrea Hirata',
            'Tere Liye',
            'Pramoedya Ananta Toer',
            'Dee Lestari',
            'Raditya Dika',
            'Ahmad Fuadi',
            'Habiburrahman El Shirazy',
            'Eka Kurniawan',
            'Ayu Utami',
            'Sapardi Djoko Damono',
            'Chairil Anwar',
            'Goenawan Mohamad',
            'N.H. Dini',
            'Seno Gumira Ajidarma',
            'Asma Nadia',
            'Risa Saraswati',
            'Pidi Baiq',
            'Fiersa Besari',
            'Boy Candra',
            'J.K. Rowling',
            'George R.R. Martin',
            'Stephen King',
            'Agatha Christie',
            'Dan Brown',
            'Paulo Coelho'
        ];
        
        foreach ($namaPenulis as $nama) {
            Penulis::create([
                'nama_penulis' => $nama,
                'no_hp_penulis' => $faker->numerify('08##########'),
            ]);
        }

        $this->command->info('✅ 25 Penulis berhasil ditambahkan!');
    }
}
