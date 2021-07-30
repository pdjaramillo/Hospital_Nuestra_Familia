@extends('layouts.app')
@section('content')
    @php
    use Carbon\Carbon;
    @endphp
    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->
    <div class="container">
        <div>
            <h3>Administración de Pacientes</h3>
        </div>

        {{-- Para mostrar los mensajes de error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- para mostrar Mensaje --}}
        @if (session()->has('messageError'))
            <div class="alert alert-danger">
                {{ session()->get('messageError') }} <br>
                @foreach (Session::get('fechas') as $fecha)
                    {{ Carbon::Create($fecha->fecha_cita)->format('H:i') }} <br>
                @endforeach

            </div>
        @endif

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }} <br>
            </div>
        @endif



        <div class="card-body">
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nuevo Paciente
            </button> --}}
            <hr>
            <table id="tablaPaciente" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Correo</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->cedula }}</td>
                            <td>{{ $paciente->name }} {{ $paciente->apellido }}</td>
                            <td>{{ $paciente->fechaNacimiento }}</td>
                            <td>
                                {{ $paciente->email }}
                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">
                                    <!-- Formulario para editar paciente -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editarPacienteModal{{ $paciente->id }}">Editar</button>
                                    <!-- Formulario para crear citar a paciente -->
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#citaModal{{ $paciente->id }}">Nueva Cita</button>
                                    <!-- Formulario para eliminar paciente -->
                                    <form action="{{ route('paciente.eliminarpaciente', $paciente->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('Modales/editarpaciente')
                        @include('Modales/crearcita')
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>

    {{-- @include('Modales/crearpaciente') --}}

@endsection
