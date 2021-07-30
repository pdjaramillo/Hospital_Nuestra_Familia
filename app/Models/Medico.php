<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

        //////////// Relacion muchos a muchos ////////////

        public function especialidades(){

            return $this->belongsToMany(Especialidades::class,'especialidad_medicos','medico_id','especialidad_id');
        }
}

// La convención de eloquent es buscar la tabla que relaciones las dos tablas, asumiendo que se llamará especlidad_users
// segun lo sigiente: tomara el nombre de cada tabla, unidas por _ ,en minuscula y en orden alfabético
// sin embargo, si la tabla pivote tiene otro nombre, se le envía como parámetro despuesde ::class

// return $this->belongsToMany(Especialidades::class,'tabla_pivote','si el campo es diferente' , 'si el campo es diferente');

