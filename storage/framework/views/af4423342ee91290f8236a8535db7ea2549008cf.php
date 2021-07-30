<?php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\Especialidades;

$ciudades = Ciudad::all();
$generos = Genero::all();
$especialidades = Especialidades::all();


?>

<!-------------------------------------------------------Editar Medico ----------------------------------------------------------->

        <!-- Modal Editar Especialidad-->
        <div class="modal fade" id="editarMedicoModal<?php echo e($medico->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editarmedicoModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="medicoModal" class="modal-title">Editar Medico <?php echo e($medico->name); ?> <?php echo e($medico->apellido); ?></h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="<?php echo e(route('admin.editarmed', $medico->id)); ?>" method="POST">
                        <div id="modalBody" class="modal-body">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <!-- Formulario -->
                                <input type="hidden" id="id" name="id">
                                <!--div class="form-group">                 Oculto estos campos pues no creo necesario mostarlos ya que son campos que por lo general no se modifican
                                    <label for="medicoNombre">Nombre</label>
                                    <input type="text" id="name" name="name" value = <?php echo e($medico->name); ?> class="form-control" required
                                        maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="especialidadDescripcion">Apellido</label>
                                    <input type="text" id="apellido" name="apellido" value = <?php echo e($medico->apellido); ?> class="form-control" required maxlength="100">
                                </div-->
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" id="email" name="email" value = <?php echo e($medico->email); ?> class="form-control" required maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" id="telefono" name="telefono" value = <?php echo e($medico->telefono); ?> class="form-control" required maxlength="100" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" value = <?php echo e($medico->direccion); ?> class="form-control" required maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="ciudad">Ciudad de Residencia</label>
                                        <select name="ciudad_id" id="ciudad_id" class="form-control">
                                            <?php $__currentLoopData = $ciudades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ciudad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ciudad->id); ?>"><?php echo e($ciudad->ciudad); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="especialidadDescripcion">Nueva Contraseña</label>
                                    <input type="password" id="password" name="password" value = "" class="form-control" maxlength="100">
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
        </div><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/editarmed.blade.php ENDPATH**/ ?>