<?php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\Especialidades;

$ciudades = Ciudad::all();
$generos = Genero::all();
$especialidades = Especialidades::all();


?>

<!------------------------------------------------------- Asignar Especialidad ----------------------------------------------------------->

        <!-- Modal Editar Especialidad-->
        <div class="modal fade" id="asigEspeModal<?php echo e($medico->id); ?>" tabindex="-1" role="dialog" aria-labelledby="asigEspeModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="medicoModal" class="modal-title">Asignar Especialiad a <?php echo e($medico->name); ?> <?php echo e($medico->apellido); ?></h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="<?php echo e(route('admin.asignarespe', $medico->id)); ?>" method="POST">
                        <div id="modalBody" class="modal-body">
                            <?php echo csrf_field(); ?>
                            
                            <!-- Formulario -->
                            <div class="form-group">
                                <label for="especialidad">Especialidad</label>
                                <select name="especialidad_id" id="especialidad_id" class="form-control">
                                    <?php $__currentLoopData = $especialidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especialidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($especialidad->id); ?>"><?php echo e($especialidad->especialidad); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        </div><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/asignarespecialidad.blade.php ENDPATH**/ ?>