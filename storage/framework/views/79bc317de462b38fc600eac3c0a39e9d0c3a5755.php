<?php
use Carbon\Carbon;
?>

<?php $__env->startSection('content'); ?>
    <div class="container text-center text-primary rounded">
        <h3>Información del Paciente</h3>
    </div>
    <hr>
    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->
    <div class="container">

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

            </div>
        <?php endif; ?>


        <div class="card-body">

            <table id="tablaPaciente" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Nombres</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Edad</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <!--td><?php echo e($paciente->id); ?></td-->
                            <td><?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?></td>
                            <td>
                                <?php echo e($paciente->fechaNacimiento); ?>

                            </td>
                            <td>
                                <?php echo e(Carbon::createFromDate($paciente->fechaNacimiento)->age); ?>

                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">
                                    <!-- Formulario para editar paciente -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editarPacienteModal<?php echo e($paciente->id); ?>">Editar</button>
                                </div>
                            </td>
                        </tr>
                        <?php echo $__env->make('Modales/editarpaciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/medico/infopaciente.blade.php ENDPATH**/ ?>