<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudad=Ciudad::create([
            'ciudad' => 'Loja',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Quito',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Guayaquil',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'Cuenca',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Santo Domingo',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Machala',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'Durán',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Manta',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Portoviejo',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'Ambato',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Esmeraldas',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Quevedo',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'Riobamba',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Milagro',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Ibarra',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'La Libertad',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Babahoyo',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'Sangolquí',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Daule',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Latacunga',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'Tulcán',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Chone',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Pasaje',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Santa Rosa',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'Nueva Loja',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Huaquillas',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'El Carmen',
        ]);
        $ciudad=Ciudad::create([
            'ciudad' => 'Montecristi',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Samborondón',
        ]);

        $ciudad=Ciudad::create([
            'ciudad' => 'Puerto Francisco de Orellana',
        ]);
    }
}


