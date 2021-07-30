<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientePaciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'paciente_id',
    ];

    public function cliente(){
        return $this->hasMany('App\Models\Paciente',  'id','paciente_id');
    }

    //se relacionan de la tabla de usuario
    //hasMany tablaRelacion, clave_foranea, clave_principalOtraTabla
    public function pacientes(){
        return $this->hasOne('App\Models\User', 'id','cliente_id');
    }
}
