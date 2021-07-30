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
        <div>
            <h3>Aquí puede ver las citas de todos sus pacientes {{ $cliente->name }}</h3>
        </div>

        {{-- <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#exampleModal{{ $cliente->id }}">
                Nuevo Paciente
            </button>
        </div> --}}

        <div class="card-body">

            <table id="tablaCitas" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Nombres</th>
                        <th>Cédula</th>
                        <th>Próximas Citas</th>
                        <th>Cancelar Cita</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        @foreach ($pacientesCliente as $clipacientes)
                            @if ($cita->paciente_id == $clipacientes->paciente_id && $cita->estado_cita == 'Activa')
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
                                        {{-- @foreach ($citas as $cita) --}}
                                            @if ($cita->estado_cita == 'Activa')
                                                @if ($cita->paciente_id == $clipacientes->paciente_id)
                                                    @php
                                                        setlocale(LC_ALL, 'es_ES');
                                                        Carbon::setlocale('es');
                                                        $fecha = Carbon::create($cita->fecha_cita)->isoformat(' dddd D  \d\e MMMM \d\e\l YYYY \a \l\a\s h:mm a');
                                                    @endphp
                                                    @foreach ($medicos as $medico)
                                                        @if ($medico->id == $cita->medico_id)
                                                            @php
                                                                $medNombre = $medico->name;
                                                                $medApellido = $medico->apellido;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @foreach ($especialidades as $especialidad)
                                                        @if ($especialidad->id == $cita->especialidad_id)
                                                            @php
                                                                $espe = $especialidad->especialidad;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    *{{ $fecha }}<br>{{ $medNombre }}
                                                    {{ $medApellido }}<br>{{ $espe }} <br>
                                                @endif
                                            @endif
                                        {{-- @endforeach --}}
                                    </td>
                                    <td>
                                        <form action="{{ route('cliente.solicitarcancelarcita', $cita->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Solicitar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
    @include('Modales/crearpacienteCliente')
@endsection
