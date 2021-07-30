@extends('layouts.app')

@php
use Carbon\Carbon;
@endphp

@section('content')
    <div class="container text-center text-primary rounded">
        <h3>Historial Clínico</h3>
    </div>
    <hr>
    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->
    <div class="container">

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

            <table id="tablaPaciente" class="table table-striped table-bordered" style="width:100%" data-page-length='5'>
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Nombres</th>
                        <th>Correo de contacto</th>
                        <th>Edad</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <!--td>{{ $paciente->id }}</td-->
                            <td>{{ $paciente->name }} {{ $paciente->apellido }}</td>
                            <td>
                                @foreach ($citas as $cita)
                                    @if ($cita->paciente_id == $paciente->id)
                                        {{ $citas->fecha_cita }}
                                    @endif

                                @endforeach

                            </td>
                            <td>
                                {{ Carbon::createFromDate($paciente->fechaNacimiento)->age }}
                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">
                                    {{-- <!-- Formulario para diagnosticar paciente -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#diagnosticarPacienteModal{{ $paciente->id }}">Diagnóstico</button> --}}
                                    <!-- Formulario para ver historial paciente -->
                                    <button type="button" class="btn btn-secondary btn-sm"onclick="window.location='{{ route('paciente.historial',$paciente->id)}}'">Historial</button>
                                    <!-- Formulario para crear control para paciente -->
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#controlModal{{ $paciente->id }}">Control</button>
                                </div>
                            </td>
                        </tr>
                        @include('Modales/diagnosticarpaciente')
                        @include('Modales/crearcontrol')
                        {{-- @include('Modales/historialpaciente') --}}
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>

@endsection
