<?php
use App\Models\Examen;
    $examen = Examen::find($historia->examen_id);
?>

<link media="all" type="text/css" rel="stylesheet" href="<?php echo e(URL::asset('css/imprimir.css')); ?> ">

<!------------------------------------------------------- Imprimir Examen ----------------------------------------------------------->

<!-- Modal Editar Especialidad-->
<div class="modal fade" id="examenModal<?php echo e($historia); ?>" tabindex="-1" role="dialog" aria-labelledby="examenModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="examenModal" class="modal-title">Reimprimir Examen</h4>
            </div>
            <!-- Modal Body -->
            <div id="printThisExamen">
                <form action="" method="GET">
                    <div id="modalBody" class="modal-body">
                        <?php echo csrf_field(); ?>
                        
                        <!-- Formulario -->
                        <div class="form-group">
                            <div class="text my-3">Fecha <?php echo e($historia->fecha_historial); ?></div>
                            <div class="form-group">
                                <textarea id="my-textarea" class="form-control" name=""
                                    rows="5"><?php echo e($examen->examen); ?></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button id="btnPrintExamen" class="btn btn-primary" onclick="printElement('printThisExamen')">Imprimir</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('js/imprimir.js')); ?>"></script>
<?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/impexamen.blade.php ENDPATH**/ ?>