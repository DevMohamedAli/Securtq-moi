<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            [
                'name' => 'الامن و الاستقبال'
            ],
            [
                'name' => 'الشؤون الادارية'
            ],
            [
                'name' => 'إدارة الشؤون المالية'
            ],
            [
                'name' => 'مكتب و كيل شوؤن المديريات'
            ],
            [
                'name' => 'الاليات'
            ],

        ];

        foreach ($components as $component) {
            DB::table('components')->insert($component);
        }
    }
}
