<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Ciudad extends Model
{
    use HasFactory;

    protected $fillable = [
        'ciudad',
    ];
    public $timestamps = false;

    public function usuario(){
        return $this->hasOne(User::class); /// Con esto se puede obtener al usuario según su rol
        //// Asi se aplica cuando se deja por defecto el nombre id del modelo. Si tuviese otro nombre se envía dicho nombre. Si
        //// como parametro return $this->hasOne(User::class, 'nombre_id');
    }
}
