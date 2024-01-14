<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\UserRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'id' => 1,
            'name' => "Administrador",
        ]);
        UserRole::create([
            'id' => 2,
            'name' => "Usuario tipo 2",
        ]);
        UserRole::create([
            'id' => 3,
            'name' => 'Usuario tipo 3',
        ]);

    }
}
