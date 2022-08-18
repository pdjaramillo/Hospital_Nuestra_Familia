<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin=User::create([
            'name' => 'Pablo',
            'apellido' => 'Jaramillo',
            'cedula' => '1100000001',
            'email' => 'admin@hotmail.com',
            'telefono' => '0990000001',
            'direccion' => 'Miguel Riofrio',
            'fechaNacimiento' => '1985-06-20',
            'password' => Hash::make('admin'),
            'rol_id' => 1,
            'ciudad_id' => 1,
            'genero_id' => 1,
         ])->assignRole('Administrador');

        //  $userAdmin=User::create([
        //     'name' => 'Luisa',
        //     'apellido' => 'Jaramillo',
        //     'cedula' => '4444444444',
        //     'email' => 'alba@hotmail.com',
        //     'telefono' => '4567894566',
        //     'direccion' => 'Miguel Riofrio',
        //     'fechaNacimiento' => '1981-06-20',
        //     'password' => Hash::make('medico'),
        //     'rol_id' => 3,
        //     'ciudad_id' => 1,
        //     'genero_id' => 1,
        //  ])->assignRole('Medico');

         $useCliente=User::create([
             'name' => 'Kevin',
             'apellido' => 'Jaramillo',
             'cedula' => '110000002',
             'email' => 'cliente@hotmail.com',
             'telefono' => '0900000005',
             'direccion' => 'Los Rosales',
             'fechaNacimiento' => '1979-12-19',
             'password' => Hash::make('cliente'),
             'rol_id' => 2,
             'ciudad_id' => 1,
             'genero_id' => 1,
         ])->assignRole('Cliente');

         $userMedico=User::create([
             'name' => 'Diana',
             'apellido' => 'Jaramillo',
             'cedula' => '1100000003',
             'email' => 'medico@hotmail.com',
             'telefono' => '0987654125',
             'direccion' => 'Miguel Riofrio',
             'fechaNacimiento' => '1981-10-09',
             'password' => Hash::make('medico'),
             'rol_id' => 3,
             'ciudad_id' => 1,
             'genero_id' => 2,
        ])->assignRole('Medico');
    }    
}
