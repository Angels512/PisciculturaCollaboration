
const inputs = document.querySelectorAll('#restPassForm input');

// Expresiones regulares
const expresiones = {
    pass: /^.{8,12}$/
};

inputs.forEach((input) =>
{
    input.addEventListener('keyup', validateForm);
    input.addEventListener('blur', validateForm);
});



function init()
{
    $('#restPassForm').on('submit', function(e)
    {
        getData(e);
    });
}



function validateForm(e)
{
    switch (e.target.name)
    {
        case 'pass1':
            validateData(expresiones.pass, e.target, 'Pass1');
            validatePass2();
        break;

        case 'pass2':
            validatePass2();
        break;
    }
}

function validateData(expresion, input, campo)
{
    if (expresion.test(input.value))
    {
        $('#div'+campo).removeClass('is-invalid');
        $('#div'+campo).addClass('is-valid');
        $('#alert'+campo).prop('hidden', true);
    }else {
        $('#div'+campo).addClass('is-invalid');
        $('#div'+campo).removeClass('is-valid');
        $('#alert'+campo).prop('hidden', false);
    }
}

function validatePass2(e)
{
    const pass1 = $('#pass1').val();
    const pass2 = $('#pass2').val();

    if (pass2.length>0)
    {
        if (pass1 !== pass2)
        {
            $('#divPass2').addClass('is-invalid');
            $('#divPass2').removeClass('is-valid');
            $('#alertPass2').prop('hidden', false);
        } else{
            $('#divPass2').removeClass('is-invalid');
            $('#divPass2').addClass('is-valid');
            $('#alertPass2').prop('hidden', true);
        }
    }else if (pass2.length == 0) {
        $('#divPass2').removeClass('is-invalid');
        $('#divPass2').removeClass('is-valid');
        $('#alertPass2').prop('hidden', true);
    }

    if (pass1.length == 0)
    {
        $('#divPass1').removeClass('is-invalid');
        $('#divPass1').removeClass('is-valid');
        $('#alertPass1').prop('hidden', true);
    }
}



function getData(e)
{
    e.preventDefault();

    // Recogemos los datos del formulario
    pass_usu = $('#pass1').val();
    pass2 = $('#pass2').val();

    id_usu = $('#id_usu').val(); // El id_usu lo toma PHP por metodo GET de la URL

    let validate_pass1 = $('#divPass1').hasClass('is-invalid');
    let validate_pass2 = $('#divPass2').hasClass('is-invalid');

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
    }else if (validate_pass1 || validate_pass2) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
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