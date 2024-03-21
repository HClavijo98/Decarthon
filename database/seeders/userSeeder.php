<?php

namespace Database\Seeders;

use App\Models\Bank_account;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(20)->create();

        $cuentaBancaria1 = Bank_account::create([
            'IBAN' => 'ES1234567891234567',
            'money' => 2000,
            'bank' => 'BBVA',
        ]);

        // Crear un usuario con la cuenta bancaria asociada
        $user1 = User::create([
            'name' => 'Harold Clavijo',
            'email' => '22hclavijo@ibadia.cat',
            'password' => bcrypt('12345678'),
            'bank_account_id' => $cuentaBancaria1->id,
        ]);

        // Asociar el rol al usuario
        $adminRole = Role::create(['name' => 'admin']);
        $user1->assignRole($adminRole);
        $user1->save();
    }
}
