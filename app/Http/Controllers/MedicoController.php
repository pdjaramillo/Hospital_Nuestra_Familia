<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\ClientePaciente;
use Carbon\Carbon;
use App\Models\Especialidades;
use App\Models\Historial;
use App\Models\Receta;
use App\Models\Examen;


class MedicoController extends Controller
{

    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        // $this->middleware('medico',['only'=>['index']]);
    }


    public function index()
    {

        $medico =  auth()->user();
        $citas = Cita::where('medico_id', '=', $medico->id)->get(); //extrae solo los pacientes del medico logueado)
        $pacientes = Paciente::all();

        return view('medico.gesmedico', compact('citas', 'pacientes', 'medico'));
    }

    // Administrar Paciente

    public function infopaciente()
    {
        $medico =  auth()->user();
        $pacientes = Paciente::select('pacientes.id', 'pacientes.name', 'pacientes.apellido', 'pacientes.fechaNacimiento', 'pacientes.direccion', 'pacientes.telefono', 'pacientes.ciudad_id')
            ->join('citas', 'citas.paciente_id', '=', 'pacientes.id')
            ->distinct()
            ->get();
        $citas = Cita::where('medico_id', '=', $medico->id);

        return view('medico.infopaciente', compact('pacientes', 'citas'));
    }


    // Agendar Controles

    public function control()
    {
        $medico =  auth()->user();
        $pacientes = Paciente::select('pacientes.id', 'pacientes.name', 'pacientes.apellido', 'pacientes.fechaNacimiento', 'pacientes.direccion', 'pacientes.telefono', 'pacientes.ciudad_id')
            ->join('citas', 'citas.paciente_id', '=', 'pacientes.id')
            ->distinct()
            ->get();
        $citas = Cita::where('medico_id', '=', $medico->id);
        return view('medico.control', compact('pacientes', 'citas'));
    }

    // Emitir Diagnóstico

    public function diagnosticar(Request $request, $id)
    {
        // Fecha de la cita
        setlocale(LC_ALL, 'es_ES');
        Carbon::setlocale('es');
        $hoy = Carbon::now()->format('Y-m-d');

        $historial = new Historial();
        $cita = Cita::find($request->cita_id);
        $receta = new Receta();
        $examen = new Examen();
        $medico = auth()->user(); // Medico logueado actualmente
        
        //return $cita;

        $receta->medicamentos = $request->medicamentos;
        $receta->dosis = $request->dosis;
        $receta->save();

        $examen->examen = $request->examen;
        $examen->save();

        $ultimoExamen = Examen::latest('id')->first();
        $ultimaReceta = Receta::latest('id')->first();

        $historial->fecha_historial = date("Y-m-d", strtotime($hoy));
        $historial->observaciones = $request->observaciones;
        $historial->diagnostico = $request->diagnostico;
        $historial->paciente_id = $id;
        $historial->medico_id = $medico->id;
        $historial->especialidad_id = $request->especialidad_id;

        $historial->receta_id = $ultimaReceta->id;
        $historial->examen_id = $ultimoExamen->id;

        $historial->save();

        $cita->estado_cita="Completa";
        $cita->save();

        // Funcion anterior
        // $historial->fecha_historial = date("Y-m-d", strtotime($request->fecha_historial));
        // $historial->diagnostico = $request->diagnostico;
        // $historial->receta = $request->receta;
        // $historial->examen = $request->examen;
        // $historial->paciente_id = $id;
        // $historial->medico_id = $medico->id;
        // $historial->especialidad_id = $request->especialidad_id;
        // 

        return redirect('control')->with('message', 'Diagnóstico creado correctamente');
    }
}
