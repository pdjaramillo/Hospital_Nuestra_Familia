<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Página principal del tablero del administrator</h2>
        <p>Aquí podrá gestionar todas las categorías del sistema como por ejemplo.<br>
            <br>
            - Gestionar Especialidades<br>
            - Gestionar Médicos<br>
            - Gestionar Citas<br>
            - Gestionar Pacientes<br>
        </p>

        <div class="card-body">

            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Notificaciones</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $notificaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notificacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($notificacion->estado_solicitud == true): ?>
                            <tr>
                                <td>
                                    <?php echo e($notificacion->notificacion); ?>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                    onclick="window.location='<?php echo e(route('admin.citas', $notificacion->id)); ?>'">Atendida</button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <button type="button" class="btn btn-secondary btn-sm"
            onclick="window.location='<?php echo e(route('admin.citas')); ?>'">Revisar</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/administrador/index.blade.php ENDPATH**/ ?>