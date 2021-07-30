@extends('layouts.app')
@section('content')
    @php
    use Carbon\Carbon;
    @endphp

    <div class="container">
        <h1>Historial</h1>
    </div>

    <div class="container">
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value={{ $paciente->name }}
                            readonly>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"
                            value={{ $paciente->apellido }} readonly>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" name="fechaNacimiento" id="fechaNacimiento"
                            value={{ $paciente->fechaNacimiento }} readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="edad">Edad</label>
                        <input type="text" class="form-control" name="edad" id="edad"
                            value={{ Carbon::createFromDate($paciente->fechaNacimiento)->age }} readonly>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="clienteContacto">Nombre del Cliente</label>
                        <input type="text" class="form-control" id="clienteContacto" readonly
                            value='{{ $cliente->name }} {{ $cliente->apellido }}'>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="emailContacto">Correo de contacto</label>
                        <input type="text" class="form-control" id="emailContacto" readonly value={{ $cliente->email }}>
                    </div>
                </div>
                <div class="form-group">
                    <label for="historial">Historial</label>
                    <div class="card-body">



                        <table id="tablaPaciente" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre Médico</th>
                                    <th>Especialidad</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historias as $historia)
                                    <tr>
                                        <td>{{ $historia->fecha_historial }}</td>
                                        <td>
                                            @foreach ($medicos as $medico)
                                                @if ($historia->medico_id == $medico->id)
                                                    {{ $medico->name }} {{ $medico->apellido }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($especialidades as $especialidad)
                                                @if ($historia->especialidad_id == $especialidad->id)
                                                    {{ $especialidad->especialidad }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <!-- Imprimir recetas y exámenes -->
                                            <div class="form-button" class="d-inline">
                                                {{-- Ver Detalle --}}
                                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                                    data-target="#diagnosticoModal{{ $historia }}">
                                                    <i class="fal fa-user-md-chat" title="Ver detalle de consulta"></i>
                                                </button>
                                                {{-- Ver Receta --}}
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#recetaModal{{ $historia }}">
                                                    <i class="fal fa-prescription-bottle-alt" title="Ver detalle de receta"></i>
                                                </button>
                                                {{-- Ver Examen --}}
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#examenModal{{ $historia }}">
                                                    <i class="fal fa-file-medical" title="Ver detalle de examen"></i>
                                                </button>
                                            </div>
                                        </td>
                                        @include('Modales/impreceta')
                                        @include('Modales/impexamen')
                                        @include('Modales/impdiagnostico')
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                        <hr>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
