<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Rol;
use App\Models\Ciudad;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = false;

    //////////// Relación uno a uno ////////////
    // public function rol(){
    //     return $this->belongsTo(Rol::class); 
    // /// Con esto se puede obtener al usuario según su rol
    // //// Asi se aplica cuando se deja por defecto el nombre id del modelo. Si tuviese otro nombre se envía dicho nombre. Si
    // //// como parametro return $this->hasOne(User::class, 'nombre_id');
    // }

    public function genero(){
        return $this->belongsTo(Genero::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }

    //////////// Relacion muchos a muchos ////////////

    public function especialidades(){
        return $this->belongsToMany(Especialidades::class,'especialidad_medicos','medico_id','especialidad_id');
    }

    public function pacientes(){
        return $this->belongsToMany(Paciente::class,'cliente_pacientes','cliente_id','paciente_id');
    }

    public function roles(){
        return $this->belongsToMany(Rol::class,'rol_usuarios','user_id','rol_id');
    }

}

// La convención de eloquent es buscar la tabla que relaciones las dos tablas, asumiendo que se llamará especlidad_users
// segun lo sigiente: tomara el nombre de cada tabla, unidas por _ ,en minuscula y en orden alfabético
// sin embargo, si la tabla pivote tiene otro nombre, se le envía como parámetro despuesde ::class

// return $this->belongsToMany(Especialidades::class,'tabla_pivote','si el campo es diferente' , 'si el campo es diferente');
// return $this->belongsToMany(Especialidades::class,'tabla_pivote','llave foranea del modelo que realiza la relación' , 'llave foranea del modelo a relacionar');
