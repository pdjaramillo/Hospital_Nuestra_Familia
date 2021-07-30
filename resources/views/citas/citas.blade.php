<!DOCTYPE html>
<html lang="es">

@php
use App\Models\Especialidades;
use App\Models\User;

$especialidades = Especialidades::all();
$medicos = User::all();
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>

    <!-- Formulario de ingreso de paciente-->

    {{-- <div class="container">  Fromulario en vista no modal
        <hr>
        <div class="container">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Digite su número de cédula</label>
                    <input type="text" class="form-control col-5" id="cedula" aria-describedby="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control col-5" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="genero">Especialidad</label>
                    <select name="especialidad_id" id="especialidad_id" class="form-control col-5">
                        @foreach ($especialidades as $especialidad)
                            <option value="{{ $especialidad->id }}">{{ $especialidad->especialidad }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="genero">Medico</label>
                    <select name="especialidad_id" id="especialidad_id" class="form-control col-5">

                        @foreach ($medicos as $medico)
                            @if ($medico->rol_id == 3)
                                <option value="{{ $medico->id }}">{{ $medico->name }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <!-- Calendario pick-a-date -->

                <div class="form-group">
                    <div class="col-25">
                        <label for="fecha">Seleccione el día y la hora</label>
                    </div>
                    <div class="col-5">
                        <input id="fecha" type="text" class="form-control input-sm datepicker">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>

    </div> --}}


    <!-- Calendario -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
        integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $.datetimepicker.setLocale('es');
        $('#fecha').datetimepicker({
            inline: false,
            allowTimes: [
                '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00',
                '16:00', '16:30', '17:00', '17:30', '18:00'
            ]
        });
    </script>
</body>
