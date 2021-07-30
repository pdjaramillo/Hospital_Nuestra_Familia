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
            <h3>Aquí puede ver las citas de todos sus pacientes <?php echo e($cliente->name); ?></h3>
        </div>

        

        <div class="card-body">

            <table id="tablaCitas" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Nombres</th>
                        <th>Cédula</th>
                        <th>Próximas Citas</th>
                        <th>Cancelar Cita</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $pacientesCliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clipacientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cita->paciente_id == $clipacientes->paciente_id && $cita->estado_cita == 'Activa'): ?>
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
                                        
                                            <?php if($cita->estado_cita == 'Activa'): ?>
                                                <?php if($cita->paciente_id == $clipacientes->paciente_id): ?>
                                                    <?php
                                                        setlocale(LC_ALL, 'es_ES');
                                                        Carbon::setlocale('es');
                                                        $fecha = Carbon::create($cita->fecha_cita)->isoformat(' dddd D  \d\e MMMM \d\e\l YYYY \a \l\a\s h:mm a');
                                                    ?>
                                                    <?php $__currentLoopData = $medicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($medico->id == $cita->medico_id): ?>
                                                            <?php
                                                                $medNombre = $medico->name;
                                                                $medApellido = $medico->apellido;
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $__currentLoopData = $especialidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especialidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($especialidad->id == $cita->especialidad_id): ?>
                                                            <?php
                                                                $espe = $especialidad->especialidad;
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    *<?php echo e($fecha); ?><br><?php echo e($medNombre); ?>

                                                    <?php echo e($medApellido); ?><br><?php echo e($espe); ?> <br>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('cliente.solicitarcancelarcita', $cita->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-success btn-sm">Solicitar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
    <?php echo $__env->make('Modales/crearpacienteCliente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/cliente/pacientescliente.blade.php ENDPATH**/ ?>