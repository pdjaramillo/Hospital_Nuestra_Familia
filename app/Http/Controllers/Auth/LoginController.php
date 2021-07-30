<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Ciudad;
use App\Models\Genero;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function index()
    {
        return view('login');
    }

    public function registro()
    {

        $ciudades = Ciudad::all();
        $generos = Genero::all();

        return view('registro', compact('ciudades', 'generos'));
    }

    public function create(Request $request)
    {
        $nuevoCliente = new User;

        $usuarioexist = User::where('cedula', '=', $request->cedula)->first();

        if ($usuarioexist == null) {


            $rules = [
                'cedula' => 'required|unique:users',
                'email' => 'required',
            ];

            $messages = [
                'cedula.required' => 'La cedula es requerida',
                'email.required' => 'Coloque el correo',
                'cedula.unique' => 'La cedula ya está en uso',
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
            $nuevoCliente->assignRole('Cliente');;

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

            return redirect('acceder')->with('message', 'Cliente creado con exito. Puede iniciar sesión');
        } else {
            // return "usuario ya existe";
            $usuarioexist->roles()->syncWithoutDetaching(2);

            return back();
        }
    }

    public function redirectTo(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $rol = Auth::user()->rol_id;
            $view = '';
            switch ($rol) {
                case 1:
                    $view = 'admins';
                    break;
                case 2:
                    $view = 'clientes';
                    break;
                default:
                    $view = 'medicos';
                    break;
            }

            return redirect()->intended($view)
                ->withSuccess('Signed in');
        }

        return redirect("acceder")->withSuccess('Credenciales incorrectas');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('inicio');
    }
}
