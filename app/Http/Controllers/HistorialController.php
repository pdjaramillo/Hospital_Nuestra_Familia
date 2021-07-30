<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistorialController extends Controller
{
    protected $rules = [
        'fecha_historial' => 'date_format:d-m-Y'
    ];
}
