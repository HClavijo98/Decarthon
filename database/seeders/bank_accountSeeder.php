<?php

namespace Database\Seeders;

use App\Models\Bank_account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bank_accountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank_account::factory()->count(20)->create();
    }
}
