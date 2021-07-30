<?php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\Paciente;

$ciudades = Ciudad::all();
$generos = Genero::all();
$pacientes = Paciente::all();


?>

<!------------------------------------------------------- Asignar Paciente ----------------------------------------------------------->

        <!-- Modal Editar Especialidad-->
        <div class="modal fade" id="asignarPacienteModal<?php echo e($clienterol->user_id); ?>" tabindex="-1" role="dialog" aria-labelledby="asignarPacienteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="clienteModal" class="modal-title">Asignar Paciente</h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="<?php echo e(route('cliente.asignarpaciente', $clienterol->user_id)); ?>" method="POST">
                        <div id="modalBody" class="modal-body">
                            <?php echo csrf_field(); ?>
                            
                            <!-- Formulario -->
                            <div class="form-group">
                                <label for="pacientes">Paciente</label>
                                <select name="paciente_id" id="paciente_id" class="form-control">
                                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($paciente->id); ?>"><?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        </div><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/asignarpaciente.blade.php ENDPATH**/ ?>