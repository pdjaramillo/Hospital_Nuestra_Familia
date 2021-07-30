@extends('layouts.app')

@php
use Carbon\Carbon;

$hora = new Carbon();
setlocale(LC_ALL, 'es_ES');
Carbon::setlocale('es');
$hoy = Carbon::now()->isoformat(' dddd D  \d\e MMMM \d\e\l YYYY');
$fin = Carbon::now()->addDay(6)->isoformat(' dddd D  \d\e MMMM \d\e\l YYYY');

@endphp

@section('content')
    <div class="container text-center text-primary rounded">
        <h1>Bienvenido</h1>
        <h4>Estas son las Citas desde el {{ $hoy }}</h4>
        <h4>hasta {{ $fin }}</h4>
    </div>

    <hr>
    <div class="container">
        <div class="card-body">

            <table id="tablaCitasMedico" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Hora de atención</th>
                        <th>Nombres del Ciente</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        @php
                            setlocale(LC_ALL, 'es_ES');
                            Carbon::setlocale('es');
                            $hora = Carbon::create($cita->fecha_cita)->isoformat('dddd - HH:mm');
                            $citaHoy = Carbon::create($cita->fecha_cita)->format('d-m-Y h:i');
                            $hoy = Carbon::now()->format('d-m-Y');
                            $fin = Carbon::now()
                                ->addDay(6)
                                ->format('d-m-Y');
                            $fechas = Carbon::create($cita->fecha_cita)->between($hoy, $fin);
                        @endphp
                        @if ($fechas == Carbon::create($cita->fecha_cita)->format('d-m-Y'))
                            <tr>
                                <td>
                                    @foreach ($pacientes as $paciente)
                                        @if ($paciente->id == $cita->paciente_id)
                                            <h3 class="display-6"><span class="badge badge-secondary">{{ $hora }}</span>
                                            </h3>
                                            {{-- {{ $hoy }} --}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($pacientes as $paciente)
                                        @if ($paciente->id == $cita->paciente_id)
                                            {{ $paciente->name }} {{ $paciente->apellido }} <br>
                                            <!--{{ Carbon::create($cita->fecha_cita)->format('d-m-Y') }}-->
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($pacientes as $paciente)
                                        @if ($paciente->id == $cita->paciente_id)
                                            @if ($cita->estado_cita == 'Activa')
                                                <!-- Formulario para atender al paciente -->
                                                <button type="button" class="btn btn-success btn-sm"
                                                    onclick="window.location='{{ route('paciente.atencioncita', [$paciente->id, $cita->id]) }}'">Iniciar</button>
                                            @endif
                                            @if ($cita->estado_cita != 'Activa')
                                                {{ $cita->estado_cita }} @endif
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Calendario -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
        integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/datatablecitasmedico.js') }}"></script>
@endsection
