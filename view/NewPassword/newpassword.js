
function init()
{
    $('#restPassForm').on('submit', function(e)
    {
        getData(e);
    });
}


function getData(e)
{
    e.preventDefault();

    // Recogemos los datos del formulario
    pass_usu = $('#pass1').val();
    pass2 = $('#pass2').val();

    id_usu = $('#id_usu').val(); // El id_usu lo toma PHP por metodo GET de la URL

    // Verificamos que no esten vacios
    if (pass_usu == '' || pass2 == '')
    {
        swal({
            title: "Advertencia!",
            text: "Complete todos los campos...",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        validacionPassword(pass_usu, pass2, id_usu);
    }
}


function validacionPassword(pass_usu, pass2, id_usu)
{
    // Verificamos que las contraseñas sean iguales
    if (pass_usu != pass2)
    {
        swal({
            title: "Advertencia!",
            text: "Las contraseñas ingresadas no son iguales.",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        restPassword(id_usu, pass_usu);
    }
}


function restPassword(id_usu, pass_usu)
{
    // Llamamos al controlador que hara la actualizacion de la contraseña en la base de datos
    $.post('controller/usuario.php?op=restPassword', {id_usu:id_usu, pass_usu:pass_usu}, function(data)
    {
        // Cuando haga la actualizacion lo notificara al usuario y lo enviara a iniciar sesion
        swal({
            title: "Correcto!",
            text: "Contraseña cambiada exitosamente.",
            type: "success",
            confirmButtonClass: "btn-success",
            confirmButtonText: "OK"
        },
        function(isConfirm)
        {
            if (isConfirm)
            {
                window.location.href = "login";
            }
        });
    });
}


init();