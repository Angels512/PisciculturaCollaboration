
// Variables globales: Inputs, iconos y mensajes.
const inputs = document.querySelectorAll('#formPerfil input');
const iconForm = document.querySelectorAll('#formPerfil i');
const smallForm = document.querySelectorAll('#formPerfil small');

// Expresiones regulares para validacion
const expresiones = {
    direccion_usu: /^.{1,25}$/,
    telefono_usu: /^\d{7,10}$/,
    pass: /^.{8,12}$/
};

// Por cada input va a realizar la validacion
inputs.forEach((input) =>
{
    input.addEventListener('keyup', validateForm);
    input.addEventListener('blur', validateForm);
});



function init()
{
    $('#formPerfil').on('submit', function(e)
    {
        getData(e);
    });
}

$('document').ready(function()
{
    listarDatos();
});

$('#btnPerfil').on('click', function()
{
    var id_usu = $('#id_usu_x').val();

    $('#nombre_usu').prop('disabled', true);
    $('#apellido_usu').prop('disabled', true);
    $('#documento_usu').prop('disabled', true);
    $('#correo_usu').prop('disabled', true);

    $.post('controller/usuario.php?op=listarDatosUsu', {id_usu:id_usu}, function(data)
    {
        data = JSON.parse(data);

        $('#id_usu').val(data.id_usu);
        $('#nombre_usu').val(data.nombre_usu +' '+ data.apellido_usu);
        $('#apellido_usu').val(data.apellido_usu);
        $('#direccion_usu').val(data.direccion_usu);
        $('#telefono_usu').val(data.telefono_usu);
        $('#documento_usu').val(data.documento_usu);
        $('#correo_usu').val(data.correo_usu);
    });

    $('#modalPerfil').modal('show');
});



function validateForm(e)
{
    switch (e.target.name) {
        case 'direccion_usu':
            validateData(expresiones.direccion_usu, e.target, 'direccion');
            validateEmpty(e.target.id, 'direccion');
        break;

        case 'telefono_usu':
            validateData(expresiones.telefono_usu, e.target, 'telefono');
            validateEmpty(e.target.id, 'telefono');
        break;

        case 'pass_usu':
            validateData(expresiones.pass, e.target, 'pass');
            validateEmpty(e.target.id, 'pass');
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
        $('#'+campo+'_usu').removeClass('form-control-danger');
        $('#'+campo+'_icon').removeClass('text-danger');
        $('#'+campo+'_usu').addClass('form-control-success');
        $('#'+campo+'_icon').addClass('text-success');
        $('#'+campo+'_alert').prop('hidden', true);
    }else {
        $('#'+campo+'_usu').addClass('form-control-danger');
        $('#'+campo+'_icon').addClass('text-danger');
        $('#'+campo+'_alert').prop('hidden', false);
    }
}

function validatePass2(e)
{
    const pass1 = $('#pass_usu').val();
    const pass2 = $('#pass2').val();

    if (pass2.length>0)
    {
        if (pass1 !== pass2)
        {
            $('#pass2').addClass('form-control-danger');
            $('#pass2_icon').addClass('text-danger');
            $('#pass2_alert').prop('hidden', false);
        } else{
            $('#pass2').removeClass('form-control-danger');
            $('#pass2_icon').removeClass('text-danger');
            $('#pass2').addClass('form-control-success');
            $('#pass2_icon').addClass('text-success');
            $('#pass2_alert').prop('hidden', true);
        }
    }else if (pass2.length == 0) {
        $('#pass2').removeClass('form-control-danger');
        $('#pass2_icon').removeClass('text-danger');
        $('#pass2').removeClass('form-control-success');
        $('#pass2_icon').removeClass('text-success');
        $('#pass2_alert').prop('hidden', true);
    }
}

function validateEmpty(input, campo)
{
    if ($('#'+input).val().length == 0)
    {
        $('#'+campo+'_usu').removeClass('form-control-danger');
        $('#'+campo+'_icon').removeClass('text-danger');
        $('#'+campo+'_usu').removeClass('form-control-success');
        $('#'+campo+'_icon').removeClass('text-success');
        $('#'+campo+'_alert').prop('hidden', true);
    }
}



