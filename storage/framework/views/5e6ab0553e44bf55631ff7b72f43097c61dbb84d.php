<?php
use Carbon\Carbon;

$hora = new Carbon();
setlocale(LC_ALL, 'es_ES');
Carbon::setlocale('es');
$hoy = Carbon::now()->isoformat(' dddd D  \d\e MMMM \d\e\l YYYY');
$fin = Carbon::now()->addDay(6)->isoformat(' dddd D  \d\e MMMM \d\e\l YYYY');

?>

<?php $__env->startSection('content'); ?>
    <div class="container text-center text-primary rounded">
        <h1>Bienvenido</h1>
        <h4>Estas son las Citas desde el <?php echo e($hoy); ?></h4>
        <h4>hasta <?php echo e($fin); ?></h4>
    </div>

    <hr>
    <div class="container">
        <div class="card-body">

            <table id="tablaCitasMedico" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <!--th>id</th-->
                        <th>Hora de atención</th>
                        <th>Nombres del Ciente</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            setlocale(LC_ALL, 'es_ES');
                            Carbon::setlocale('es');
                            $hora = Carbon::create($cita->fecha_cita)->isoformat('dddd - HH:mm');
                            $citaHoy = Carbon::create($cita->fecha_cita)->format('d-m-Y h:i');
                            $hoy = Carbon::now()->format('d-m-Y');
                            $fin = Carbon::now()
                                ->addDay(6)
                                ->format('d-m-Y');
                            $fechas = Carbon::create($cita->fecha_cita)->between($hoy, $fin);
                        ?>
                        <?php if($fechas == Carbon::create($cita->fecha_cita)->format('d-m-Y')): ?>
                            <tr>
                                <td>
                                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($paciente->id == $cita->paciente_id): ?>
                                            <h3 class="display-6"><span class="badge badge-secondary"><?php echo e($hora); ?></span>
                                            </h3>
                                            
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($paciente->id == $cita->paciente_id): ?>
                                            <?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?> <br>
                                            <!--<?php echo e(Carbon::create($cita->fecha_cita)->format('d-m-Y')); ?>-->
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($paciente->id == $cita->paciente_id): ?>
                                            <?php if($cita->estado_cita == 'Activa'): ?>
                                                <!-- Formulario para ver historial paciente -->
                                                <button type="button" class="btn btn-success btn-sm"
                                                    onclick="window.location='<?php echo e(route('paciente.atencioncita', [$paciente->id, $cita->id])); ?>'">Iniciar</button>
                                            <?php endif; ?>
                                            <?php if($cita->estado_cita != 'Activa'): ?>
                                                <?php echo e($cita->estado_cita); ?> <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Calendario -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
        integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('js/datatablecitasmedico.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/medico/gesmedico.blade.php ENDPATH**/ ?>