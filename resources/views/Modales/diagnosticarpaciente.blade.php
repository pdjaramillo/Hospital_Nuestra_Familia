@php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\EspecialidadMedico;
use App\Models\Especialidades;
use Carbon\Carbon;

$ciudades = Ciudad::all();
$generos = Genero::all();
$especialidades = Especialidades::all();
$especialidadMedico = EspecialidadMedico::all();

setlocale(LC_ALL, 'es_ES');
Carbon::setlocale('es');
$hoy = Carbon::now()->format('d-m-Y');

@endphp
<!-------------------------------------------------------Diagnostico Paciente ----------------------------------------------------------->

<!-- Modal Editar Especialidad-->
<div class="modal fade" id="diagnosticarPacienteModal{{ $paciente->id }}" tabindex="-1" role="dialog"
    aria-labelledby="diagnosticarPacienteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="editarPaciente" class="modal-title">Diagnosticar Paciente {{ $paciente->name }}
                    {{ $paciente->apellido }}</h4>
            </div>
            <!-- Modal Body -->
            <form action="{{ route('medico.diagnostico', $paciente->id) }}" method="POST">
                <div id="modalBody" class="modal-body">
                    @csrf
                    @method('PUT')
                    <!-- Formulario -->
                    <div class="form-group">
                        <label for="fecha_historial">Fecha</label>
                        <input type="text" id="telefono" name="fecha_historial" value={{ $hoy }}
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Diagnóstico</label>
                        <textarea id="diagnostico" class="form-control" name="diagnostico" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Receta</label>
                        <div class="container">
                            <label for="my-textarea">Medicamentos</label>
                            <textarea id="medicamentos" class="form-control" name="medicamentos" rows="3" required></textarea>
                            <label for="my-textarea">Dosis</label>
                            <textarea id="dosis" class="form-control" name="dosis" rows="3" required></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Examen</label>
                        <textarea id="examen" class="form-control" name="examen" rows="3"></textarea>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" name="diagnosticoPaciente" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
