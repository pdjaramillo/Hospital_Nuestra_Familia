@extends('layouts.app')
@section('content')

    @php
    use Carbon\Carbon;
    @endphp

    <div class="container">
        <h2>Cita</h2>
    </div>

    <div class="container">
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value={{ $paciente->name }} readonly>
                </div>
                <div class="form-group col-md-5">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" value={{ $paciente->apellido }}
                        readonly>
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
            </div>

            <form action="{{ route('medico.diagnostico', $paciente->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Datos ocultos --}}
                <input type="hidden" name="especialidad_id" value="{{ $especialidad->id }}">
                <input type="hidden" name="cita_id" value="{{ $cita->id }}">
                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                <!-- Formulario -->
                <div class="form-row">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="container my-2">
                            <label for="especialidad">Especialidad</label>
                            <input id="especialidad" class="form-control col-5" name="especialidad" readonly
                                value="{{ $especialidad->especialidad }}">
                        </div>
                        <div class="container my-2">
                            <label for="observaciones">Observaciones Iniciales</label>
                            <textarea id="observaciones" class="form-control" name="observaciones" rows="3"
                                required></textarea>
                        </div>
                        <div class="container my-2">
                            <label for="diagnostico">Diagnóstico</label>
                            <textarea id="diagnostico" class="form-control" name="diagnostico" rows="3" required></textarea>
                        </div>
                        <div class="container my-2">
                            <label for="receta">Receta</label>
                            <div class="form-row">
                                <textarea id="medicamentos" class="form-control col mr-2" name="medicamentos" rows="3"
                                    required placeholder="Medicamentos"></textarea>
                                <textarea id="dosis" class="form-control col" name="dosis" rows="3" required
                                    placeholder="Dosis"></textarea>
                            </div>
                        </div>
                        <div class="container my-2">
                            <label for="examen">Exámenes</label>
                            <div class="form-row">
                                <textarea id="examen" class="form-control col mr-2" name="examen" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container my-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                {{-- <div class="container my-3">
                    <button type="button" class="btn btn-success btn-sm" onclick=window.history.back()>Regresar</button>
                </div> --}}
            </form>
        </div>
    </div>
@endsection
