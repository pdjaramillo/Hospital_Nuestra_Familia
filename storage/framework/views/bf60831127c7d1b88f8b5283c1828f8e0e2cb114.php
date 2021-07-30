<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1>Página principal del historial del paciente</h1>
    </div>
    <div class="container">
        <div class="card-body">

            <table id="tablaCitas" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Nombres</th>
                        <th>Cédula</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pacientesCliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clipacientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($paciente->id == $clipacientes->paciente_id): ?>
                                        <?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($paciente->id == $clipacientes->paciente_id): ?>
                                        <?php echo e($paciente->cedula); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($paciente->id == $clipacientes->paciente_id): ?>
                                        <div class="form-button text-center" class="d-inline">

                                            <!-- Formulario para ver historial paciente -->
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                onclick="window.location='<?php echo e(route('paciente.historial', $paciente->id)); ?>'">Historial</button>
                                        </div>
                                        <?php echo $__env->make('Modales/editarpaciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('Modales/crearcita', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/cliente/historial.blade.php ENDPATH**/ ?>