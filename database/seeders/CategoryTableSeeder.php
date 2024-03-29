<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Evil Swords',
            'Good Swors',
            'Neutral Swords',
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name'  => $category,
            ]);
        }
    }
}
