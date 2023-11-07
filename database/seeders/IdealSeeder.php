<?php

namespace Database\Seeders;

use App\Models\Ideal;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ideal::factory(5)->create()->each(function (Ideal $ideal) {
            Image::factory(1)->create([
                'imageable_id' => $ideal->id,
                'imageable_type' => Ideal::class
            ]);

        });
    }
}
