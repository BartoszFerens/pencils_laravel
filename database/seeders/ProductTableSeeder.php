<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name'          => 'Pencil 1',
                'brand_id'      => 1,
                'description'   => 'lorem ipsum',
                'price'         => 199,
                'created_by'    => 1,
                'image'         => '1.jpeg'
            ],

            [
                'name'          => 'Pencil 2',
                'brand_id'      => 1,
                'description'   => 'lorem ipsum',
                'price'         => 709,
                'created_by'    => 1,
                'image'         => '2.jpeg'
            ],

            [
                'name'          => 'Pencil 3',
                'brand_id'      => 2,
                'description'   => 'lorem ipsum',
                'price'         => 249,
                'created_by'    => 1,
                'image'         => '3.jpeg'
            ],

            [
                'name'          => 'Pencil 4',
                'brand_id'      => 2,
                'description'   => 'lorem ipsum',
                'price'         => 709,
                'created_by'    => 1,
                'image'         => '4.jpeg'
            ],

            [
                'name'          => 'Pencil 5',
                'brand_id'      => 3,
                'description'   => 'lorem ipsum',
                'price'         => 439,
                'created_by'    => 1,
                'image'         => '5.jpeg'
            ],

        ];

        foreach($products as $product) {
            \App\Models\Product::create($product);
        }

        for ($i = 1; $i < 6; $i++) {
            \App\Models\ProductMedia::create([
                'product_id'    => $i,
                'file_name'     => $i . '.jpeg',
                'created_by'    => 1,
            ]);
        }
    }
}
