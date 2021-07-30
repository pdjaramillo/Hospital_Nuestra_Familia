
<?php $__env->startSection('content'); ?>
    <?php
    use Carbon\Carbon;
    ?>

    <div class="container">
        <h1>Historial</h1>
    </div>

    <div class="container">
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value=<?php echo e($paciente->name); ?>

                            readonly>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"
                            value=<?php echo e($paciente->apellido); ?> readonly>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" name="fechaNacimiento" id="fechaNacimiento"
                            value=<?php echo e($paciente->fechaNacimiento); ?> readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="edad">Edad</label>
                        <input type="text" class="form-control" name="edad" id="edad"
                            value=<?php echo e(Carbon::createFromDate($paciente->fechaNacimiento)->age); ?> readonly>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="clienteContacto">Nombre del Cliente</label>
                        <input type="text" class="form-control" id="clienteContacto" readonly
                            value='<?php echo e($cliente->name); ?> <?php echo e($cliente->apellido); ?>'>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="emailContacto">Correo de contacto</label>
                        <input type="text" class="form-control" id="emailContacto" readonly value=<?php echo e($cliente->email); ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="historial">Historial</label>
                    <div class="card-body">



                        <table id="tablaPaciente" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre Médico</th>
                                    <th>Especialidad</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $historias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($historia->fecha_historial); ?></td>
                                        <td>
                                            <?php $__currentLoopData = $medicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($historia->medico_id == $medico->id): ?>
                                                    <?php echo e($medico->name); ?> <?php echo e($medico->apellido); ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $especialidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especialidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($historia->especialidad_id == $especialidad->id): ?>
                                                    <?php echo e($especialidad->especialidad); ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <!-- Imprimir recetas y exámenes -->
                                            <div class="form-button" class="d-inline">
                                                
                                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                                    data-target="#diagnosticoModal<?php echo e($historia); ?>">
                                                    <i class="fal fa-user-md-chat" title="Ver detalle de consulta"></i>
                                                </button>
                                                
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#recetaModal<?php echo e($historia); ?>">
                                                    <i class="fal fa-prescription-bottle-alt" title="Ver detalle de receta"></i>
                                                </button>
                                                
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#examenModal<?php echo e($historia); ?>">
                                                    <i class="fal fa-file-medical" title="Ver detalle de examen"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <?php echo $__env->make('Modales/impreceta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('Modales/impexamen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php echo $__env->make('Modales/impdiagnostico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                        <hr>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/paciente/historial.blade.php ENDPATH**/ ?>