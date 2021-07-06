// Variables globales: Inputs, iconos y mensajes.
const inputs = document.querySelectorAll('#formUsuario input');
const iconForm = document.querySelectorAll('#formUsuario i');
const smallForm = document.querySelectorAll('#formUsuario small');

// Expresiones regulares para validacion
const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,20}$/, // Letras y espacios, pueden llevar acentos.
    apellido: /^[a-zA-ZÀ-ÿ\s]{3,20}$/, // Letras y espacios, pueden llevar acentos.
    documento: /^\d{7,10}$/, // 7 a 10 numeros.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
};

// Por cada input va a realizar la validacion
inputs.forEach((input) =>
{
    input.addEventListener('keyup', validateForm);
    input.addEventListener('blur', validateForm);
});



function init()
{
    $('#formUsuario').on('submit', function(e)
    {
        getData(e);
    });
}


// Inicio de la pagina
$(document).ready(function()
{
    // Capturamos el ID del usuario y del rol (Los encontramos en el header)
    var id_usu = $('#id_usu_x').val();

    // Va a ejecutar y rellenar el DataTable con los chats actuales del mismo USUARIO
    tabla=$('#usuarioData').dataTable(
    {
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
            ],
        "ajax":
        {
            url: 'controller/usuario.php?op=listarUsuarios',
            type: "post",
            dataType: "json",
            data:{},
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language":
        {
            "sProcessing":          "Procesando...",
            "sLengthMenu":          "Mostrar _MENU_ registros",
            "sZeroRecords":         "No se encontraron resultados",
            "sEmptyTable":          "Ningun dato disponible en esta tabla",
            "sInfo":                "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":           "Mostrando un total de 0 registros",
            "sInfoFiltered":        "(Filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":         "",
            "sSearch":              "Buscar:",
            "sUrl":                 "",
            "sInfoThousand":        ",",
            "sLoadingRecords":      "Cargando...",
            "oPaginate":
            {
                "sFirst":           "Primero",
                "sLast":            "Ultimo",
                "sNext":            "Siguiente",
                "sPrevious":        "Anterior"
            },
            "oAria":
            {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();

});


function validateForm(e)
{
    switch (e.target.name) {
        case 'nombre_usu':
            validateData(expresiones.nombre, e.target, 'Nombre')
        break;

        case 'apellido_usu':
            validateData(expresiones.apellido, e.target, 'Apellido')
        break;

        case 'documento_usu':
            validateData(expresiones.documento, e.target, 'Documento')
        break;

        case 'correo_usu':
            validateData(expresiones.correo, e.target, 'Correo')
        break;

        default:
        break;
    }
}

function validateData(expresion, input, campo)
{
    if (expresion.test(input.value))
    {
        $('#usu'+campo).removeClass('form-control-danger');
        $('#icon'+campo).removeClass('text-danger');
        $('#usu'+campo).addClass('form-control-success');
        $('#icon'+campo).addClass('text-success');
        $('#alert'+campo).prop('hidden', true);
    }else {
        $('#usu'+campo).addClass('form-control-danger');
        $('#icon'+campo).addClass('text-danger');
        $('#alert'+campo).prop('hidden', false);
    }
}


// Guardar o Editar un usuario
function getData(e)
{
    e.preventDefault();

    var nombre_usu = $('#usuNombre').val();
    var apellido_usu = $('#usuApellido').val();
    var documento_usu = $('#usuDocumento').val();
    var correo_usu = $('#usuCorreo').val();

    var nombreValidate = $('#usuNombre').hasClass('form-control-danger');
    var apellidoValidate = $('#usuApellido').hasClass('form-control-danger');
    var documentoValidate = $('#usuDocumento').hasClass('form-control-danger');
    var correoValidate = $('#usuCorreo').hasClass('form-control-danger');


    if (nombre_usu=='' || apellido_usu=='' || documento_usu=='' || correo_usu=='')
    {
        $('#modalUsuarios').modal('hide'); // Escondemos el modal
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
                $('#modalUsuarios').modal('show');
            }
        });

    }else {
        if (nombreValidate || apellidoValidate || documentoValidate || correoValidate)
        {
            $('#modalUsuarios').modal('hide'); // Escondemos el modal
            swal({
                title: "Advertencia!",
                text: "Por favor, cambie los campos invalidos...",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "OK"
            },
            function(isConfirm)
            {
                if (isConfirm)
                {
                    $('#modalUsuarios').modal('show');
                }
            });
        }else {
            createUpdate();
        }
    }

}

function createUpdate()
{
    $('#telefono_usu').prop('disabled', false);
    $('#direccion_usu').prop('disabled', false);

    var formData = new FormData($('#formUsuario')[0]);

    $.ajax({
        url: "controller/usuario.php?op=create_update", // La ubicacion exacta del controlador con su op
        type: "POST", // Es de tipo POST el envio
        data: formData, // Los datos los extrae de la variable que creamos arriba, esta contiene lo ingresado en el Formulario
        contentType: false,
        processData: false,
        success: function(datos) // Cuando haya finalizado el proceso de creacion del chat
        {
            $('#formUsuario')[0].reset(); // Vaciamos los campos del formulario
            $('#id_usu').val('');
            $('#modalUsuarios').modal('hide'); // Escondemos el modal
            $('#usuarioData').DataTable().ajax.reload();

            // Muestra alerta de SweetAlert
            swal({
                title: "Correcto!",
                text: "Se ha guardado el usuario exitosamente.",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK"
            });
        }
    });
}



// Crear Usuario
$(document).on('click', '#btnAgregar', function()
{
    $('#formUsuario')[0].reset();
    $('#id_usu').val('');

    $('#mdlTitulo').html('Agregar Usuario');
    $('#direccion').hide();
    $('#telefono').hide();

    cleanValidation();

    $('#modalUsuarios').modal('show');
});

// Editar Usuario
function editar(id_usu)
{
    $('#direccion_usu').prop('disabled', true);
    $('#telefono_usu').prop('disabled', true);

    // Ejecutamos el post del controlador llenar los datos del formulario del MODAL
    $.post("controller/usuario.php?op=listarDatosUsu", { id_usu:id_usu }, function(data)
    {
        data = JSON.parse(data);

        // Cambiamos los datos del formulario por los que estan en la base de datos
        $('#id_usu').val(data.id_usu);
        $('#usuNombre').val(data.nombre_usu);
        $('#usuApellido').val(data.apellido_usu);
        $('#direccion_usu').val(data.direccion_usu);
        $('#telefono_usu').val(data.telefono_usu);
        $('#usuDocumento').val(data.documento_usu);
        $('#usuCorreo').val(data.correo_usu);
        $('#id_rol').val(data.id_rol).trigger('change');
    });

    $('#direccion').show();
    $('#telefono').show();

    cleanValidation();

    $('#mdlTitulo').html('Editar Usuario'); // Cambia el titulo del modal por EDITAR
    $('#modalUsuarios').modal('show'); // Muestra el MODAL
}

// Eliminar Usuario
function eliminar(id_usu)
{
    swal({
        title: "Advertencia!",
        text: "Esta seguro de Eliminar el Usuario?",
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
            // Ejecutamos el post del controlador para crear un nuevo mensaje
            $.post("controller/usuario.php?op=delete", { id_usu:id_usu }, function(data)
            {
            });

            $('#usuarioData').DataTable().ajax.reload();

            swal({
                title: "Correcto!",
                text: "El usuario se ha eliminado exitosamente.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}



// Limpia todas las validaciones realizadas
function cleanValidation()
{
    // Esconder borde de inputs
    inputs.forEach((input) =>
    {
        input.classList.remove('form-control-danger');
        input.classList.remove('form-control-success');
    });

    // Esconder color de iconos
    iconForm.forEach((icon) =>
    {
        icon.classList.remove('text-danger');
        icon.classList.remove('text-success');
    });

    // Esconder mensajes de advertencia
    smallForm.forEach((small) =>
    {
        small.hidden = true;
    });
}

init();