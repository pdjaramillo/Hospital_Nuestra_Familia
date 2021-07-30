<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userPaciente = Paciente::create([
            'name' => 'Lucía',
            'apellido' => 'Fierro',
            'cedula' => '1101071726',
            // 'email' => 'xv_jaramillo@hotmail.com',
            'telefono' => '2582558',
            'direccion' => 'Manuel Zambrano',
            'fechaNacimiento' => '1981-10-09',
            'ciudad_id' => 1,
            'genero_id' => 2,
            // 'cliente_id' => 3,
        ]);

        $userPaciente = Paciente::create([
            'name' => 'Pedro',
            'apellido' => 'Montaño',
            'cedula' => '1705652723',
            // 'email' => 'xv_jaramillo@hotmail.com',
            'telefono' => '2582558',
            'direccion' => 'Bolivar y Miguel Riofrío',
            'fechaNacimiento' => '1985-07-15',
            'ciudad_id' => 1,
            'genero_id' => 1,
            // 'cliente_id' => 3,
        ]);

        $userPaciente = Paciente::create([
            'name' => 'Alfredo',
            'apellido' => 'Jaramillo',
            'cedula' => '1100047313',
            // 'email' => 'xv_jaramillo@hotmail.com',
            'telefono' => '2582558',
            'direccion' => 'Imbabura y 18 de Noviembre',
            'fechaNacimiento' => '1995-02-12',
            'ciudad_id' => 1,
            'genero_id' => 2,
            // 'cliente_id' => 3,
        ]);
    }
}
