@extends('layouts.app')
@section('content')

    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->

    <div class="container">

        <div>
            <h3>Administración de Medicos</h3>
        </div>
        {{-- para mostrar Mensaje --}}
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card-body">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nuevo Médico
            </button>

            <hr>

            <table id="tablaMedico" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Especialidad</th>
                        <th class="text-center">Acción</th>
                        <th class="text-center">Especialidades</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicos as $medico)
                        @if ($medico->rol_id == 3)
                            <tr>
                                <td>{{ $medico->cedula }}</td>
                                <td>{{ $medico->name }}</td>
                                <td>{{ $medico->apellido }}</td>
                                <td>
                                    {{-- @php Aquí se procesaba el select de eloquente pero no resulto como se esperaba
                                        $consulta = json_encode($espe, JSON_UNESCAPED_UNICODE);/// se usa para forzar la respuesta en utf8
                                        $consulta = preg_replace('([^A-Za-z0-9-í])', '',$consulta);
                                    @endphp
                                    {{$consulta}} --}}
                                    @foreach ($especialidadMedico as $espemed)
                                        @foreach ($especialidades as $especialidad)
                                            @if ($espemed->especialidad_id == $especialidad->id && $espemed->medico_id == $medico->id)
                                                {{ $especialidad->especialidad }} <br>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>
                                <td>
                                    <div class="form-button text-center" class="d-inline">
                                        <!-- Formulario para editar medico -->

                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#editarMedicoModal{{ $medico->id }}">Editar</button>

                                        <!-- Formulario para eliminar medico -->
                                        <form action="{{ route('admin.eliminarmed', $medico->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>

                                {{-- Manejar las especialidades --}}
                                <td>
                                    <div class="form-button text-center" class="d-inline">
                                        {{-- Para agregar Especialidad --}}
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#asigEspeModal{{ $medico->id }}">
                                            +
                                        </button>

                                        {{-- Para remover Especialidad --}}
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#removerespe{{ $medico->id }}">
                                            -
                                        </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @include('Modales/editarmed')
                            @include('Modales/asignarespecialidad')
                            @include('Modales/removerespecialidad')
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>

    @include('Modales/crearmedico')




    <!-- Scripts JS y Bootstrap -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!--  Referencias a los JS de datatables -->

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Estilos Responsivos para las datables -->

    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    <script src="{{ asset('js/datatablemedico.js') }}"></script>


@endsection
