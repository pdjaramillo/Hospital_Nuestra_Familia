$(document).ready(function() {
    // DataTable
    var table = $('#tablaCitasMedico').DataTable( {
        // rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        "order":[[0,"asc"]],
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
        },
        columnDefs: [
            { width: '25%', targets: 0,
            }
        ],
        fixedColumns: true,
        pageLength: 12
    });

    ///// Modal /////
    $(".modal-header").css("color", "white");   
    $(".modal-header").css("background-color", "#4e73df");
    

});