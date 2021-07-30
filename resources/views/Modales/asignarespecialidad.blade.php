@php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\Especialidades;

$ciudades = Ciudad::all();
$generos = Genero::all();
$especialidades = Especialidades::all();


@endphp

<!------------------------------------------------------- Asignar Especialidad ----------------------------------------------------------->

        <!-- Modal Editar Especialidad-->
        <div class="modal fade" id="asigEspeModal{{$medico->id}}" tabindex="-1" role="dialog" aria-labelledby="asigEspeModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="medicoModal" class="modal-title">Asignar Especialiad a {{$medico->name}} {{$medico->apellido}}</h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="{{route('admin.asignarespe', $medico->id)}}" method="POST">
                        <div id="modalBody" class="modal-body">
                            @csrf
                            {{-- @method('PUT') --}}
                            <!-- Formulario -->
                            <div class="form-group">
                                <label for="especialidad">Especialidad</label>
                                <select name="especialidad_id" id="especialidad_id" class="form-control">
                                    @foreach ($especialidades as $especialidad)
                                        <option value="{{$especialidad->id}}">{{$especialidad->especialidad}}</option>
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