<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'recepcionista', 'instrutor', 'aluno'];
        
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
