
function init()
{
    $('#cultivoForm').on('submit', function(e)
    {
        createCultivo(e);
    });
}


$(document).ready(function()
{
    incrementadorCreate();
    getEstanque();
    getResponsable();
});



// Crear Cultivo
function createCultivo(e)
{
    e.preventDefault();
    var formData = new FormData($('#cultivoForm')[0]);

    if ($('#num_lote').val() == '' || $('#cant_siembra').val() == '0')
    {
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        $.ajax(
        {
            url: "controller/cultivo.php?op=create_update",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos)
            {
                // Vaciamos los campos del formulario
                $('#num_lote').val('');
                $('#cant_siembra').val('0');

                swal({
                    title: "Correcto!",
                    text: "Cultivo creado correctamente",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "OK"
                });
            }
        });
    }
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

// El contador para la cantidad de siembra funciona mediante esta libreria
function incrementadorCreate()
{
    $("input[name='cant_siembra']").TouchSpin({
        verticalbuttons: true,
        min: 0,
        max: 2000,
        step: 100,
        verticalupclass: 'glyphicon glyphicon-plus',
		verticaldownclass: 'glyphicon glyphicon-minus'
    });
}

init();