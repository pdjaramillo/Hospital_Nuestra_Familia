<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CitaController extends Controller
{
    protected $rules = [
        'fecha_cita' => 'date_format:Y-m-d H:i:s|required|unique:citas'
    ];

}
