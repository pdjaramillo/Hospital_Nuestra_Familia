<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medico_id',
        'fecha_cita',
        'especialidad_id',
    ];

     protected $date = [
         'fecha_cita',
     ];

     protected $rules = [
        'fecha_cita' => 'fecha_cita:Y-m-d H:i:s|required|unique:citas_table',
    ];

}
