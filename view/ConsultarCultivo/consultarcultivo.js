
function init()
{
    $('#formCultivo').on('submit', function(e)
    {
        updateCultivo(e);
    });
}

$(document).ready(function()
{
    cierreCultivoVencido();
    // listarCultivos();
    getEstanque();
    getResponsable();
});

// LLevar toda la lista de cultivos a la vista
function listarCultivos()
{
    $.post("controller/cultivo.php?op=listarcultivo", {}, function(data)
    {
        // Este es el section donde se almacenan los articles del ChatDetalle
        $('#pnlCultivo').html(data);
    });
}



// Mostrara la ventana Modal con los datos ya insertados
function modalUpdateCultivo(id_cultivo)
{
    $.post("controller/cultivo.php?op=listarDatosCultivo", { id_cultivo:id_cultivo }, function(data)
    {
        data = JSON.parse(data);

        // // Cambiamos los datos del formulario por los que estan en la base de datos
        $('#cant_siembra').val(data.cant_siembra);
        $('#id_cultivo').val(data.id_cultivo);
        $('#id_respon').val(data.id_respon).trigger('change');
        $('#id_tanque').val(data.id_tanque).trigger('change');
        $('#num_lote').val(data.num_lote);
    });

    $('#modalCultivo').modal('show'); // Muestra el MODAL
};

function updateCultivo(e)
{
    e.preventDefault();

    var id_cultivo = $('#id_cultivo').val();
    var num_lote = $('#num_lote').val();
    var cant_siembra = $('#cant_siembra').val();
    var id_tanque = $('#id_tanque').val();
    var id_respon = $('#id_respon').val();

    if(id_cultivo=='' || num_lote=='' || cant_siembra=='' || id_tanque=='' || id_respon=='')
    {
        $('#modalCultivo').modal('hide'); // Escondemos el modal
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
                $('#modalCultivo').modal('show');
            }
        });
    } else {
        var formData = new FormData($('#formCultivo')[0]);

        $.ajax(
        {
            url: "controller/cultivo.php?op=create_update",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos)
            {
                $('#modalCultivo').modal('hide');
                listarCultivos(id_cultivo);

                swal({
                    title: "Correcto!",
                    text: "Cultivo actualizado correctamente",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "OK"
                });
            }
        });
    }
}




// Eliminar cultivo
function deleteCultivo(id_cultivo)
{
    swal({
        title: "Advertencia!",
        text: "Esta seguro de Eliminar el Cultivo?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    },
    function(isConfirm)
    {
        if (isConfirm)
        {
            $.post("controller/cultivo.php?op=delete", {id_cultivo : id_cultivo}, function(data)
            {
                listarCultivos(id_cultivo);
            });

            swal({
                title: "Correcto!",
                text: "El cultivo se ha eliminado exitosamente.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
};

// Eliminar cultivo despues de su fecha de vencimiento
function cierreCultivoVencido()
{
    $.post("controller/cultivo.php?op=getCultivoVencido", {}, function(data)
    {
        // Verificamos que exista un cultivo vencido
        if (data.length>0)
        {
            // // Recogemos el ID del cultivo vencido
            data = JSON.parse(data);
            console.log(data);

            for(var i=0; i<data.length; i++)
            {
                // Llamamos al controlador para que inactive el cultivo
                $.post("controller/cultivo.php?op=deleteVencido", {id_cultivo : data[i]['id_cultivo']}, function(data)
                {
                });
            }
        }
        listarCultivos();
    });

};
// cierreCultivoVencido();
setInterval('cierreCultivoVencido()',82400000); // Se ejecutara cada 12 horas para verificar  cultivos vencidos




// Redirige a las propiedades del cultivo con su ID por URL
function ver(id_cultivo)
{
    window.location.href = "consultar-formatos?ID="+ id_cultivo +"";

}

function verNovedades(id_cultivo)
{
    window.location.href = "novedades-mortalidad?ID="+ id_cultivo +"";
}




// Recibimos los datos almacenados en estanques para pasarlos al select de la vista
function getEstanque()
{
    $.post('controller/estanque.php?op=select', function(data, status)
    {
        $('#id_tanque').html(data);
    });
}

// Recibimos los datos almacenados en responsables para pasarlos al select de la vista
function getResponsable()
{
    $.post('controller/responsable.php?op=select', function(data, status)
    {
        $('#id_respon').html(data);
    });
}


init();
