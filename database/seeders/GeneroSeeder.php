<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero=Genero::create([
            'genero' => 'Masculino',
        ]);

        $genero=Genero::create([
            'genero' => 'Femenino',
        ]);
    }
}
