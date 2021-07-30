@include('administrador/superior')
{{-- <link rel="stylesheet"

    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"
    integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}



    <div class="form-group">
    <div class="col-25">
        <label for="fecha">Seleccione el día y la hora</label>
    </div>
    <div class="form-inline">
        <input id="fecha" type="text" class="form-control input-sm datepicker" placeholder="">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Confirmar</button>



<!-- Calendario -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $.datetimepicker.setLocale('es');
    $('#fecha').datetimepicker({
        inline: false,
        allowTimes: [
            '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00',
            '16:00', '16:30', '17:00', '17:30', '18:00'
        ]
    });
</script>

@include('/administrador/inferior')