function getData(e)
{
    e.preventDefault(e);

    var id_usu = $('#id_usu').val();
    var direccion_usu = $('#direccion_usu').val();
    var telefono_usu = $('#telefono_usu').val();

    let valite_direccion = $('#direccion_usu').hasClass('form-control-danger');
    let valite_telefono = $('#telefono_usu').hasClass('form-control-danger');
    let valite_pass = $('#pass_usu').hasClass('form-control-danger');

    if (id_usu=='' || direccion_usu=='' || telefono_usu=='')
    {
        $('#modalPerfil').modal('hide'); // Escondemos el modal
        swal({
            title: "Advertencia!",
            text: "Por favor, complete todos los datos...",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        },
        function(isConfirm)
        {
            if (isConfirm)
            {
                $('#modalPerfil').modal('show');
            }
        });
    }else if (valite_direccion || valite_telefono || valite_pass) {
        $('#modalPerfil').modal('hide'); // Escondemos el modal
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "OK"
        },
        function(isConfirm)
        {
            if (isConfirm)
            {
                $('#modalPerfil').modal('show');
            }
        });
    }else {
        verificarPassword(id_usu, direccion_usu, telefono_usu);
    }
}

function verificarPassword(id_usu, direccion_usu, telefono_usu)
{
    var pass_usu = $('#pass_usu').val();
    var pass2 = $('#pass2').val();

    if (pass_usu == '' && pass2 == '')
    {
        updatePerfil(id_usu, direccion_usu, telefono_usu);
    }else {
        if (pass_usu != pass2)
        {
            $('#modalPerfil').modal('hide'); // Escondemos el modal
            swal({
                title: "Advertencia!",
                text: "Las contraseñas no son iguales.",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "OK"
            },
            function(isConfirm)
            {
                if (isConfirm)
                {
                    $('#modalPerfil').modal('show');
                }
            });
        }else {
            updatePerfilPass(id_usu, pass_usu, direccion_usu, telefono_usu);
        }
    }
}

function updatePerfil(id_usu, direccion_usu, telefono_usu)
{
    $.post('controller/usuario.php?op=listarDatosUsu', {id_usu:id_usu}, function(data)
    {
        data = JSON.parse(data);

        $.post('controller/usuario.php?op=updatePerfil', {direccion_usu:direccion_usu, telefono_usu:telefono_usu, pass_usu:data.pass_usu, id_usu:id_usu}, function(data)
        {
            listarDatos(id_usu);
            $('#modalPerfil').modal('hide'); // Escondemos el modal

            swal({
                title: "Correcto!",
                text: "Se ha guardado el usuario exitosamente.",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK"
            });
        });
    });
}

function updatePerfilPass(id_usu, pass_usu, direccion_usu, telefono_usu)
{
    $.post('controller/usuario.php?op=updatePasswordPerfil', {direccion_usu:direccion_usu, telefono_usu:telefono_usu, pass_usu:pass_usu, id_usu:id_usu}, function(data)
    {
        listarDatos(id_usu);
        $('#modalPerfil').modal('hide'); // Escondemos el modal

        $('#pass_usu').val('');
        $('#pass2').val('');

        swal({
            title: "Correcto!",
            text: "Se ha guardado el usuario exitosamente.",
            type: "success",
            confirmButtonClass: "btn-success",
            confirmButtonText: "OK"
        });
    });
}



function listarDatos()
{
    var id_usu = $('#id_usu_x').val();

    $.post('controller/usuario.php?op=listarDatosUsu', {id_usu:id_usu}, function(data)
    {
        data = JSON.parse(data);

        $('#nombreCompleto').html(data.nombre_usu+' '+data.apellido_usu);

        if (data.id_rol == 1)
        {
            $('#nombreRol').html('Jefe de Produccion');
        }else if (data.id_rol == 2) {
            $('#nombreRol').html('Piscicultor');
        }else {
            $('#nombreRol').html('Acuicultor');
        }

        $('#fechaCreacion').html(data.fecha);

        if (data.fecha_edit < '01/01/2021')
        {
            $('#fechaAct').html('No hay actualizaciones actualmente');
        }else {
            $('#fechaAct').html(data.fecha_edit);
        }

        $('#numeroDocumento').html(data.documento_usu);
        $('#direccionCorreo').html(data.correo_usu);
        $('#direccion').html(data.direccion_usu);
        $('#numeroTelefono').html(data.telefono_usu);
    });
}


init();