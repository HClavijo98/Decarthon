<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = Category::create([
            'name' => 'Futbol',
        ]);
        $category2 = Category::create([
            'name' => 'Basquet',
        ]);
        $category3 = Category::create([
            'name' => 'Boxeo',
        ]);
        $category4 = Category::create([
            'name' => 'Patinaje',
        ]);
        $category5 = Category::create([
            'name' => 'Atletismo',
        ]);
    }
}
