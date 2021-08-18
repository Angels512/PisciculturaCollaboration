
const inputs = document.querySelectorAll('#newUserForm input');

// Expresiones regulares
const expresiones = {
    direccion_usu: /^.{1,25}$/,
    telefono_usu: /^\d{7,10}$/,
    pass: /^.{8,12}$/
}

inputs.forEach((input) =>
{
    input.addEventListener('keyup', validateForm);
    input.addEventListener('blur', validateForm);
});


function init()
{
    $('#newUserForm').on('submit', function(e)
    {
        getData(e);
    });
}



function validateForm(e)
{
    switch (e.target.name)
    {
        case 'direccion_usu':
            validateData(expresiones.direccion_usu, e.target, 'Direccion');
            validateEmpty(e.target.id, 'Direccion');
        break;

        case 'telefono_usu':
            validateData(expresiones.telefono_usu, e.target, 'Telefono');
            validateEmpty(e.target.id, 'Telefono');
        break;

        case 'pass1':
            validateData(expresiones.pass, e.target, 'Pass1');
            validatePass2();
            validateEmpty(e.target.id, 'Pass1');
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
}

function validateEmpty(input, campo)
{
    if ($('#'+input).val().length == 0)
    {
        $('#div'+campo).removeClass('is-invalid');
        $('#div'+campo).removeClass('is-valid');
        $('#alert'+campo).prop('hidden', true);
    }
}



function getData(e)
{
    e.preventDefault();

    // Recogemos los datos del formulario
    let direccion_usu = $('#direccion_usu').val();
    let telefono_usu = $('#telefono_usu').val();
    let pass_usu = $('#pass1').val();
    let pass2 = $('#pass2').val();

    let validate_direccion = $('#divDireccion').hasClass('is-invalid');
    let validate_telefono = $('#divTelefono').hasClass('is-invalid');
    let validate_pass1 = $('#divPass1').hasClass('is-invalid');
    let validate_pass2 = $('#divPass2').hasClass('is-invalid');

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
    }else if (validate_direccion || validate_telefono || validate_pass1 || validate_pass2) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
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