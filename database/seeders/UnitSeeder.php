<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units=['cm','m'];

        foreach ($units as $unit) {
             Unit::create([
                'name'=>$unit,
                'slug'=>Str::slug($unit),
             ]);
        }
    }
}
