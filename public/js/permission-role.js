function listarPermissionRoles(rol)
{
    $.ajax({
        url:'permission-role/listarPermissionRoles?role_id='+rol,
        type:"GET",
        success: function (respuesta) {
            $('#div-permission-role').html(respuesta)
        }
    });
}

function guardarPermisoRole()
{
    var form = $('#form-permiso-role'),
                url = form.attr('action'),
                method =form.attr('method');

    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (respuesta) {

        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key).addClass('is-invalid')
                        .closest('.col-md-10')
                        .append('<small class="text-danger">' + value + '</small>');
                });
            }
        }
    })
}
