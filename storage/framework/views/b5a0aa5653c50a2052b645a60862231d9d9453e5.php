<?php $__env->startSection('content'); ?>
    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->

    <div class="container">

        <div>
            <h3>Administración de especialidades</h3>
        </div>

        <div class="card-body">

            <button type="button" class="btn btn-primary btnespecialidadModal" data-toggle="modal"
                data-target="#especialidadModal">
                Nueva Especialidad
            </button>

            <hr>

            <table id="tablaEspecialidad" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <!--th>Código</th-->
                        <th>Especialidad</th>
                        <th>Descripción</th>
                        
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $especialidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especialidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <!--td><?php echo e($especialidad->id); ?></td-->
                            <!--td><?php echo e($especialidad->codigo_esp); ?></td-->
                            <td><?php echo e($especialidad->especialidad); ?></td>
                            <td><?php echo e($especialidad->descripcion); ?></td>
                            
                            <td>
                                <div class="form-button" class="d-inline">
                                    <!-- Formulario para editar especialidad -->

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editarEspecialidadModal<?php echo e($especialidad->id); ?>">Editar</button>

                                    <!-- Formulario para eliminar especialidad -->
                                    <form action="<?php echo e(route('eliminaresp', $especialidad->id)); ?>" method="POST"
                                        class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        <?php echo $__env->make('Modales/editarespecialidad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>

    <?php echo $__env->make('Modales/crearespecialidad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/administrador/adminespecialidades.blade.php ENDPATH**/ ?>