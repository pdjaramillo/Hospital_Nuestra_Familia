<!------------------------------------------------------------Crear Especialidad--------------------------------------------------------->

        <!-- Modal Ingresar Especialidad-->
        <div class="modal fade" id="especialidadModal" tabindex="-1" role="dialog" aria-labelledby="especialidadModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 id="especialidadModal" class="modal-title">Nueva Especialidad</h4>
                    </div>
                    <!-- Modal Body -->
                    <form action="{{ route('crearesp') }}" method="POST">
                        <div id="modalBody" class="modal-body">
                            <!-- Formulario -->
                                @csrf
                                <div class="form-group">
                                    <label for="especialidadNombre">Especialidad</label>
                                    <input type="text" id="especialidadNombre" name="especialidad" class="form-control" required
                                        maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="especialidadDescripcion">Descripción</label>
                                    <input type="text" id="especialidadDescripcion" name="descripcion" class="form-control"
                                        required maxlength="100">
                                </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" id="btnGuardarEspecialidad" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>