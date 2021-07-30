<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClientePaciente;

class ClientePacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userPaciente = ClientePaciente::create([
            'paciente_id' => 1,
            'cliente_id' => 3,
        ]);

        $userPaciente = ClientePaciente::create([
            'paciente_id' => 2,
            'cliente_id' => 3,
        ]);

        $userPaciente = ClientePaciente::create([
            'paciente_id' => 3,
            'cliente_id' => 3,
        ]);
    }
}
