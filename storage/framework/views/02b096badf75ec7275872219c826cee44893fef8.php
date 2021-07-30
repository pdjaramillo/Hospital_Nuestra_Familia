<?php $__env->startSection('content'); ?>
    <?php
    use Carbon\Carbon;

    ?>

    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->

    <div class="container">
        
        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

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
        <div>
            <h3>Aquí puede administrar sus pacientes <?php echo e($cliente->name); ?></h3>
        </div>

        <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#exampleModal<?php echo e($cliente->id); ?>">
                Nuevo Paciente
            </button>
        </div>

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
                                            <!-- Formulario para editar paciente -->
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#editarPacienteModal<?php echo e($paciente->id); ?>">Editar</button>
                                            <!-- Formulario para crear cita para paciente -->
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
    <?php echo $__env->make('Modales/crearpacienteCliente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/cliente/citas.blade.php ENDPATH**/ ?>