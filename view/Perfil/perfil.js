
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
        $('#nombre_usu').val(data.nombre_usu);
        $('#apellido_usu').val(data.apellido_usu);
        $('#direccion_usu').val(data.direccion_usu);
        $('#telefono_usu').val(data.telefono_usu);
        $('#documento_usu').val(data.documento_usu);
        $('#correo_usu').val(data.correo_usu);
    });

    $('#modalPerfil').modal('show');
});



function getData(e)
{
    e.preventDefault(e);

    var id_usu = $('#id_usu').val();
    var direccion_usu = $('#direccion_usu').val();
    var telefono_usu = $('#telefono_usu').val();

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