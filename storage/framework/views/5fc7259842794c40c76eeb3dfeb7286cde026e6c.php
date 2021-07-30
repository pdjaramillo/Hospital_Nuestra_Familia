<?php $__env->startSection('content'); ?>
    <?php
    use Carbon\Carbon;
    ?>
    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->
    <div class="container">
        <div>
            <h3>Administración de Pacientes</h3>
        </div>

        
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
            <!-- Button trigger modal -->
            
            <hr>
            <table id="tablaPaciente" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Correo</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($paciente->cedula); ?></td>
                            <td><?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?></td>
                            <td><?php echo e($paciente->fechaNacimiento); ?></td>
                            <td>
                                <?php echo e($paciente->email); ?>

                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">
                                    <!-- Formulario para editar paciente -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editarPacienteModal<?php echo e($paciente->id); ?>">Editar</button>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#citaModal<?php echo e($paciente->id); ?>">Nueva Cita</button>
                                    <!-- Formulario para eliminar paciente -->
                                    <form action="<?php echo e(route('paciente.eliminarpaciente', $paciente->id)); ?>" method="POST"
                                        class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php echo $__env->make('Modales/editarpaciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('Modales/crearcita', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/paciente/adminpaciente.blade.php ENDPATH**/ ?>