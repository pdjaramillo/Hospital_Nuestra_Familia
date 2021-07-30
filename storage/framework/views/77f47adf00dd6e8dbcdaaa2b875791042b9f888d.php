
<link media="all" type="text/css" rel="stylesheet" href="<?php echo e(URL::asset('css/imprimir.css')); ?> ">

<!------------------------------------------------------- Imprimir Diagnostico ----------------------------------------------------------->

<!-- Modal Editar Especialidad-->
<div class="modal fade" id="diagnosticoModal<?php echo e($historia); ?>" tabindex="-1" role="dialog" aria-labelledby="diagnosticoModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="diagnosticoModal" class="modal-title">Diagnóstico</h4>
            </div>
            <!-- Modal Body -->
            <div id="printThis">
                <form action="" method="GET">
                    <div id="modalBody" class="modal-body">
                        <?php echo csrf_field(); ?>
                        
                        <!-- Formulario -->
                        <div class="form-group">
                            <div class="text my-3">Fecha <?php echo e($historia->fecha_historial); ?></div>
                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <textarea id="observaciones" class="form-control" name=""
                                    rows="5"><?php echo e($historia->observaciones); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="diagnostico">Diagnostico</label>
                                <textarea id="diagnostico" class="form-control" name=""
                                    rows="5"><?php echo e($historia->diagnostico); ?></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/impdiagnostico.blade.php ENDPATH**/ ?>