
function init()
{
    $('#formRest').on('submit', function(e)
    {
        resetPassword(e);
    });
}


function resetPassword(e)
{
    e.preventDefault();
    documento_usu = $('#documento_usu').val();

    // Verificamos que el campo si este completo
    if (documento_usu == '' || documento_usu == 0)
    {
        swal({
            title: "Advertencia!",
            text: "Ingrese el numero de documento",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        searchUser(documento_usu);
    }
}


function searchUser(documento_usu)
{
    // Ejecutamos el controlador para llamar al usuario que necesita el cambio de clave
    $.post('controller/usuario.php?op=selectUserReset', {documento_usu:documento_usu}, function(data)
    {
        // Verificamos que el usuario si exista en la base de datos
        if (data.length>0)
        {
            data = JSON.parse(data);

            // Recogemos los datos de esa persona
            id_usu = data.id_usu;
            nombre_usu = data.nombre_usu;
            apellido_usu = data.apellido_usu;
            correo_usu = data.correo_usu;

            sendMail(id_usu, nombre_usu, apellido_usu, correo_usu);
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


function sendMail(id_usu, nombre_usu, apellido_usu, correo_usu)
{
    let timerInterval;
    Swal.fire({
    title: 'Enviando correo de recuperación!',
    html: 'Se cerrara automaticamente en <b></b>.',
    timer: 2000,
    timerProgressBar: true,
    didOpen: () =>
    {
        // Ejecutamos el envio del correo electronico
        $.post('controller/usuario.php?op=sendMail', {id_usu:id_usu, nombre_usu:nombre_usu, apellido_usu:apellido_usu, correo_usu:correo_usu}, function(data)
        {
        });

        Swal.showLoading()
        timerInterval = setInterval(() => {
        const content = Swal.getHtmlContainer()
        if (content) {
            const b = content.querySelector('b')
            if (b) {
            b.textContent = Swal.getTimerLeft()
            }
        }
        }, 100)
    },
    willClose: () => {
        clearInterval(timerInterval)
    }
    }).then((result) =>
    {
        if (result.dismiss === Swal.DismissReason.timer)
        {
            // Mostramos alerta notificando el correo y redorigiendolo nuevamente al login
            swal({
                title: "Correcto!",
                text: "Por favor revise su correo",
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
        }
    })
}


init();