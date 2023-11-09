<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Ideal;
use App\Models\Material;
use App\Models\Municipality;
use App\Models\State;
use App\Models\Store;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        State::factory(32)->create();
        Municipality::factory(160)->create();
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        Color::factory(8)->create();
        Feature::factory(6)->create();
        
        

        Material::factory(8)->create();
        $this->call(RoleSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(IdealSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductStoreSeeder::class);
        
        $this->call(UserSeeder::class);
    }
}
