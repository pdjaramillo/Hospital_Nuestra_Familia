    @php
        use App\Models\Especialidades;
        use App\Models\User;
        
        $especialidades = Especialidades::all();
        $especialidad = Especialidades::select(['especialidad'])->get();
        $medicos = User::all();
        
    @endphp


    <!------------------------------------------------------------Crear Control--------------------------------------------------------->
    <div class="modal fade" id="controlModal{{ $paciente->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Control para {{ $paciente->name }}
                        {{ $paciente->apellido }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('crearcita', $paciente->id) }}" method="POST">
                        <div id="modalBody" class="modal-body">
                            <!-- Formulario -->
                            @csrf
                            <div class="form-group">
                                <label for="genero">Especialidad</label>
                                <select name="especialidad_id" id="especialidad_id" class="form-control">
                                    <option>Seleccione</option>
                                    @foreach ($especialidades as $especialidad)
                                        <option value="{{ $especialidad->id }}">{{ $especialidad->especialidad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="genero">Medico</label>
                                <select name="medico_id" id="medico_id" class="form-control">
                                </select>
                            </div>

                            <!-- Calendario pick-a-date -->

                            <div class="form-group" autocomplete="off">
                                <div class="col-25">
                                    <label for="fecha">Seleccione el día y la hora</label>
                                </div>
                                <div class="form-inline">
                                    <input name="fecha_cita" type="text" class="form-control datepicker" placeholder=""
                                        autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" id="btnGuardarCita" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#crearcita').modal('show');
        @endif
    </script>

    <!-- Calendario -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
        integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $.datetimepicker.setLocale('es');
        jQuery('.datepicker').datetimepicker({
            onGenerate: function(ct) {
                jQuery(this).find('.xdsoft_date.xdsoft_weekend')
                    .addClass('xdsoft_disabled');
            },
            defaultTime:'09:00',
            inline: false,
            allowTimes: [
                '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00',
                '16:00', '16:30', '17:00', '17:30', '18:00'
            ],
            minDate:new Date(),
        });

        //==== para lista dependiente
        var especialidadCombo = $('select[name="especialidad_id"]');
        var medicosCombo = $('select[name="medico_id"]');

        especialidadCombo.change(function() {
            var id = $(this).val();
            if (id) {
                //loader.show();
                medicosCombo.attr('disabled', 'disabled')

                $.ajax({
                    url: '{{ url('/medicosPorEspecialidad?especialidad_id=') }}' + id,
                    success: function(data) {
                        if (data.success) {
                            var s = '<option value="">---Seleccione--</option>';
                            data.medicos.forEach(function(row) {
                                s += '<option value="' + row.id + '">' + row.name + ' ' + row.apellido +'</option>'
                            })
                            medicosCombo.removeAttr('disabled')
                            medicosCombo.html(s);
                            //loader.hide();
                        }
                    }
                });
            }
        })
    </script>
