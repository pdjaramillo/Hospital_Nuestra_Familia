<?php $__env->startSection('content'); ?>
    <!----------------------------------------------------- Data Tables ---------------------------------------------------------------------->
    <div class="container">
        <div>
            <h3>Administración de Clientes</h3>
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
        
        
        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

            </div>
        <?php endif; ?>

        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nuevo Cliente
            </button>
            <hr>
        </div>

        <table id="tablaClientes" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    
                    <th>Pacientes</th>
                    <th class="text-center">Acción</th>
                    <th class="text-center">Pacientes a cargo</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clienteroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clienterol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($clienterol->rol_id == 2): ?>
                        <tr>
                            <td>
                                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cliente->id == $clienterol->user_id): ?>
                                        <?php echo e($cliente->cedula); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cliente->id == $clienterol->user_id): ?>
                                        <?php echo e($cliente->name); ?> <?php echo e($cliente->apellido); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            
                            <td>
                                <?php $__currentLoopData = $clientepacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientepaciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($clientepaciente->cliente_id == $clienterol->user_id): ?>
                                        <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($paciente->id == $clientepaciente->paciente_id && $clientepaciente->cliente_id == $clienterol->user_id): ?>
                                                <?php echo e($paciente->name); ?> <?php echo e($paciente->apellido); ?> <br>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">

                                    <!-- Formulario para editar Cliente -->

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editarClienteModal<?php echo e($clienterol->user_id); ?>">Editar</button>

                                </div>
                            </td>
                            <td>
                                <div class="form-button text-center" class="d-inline">
                                    
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#asignarPacienteModal<?php echo e($clienterol->user_id); ?>">
                                        +
                                    </button> 

                                    
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#removerPacienteModal<?php echo e($clienterol->user_id); ?>">
                                        Quitar
                                    </button>

                                    
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearPacienteModal<?php echo e($clienterol->user_id); ?>">
                                        Nuevo
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php echo $__env->make('Modales/editarcliente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('Modales/asignarpaciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('Modales/removerpaciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('Modales/crearpaciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>

    <?php echo $__env->make('Modales/crearcliente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

    <script src="<?php echo e(asset('js/datatableclientes.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/cliente/admincliente.blade.php ENDPATH**/ ?>