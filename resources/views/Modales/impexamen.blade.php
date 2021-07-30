@php
use App\Models\Examen;
$examen = Examen::find($historia->examen_id);
@endphp
{{-- Estilo para imprimir contenido Modal --}}
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('css/imprimir.css') }} ">

<!------------------------------------------------------- Imprimir Examen ----------------------------------------------------------->

<!-- Modal Editar Especialidad-->
<div class="modal fade" id="examenModal{{ $historia }}" tabindex="-1" role="dialog" aria-labelledby="examenModal"
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
                        @csrf
                        {{-- @method('PUT') --}}
                        <!-- Formulario -->
                        <div class="form-group">
                            <div class="container">
                                <div class="text my-3">Fecha {{ $historia->fecha_historial }}</div>
                                <div class="form-group">
                                    <textarea id="my-textarea" class="form-control" name=""
                                        rows="5">{{ $examen->examen }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button id="btnPrintExamen" class="btn btn-primary"
                    onclick="printElement('printThisExamen')">Imprimir</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/imprimir.js') }}"></script>
