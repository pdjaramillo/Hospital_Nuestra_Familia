<?php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Historial;

?>
<!-------------------------------------------------------Historial Paciente ----------------------------------------------------------->

        <!-- Modal historial Paciente-->
        <div class="modal fade" id="historialPacienteModal<?php echo e($paciente->id); ?>" tabindex="-1" role="dialog" aria-labelledby="historialPacienteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="editarPaciente" class="modal-title">Historial Paciente <?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?></h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="<?php echo e(route('editarpaciente', $paciente->id)); ?>" method="POST">
                        <div id="modalBody" class="modal-body">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <!-- Formulario -->
                                <input type="hidden" id="id" name="id">
                                <div class="form-group">
                                    <label for="pacienteTelefono">Teléfono</label>
                                    <input type="text" id="telefono" name="telefono" value = <?php echo e($paciente->telefono); ?> class="form-control" maxlength="100" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                                <div class="form-group">
                                    <label for="especialidadDescripcion">E-Mail</label>
                                    <input type="email" id="email" name="email" value = "" class="form-control" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="pacienteDirección">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" value = <?php echo e($paciente->direccion); ?> class="form-control" required maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="ciudad">Ciudad de Residencia</label>
                                        <select name="ciudad_id" id="ciudad_id" class="form-control">
                                            <?php $__currentLoopData = $ciudades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ciudad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ciudad->id); ?>"><?php echo e($ciudad->ciudad); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" name="historial" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/historialpaciente.blade.php ENDPATH**/ ?>