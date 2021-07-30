@php
use App\Models\Receta;
    $receta = Receta::find($historia->receta_id);
@endphp
{{-- Estilo para imprimir contenido Modal --}}

<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('css/imprimir.css') }} ">

<!------------------------------------------------------- Imprimir Receta ----------------------------------------------------------->

<!-- Modal Editar Especialidad-->
<div class="modal fade" id="recetaModal{{ $historia }}" tabindex="-1" role="dialog" aria-labelledby="recetaModal"
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
                        @csrf
                        <div class="form-group">
                            <div class="text my-2">Fecha {{ $historia->fecha_historial }}</div>
                            <div class="form-group">
                                <div class="container my-2">
                                    <label for="receta">Receta</label>
                                    <textarea id="receta" class="form-control" name=""
                                        rows="5">{{ $receta->medicamentos }}</textarea>
                                </div>
                                <div class="container my-2">
                                    <label for="dosis">Dosis</label>
                                    <textarea id="dosis" class="form-control" name=""
                                        rows="5">{{ $receta->dosis }}</textarea>
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

{{-- script para imprimi --}}
<script src="{{ asset('js/imprimir.js') }}"></script>
