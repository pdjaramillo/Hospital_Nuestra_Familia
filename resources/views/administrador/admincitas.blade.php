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
            <h3>Aquí puede administrar las citas</h3>
        </div>

        <div class="card-body">

            <table id="tablaCitas" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Paciente</th>
                        <th>Especialidad</th>
                        <th>Medico Tratante</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        @php
                            setlocale(LC_ALL, 'es_ES');
                            Carbon::setlocale('es');
                            // $fecha = Carbon::create($cita->fecha_cita)->isoformat(' dddd D  \d\e MMMM \d\e\l YYYY \a \l\a\s h:mm a');
                            $fecha = Carbon::create($cita->fecha_cita)->format(' m-d \a \l\a\s h:i a');
                        @endphp
                        <tr>
                            <!--td>{{ $cita->id }}</td-->
                            <td>
                                @foreach ($pacientes as $paciente)
                                    @if ($cita->paciente_id == $paciente->id)
                                        {{ $paciente->name }} {{ $paciente->apellido }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($especialidades as $especialidad)
                                    @if ($cita->especialidad_id == $especialidad->id)
                                        {{ $especialidad->especialidad }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($medicos as $medico)
                                    @if ($cita->medico_id == $medico->id)
                                        {{ $medico->name }} {{ $medico->apellido }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{ $fecha }}
                            </td>
                            <td>
                                {{ $cita->estado_cita }}
                            </td>
                            <td>
                                <div class="form-button" class="d-inline">
                                    <form action="{{ route('completarcita', $cita->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">OK</button>
                                    </form>
                                    <form action="{{ route('cancelarcita', $cita->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <button type="button" class="btn btn-secondary btn-sm my-4"
            onclick="window.location='{{ url('admins') }}'">Solicitudes</button>
        </div>

    </div>

@endsection
