<?php
use App\Models\Receta;
    $receta = Receta::find($historia->receta_id);
?>


<link media="all" type="text/css" rel="stylesheet" href="<?php echo e(URL::asset('css/imprimir.css')); ?> ">

<!------------------------------------------------------- Imprimir Receta ----------------------------------------------------------->

<!-- Modal Editar Especialidad-->
<div class="modal fade" id="recetaModal<?php echo e($historia); ?>" tabindex="-1" role="dialog" aria-labelledby="recetaModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="recetaModal" class="modal-title">Reimprimir Receta</h4>
            </div>
            <!-- Modal Body -->
                <div id="printThis">
                    <div id="modalBody" class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="text my-2">Fecha <?php echo e($historia->fecha_historial); ?></div>
                            <div class="form-group">
                                <div class="container my-2">
                                    <label for="receta">Receta</label>
                                    <textarea id="receta" class="form-control" name=""
                                        rows="5"><?php echo e($receta->medicamentos); ?></textarea>
                                </div>
                                <div class="container my-2">
                                    <label for="dosis">Dosis</label>
                                    <textarea id="dosis" class="form-control" name=""
                                        rows="5"><?php echo e($receta->dosis); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button id="btnPrint" class="btn btn-primary" onclick="printElement('printThis')">Imprimir</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo e(asset('js/imprimir.js')); ?>"></script>
<?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/Modales/impreceta.blade.php ENDPATH**/ ?>