<?php
use Carbon\Carbon;
?>

<?php $__env->startSection('content'); ?>
    <div class="container text-center text-primary rounded">
        <h3>Historial Clínico</h3>
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
        
        <?php if(session()->has('messageError')): ?>
            <div class="alert alert-danger">
                <?php echo e(session()->get('messageError')); ?> <br>
                <?php $__currentLoopData = Session::get('fechas'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(Carbon::Create($fecha->fecha_cita)->format('H:i')); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        <?php endif; ?>

        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?> <br>
            </div>
        <?php endif; ?>


        <div class="card-body">

            <table id="tablaPaciente" class="table table-striped table-bordered" style="width:100%" data-page-length='5'>
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Nombres</th>
                        <th>Correo de contacto</th>
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
                                <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cita->paciente_id == $paciente->id): ?>
                                        <?php echo e($citas->fecha_cita); ?>

                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </td>
                            <td>
                                <?php echo e(Carbon::createFromDate($paciente->fechaNacimiento)->age); ?>

                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">
                                    
                                    <!-- Formulario para ver historial paciente -->
                                    <button type="button" class="btn btn-secondary btn-sm"onclick="window.location='<?php echo e(route('paciente.historial',$paciente->id)); ?>'">Historial</button>
                                    <!-- Formulario para crear control para paciente -->
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#controlModal<?php echo e($paciente->id); ?>">Control</button>
                                </div>
                            </td>
                        </tr>
                        <?php echo $__env->make('Modales/diagnosticarpaciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('Modales/crearcontrol', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/medico/control.blade.php ENDPATH**/ ?>