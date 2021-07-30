<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadMedico extends Model
{
    use HasFactory;

    protected $fillable = [
        'medico_id',
        'especialidad_id',
    ];

    public function especialidades(){
        return $this->hasMany('App\Models\Especialidades',  'id','especialidad_id');
    }

    //se relacionan de la tabla de usuario
    //hasMany tablaRelacion, clave_foranea, clave_principalOtraTabla
    public function medicos(){
        return $this->hasMany('App\Models\User', 'id','medico_id');
    }

}
