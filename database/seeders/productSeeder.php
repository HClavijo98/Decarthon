<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sugestion_box;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::create([
            'name' => 'Balon de futbol modelo Italia',
            'description' => 'Color blanco, fabricado en PVC',
            'category_id' => 1,
            'brand_id' => 2,
            'value' => 49.99,
            'stock' => 30,
            'img' => 'storage/product/balonF.png',
        ]);
        $product2 = Product::create([
            'name' => 'Botas de boxeo',
            'description' => 'Color negro y dorado, gama media',
            'category_id' => 3,
            'brand_id' => 7,
            'value' => 69.99,
            'stock' => 30,
            'img' => 'storage/product/botasB.png',
        ]);
        $product3 = Product::create([
            'name' => 'Camiseta de basket',
            'description' => 'Equipo Lakers',
            'category_id' => 2,
            'brand_id' => 8,
            'value' => 99.99,
            'stock' => 10,
            'img' => 'storage/product/esqueletoB.png',
        ]);
        $product4 = Product::create([
            'name' => 'Guantes de boxeo',
            'description' => 'Color negro, de cuero gama alta',
            'category_id' => 3,
            'brand_id' => 6,
            'value' => 120.50,
            'stock' => 30,
            'img' => 'storage/product/guantesB.png',
        ]);
        $product5 = Product::create([
            'name' => 'Balon de basket',
            'description' => 'De cuero, color basico',
            'category_id' => 2,
            'brand_id' => 1,
            'value' => 59.99,
            'stock' => 50,
            'img' => 'storage/product/balonB.png',
        ]);
        $product6 = Product::create([
            'name' => 'Guantes de portero',
            'description' => 'Color blanco, gama alta',
            'category_id' => 1,
            'brand_id' => 2,
            'value' => 79.99,
            'stock' => 20,
            'img' => 'storage/product/guantesF.png',
        ]);
        $product7 = Product::create([
            'name' => 'Patines profesionales',
            'description' => 'Color negro, gama alta',
            'category_id' => 4,
            'brand_id' => 3,
            'value' => 99.99,
            'stock' => 30,
            'img' => 'storage/product/patines.png',
        ]);
        $product8 = Product::create([
            'name' => 'Zapatillas atletismo',
            'description' => 'Color blanco, maratones, carreras, saltos',
            'category_id' => 5,
            'brand_id' => 1,
            'value' => 119.99,
            'stock' => 30,
            'img' => 'storage/product/zapatillasA.png',
        ]);
    }
}
