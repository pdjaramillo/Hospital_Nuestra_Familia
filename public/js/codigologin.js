$("#formlogin").submit(function(e){
    e.preventDefault();
    var usuario = $.trim($('#usuario').val());
    var password = $.trim($('#password').val());
    if (usuario.length == "" || password.length == ""){
        swal.fire({
            type: 'warning',
            title: 'Debe ingresar usuario o password',
        });
        return false;
    }else{
        $.ajax({
            url: 'cliente', // pagina logueado
            type: 'POST',
            dataType: 'json',
            data: {usuario:usuario, password:password},
            success: function(data){
                if (data=="null"){
                    swal.fire({
                        type: 'error',
                        title: 'Usuario y/o password incorrectos'
                    });
                }else{
                    swal.fire({
                        type: 'success',
                        title: 'Conexión exitosa',
                        confirmButtonColor:'#3985d6',
                        confirmButtonText:'Ingresar',
                    }).then((result) => {
                        window.location.href = "administrador";
                    })
                }
            }
        })
    }
});
