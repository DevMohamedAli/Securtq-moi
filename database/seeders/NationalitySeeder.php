<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nationalities = [
            ["name" => 'مصر'],
            ["name" => 'العراق'],
            ["name" => 'سوريا'],
            ["name" => 'الأردن'],
            ["name" => 'الجزائر'],
            ["name" => 'السودان'],
            ["name" => 'تونس'],
            ["name" => 'ليبيا'],
            ["name" => 'المغرب'],
            ["name" => 'النيجر'],
            ["name" => 'تشاد'],
            ["name" => 'الكاميرون'],
            ["name" => 'السنغال'],
            ["name" => 'موريتانيا'],
        ];

        foreach ($nationalities as $nationality) {
            \App\Models\Nationality::create($nationality);
        }
    }
}
