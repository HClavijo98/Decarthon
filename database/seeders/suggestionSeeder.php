<?php

namespace Database\Seeders;

use App\Models\Sugestion_box;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class suggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sugestion1 = Sugestion_box::create([
            'title' => 'Excelente compra',
            'body' => 'Gran calidad, buen precio',
            'product_id' => 1,
            'user_id' => 11,
        ]);
        $sugestion2 = Sugestion_box::create([
            'title' => 'Excelente compra',
            'body' => 'Gran calidad, buen precio',
            'product_id' => 1,
            'user_id' => 15,
        ]);
        $sugestion3 = Sugestion_box::create([
            'title' => 'Excelente compra',
            'body' => 'Gran calidad, buen precio',
            'product_id' => 1,
            'user_id' => 1,
        ]);
    }
}
