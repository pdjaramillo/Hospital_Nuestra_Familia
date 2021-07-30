@extends('layouts.app')
@section('content')
    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->
    <div class="container">
        <div>
            <h3>Administración de Clientes</h3>
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
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nuevo Cliente
            </button>
            <hr>
        </div>

        <table id="tablaClientes" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    {{-- <th>Apellidos</th> --}}
                    <th>Pacientes</th>
                    <th class="text-center">Acción</th>
                    <th class="text-center">Pacientes a cargo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clienteroles as $clienterol)
                    @if ($clienterol->rol_id == 2)
                        <tr>
                            <td>
                                @foreach ($clientes as $cliente)
                                    @if ($cliente->id == $clienterol->user_id)
                                        {{ $cliente->cedula }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($clientes as $cliente)
                                    @if ($cliente->id == $clienterol->user_id)
                                        {{ $cliente->name }} {{ $cliente->apellido }}
                                    @endif
                                @endforeach
                            </td>
                            {{-- <td>
                                @foreach ($clientes as $cliente)
                                    @if ($cliente->id == $clienterol->user_id)
                                        {{ $cliente->apellido }}
                                    @endif
                                @endforeach
                            </td> --}}
                            <td>
                                @foreach ($clientepacientes as $clientepaciente)
                                    @if ($clientepaciente->cliente_id == $clienterol->user_id)
                                        @foreach ($pacientes as $paciente)
                                            @if ($paciente->id == $clientepaciente->paciente_id && $clientepaciente->cliente_id == $clienterol->user_id)
                                                {{ $paciente->name }} {{ $paciente->apellido }} <br>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">

                                    <!-- Formulario para editar Cliente -->

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editarClienteModal{{ $clienterol->user_id }}">Editar</button>

                                </div>
                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">
                                    {{-- Para agregar Paciente al realizar los seed --}}
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#asignarPacienteModal{{ $clienterol->user_id }}">
                                        +
                                    </button> 

                                    {{-- Para remover Paciente --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#removerPacienteModal{{ $clienterol->user_id }}">
                                        Quitar
                                    </button>

                                    {{-- Para crear Paciente --}}
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearPacienteModal{{ $clienterol->user_id }}">
                                        Nuevo
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('Modales/editarcliente')
                        @include('Modales/asignarpaciente')
                        @include('Modales/removerpaciente')
                        @include('Modales/crearpaciente')
                    @endif
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>

    @include('Modales/crearcliente')

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

    <script src="{{ asset('js/datatableclientes.js') }}"></script>


@endsection
