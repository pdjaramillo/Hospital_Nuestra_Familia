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
        <div>
            <h3>Aquí puede administrar las citas</h3>
        </div>

        <div class="card-body">

            <table id="tablaCitas" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Paciente</th>
                        <th>Especialidad</th>
                        <th>Medico Tratante</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            setlocale(LC_ALL, 'es_ES');
                            Carbon::setlocale('es');
                            // $fecha = Carbon::create($cita->fecha_cita)->isoformat(' dddd D  \d\e MMMM \d\e\l YYYY \a \l\a\s h:mm a');
                            $fecha = Carbon::create($cita->fecha_cita)->format(' m-d \a \l\a\s h:i a');
                        ?>
                        <tr>
                            <!--td><?php echo e($cita->id); ?></td-->
                            <td>
                                <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cita->paciente_id == $paciente->id): ?>
                                        <?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $especialidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especialidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cita->especialidad_id == $especialidad->id): ?>
                                        <?php echo e($especialidad->especialidad); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $medicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cita->medico_id == $medico->id): ?>
                                        <?php echo e($medico->name); ?> <?php echo e($medico->apellido); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php echo e($fecha); ?>

                            </td>
                            <td>
                                <?php echo e($cita->estado_cita); ?>

                            </td>
                            <td>
                                <div class="form-button" class="d-inline">
                                    <form action="<?php echo e(route('completarcita', $cita->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-success btn-sm">OK</button>
                                    </form>
                                    <form action="<?php echo e(route('cancelarcita', $cita->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <button type="button" class="btn btn-secondary btn-sm my-4"
            onclick="window.location='<?php echo e(url('admins')); ?>'">Solicitudes</button>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/administrador/admincitas.blade.php ENDPATH**/ ?>