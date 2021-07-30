<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\ClientePaciente;
use App\Models\RolUsuario;
use App\Models\Especialidades;
use App\Models\Notificaciones;

class ClienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('preventBackHistory');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $cliente =  auth()->user();
        $pacientesCliente = ClientePaciente::where('cliente_id', '=', $cliente->id )->get();
        $pacientes = Paciente::all();
        return view('cliente/citas',compact('pacientes','pacientesCliente','cliente'));
    }

    public function pacientes()
    {
        $cliente =  auth()->user();
        $pacientesCliente = ClientePaciente::where('cliente_id', '=', $cliente->id )->get(); //extrae solo los pacientes del cliente
        $pacientes = Paciente::all(); // Se usa para poder colocar la infomración de los pacientes anteriormente obtenidos
        $citas = Cita::all();
        $especialidades = Especialidades::all();
        $medicos = User::all();

        return view('cliente.pacientescliente', compact('cliente','pacientesCliente', 'pacientes','citas','especialidades','medicos'));
    }


    // Agendar Cita

    public function citas()
    {
        $cliente =  auth()->user();
        $pacientesCliente = ClientePaciente::where('cliente_id', '=', $cliente->id )->get();
        $pacientes = Paciente::all();
        return view('cliente/citas',compact('pacientes','pacientesCliente','cliente'));

    }

    // Ver Historial

    public function historial()
    {
        $cliente =  auth()->user();
        $pacientesCliente = ClientePaciente::where('cliente_id', '=', $cliente->id )->get();
        $pacientes = Paciente::all();
        return view('cliente/historial',compact('pacientes','pacientesCliente','cliente'));
    }

    //Ver examenes y recetas

    public function pedidosmed()
    {
        return view('cliente/pedidosmed');
    }

    //Administrar Clientes
    public function adminclientes()
    {
        $clientes = User::all();
        $pacientes = Paciente::all();
        $clientepacientes = ClientePaciente::all();
        $clienteroles = RolUsuario::all();
        return view('cliente/admincliente', compact('clienteroles', 'clientes', 'clientepacientes', 'pacientes'));
    }

    // Funcion para crear un cliente
    public function crearcliente(Request $request)
    {
        
        $nuevoCliente = new User;

        $usuarioexist = User::where('cedula', '=', $request->cedula)->first();

        if ($usuarioexist == null) {


            $rules = [
                'cedula' => 'required|unique:users',
                'email' => 'required',
            ];

            $messages = [
                'cedula.required' => 'La cédula es requerida',
                'email.required' => 'Coloque el correo',
                'cedula.unique' => 'La cédula ya está en uso',
            ];

            $this->validate($request, $rules, $messages);

            $nuevoCliente = new User;

            $nuevoCliente->name = $request->name;
            $nuevoCliente->apellido = $request->apellido;
            $nuevoCliente->cedula = $request->cedula;
            $nuevoCliente->email = $request->email;
            $nuevoCliente->telefono = $request->telefono;
            $nuevoCliente->direccion = $request->direccion;
            $nuevoCliente->fechaNacimiento = $request->fechaNacimiento;
            $nuevoCliente->password = Hash::make($request->password);
            $nuevoCliente->ciudad_id = $request->ciudad_id;
            $nuevoCliente->genero_id = $request->genero_id;
            $nuevoCliente->rol_id = 2;

            $nuevoCliente->save();
            $nuevoCliente->assignRole('Cliente');

            /////////////////////////////    Crear un Paciente con los datos del nuevo cliente
            $nuevoPaciente = new Paciente;
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
            $ultimoCliente = User::latest('id')->first();

            $ultimoCliente->pacientes()->syncWithoutDetaching($ultimoPaciente->id);

            return back();

        } else {
            // return "usuario ya existe";
            $usuarioexist->roles()->syncWithoutDetaching(2);

            return back();
        }

    }

    // Funcion para eliminar un cliente
    public function eliminarcliente($id)
    {
        User::destroy($id);
        return back();
    }

    // Funcion para editar un cliente
    public function editarcliente(Request $request, $id)
    {
        $editCliente = User::findOrFail($id);

        $editCliente->email = $request->email;
        $editCliente->telefono = $request->telefono;
        $editCliente->direccion = $request->direccion;
        $editCliente->password = Hash::make($request->password);
        $editCliente->ciudad_id = $request->ciudad_id;

        $editCliente->save();

        return back()->with('success');
    }

    // Funcion para asignar un paciente a un cliente. Esta función solo se usa al momento de
    // la instalación para el primer seed de prueba
    public function asignarpaciente(Request $request, $id)
    {

        $clientePaciente = User::find($id);

        //return $request;

        $clientePaciente->pacientes()->syncWithoutDetaching($request->paciente_id);

        return back();
    }

    // Funcion para remover un paciente de un cliente
    public function removerpaciente(Request $request, $id)
    {
        $clientePaciente = User::find($id);

        $clientePaciente->pacientes()->detach($request->paciente_id);

        return back();
    }

    // Funcion para solicitar una cancelación de cita
    public function solicitarcancelarcita($id)
    {
        $citaporcancelar = Cita::find($id);
        $clipaciente = Paciente::find($citaporcancelar->paciente_id);
        $clientep = ClientePaciente::find($clipaciente->id);
        $cliente = User::find($clientep->cliente_id);
        $medico = User::find($citaporcancelar->medico_id);
        

        $notificacion = new Notificaciones();
        $notificacion->estado_solicitud = 1;
        $notificacion->cita_id = $citaporcancelar->id;
        $notificacion->notificacion = $cliente->name. ' '. $cliente->apellido. ' solicita cancelar la cita de '. $clipaciente->name.
                                    ' programada para '. $citaporcancelar->fecha_cita. ' con '. $medico->name. ' '. $medico->apellido;
        $notificacion->save();
        return back();
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
