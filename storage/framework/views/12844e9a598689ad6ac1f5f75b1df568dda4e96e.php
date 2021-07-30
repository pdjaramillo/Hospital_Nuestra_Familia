<?php ////// Con este código se puede usar sentencias PHP dentro de HTML
use App\Models\Ciudad;
use App\Models\Genero;

$ciudades = Ciudad::all();
$generos = Genero::all();

?>
<!-------------------------------------------------------Editar Cliente ----------------------------------------------------------->

        <!-- Modal Editar Especialidad-->
        <div class="modal fade" id="editarClienteModal<?php echo e($clienterol->user_id); ?>" tabindex="-1" role="dialog" aria-labelledby="editarClienteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="editarCliente" class="modal-title">Editar Cliente</h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="<?php echo e(route('cliente.editarcliente', $clienterol->user_id)); ?>" method="POST">
                        <div id="modalBody" class="modal-body">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <!-- Formulario -->
                                <input type="hidden" id="id" name="id">
                                <div class="form-group">
                                    <label for="clienteTelefono">Teléfono</label>
                                    <input type="text" id="telefono" name="telefono" value = <?php echo e($cliente->telefono); ?> class="form-control" maxlength="100" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                                <div class="form-group">
                                    <label for="clienteEmail">E-Mail</label>
                                    <input type="email" id="email" name="email" value = "" class="form-control" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="clienteDirección">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" value = <?php echo e($cliente->direccion); ?> class="form-control" required maxlength="100">
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
                            <button type="submit" name="actualizarCliente" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/editarcliente.blade.php ENDPATH**/ ?>