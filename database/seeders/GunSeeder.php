<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guns = [
            [
                'name' => 'مسدس - 9 ملم',
            ],
            [
                'name' => 'بندقية كلاشنكوف',
            ]
        ];
    }
}
