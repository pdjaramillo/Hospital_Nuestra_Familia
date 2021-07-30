@extends('layouts.app')
@section('content')
    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->

    <div class="container">

        <div>
            <h3>Administración de especialidades</h3>
        </div>

        <div class="card-body">

            <button type="button" class="btn btn-primary btnespecialidadModal" data-toggle="modal"
                data-target="#especialidadModal">
                Nueva Especialidad
            </button>

            <hr>

            <table id="tablaEspecialidad" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <!--th>Código</th-->
                        <th>Especialidad</th>
                        <th>Descripción</th>
                        {{-- <th>Medico Tratante</th> --}}
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($especialidades as $especialidad)
                        <tr>
                            <!--td>{{ $especialidad->id }}</td-->
                            <!--td>{{ $especialidad->codigo_esp }}</td-->
                            <td>{{ $especialidad->especialidad }}</td>
                            <td>{{ $especialidad->descripcion }}</td>
                            {{-- <td>Prueba</td> --}}
                            <td>
                                <div class="form-button" class="d-inline">
                                    <!-- Formulario para editar especialidad -->

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editarEspecialidadModal{{ $especialidad->id }}">Editar</button>

                                    <!-- Formulario para eliminar especialidad -->
                                    <form action="{{ route('eliminaresp', $especialidad->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @include('Modales/editarespecialidad')
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>

    @include('Modales/crearespecialidad')

@endsection
