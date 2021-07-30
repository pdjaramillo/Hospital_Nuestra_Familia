<?php

namespace App\Models;
use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    //use HasFactory;
    protected $table = "especialidades";
    //protected $primaryKey="codigo_esp";
    protected $fillable = [
        'especialidad', 'descripcion'
    ];
    public $timestamps = false;

    public function medicos(){

        return $this->belongsToMany(User::class,'especialidad_medicos','medico_id','especialidad_id');
    }
}
