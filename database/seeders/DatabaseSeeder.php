<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Anwar Alwendy',
            'password' => bcrypt('password'),
            'type' => 1,
            'email' => 'admin@admin.com',
        ]);
        $this->call(GunSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(ComponentSeeder::class);
    }
}
