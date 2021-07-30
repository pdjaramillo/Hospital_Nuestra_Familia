<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Cita;
use App\Models\Especialidades;
use App\Models\EspecialidadMedico;
use App\Models\Paciente;
use App\Models\Notificaciones;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



// Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdministradorController extends Controller
{

    public function __construct()
    {

        $this->middleware('preventBackHistory');
        $this->middleware('auth'); //Se usó un middel;
        //$this->middleware('admin',['only'=>['index']]);
    }

    public function index()
    {
        $citas = Cita::all();
        $notificaciones = Notificaciones::all();
        return view('administrador.index', compact('notificaciones', 'citas'));
    }


    // Funcion para crear una nueva cita
    public function crearcita(Request $request, $id)
    {
        // para verificar que los datos del formulario lleguen

        $nuevaCita = new Cita;

        $fechaSeleccionada = Carbon::create($request->fecha_cita)->toDateString();
        $fechaSiguiente = Carbon::create($request->fecha_cita)->addDay(1)->toDateString();

        $fechas = DB::table('citas')
            ->where('fecha_cita', '>=', $fechaSeleccionada)
            ->where('fecha_cita', '<', $fechaSiguiente)
            ->select('fecha_cita')
            ->distinct('fecha_cita')
            ->get();

        // Para ver si hay ya una cita con esa fecha
        $fechaExiste = Cita::where('fecha_cita', '=', $request->fecha_cita)
            ->where('medico_id', '=', $request->medico_id)
            ->first();

        // Para ver si hay una cita cancelada a la fecha solicitada
        $fechaCancelada = Cita::where('fecha_cita', '=', $request->fecha_cita)
            ->where('medico_id', '=', $request->medico_id)
            ->latest()->first();

        if ($fechaExiste == null) {

            $nuevaCita = new Cita;

            $nuevaCita->especialidad_id = $request->especialidad_id;
            $nuevaCita->medico_id = $request->medico_id;
            $nuevaCita->paciente_id = $id;
            $nuevaCita->fecha_cita = $request->fecha_cita;
            $nuevaCita->save();

            return back()->with('message', 'Cita creada con éxito');
        } else if ($fechaCancelada->estado_cita == 'Cancelada') {
            $nuevaCita = new Cita;

            $nuevaCita->especialidad_id = $request->especialidad_id;
            $nuevaCita->medico_id = $request->medico_id;
            $nuevaCita->paciente_id = $id;
            $nuevaCita->fecha_cita = $request->fecha_cita;
            $nuevaCita->save();

            return back()->with('message', 'Cita creada con éxito');
        } else
            return back()->with('messageError', 'No hay los siguientes turnos: ')

                ->with(compact('fechas'));
    }


    // Funcion para administrar las cita
    public function admincitas($id = null)
    {
        if ($id != null) {
            $notificacion = Notificaciones::find($id);
            $notificacion->estado_solicitud = 0;
            $notificacion->save();
        }

        $pacientes = Paciente::all();
        $especialidades = Especialidades::all();
        $medicos = User::all();
        $citas = Cita::all();
        $notificaciones = Notificaciones::all();

        return view('administrador.admincitas', compact('citas', 'pacientes', 'medicos', 'especialidades', 'notificaciones'));
    }

    // Funcion para completar una cita
    public function completarcita($id)
    {
        $cita = Cita::find($id);
        if ($cita->estado_cita == 'Activa') {
            $cita = Cita::find($id);
            $cita->estado_cita = "Completa";
            $cita->save();
            return redirect('admincitas')->with('message', 'Cita completa');
        } else {
            return redirect('admincitas')->with('message', 'La cita ya tiene un estado final');;
        }
    }


    // Funcion para cancelar una cita
    public function cancelarcita($id)
    {
        $cita = Cita::find($id);
        if ($cita->estado_cita == 'Activa') {
            $cita->estado_cita = "Cancelada";
            $cita->save();
            return redirect('admincitas')->with('message', 'Cita cancelada');
        } else {
            return redirect('admincitas')->with('message', 'La cita ya tiene un estado final');
        }
    }

    // Funcion para administrar médicos
    public function adminmedicos()
    {

        $medicos = User::all();
        $especialidadMedico = EspecialidadMedico::all();
        $especialidades = Especialidades::all();

        return view('administrador.adminmedicos', compact('medicos', 'especialidadMedico', 'especialidades'));
    }

    // Funcion para crear un médico
    public function crearmed(Request $request)
    {
        // para verificar que los datos del formulario lleguen 
        //return $request->all();

        $nuevoMedico = new User;

        $nuevoMedico->name = $request->name;
        $nuevoMedico->apellido = $request->apellido;
        $nuevoMedico->cedula = $request->cedula;
        $nuevoMedico->email = $request->email;
        $nuevoMedico->telefono = $request->telefono;
        $nuevoMedico->direccion = $request->direccion;
        $nuevoMedico->fechaNacimiento = $request->fechaNacimiento;
        $nuevoMedico->password = Hash::make($request->password);
        $nuevoMedico->ciudad_id = $request->ciudad_id;
        $nuevoMedico->genero_id = $request->genero_id;
        $nuevoMedico->rol_id = 3;
        $nuevoMedico->assignRole('Medico');

        $nuevoMedico->save();

        return redirect('adminmedicos')->with('message', 'Médico creado con exito');
    }


    // Funcion para editar un médico
    public function editarmed(Request $request, $id)
    {
        $editMedico = User::findOrFail($id);

        $editMedico->email = $request->email;
        $editMedico->telefono = $request->telefono;
        $editMedico->direccion = $request->direccion;
        $editMedico->password = Hash::make($request->password);
        $editMedico->ciudad_id = $request->ciudad_id;

        $editMedico->save();

        return redirect('adminmedicos')->with('message', 'Médico editado con exito');
    }

    // Funcion para eliminar un médico del sistema
    public function eliminarmed($id)
    {
        User::destroy($id);
        return redirect('adminmedicos')->with('message', 'Médico eliminado con exito');;
    }

    // Funcion para asignar una especiadlidad a un médico
    public function asignarespe(Request $request, $id)
    {
        $medicoEsp = User::find($id);

        $medicoEsp->especialidades()->syncWithoutDetaching($request->especialidad_id);

        return redirect('adminmedicos')->with('message', 'Especialidad asignada correctamente');;
    }

    // Funcion para remover una especialidad a un médico
    public function removerespe(Request $request, $id)
    {
        $medicoEsp = User::find($id);

        $medicoEsp->especialidades()->detach($request->especialidad_id);

        return redirect('adminespecialidades')->with('message', 'Especialidad removida exitosamente');
    }

    /////////////////////////// Metodos que se pueden usar luego //////////////////////////////////////

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function distroy($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
