@extends('layouts.app')

@section('content')
    @php
    use Carbon\Carbon;

    @endphp

    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->

    <div class="container">
        {{-- para mostrar Mensaje --}}
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
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
        <div>
            <h3>Aquí puede administrar sus pacientes {{ $cliente->name }}</h3>
        </div>

        <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#exampleModal{{ $cliente->id }}">
                Nuevo Paciente
            </button>
        </div>

        <div class="card-body">

            <table id="tablaCitas" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Nombres</th>
                        <th>Cédula</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientesCliente as $clipacientes)
                        <tr>
                            <td>
                                @foreach ($pacientes as $paciente)
                                    @if ($paciente->id == $clipacientes->paciente_id)
                                        {{ $paciente->name }} {{ $paciente->apellido }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($pacientes as $paciente)
                                    @if ($paciente->id == $clipacientes->paciente_id)
                                        {{ $paciente->cedula }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($pacientes as $paciente)
                                    @if ($paciente->id == $clipacientes->paciente_id)
                                        <div class="form-button text-center" class="d-inline">
                                            <!-- Formulario para editar paciente -->
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#editarPacienteModal{{ $paciente->id }}">Editar</button>
                                            <!-- Formulario para crear cita para paciente -->
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
                                        @include('Modales/editarpaciente')
                                        @include('Modales/crearcita')
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
    @include('Modales/crearpacienteCliente')

@endsection
