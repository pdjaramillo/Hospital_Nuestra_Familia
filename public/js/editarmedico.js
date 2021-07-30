$(document).ready(function() {


    ///// Modal /////
    $(".modal-header").css("color", "white");   
    $(".modal-header").css("background-color", "#4e73df");
    

});

    $(document).ready(function(){
    $('.btnEditarMedico').on('click',function(){
        $('#editarMedicoModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#especialidad').val(data[0]);
            $('#descripcion').val(data[0]);
    });

});    

/*
    $("#btnespecialidadModal").on('click',function(){
        $('#especialidadModal').modal('show');
    });

    $("#btnEditarEspecialidad").on('click',function(){
        $('#editarEspecialidadModal').modal('show');
    });
    
*/