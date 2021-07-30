<?php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\Paciente;

$ciudades = Ciudad::all();
$generos = Genero::all();
$pacientes = Paciente::all();

?>

<!------------------------------------------------------- Remover Paciente ----------------------------------------------------------->

<!-- Modal Editar Especialidad-->
<div class="modal fade" id="removerPacienteModal<?php echo e($clienterol->user_id); ?>" tabindex="-1" role="dialog" aria-labelledby="removerPacienteModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="ClienteModal" class="modal-title">Remover Cliente</h4>
            </div>
            <!-- Modal Body -->
            <form action="<?php echo e(route('cliente.removerpaciente', $clienterol->user_id)); ?>" method="POST">
                <div id="modalBody" class="modal-body">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Formulario -->
                    <div class="form-group">
                        <label for="paciente">Paciente</label>
                        <select name="paciente_id" id="paciente_id" class="form-control">
                            <?php $__currentLoopData = $clientepacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clipaciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($clipaciente->paciente_id == $paciente->id && $clipaciente->cliente_id == $clienterol->user_id): ?>
                                        <option value="<?php echo e($paciente->id); ?>"><?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/removerpaciente.blade.php ENDPATH**/ ?>