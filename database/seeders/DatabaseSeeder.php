<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SiswaSeeder::class,
            PetugasSeeder::class,
            PenulisSeeder::class,
            PenerbitSeeder::class,
            BukuSeeder::class,
            PinjamSeeder::class,
        ]);

        $this->command->info('✅ Database seeding completed successfully!');

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
