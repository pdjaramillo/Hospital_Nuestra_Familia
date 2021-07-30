@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Página principal del tablero del administrator</h2>
        <p>Aquí podrá gestionar todas las categorías del sistema como por ejemplo.<br>
            <br>
            - Gestionar Especialidades<br>
            - Gestionar Médicos<br>
            - Gestionar Citas<br>
            - Gestionar Pacientes<br>
        </p>

        <div class="card-body">

            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Notificaciones</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notificaciones as $notificacion)
                        @if ($notificacion->estado_solicitud == true)
                            <tr>
                                <td>
                                    {{ $notificacion->notificacion }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                    onclick="window.location='{{ route('admin.citas', $notificacion->id) }}'">Atendida</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <button type="button" class="btn btn-secondary btn-sm"
            onclick="window.location='{{ route('admin.citas') }}'">Revisar</button>
        </div>
    </div>
@endsection
