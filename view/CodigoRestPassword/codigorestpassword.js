
function init()
{
    $('#codigoForm').on('submit', function(e)
    {
        getData(e);
    });
}


function getData(e)
{
    e.preventDefault();

    // Recogemos los datos del formulario
    id_usu = $('#id_usu').val();
    codigo = $('#codigo').val(); // El id_usu y el token los toma PHP por metodo GET de la URL
    token = $('#token').val();

    // Verificamos que no esten vacios
    if (id_usu == '' || codigo == '' || token == '')
    {
        swal({
            title: "Advertencia!",
            text: "Ingrese su codigo de verificacion.",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        validacionData(id_usu, codigo, token);
    }
}


function validacionData(id_usu, codigo, token)
{
    // Llamamos al controlador para verificar que el token si coincida para evitar inseguridad
    $.post('controller/usuario.php?op=verificarToken', {id_usu:id_usu, codigo:codigo, token:token}, function(data)
    {
        if (data.length>0)
        {
            // En el caso de que si encuentre el registro en la tabla de password_rest lo notificara
            // y redirigira a donde podra colocar la nueva contraseña
            swal({
                title: "Correcto!",
                text: "Codigo ingresado exitosamente.",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK"
            },
            function(isConfirm)
            {
                if (isConfirm)
                {
                    window.location.href = "new-password?user="+id_usu+"&token="+token;
                }
            });
        }else {
            swal({
                title: "Advertencia!",
                text: "El codigo no es correcto",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "OK"
            });
        }
    });
}


init();