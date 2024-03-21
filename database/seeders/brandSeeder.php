<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class brandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand1 = Brand::create([
            'name' => 'Nike',
        ]);
        $brand2 = Brand::create([
            'name' => 'Adidas',
        ]);
        $brand3 = Brand::create([
            'name' => 'Quechua',
        ]);
        $brand4 = Brand::create([
            'name' => 'Puma',
        ]);
        $brand5 = Brand::create([
            'name' => 'DC',
        ]);
        $brand6 = Brand::create([
            'name' => 'Everlast',
        ]);
        $brand7 = Brand::create([
            'name' => 'Venum',
        ]);
        $brand8 = Brand::create([
            'name' => 'Jordan',
        ]);
    }
}
