@extends('layouts.principal')

@section('content')
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Registro</h2>
                <p>Registrate y reserva tu cita con los mejores profesioales.</p>
            </div>
            <div class="container">
                <form action="{{ route('registro-create') }}" method="POST">
                    <div class="container">
                        <!-- Formulario -->
                        @csrf
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Cédula</label>
                            <input type="text" id="cedula" name="cedula" class="form-control" required maxlength="10"
                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" required maxlength="40">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" required maxlength="15">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" required
                                maxlength="300">
                        </div>
                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control" required
                                maxlength="11">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" required
                                maxlength="20">
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad de Residencia</label>
                            <select name="ciudad_id" id="ciudad_id" class="form-control">
                                @foreach ($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}">{{ $ciudad->ciudad }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="genero">Género</label>
                            <select name="genero_id" id="genero_id" class="form-control">
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}">{{ $genero->genero }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="container">
                        <button type="submit" id="btnGuardarCliente" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection
