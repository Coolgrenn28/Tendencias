$(document).ready(function () {

    $('.toggle-class').change(function () {

        var estado = $(this).prop('checked') ? 1 : 0;
        var elementId = $(this).data('id');
        var elementType = $(this).data('type');

        var url = '';

        switch (elementType) {

            case 'cliente':
                url = '/cambioestadocliente';
                break;

            case 'producto':
                url = '/cambioestadoproducto';
                break;

            case 'pedido':
                url = '/cambioestadopedido';
                break;

            case 'transportista':
                url = '/cambioestadotransportista';
                break;

            case 'estadopedido':
                url = '/cambioestadoestadopedido';
                break;

            default:
                console.error('Tipo no válido:', elementType);
                return;
        }

        $.ajax({

            type: "GET",

            dataType: "json",

            url: url,

            data: {
                estado: estado,
                id: elementId
            },

            success: function (data) {

                console.log('Estado actualizado correctamente');

            },

            error: function (xhr, status, error) {

                console.error('Error al actualizar estado:', error);
                console.log(xhr.responseText);

            }

        });

    });

});