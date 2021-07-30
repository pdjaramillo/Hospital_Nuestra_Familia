<?php


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PagesController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Auth::routes();


//========================Rutas que no necesitan ninguna autentificación
Route::get('inicio', [App\Http\Controllers\PagesController::class, 'inicio'])->name('inicio');
Route::get('servicios', [App\Http\Controllers\PagesController::class, 'servicios'])->name('servicios');
Route::get('contacto', [App\Http\Controllers\PagesController::class, 'contacto'])->name('contacto');
Route::get('prueba', [App\Http\Controllers\PagesController::class, 'prueba'])->name('prueba');

//post de login y registro
Route::get('acceder', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('acceder');
Route::post('acceder', [App\Http\Controllers\Auth\LoginController::class, 'redirectTo'])->name('login.custom');
Route::get('registro', [App\Http\Controllers\Auth\LoginController::class, 'registro'])->name('registro-usuario');
Route::post('registro', [App\Http\Controllers\Auth\LoginController::class, 'create'])->name('registro-create');

Route::group(['middleware' => 'auth'], function(){

    //======================== Administrador
        //el resource se usa para rutas por defecto
        //new update store y asi.... sino se usan no se de be usar un Route::resource
        //Route::resource('admins', AdministradorController::class)->names('adminprincipal');
    Route::get('admins', [AdministradorController::class, 'index'])->middleware('can:admin.home')->name('admin.home')->name('admin.home');
    Route::get('adminpaciente', [App\Http\Controllers\PacienteController::class, 'adminpaciente'])->middleware('can:admin.paciente')->name('admin.paciente');
    Route::get('admincitas/{id?}', [App\Http\Controllers\AdministradorController::class, 'admincitas'])->middleware('can:admin.citas')->name('admin.citas');
    Route::get('adminmedicos', [App\Http\Controllers\AdministradorController::class, 'adminmedicos'])->middleware('can:admin.medicos')->name('admin.medicos');
    Route::get('adminclientes', [App\Http\Controllers\ClienteController::class, 'adminclientes'])->middleware('can:admin.clientes')->name('admin.clientes');


                //========================= RUTAS Gestion Médicos
                Route::post('crearmed', [App\Http\Controllers\AdministradorController::class, 'crearmed'])->middleware('can:admin.crearmed')->name('admin.crearmed');//permiso
                Route::put('editarmed/{id}', [App\Http\Controllers\AdministradorController::class, 'editarmed'])->middleware('can:admin.editarmed')->name('admin.editarmed');   //permiso
                Route::delete('eliminarmed/{id}', [App\Http\Controllers\AdministradorController::class, 'eliminarmed'])->middleware('can:admin.eliminarmed')->name('admin.eliminarmed');//permiso
                Route::post('asignarespe/{id}', [App\Http\Controllers\AdministradorController::class, 'asignarespe'])->middleware('can:admin.asignarespe')->name('admin.asignarespe');//permiso
                Route::post('removerespe/{id}', [App\Http\Controllers\AdministradorController::class, 'removerespe'])->middleware('can:admin.removerespe')->name('admin.removerespe');//permiso


                //========================= RUTAS Gestion Cita
                Route::post('crearcita{id}', [App\Http\Controllers\AdministradorController::class, 'crearcita'])->name('crearcita');//permiso
                Route::put('editarcita/{id}', [App\Http\Controllers\AdministradorController::class, 'editarcita'])->name('editarcita');//permiso
                Route::post('completarcita/{id}', [App\Http\Controllers\AdministradorController::class, 'completarcita'])->name('completarcita');//permiso
                Route::post('cancelarcita/{id}', [App\Http\Controllers\AdministradorController::class, 'cancelarcita'])->name('cancelarcita');//permiso


    //========================= Clientes
    Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->middleware('can:cliente.home')->name('cliente.home');
    Route::get('/citas', [App\Http\Controllers\ClienteController::class, 'citas'])->middleware('can:cliente.citas')->name('cliente.citas');
    Route::get('/historial', [App\Http\Controllers\ClienteController::class, 'historial'])->middleware('can:cliente.historial')->name('cliente.historial');
    Route::get('/pacientecliente', [App\Http\Controllers\ClienteController::class, 'pacientes'])->middleware('can:cliente.pacientescliente')->name('cliente.pacientescliente');
    Route::get('/pedidosmed', [App\Http\Controllers\ClienteController::class, 'pedidosmed'])->middleware('can:cliente.pedidosmed')->name('cliente.pedidosmed');
    Route::get('/regpaciente', [App\Http\Controllers\ClienteController::class, 'regpaciente'])->middleware('can:cliente.regpaciente')->name('cliente.regpaciente');
    Route::get('medicosPorEspecialidad', [App\Http\Controllers\PacienteController::class, 'medicosPorEspecialidad'])->name('ajax.medicosEspecialidad');
    Route::resource('adminespecialidades', 'App\Http\Controllers\EspecialidadController'); //admin.especialidades {index, create, edit, destroy
    Route::post('crearcliente', [App\Http\Controllers\ClienteController::class, 'crearcliente'])->middleware('can:cliente.crearcliente')->name('cliente.crearcliente');  //permiso
    Route::put('editarcliente/{id}', [App\Http\Controllers\ClienteController::class, 'editarcliente'])->middleware('can:cliente.editarcliente')->name('cliente.editarcliente');   //permiso
    Route::delete('eliminarcliente/{id}', [App\Http\Controllers\ClienteController::class, 'eliminarcliente'])->middleware('can:cliente.eliminarcliente')->name('cliente.eliminarcliente');//permiso
    Route::post('asignarpaciente/{id}', [App\Http\Controllers\ClienteController::class, 'asignarpaciente'])->middleware('can:cliente.asignarpaciente')->name('cliente.asignarpaciente');//permiso
    Route::post('removerpaciente/{id}', [App\Http\Controllers\ClienteController::class, 'removerpaciente'])->middleware('can:cliente.removerpaciente')->name('cliente.removerpaciente');//permiso
    Route::post('solicitarcancelarcita/{id}', [App\Http\Controllers\ClienteController::class, 'solicitarcancelarcita'])->middleware('can:cliente.solicitarcancelarcita')->name('cliente.solicitarcancelarcita');//permiso


                //========================= Especialidades
                Route::post('crearesp', [App\Http\Controllers\EspecialidadController::class, 'crearesp'])->name('crearesp');//permiso
                Route::put('editaresp/{id}', [App\Http\Controllers\EspecialidadController::class, 'editaresp'])->name('editaresp');//permiso
                Route::delete('eliminaresp/{id}', [App\Http\Controllers\EspecialidadController::class, 'eliminaresp'])->name('eliminaresp');//permiso

       
    //========================= RUTAS Gestion Paciente
    Route::post('crearpaciente/{id?}', [App\Http\Controllers\PacienteController::class, 'crearpaciente'])->name('paciente.crearpaciente');//permiso
    Route::put('editarpaciente/{id}', [App\Http\Controllers\PacienteController::class, 'editarpaciente'])->name('paciente.editarpaciente');//permiso
    Route::delete('eliminarpaciente/{id}', [App\Http\Controllers\PacienteController::class, 'eliminarpaciente'])->name('paciente.eliminarpaciente');//permiso
    Route::put('ciudad', [App\Http\Controllers\PacienteController::class, 'ciudad'])->name('ciudad');//permiso
    Route::get('historial/{id}', [App\Http\Controllers\PacienteController::class, 'historial'])->name('paciente.historial');//permiso
    Route::get('/atencioncita/{paciente_id}/{cita_id}', [App\Http\Controllers\PacienteController::class, 'atencioncita'])->name('paciente.atencioncita');//permiso
    
    
                //========================= Medico
                Route::resource('/medicos', MedicoController::class)->middleware('can:medico.home')->names('medico.home');
                Route::get('/control', [App\Http\Controllers\MedicoController::class, 'control'])->middleware('can:medico.control')->name('medico.control');
                Route::get('/paciente', [App\Http\Controllers\MedicoController::class, 'infopaciente'])->middleware('can:medico.infopaciente')->name('medico.infopaciente');
                Route::put('/diagnosticar/{id}', [App\Http\Controllers\MedicoController::class, 'diagnosticar'])->middleware('can:medico.diagnostico')->name('medico.diagnostico');
                Route::delete('/cancelarcita/{id}', [App\Http\Controllers\MedicoController::class, 'cancelarcita'])->middleware('can:admin.cancelarcita')->name('medico.cancelarcita');//permiso
    
    

    });






