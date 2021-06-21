
function init()
{
    $('#newUserForm').on('submit', function(e)
    {
        getData(e);
    });
}


function getData(e)
{
    e.preventDefault();

    // Recogemos los datos del formulario
    var direccion_usu = $('#direccion_usu').val();
    var telefono_usu = $('#telefono_usu').val();
    var pass_usu = $('#pass1').val();
    var pass2 = $('#pass2').val();

    // Verificamos que no esten vacios
    if (direccion_usu == '' || telefono_usu == '' || pass_usu == '' || pass2 == '')
    {
        swal({
            title: "Advertencia!",
            text: "Complete todos los campos...",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        verificarPassword(pass_usu, pass2);
    }
}


function verificarPassword(pass_usu, pass2)
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
        verificarUser(pass_usu);
    }
}


function verificarUser(pass_usu)
{
    var token = $('#temporalPassword').val(); // El token lo toma PHP por metodo GET de la URL
    var documento_usu = $('#documento_usu').val(); // El documento_usu lo toma PHP por metodo GET de la URL

    // Verificamos que el usuario si exista en la base de datos
    $.post('controller/usuario.php?op=verifyData', {token:token, documento_usu:documento_usu}, function(data)
    {
        if (data.length>0)
        {
            data = JSON.parse(data);

            // Recogemos los datos del formulario
            var direccion_usu = $('#direccion_usu').val();
            var telefono_usu = $('#telefono_usu').val();

            addDataUser(data.documento_usu, direccion_usu, telefono_usu, pass_usu);
        }else {
            swal({
                title: "Advertencia!",
                text: "Este usuario no existe...",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "OK"
            });
        }
    });
}


function addDataUser(documento_usu, direccion_usu, telefono_usu, pass_usu)
{
    // Recogemos los datos del formulario
    var direccion_usu = $('#direccion_usu').val();
    var telefono_usu = $('#telefono_usu').val();

    // Llamamos al controlador que hara la actualizacion de la contraseña en la base de datos
    $.post('controller/usuario.php?op=addDataUser', {documento_usu:documento_usu, direccion_usu:direccion_usu, telefono_usu:telefono_usu, pass_usu:pass_usu}, function(data)
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