<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol=Rol::create([
            'rol' => 'administrador',
        ]);

        $rol=Rol::create([
            'rol' => 'cliente',
        ]);

        $rol=Rol::create([
            'rol' => 'medico',
        ]);
    }
}
