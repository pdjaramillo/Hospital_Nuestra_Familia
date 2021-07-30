@php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;

$ciudades = Ciudad::all();
$generos = Genero::all();

@endphp
<!-------------------------------------------------------Editar Paciente ----------------------------------------------------------->

        <!-- Modal Editar Especialidad-->
        <div class="modal fade" id="editarPacienteModal{{$paciente->id}}" tabindex="-1" role="dialog" aria-labelledby="editarPacienteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="editarPaciente" class="modal-title">Editar Paciente {{$paciente->name}} {{$paciente->apellido}}</h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="{{route('paciente.editarpaciente', $paciente->id)}}" method="POST">
                        <div id="modalBody" class="modal-body">
                            @csrf
                            @method('PUT')
                            <!-- Formulario -->
                                <input type="hidden" id="id" name="id">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" name="name" value = {{$paciente->name}} class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" id="apellido" name="apellido" value = {{$paciente->apellido}} class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" id="telefono" name="telefono" value = "" class="form-control" maxlength="100" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                                <div class="form-group">
                                    <label for="especialidadDescripcion">E-Mail</label>
                                    <input type="email" id="email" name="email" value = "" class="form-control" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="pacienteDirección">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" value = {{$paciente->direccion}} class="form-control" required maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="ciudad">Ciudad de Residencia</label>
                                        <select name="ciudad_id" id="ciudad_id" class="form-control">
                                            @foreach ($ciudades as $ciudad)
                                                <option value="{{$ciudad->id}}">{{$ciudad->ciudad}}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" name="actualizarMedico" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>