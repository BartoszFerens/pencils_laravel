<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'MountDoom',
            'Heavenly',
            'Zurich',

        ];

        foreach ($brands as $brand) {
            \App\Models\Brand::create([
                'name'          => $brand,
                'created_by'    => 1,
            ]);
        }
    }
}
