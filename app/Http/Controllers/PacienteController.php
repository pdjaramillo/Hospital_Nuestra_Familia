<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Especialidades;
use App\Models\EspecialidadMedico;
use App\Models\User;
use App\Models\ClientePaciente;
use App\Models\Historial;
use App\Models\Cita;

class PacienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        // $this->middleware('auth');
        // $this->middleware('administrador',['only'=>['index']]);
    }

    public function index()
    {
        $paciente = Paciente::all();
        return view('administrador.paciente', compact('paciente'));
    }

    // Funcion para presentar los pacientes
    public function adminpaciente()
    {
        $pacientes = Paciente::all();
        $especialidades = Especialidades::all();
        return view('paciente.adminpaciente', compact('pacientes', 'especialidades'))->with('message', 'Paciente creado exitosamente');
    }

    // Funcion para crear la relación de médicos con especialidades en las citas
    public function medicosPorEspecialidad(Request $request)
    {
        //valor que viene por ajax
        if ($request->has('especialidad_id')) {
            $especialidad = $request->get('especialidad_id');
            $especialidadesMedicos = EspecialidadMedico::where('especialidad_id', '=', $especialidad)->get();
            $medicos = array();
            foreach ($especialidadesMedicos  as $espMedico) {
                //array_push($medicos,$espMedico->medicos);
                $medicos[] = count($espMedico->medicos) > 0 ? $espMedico->medicos[0] : array();
            }
            return ['success' => true, 'medicos' => $medicos];
        }

        return ['success' => false, 'medicos' => array()];
    }

    // Funcion para crear un paciente
    public function crearpaciente(Request $request, $id = null)
    {

        $nuevoPaciente = new Paciente;
        $paciente = Paciente::where('cedula', '=', $request->cedula)->first();
        $cliente =  auth()->user();

        if ($paciente == null) {

            if ($id == null) {

                $nuevoPaciente->name = $request->name;
                $nuevoPaciente->apellido = $request->apellido;
                $nuevoPaciente->cedula = $request->cedula;
                $nuevoPaciente->email = $request->email;
                $nuevoPaciente->telefono = $request->telefono;
                $nuevoPaciente->direccion = $request->direccion;
                $nuevoPaciente->fechaNacimiento = $request->fechaNacimiento;
                $nuevoPaciente->ciudad_id = $request->ciudad_id;
                $nuevoPaciente->genero_id = $request->genero_id;

                $nuevoPaciente->save();

                return back();
            } else {

                $nuevoPaciente->name = $request->name;
                $nuevoPaciente->apellido = $request->apellido;
                $nuevoPaciente->cedula = $request->cedula;
                $nuevoPaciente->email = $request->email;
                $nuevoPaciente->telefono = $request->telefono;
                $nuevoPaciente->direccion = $request->direccion;
                $nuevoPaciente->fechaNacimiento = $request->fechaNacimiento;
                $nuevoPaciente->ciudad_id = $request->ciudad_id;
                $nuevoPaciente->genero_id = $request->genero_id;
                $nuevoPaciente->save();

                $ultimoPaciente = Paciente::latest('id')->first();

                //$cliente = User::find($cliente->id);
                $cliente = User::find($id);

                //return $cliente;

                $cliente->pacientes()->syncWithoutDetaching($ultimoPaciente->id);

                // return redirect('pacientecliente')->with('message', 'Paciente creado y asignado correctamente');
                return back()->with('message', 'Paciente creado y asignado correctamente');
            }
        } else {
            return back()->with('message', 'El paciente ya existe');
        }
    }
    
    // Funcion para eliminar un paciente
    public function eliminarpaciente($id)
    {
        Paciente::destroy($id);
        return back();
    }

    // Funcion para editar un paciente
    public function editarpaciente(Request $request, $id)
    {
        $editMedico = Paciente::findOrFail($id);

        $editMedico->name = $request->name;
        $editMedico->apellido = $request->apellido;
        $editMedico->email = $request->email;
        $editMedico->telefono = $request->telefono;
        $editMedico->direccion = $request->direccion;
        $editMedico->ciudad_id = $request->ciudad_id;

        $editMedico->save();

        return back()->with('success');
    }


    // Funcion para ver el historial de un paciente
    public function historial($id)
    {

        $especialidades = Especialidades::all();
        $medicos = User::all();
        $paciente = Paciente::findOrFail($id);
        // return $paciente->id;
        $clientepaciente = ClientePaciente::where('paciente_id', '=', $paciente->id)->first();

        // return $clientepaciente;
        $cliente = User::where('id', '=', $clientepaciente->cliente_id)->first();
        $historias = Historial::where('paciente_id', '=', $id)->get();

        return view('paciente.historial', compact('paciente', 'cliente', 'historias', 'especialidades', 'medicos'));
    }

    // Funcion para dar atención a una cita de un paciente
    public function atencioncita($paciente_id, $cita_id)
    {
        $cita = Cita::findOrFail($cita_id);
        $especialidad = Especialidades::where('id', '=', $cita->especialidad_id)->get()->first();
        $paciente = Paciente::findOrFail($paciente_id);
        return view('paciente.atencioncita', compact('paciente', 'cita', 'especialidad'));
    }
}
