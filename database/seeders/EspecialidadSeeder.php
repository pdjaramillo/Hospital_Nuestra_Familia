<?php

namespace Database\Seeders;

use App\Models\Especialidades;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialiadad=Especialidades::create([
            'especialidad' => 'Traumatología',
            'descripcion' => 'Cuidamos tus huesos',
        ]);

        $especialiadad=Especialidades::create([
            'especialidad' => 'Cardiología',
            'descripcion' => 'Cuidamos tus corazón',
        ]);

        $especialiadad=Especialidades::create([
            'especialidad' => 'Neumología',
            'descripcion' => 'Cuidamos tus pulmones',
        ]);
    }
}
