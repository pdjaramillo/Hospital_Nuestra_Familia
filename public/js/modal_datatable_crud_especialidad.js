$(document).ready(function() {
    // DataTable
    var table = $('#tablaEspecialidad').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por páginas",
        "zeroRecords": "No se encuentra registro",
        "info": "Mostrando _PAGE_ of _PAGES_ páginas",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "search": "Buscar",
        "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
             }
        }
    });

    ///// Modal /////
    $(".modal-header").css("color", "white");   
    $(".modal-header").css("background-color", "#4e73df");
    

});

    $(document).ready(function(){
    $('.btnEditarEspecialidad').on('click',function(){
        $('#editarEspecialidadModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#codigo_esp').val(data[0]);
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