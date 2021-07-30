<?php $__env->startSection('content'); ?>

    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->

    <div class="container">

        <div>
            <h3>Administración de Medicos</h3>
        </div>
        
        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

            </div>
        <?php endif; ?>
        <div class="card-body">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nuevo Médico
            </button>

            <hr>

            <table id="tablaMedico" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Especialidad</th>
                        <th class="text-center">Acción</th>
                        <th class="text-center">Especialidades</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $medicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($medico->rol_id == 3): ?>
                            <tr>
                                <td><?php echo e($medico->cedula); ?></td>
                                <td><?php echo e($medico->name); ?></td>
                                <td><?php echo e($medico->apellido); ?></td>
                                <td>
                                    
                                    <?php $__currentLoopData = $especialidadMedico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $espemed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $especialidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especialidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($espemed->especialidad_id == $especialidad->id && $espemed->medico_id == $medico->id): ?>
                                                <?php echo e($especialidad->especialidad); ?> <br>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <div class="form-button text-center" class="d-inline">
                                        <!-- Formulario para editar medico -->

                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#editarMedicoModal<?php echo e($medico->id); ?>">Editar</button>

                                        <!-- Formulario para eliminar medico -->
                                        <form action="<?php echo e(route('admin.eliminarmed', $medico->id)); ?>" method="POST"
                                            class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>

                                
                                <td>
                                    <div class="form-button text-center" class="d-inline">
                                        
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#asigEspeModal<?php echo e($medico->id); ?>">
                                            +
                                        </button>

                                        
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#removerespe<?php echo e($medico->id); ?>">
                                            -
                                        </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php echo $__env->make('Modales/editarmed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('Modales/asignarespecialidad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('Modales/removerespecialidad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>

    <?php echo $__env->make('Modales/crearmedico', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




    <!-- Scripts JS y Bootstrap -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!--  Referencias a los JS de datatables -->

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Estilos Responsivos para las datables -->

    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    <script src="<?php echo e(asset('js/datatablemedico.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/administrador/adminmedicos.blade.php ENDPATH**/ ?>