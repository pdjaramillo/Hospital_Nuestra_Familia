<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\App as FacadesApp;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Especialidades;

class PagesController extends Controller
{

    // Vistas que no requieren registro

    public function inicio(){
        return view('inicio');
    }
    
   
    public function servicios(){
        return view('servicios');
    }

    /*
    public function contacto(){
        return view('contacto');
    }

    // Pruebas de Paginas accesibles solo por registro

    public function cliente(){
        return view('cliente/gescliente');
    }

    public function admin(){
        return view('administrador/gesadmin');
    }

    public function medico(){
        return view('medico/gesmedico');
    }

    public function tablero(){
        return view('tablero/index');
    }

    // Funciones de cliente ////////////////////////////////////////////////////

    // Agendar Cita

    public function citas(){
        return view('cliente/citas');
    }

    // Registro Paciente

    public function regpaciente(){
        return view('cliente/regpaciente');
    }
    
    // Ver Historial

    public function historial(){
        return view('cliente/historial');
    }

    //Ver examenes y recetas

    public function pedidosmed(){
         return view('cliente/pedidosmed');
    }


    // Funciones de Administrador //////////////////////////////////////////////////

    // Registro Paciente

    public function adminpaciente(){
        return view('administrador/adminpaciente');
     }

    // Administar Cita

    public function admincitas(){
        return view('administrador/admincitas');
    }

    // Administrar Médicos

    public function adminmedicos(){
         return view('administrador/adminmedicos');
    }

    // Administrar Especialidades

    public function adminespecialidades(){
        return view('administrador/adminespecialidades');
    }

    // Funciones de Medico //////////////////////////////////////////////////

    // Administrar Paciente

    public function infopaciente(){
        return view('medico/infopaciente');
     }

    // Agendar Controles

    public function control(){
        return view('medico/control');
    }

    public function prueba(){
        return view('prueba');
    }
 
*/
}