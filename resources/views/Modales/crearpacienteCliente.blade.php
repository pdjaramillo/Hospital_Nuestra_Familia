@php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;

$ciudades = Ciudad::all();
$generos = Genero::all();

@endphp

<!------------------------------------------------------------Crear Paciente--------------------------------------------------------->

<div class="modal fade" id="exampleModal{{ $cliente->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('paciente.crearpaciente', $cliente->id) }}" method="POST">
                    <div id="modalBody" class="modal-body">
                        <!-- Formulario -->
                        @csrf
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cédula</label>
                            <input type="text" id="cedula" name="cedula" class="form-control" required maxlength="10"
                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" maxlength="40">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control"
                                maxlength="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" required
                                maxlength="200">
                        </div>
                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control" required
                                maxlength="11">
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
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" id="btnGuardarMedico" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
