$(document).ready(function() {

    // Url del home de usuario ajax
    var urlHomeUsuarioAjax = $('#homeUsuarioAjax').attr('href');


    // Limpiar errores del modal e inputs del formulario de crear usuario
    $('#btnCrearUsuario').click(function() {

        $('#errorCrearUsuario').hide().find('ul').empty();

        $('#frmCrearUsuario')[0].reset();

    });


    // Limpiar errores del modal del formulario de editar usuario
    $('.btnEditarUsuario').click(function() {

        $('#errorEditarUsuario').hide().find('ul').empty();

    });


    // Crear usuario
    $('#btnGuardarUsuario').click(function(e) {

        e.preventDefault();

        var frmCrearUsuario      = $('#frmCrearUsuario');
        var urlFrmCrearUsuario   = frmCrearUsuario.attr('action');
        var datosFrmCrearUsuario = frmCrearUsuario.serialize();
        var errorCrearUsuario    = $('#errorCrearUsuario');

        $.post(urlFrmCrearUsuario, datosFrmCrearUsuario, function(respuesta) {

            errorCrearUsuario.hide().find('ul').empty();

            if (respuesta.success == false) {

                $.each(respuesta.mensaje, function(indice, valor) {
                    errorCrearUsuario.find('ul').append('<li>' + valor + '</li>');
                });

                errorCrearUsuario.slideDown();

            } else {

                window.location = urlHomeUsuarioAjax;

            }
        });
    });


    // Mostrar usuario
    $('.btnMostrarUsuario').click(function(e) {

        e.preventDefault();

        var idUsuario         = $(this).data('id');
        var urlMostrarUsuario = $(this).data('url');

        $.get(urlMostrarUsuario, function(datos) {

            $('#idUsuario').html('# ' + datos.id);
            $('#nombreUsuario').html(datos.first_name);
            $('#apellidoUsuario').html(datos.last_name);
            $('#emailUsuario').html(datos.email);
            $('#tipoUsuario').html(datos.type);
            $('#estadoUsuario').html(datos.active);

        });
    });


    // Editar usuario
    $('.btnEditarUsuario').click(function(e) {

        e.preventDefault();

        var idUsuario        = $(this).data('id');
        var urlEditarUsuario = $(this).data('url');

        $.get(urlEditarUsuario, function(datos) {

            $.each(datos, function(indice, valor) {
                $('input[name="' + indice + '"]').val(valor);
                $('select option[value="' + valor + '"]').prop('selected', true);
            });

        });
    });


    // Actualizar usuario
    $('#btnActualizarUsuario').click(function(e) {

        e.preventDefault();

        var frmEditarUsuario      = $('#frmEditarUsuario');
        var urlFrmEditarUsuario   = frmEditarUsuario.attr('action');
        var datosFrmEditarUsuario = frmEditarUsuario.serialize();
        var errorEditarUsuario    = $('#errorEditarUsuario');

        $.post(urlFrmEditarUsuario, datosFrmEditarUsuario, function(respuesta) {

            errorEditarUsuario.hide().find('ul').empty();

            if (respuesta.success == false) {

                $.each(respuesta.mensaje, function(indice, valor) {
                    errorEditarUsuario.find('ul').append('<li>' + valor + '</li>');
                });

                errorEditarUsuario.slideDown();

            } else {

                window.location = urlHomeUsuarioAjax;

            }

        });
    });


    // Eliminar usuario

});