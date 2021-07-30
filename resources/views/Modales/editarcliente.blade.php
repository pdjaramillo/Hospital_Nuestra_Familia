@php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;

$ciudades = Ciudad::all();
$generos = Genero::all();

@endphp
<!-------------------------------------------------------Editar Cliente ----------------------------------------------------------->

        <!-- Modal Editar Especialidad-->
        <div class="modal fade" id="editarClienteModal{{$clienterol->user_id}}" tabindex="-1" role="dialog" aria-labelledby="editarClienteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="editarCliente" class="modal-title">Editar Cliente</h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="{{route('cliente.editarcliente', $clienterol->user_id)}}" method="POST">
                        <div id="modalBody" class="modal-body">
                            @csrf
                            @method('PUT')
                            <!-- Formulario -->
                                <input type="hidden" id="id" name="id">
                                <div class="form-group">
                                    <label for="clienteTelefono">Teléfono</label>
                                    <input type="text" id="telefono" name="telefono" value = {{$cliente->telefono}} class="form-control" maxlength="100" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                                <div class="form-group">
                                    <label for="clienteEmail">E-Mail</label>
                                    <input type="email" id="email" name="email" value = "" class="form-control" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="clienteDirección">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" value = {{$cliente->direccion}} class="form-control" required maxlength="100">
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
                            <button type="submit" name="actualizarCliente" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>