<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'Creativa Hogar',
                'slug' => Str::slug('Creativa Hogar'),
                'description' => 'Diseños de vanguardia para cada espacio, una línea más sencilla, pero con mucho estilo. Nuestros productos decoran tus espacios además de ofrecerte seguridad, cuenta con antideslizante.',
                'color' => '#8e1c3b',

            ],
            [
                'name' => 'Creativa Home',
                'slug' => Str::slug('Creativa Home'),
                'description' => 'Diseños que se adaptan a tus espacios, nuestra línea de lujo y confort para baño, área y espacios múltiples, sabemos que el lujo es un estilo de vida.',
                'color' => '#ba611d',

            ],
            [
                'name' => 'Creativa Hotel y Spa',
                'slug' => Str::slug('Creativa Hotel y Spa'),
                'description' => 'Nuestra línea para hotel & spa tiene calidad comprobada por laboratorio certificado, nuestros tapetes son resistentes a los lavados industriales y diseños para espacios más cómodos y acogedores.                ',
                'color' => '#00a2aa',

            ],
            [
                'name' => 'Creativa Pets',
                'slug' => Str::slug('Creativa Pets'),
                'description' => 'Sabemos que tus mascotas son parte de tu familia por eso diseñamos también para ellos, son parte de nuestra familia, los diseños para mascotas son exclusivos y cuentan con antibacterial.                ',
                'color' => '#5c9a99',
            ],
            [
                'name' => 'Creativa Seasons',
                'slug' => Str::slug('Creativa Seasons'),
                'description' => 'Lujo y estilo, decora tus espacios con nuestros diseños de temporada, la temporada más esperada, nuestros diseños llena de alegría tu hogar.                ',
                'color' => '#d50036',

            ],

        ];


        $categories = [
            [
                'name' => 'Tapete',
                'slug' => 'tapete'
            ],
            [
                'name' => 'Tapete artesanal',
                'slug' => 'tapete-artesanal'
            ],
            [
                'name' => 'Set',
                'slug' => 'set'
            ],
            [
                'name' => '2 Pack',
                'slug' => '2-pack'
            ],
            [
                'name' => 'Juego de baño',
                'slug' => 'juego-de-bano'
            ],
            [
                'name' => 'Cut & Loop',
                'slug' => 'cut-loop'
            ],
            [
                'name' => 'Tapete Reversible',
                'slug' => 'tapete-reversible'
            ],
            [
                'name' => 'Set de Baño',
                'slug' => 'set-de-bano'
            ],
            [
                'name' => 'Tapete Foam',
                'slug' => 'tapete-foam'
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        foreach ($brands as $brand) {
            $brand = Brand::factory(1)->create($brand)->each(function ($b) {
                Image::factory(1)->create([
                    'imageable_id' => $b->id,
                    'imageable_type' => Brand::class
                ]);
            })->first();

            $categories=Category::all();
            foreach ($categories as $category) {
                $category->brands()->attach($brand->id);
            }
        }
    }
}
