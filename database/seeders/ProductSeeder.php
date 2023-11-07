<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Ideal;
use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Product::factory(25)->create()->each(function (Product $product) {
            Image::factory(4)->create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class
            ]);

            Size::factory(4)->create([
                'product_id' => $product->id,
            ]);


            $product->colors()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
            $features=Feature::pluck('id');
            $product->features()->attach($features);

             
            $ideal=Ideal::pluck('id');
            $product->ideals()->attach($ideal);

            $product->materials()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
        });
    }
}
