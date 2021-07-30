@extends('layouts.app')

@php
use Carbon\Carbon;
@endphp

@section('content')
    <div class="container text-center text-primary rounded">
        <h3>Información del Paciente</h3>
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
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif


        <div class="card-body">

            <table id="tablaPaciente" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Nombres</th>
                        <th>Fecha de Nacimiento</th>
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
                                {{ $paciente->fechaNacimiento }}
                            </td>
                            <td>
                                {{ Carbon::createFromDate($paciente->fechaNacimiento)->age }}
                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">
                                    <!-- Formulario para editar paciente -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editarPacienteModal{{ $paciente->id }}">Editar</button>
                                </div>
                            </td>
                        </tr>
                        @include('Modales/editarpaciente')
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>

@endsection
