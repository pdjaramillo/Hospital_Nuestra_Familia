@php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\Paciente;

$ciudades = Ciudad::all();
$generos = Genero::all();
$pacientes = Paciente::all();

@endphp

<!------------------------------------------------------- Remover Paciente ----------------------------------------------------------->

<!-- Modal Editar Especialidad-->
<div class="modal fade" id="removerPacienteModal{{ $clienterol->user_id }}" tabindex="-1" role="dialog" aria-labelledby="removerPacienteModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="ClienteModal" class="modal-title">Remover Cliente</h4>
            </div>
            <!-- Modal Body -->
            <form action="{{ route('cliente.removerpaciente', $clienterol->user_id) }}" method="POST">
                <div id="modalBody" class="modal-body">
                    @csrf
                    {{-- @method('PUT') --}}
                    <!-- Formulario -->
                    <div class="form-group">
                        <label for="paciente">Paciente</label>
                        <select name="paciente_id" id="paciente_id" class="form-control">
                            @foreach ($clientepacientes as $clipaciente)
                                @foreach ($pacientes as $paciente)
                                    @if ($clipaciente->paciente_id == $paciente->id && $clipaciente->cliente_id == $clienterol->user_id)
                                        <option value="{{ $paciente->id }}">{{ $paciente->name }} {{ $paciente->apellido }}
                                        </option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" name="actualizarCliente" class="btn btn-primary">Remover</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
