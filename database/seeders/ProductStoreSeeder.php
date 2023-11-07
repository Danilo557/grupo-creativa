<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $product->stores()->attach([
                1 => ['url' => 'https://www.liverpool.com.mx'],
                2 => ['url' => 'https://www.youtube.com/'],
                3 => ['url' => 'https://www.facebook.com/'],

            ]);
        }
    }
}
