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
            'name' => 'Pablo Daniel',
            'apellido' => 'Jaramillo Fierro',
            'cedula' => '1104251473',
            'email' => 'p_jaramillo20@hotmail.com',
            'telefono' => '0995699428',
            'direccion' => 'Miguel Riofrio y Bolivar',
            'fechaNacimiento' => '1985-06-20',
            'password' => Hash::make('admin'),
            'rol_id' => 1,
            'ciudad_id' => 1,
            'genero_id' => 1,
         ])->assignRole('Administrador');

        //  $userAdmin=User::create([
        //     'name' => 'Alba',
        //     'apellido' => 'Mogrovejo',
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
             'name' => 'Jamil Eduardo',
             'apellido' => 'Jaramillo Fierro',
             'cedula' => '1103586150',
             'email' => 'jamil.jaramillo@hotmail.com',
             'telefono' => '099556035',
             'direccion' => 'Los Rosales',
             'fechaNacimiento' => '1979-12-19',
             'password' => Hash::make('cliente'),
             'rol_id' => 2,
             'ciudad_id' => 1,
             'genero_id' => 1,
         ])->assignRole('Cliente');

         $userMedico=User::create([
             'name' => 'Ximena Veronica',
             'apellido' => 'Jaramillo Fierro',
             'cedula' => '1104251231',
             'email' => 'xv_jaramillo@hotmail.com',
             'telefono' => '2582558',
             'direccion' => 'Manuel Zambrano',
             'fechaNacimiento' => '1981-10-09',
             'password' => Hash::make('medico'),
             'rol_id' => 3,
             'ciudad_id' => 1,
             'genero_id' => 2,
        ])->assignRole('Medico');
    }    
}