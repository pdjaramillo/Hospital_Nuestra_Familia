@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Página principal del historial del paciente</h1>
    </div>
    <div class="container">
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

                                            <!-- Formulario para ver historial paciente -->
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                onclick="window.location='{{ route('paciente.historial', $paciente->id) }}'">Historial</button>
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

@endsection
