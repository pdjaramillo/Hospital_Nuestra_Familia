<?php $__env->startSection('content'); ?>
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Registro</h2>
                <p>Registrate y reserva tu cita con los mejores profesioales.</p>
            </div>
            <div class="container">
                <form action="<?php echo e(route('registro-create')); ?>" method="POST">
                    <div class="container">
                        <!-- Formulario -->
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" id="name" name="name" class="form-control" required maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" required maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="number">Cédula</label>
                            <input type="text" id="cedula" name="cedula" class="form-control" required maxlength="10"
                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" required maxlength="40">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" required maxlength="15">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" required
                                maxlength="200">
                        </div>
                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control" required
                                maxlength="11">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" required
                                maxlength="20">
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
                            <label for="genero">Género</label>
                            <select name="genero_id" id="genero_id" class="form-control">
                                <?php $__currentLoopData = $generos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($genero->id); ?>"><?php echo e($genero->genero); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="container">
                        <button type="submit" id="btnGuardarCliente" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/registro.blade.php ENDPATH**/ ?>