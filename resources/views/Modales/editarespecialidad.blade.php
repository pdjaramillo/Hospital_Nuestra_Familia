<!-------------------------------------------------------Editar Especialidad ----------------------------------------------------------->

        <!-- Modal Editar Especialidad-->
        <div class="modal fade" id="editarEspecialidadModal{{$especialidad->id}}" tabindex="-1" role="dialog" aria-labelledby="editarEspecialidadModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="editarEspecialidad" class="modal-title">Editar Especialidad</h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="{{route('editaresp', $especialidad->id)}}" method="POST">
                        <div id="modalBody" class="modal-body">
                            @csrf
                            @method('PUT')
                            <!-- Formulario -->
                                <input type="hidden" id="id" name="id">

                                <!--div class="form-group">
                                    <label for="especialidadId">Codigo</label>
                                    <input type="text" id="codigo_esp" name="codigo_esp" value = {{$especialidad->codigo_esp}} class="form-control" required
                                        maxlength="10">
                                </div-->
                                <div class="form-group">
                                    <label for="especialidadNombre">Especialidad</label>
                                    <input type="text" id="especialidad" name="especialidad" value = {{$especialidad->especialidad}} class="form-control" required
                                        maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="especialidadDescripcion">Descripción</label>
                                    <input type="text" id="descripcion" name="descripcion" value = {{$especialidad->descripcion}} class="form-control" required maxlength="100">
                                </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" name="actualizarEspecialidad" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>