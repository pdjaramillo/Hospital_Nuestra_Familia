<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidades;
use App;

class EspecialidadController extends Controller
{

    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidades::all();
        return view('administrador.adminespecialidades', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Funcion para crear una especialidad
    public function crearesp(Request $request)
    {
        // para verificar que los datos del formulario lleguen 

        $nuevaEspecialidad = new Especialidades;

        $nuevaEspecialidad->especialidad = $request->especialidad;
        $nuevaEspecialidad->descripcion = $request->descripcion;

        $nuevaEspecialidad->save();
        return back()->with('success', 'Especialidad Creada');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Funcion para editar una especialidad
    public function editaresp(Request $request, $id)
    {
        $nuevaEspecialidad = Especialidades::findOrFail($id);

        $nuevaEspecialidad->especialidad = $request->especialidad;
        $nuevaEspecialidad->descripcion = $request->descripcion;

        $nuevaEspecialidad->save();

        return back()->with('success', 'Especialidad Actualizada');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Funcion para eliminar una especialidad
    public function eliminaresp($id)
    {
        Especialidades::destroy($id);
        return back()->with('success', 'Especialidad Eliminada');;
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
