<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $recepcionistaRole = Role::where('name', 'recepcionista')->first();
        
        // Cria um usuário admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@autoescola.com',
            'password' => bcrypt('senha123'),
        ]);
        $admin->roles()->attach($adminRole);
        
        // Cria um usuário recepcionista
        $recepcionista = User::create([
            'name' => 'Recepcionista',
            'email' => 'recepcionista@autoescola.com',
            'password' => bcrypt('senha123'),
        ]);
        $recepcionista->roles()->attach($recepcionistaRole);
    }
}
