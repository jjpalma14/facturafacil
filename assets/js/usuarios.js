$('.ideditar').prop('disabled', true);
$("#Btnpassword").click(function () {
    var password = $("#password").val();

    $.ajax({

        url: base_url + 'index.php/ControladorLogin/updatepassword',
        type: "post",
        data: {password: password, usuario: usuario},
        beforeSend: function (data) {

        },
        success: function (data) {
            if (data == 1) {
                $("#password").val("");
                Swal.fire({
                    type: 'success',
                    title: 'Cambio',
                    text: "Contraseña actualizada",

                })
                return false;
            }
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: data,
            })
        }
    })
})
function insertusuario(parametro) {
    var parametro = parametro;
    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var id = $("#id").val();
    var pass = $("#pass").val();
    var estado = $("#estado").val();

    $.ajax({

        url: base_url + 'index.php/ControladorLogin/insertusuario',
        type: "post",
        data: {nombres: nombres, apellidos: apellidos, id: id, pass: pass, estado: estado, usuario: usuario, parametro: parametro},
        beforeSend: function (data) {
        },
        success: function (data) {

            if (data == 1) {
                $("#nombres").val("");
                $("#apellidos").val("");
                $("#id").val("");
                $("#pass").val("");
                GetUsuarios();
                Swal.fire({
                    type: 'success',
                    title: 'Usuario',
                    text: "Usuario registrado",

                })


                return false;

            }
            if (data == 2) {
                Swal.fire({
                    type: 'success',
                    title: 'Usuario',
                    text: "Usuario actualizado",
                })


                return false;

            }
            if (data == 3) {
                Swal.fire({
                    type: 'success',
                    title: 'Usuario',
                    text: "Contraseña se restablecio con el numero de identificacion",
                })


                return false;

            }
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: data,

            })
        }


    })



}
$("#BtnGuardarPermisos").click(function(){

 var permisos = [];
 var id = $("#id").val();
$('.permisos').each(function ()
{
    permisos.push(parseInt($(this).val()));
 
});
$.ajax({
    url: base_url + 'index.php/ControladorLogin/updatepermisos',
    type:"post",
     data: {
            'permisos': JSON.stringify(permisos.concat(id))
        },
        beforeSend: function (data) { 
            $("#icocargando").show();
            $("#BtnGuardarPermisos").prop('disabled',true);
        },
        success: function (data) {
            $("#icocargando").hide();
            $("#BtnGuardarPermisos").prop('disabled',false);
              Swal.fire({
                    type: 'success',
                    title: 'Permisos',
                    text: "Permisos actualizados",

                })
        }

})
 
})






