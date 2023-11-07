<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::factory(8)->create()->each(function(Store $store){
            Image::factory(1)->create([
                'imageable_id' => $store->id,
                'imageable_type' => Store::class
            ]);
        });
    }
}
