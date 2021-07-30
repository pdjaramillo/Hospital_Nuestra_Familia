$(document).ready(function(){
    $('.btnEditarEspecialidad').on('click',function(){
        $('#editarMedicoModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#codigo_esp').val(data[0]);
            $('#especialidad').val(data[0]);
            $('#descripcion').val(data[0]);
            $('#id').val(data[0]);
            $('#codigo_esp').val(data[0]);
            $('#especialidad').val(data[0]);
            $('#descripcion').val(data[0]);
    });

});    
