
obtenerid();
obteneridArticulo();
$("#facturapago").prop('disabled',true);
$("#consecutivo").prop('disabled',true);
$("#cliente_servicio").prop('disabled',true);
$("#fechatiposervicio").prop('disabled',true);
$("#tipo_servicio").prop('disabled',true);
$("#editor2").prop('disabled',true);
$("#clientepago").prop('disabled',true);
$("#totalpago").prop('disabled',true);
$("#tipo").prop('disabled', true);
$("#proveedor").prop('disabled', true);
$("#nfactura").prop('disabled', true);

$("#entrada").prop('disabled', true);
$("#fechasalida").prop('disabled', true);
$("#documentoventa").prop('disabled', true);
$("#cliente").prop('disabled', true);
$("#fechaventa").prop('disabled', true);
$("#articulotarifa").prop('disabled', true);
$("#codigo").prop('disabled', true);


$(".coger").hide();
$(".addservicio").hide()
$(".guardar").hide();
$(".nuevo").click(function () {
    $("#txttotal").text("0.00");
    $("#observacion").prop('disabled', false);
    $("#observacion").val("");
    $(".addservicio").show();
    $("#cliente").prop('disabled', false);
    var f = new Date();
    ;
    $('#fechacompra').val(f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate());
    $('#fechasalida').val(f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate());
    $('#fechaventa').val(f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate());
    $('.imprimir').hide();
    $("#tipo").prop('disabled', false);
    $("#proveedor").prop('disabled', false);
    $("#nfactura").prop('disabled', false);
    $(".coger").show();
    $(".guardar").hide();
    $(".dato").remove();
    $("#entrada").val("");
    $("#documentoventa").val("");

})
function number_format(number, decimals, dec_point, thousands_point) {

                        if (number == null || !isFinite(number)) {
                            throw new TypeError("number is not valid");
                        }

                        if (!decimals) {
                            var len = number.toString().split('.').length;
                            decimals = len > 1 ? len : 0;
                        }

                        if (!dec_point) {
                            dec_point = '.';
                        }

                        if (!thousands_point) {
                            thousands_point = ',';
                        }

                        number = parseFloat(number).toFixed(decimals);

                        number = number.replace(".", dec_point);

                        var splitNum = number.split(dec_point);
                        splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
                        number = splitNum.join(dec_point);

                        return number;
                    }
function ModificarEmpresa() {
    var razonsocial = $("#rsocial").val();
    var nit = $("#nit").val();
    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();

    

    $.ajax({

        url: base_url + 'index.php/ControladorGenerales/InsertEmpresa',
        type: 'POST',
        data: {razonsocial: razonsocial, nit: nit, direccion: direccion, telefono: telefono, email: email},
        beforeSend: function (data) {
            $(".BtnEmpresa").prop("disabled", true);
        },
        success: function (data) {
            if (data == 1) {
                $(".BtnEmpresa").notify(
                        "Datos Actualizados", "success",
                        {position: "right"}
                );
                $(".BtnEmpresa").prop("disabled", false);
            } else {

            }
        }
    })

}
function InsertCliente() {
    var razonsocial = $("#rsocialcliente").val();
    var nit = $("#nitcliente").val();
    var direccion = $("#direccioncliente").val();
    var telefono = $("#telefonocliente").val();
    var email = $("#emailcliente").val();
    var estado = $("#estadocliente").val();

    if (razonsocial.length == 0 || nit.length == 0 || direccion.length == 0 || telefono.length == 0 || email.length == 0) {
        $(".BtnCliente").notify(
                "Debe llenar todos los campos",
                {position: "right"}
        );
        return false;
    }


    $.ajax({

        url: base_url + 'index.php/ControladorGenerales/InsertCliente',
        type: 'POST',
        data: {razonsocial: razonsocial, nit: nit, direccion: direccion, telefono: telefono, email: email, estado: estado,usuario:usuario},
        beforeSend: function (data) {
            $(".BtnCliente").prop("disabled", true);
        },
        success: function (data) {


            if (data == 1) {
                $(".BtnCliente").notify(
                        "Datos Insertados", "success",
                        {position: "right"}
                );

                $("#rsocialcliente").val('');
                $("#nitcliente").val('');
                $("#direccioncliente").val('');
                $("#telefonocliente").val('');
                $("#emailcliente").val('');
                ListarClientes();
                $(".BtnCliente").prop("disabled", false);
            } else {

            }
        }
    })

}
function ModificarCliente() {
    var id = $("#txtid").val();
    var rsocial = $("#txtrsocial").val();
    var nit = $("#txtnit").val();
    var direccion = $("#txtdireccion").val();
    var telefono = $("#txttelefono").val();
    var email = $("#txtemail").val();
    var estado = $("#txtestado").val();


    $.ajax({

        url: base_url + 'index.php/ControladorGenerales/ModificarCliente',
        type: 'POST',
        data: {razonsocial: rsocial, nit: nit, direccion: direccion, telefono: telefono, email: email, estado: estado, id: id,usuario:usuario},
        beforeSend: function (data) {
            $(".BtnModificarcliente").prop("disabled", true);
        },
        success: function (data) {
            if (data == 1) {
                $(".BtnModificarcliente").notify(
                        "Datos Actualizados", "success",
                        {position: "right"}
                );
                ListarClientes();
                $(".BtnModificarcliente").prop("disabled", false);
            } else {

            }
        }
    })


}
function InsertProveedores() {
    var razonsocial = $("#rsocialproveedores").val();
    var nit = $("#nitproveedores").val();
    var direccion = $("#direccionproveedores").val();
    var telefono = $("#telefonoproveedores").val();
    var email = $("#emailproveedores").val();
    var estado = $("#estadoproveedores").val();

    if (razonsocial.length == 0 || nit.length == 0 || direccion.length == 0 || telefono.length == 0 || email.length == 0) {
        $(".BtnProveedor").notify(
                "Debe llenar todos los campos",
                {position: "right"}
        );
        return false;
    }


    $.ajax({

        url: base_url + 'index.php/ControladorGenerales/InsertProveedor',
        type: 'POST',
        data: {razonsocial: razonsocial, nit: nit, direccion: direccion, telefono: telefono, email: email, estado: estado,usuario:usuario},
        beforeSend: function (data) {
            $(".BtnProveedor").prop("disabled", true);
        },
        success: function (data) {


            if (data == 1) {
                $(".BtnProveedor").notify(
                        "Datos Insertados", "success",
                        {position: "right"}
                );

                $("#rsocialcliente").val('');
                $("#nitcliente").val('');
                $("#direccioncliente").val('');
                $("#telefonocliente").val('');
                $("#emailcliente").val('');
                ListarProveedores();
                $(".BtnProveedor").prop("disabled", false);
            } else {

            }
        }
    })

}
function ModificarProveedor() {
    var id = $("#txtidproveedor").val();
    var rsocial = $("#txtrsocialproveedor").val();
    var nit = $("#txtnitproveedor").val();
    var direccion = $("#txtdireccionproveedor").val();
    var telefono = $("#txttelefonoproveedor").val();
    var email = $("#txtemailproveedor").val();
    var estado = $("#txtestadoproveedor").val();


    $.ajax({

        url: base_url + 'index.php/ControladorGenerales/ModificarProveedor',
        type: 'POST',
        data: {razonsocial: rsocial, nit: nit, direccion: direccion, telefono: telefono, email: email, estado: estado, id: id,usuario:usuario},
        beforeSend: function (data) {
            $(".BtnModificarproveedor").prop("disabled", true);
        },
        success: function (data) {
            if (data == 1) {
                $(".BtnModificarproveedor").notify(
                        "Datos Actualizados", "success",
                        {position: "right"}
                );
                ListarProveedores();
                $(".BtnModificarproveedor").prop("disabled", false);
            } else {

            }
        }
    })


}
function obtenerid() {
    $.ajax({
        url: base_url + 'index.php/ControladorArticulo/GetCodigo',
        type: 'POST',
        success: function (response) {
            $("#codigocategoria").prop('disabled', true);
            $("#codigocategoria").val(response);
        }

    })

}
function Guardarcategoria() {
    var descripcion = $("#descripcion").val();
    $.ajax({
        url: base_url + 'index.php/ControladorArticulo/GuardarCategoria',
        type: 'POST',
        data: {descripcion: descripcion,usuario:usuario},
        success: function (data) {

            if (data == 1) {
                obtenerid();
                GetCategorias();
                $("#descripcion").val('');
                $(".BtnGuardarCategoria").notify(
                        "Datos Insertados", "success",
                        {position: "right"}
                );
            }
            if (data == 2) {
                $(".BtnGuardarCategoria").notify(
                        "Debe llenar los campos",
                        {position: "right"}
                );
            }
        }
    })


}
function getselectcategorias() {
    $("#categoria").append("<option>Appended text</option>");
}
function obteneridArticulo() {
    $.ajax({
        url: base_url + 'index.php/ControladorArticulo/GetCodigoarticulos',
        type: 'POST',
        success: function (response) {
            $("#codigoarticulo").prop('disabled', true);
            $("#codigoarticulo").val(response);
        }

    })

}
function GuardarArticulo() {
    var descripcion = $("#descripcionarticulo").val();
    var categoria = $("#categoriaarticulo").val();

    $.ajax({
        url: base_url + 'index.php/ControladorArticulo/InsertArticulo',
        type: 'POST',
        data: {descripcion: descripcion, categoria: categoria,usuario:usuario},
        success: function (data) {

            if (data == 1) {
                obteneridArticulo();
                GetArticulos();
                $("#descripcionarticulo").val('');
                $("#categoriaarticulo").val('');


                $(".BtnGuardarArticulo").notify(
                        "Datos Insertados", "success",
                        {position: "right"}
                );
            }
            if (data == 2) {
                $(".BtnGuardarArticulo").notify(
                        "Debe llenar los campos",
                        {position: "right"}
                );
            }
        }
    })
}
function ModificarArticulo() {
    var codigo = $("#codigomodificar").val();
    var descripcion = $("#descripcionmodificar").val();
    var categoria = $("#categoriamodificar").val();
    var estado = $("#estadomodificar").val();
    $.ajax({
        url: base_url + 'index.php/ControladorArticulo/InsertArticulo',
        type: 'POST',
        data: {codigo: codigo, descripcion: descripcion, categoria: categoria, estado: estado,usuario:usuario},
        success: function (data) {
            GetArticulos();
            $("#modificar").modal('toggle');
        }
    })
}
function AgregarArticulosCompras() {
    $('.cantidad').addClass('form-control');
    $("#ModalEntradaArticulos").modal();
    GetArticulos();
}
function AgregarArticulosSalida() {
    $("#ModalSalidaArticulos").modal();
    GetSaldos();
}
function GuardarEntrada() {
    $('.imprimir').show();
    var datosentrada = [];
    var tipo = $("#tipo").val();
    var proveedor = $("#proveedor").val();
    var nfactura = $("#nfactura").val();
    var fecha = $("#fechacompra").val();
    $('#articuloscompra .dato').each(function () {

        var that = $(this);
        var codigo = that.find('td').eq(0).text();
        var cantidad = that.find('td').eq(2).text();
        var valorunitario = that.find('td').eq(3).text();
        var total = that.find('td').eq(4).text();
        var datos = {
            'tipo': tipo,
            'proveedor': proveedor,
            'nfactura': nfactura,
            'fecha': fecha,
            'codigo': codigo,
            'cantidad': cantidad,
            'valorunitario': valorunitario,
            'total': total,
            'usuario':usuario,
        };
        datosentrada.push(datos);
    });




    if (datosentrada.length == 0) {
        swal.fire("Debe escoger al menos un item!!!");
        return false;
    }
    
    
   
    
    $.ajax({
        url: base_url + 'index.php/ControladorEntradaArticulo/EntradaArticulo',
        type: "post",
        data: {
            'array': JSON.stringify(datosentrada)
        },
        beforeSend: function (data) {
            swal.fire({
                title: "Generando entrada...",
            });
        },
        success: function (data) {
            Swal.fire({
                type: 'success',
                title: 'Entrada de articulo',
                text: 'Se genero la entrada No.' + data,
            })
            $("#entrada").val(data);
            $("#tipo").prop('disabled', true);
            $("#entrada").prop('disabled', true);
            $(".coger").hide();
            $(".guardar").hide();
            $(".borrar").remove();
        }
    });


}
function GuardarVenta() {
    $('.imprimir').show();
    var datosentrada = [];
    var tipo = $("#tipo").val();
    var cliente = $("#cliente").val();
    var fecha = $("#fechaventa").val();
    $('#articulossalida .dato').each(function () {
        var that = $(this);
        var codigo = that.find('td').eq(0).text();
        var cantidad = that.find('td').eq(2).text();
        var valorunitario = that.find('td').eq(3).text();
        var total = that.find('td').eq(4).text();
        var datos = {
            'tipo': tipo,
            'cliente': cliente,
            'fecha': fecha,
            'codigo': codigo,
            'cantidad': cantidad,
            'valorunitario': valorunitario,
            'total': total,
            'usuario': usuario,
        };
        datosentrada.push(datos);
    });
    if (datosentrada.length == 0) {
        swal.fire("Debe escoger al menos un item!!!");
        return false;
    }
    $.ajax({
        url: base_url + 'index.php/ControladorVentas/GuardarVenta',
        type: "post",
        data: {
            'array': JSON.stringify(datosentrada)
        },
        beforeSend: function (data) {
            swal.fire({
                title: "Generando entrada...",
            });
        },
        success: function (data) {
            Swal.fire({
                type: 'success',
                title: 'Venta de articulo',
                text: 'Se genero la factura No.' + data,
            })
            $("#documentoventa").val(data);
            $("#tipo").prop('disabled', true);
            $("#entrada").prop('disabled', true);
            $(".coger").hide();
            $(".guardar").hide();
            $(".borrar").remove();
        }
    });


}
function GuardarVentaServicio() {
    $('.imprimir').show();
    var datosentrada = [];
    var tipo = $("#tipo").val();
    var cliente = $("#cliente").val();
    var fecha = $("#fechaventa").val();
    var observacion = $("#observacion").val();
   $('#articulossalida .dato').each(function () {
        var that = $(this);
        var idservicio = that.find('td').eq(0).text();
        var tiposervicio = that.find('td').eq(1).text();
        var total = that.find('td').eq(2).text();
        var datos = {
            'tipo': tipo,
            'cliente': cliente,
            'fecha': fecha,
            'idservicio': idservicio,
            'tiposervicio': tiposervicio,
            'total': total,
            'observacion': observacion,
            'usuario': usuario,
        };
        datosentrada.push(datos);
    });
    if (datosentrada.length == 0) {
        swal.fire("Debe escoger al menos un item!!!");
        return false;
    }
    $.ajax({
        url: base_url + 'index.php/ControladorVentasServicios/GuardarVentaServicio',
        type: "post",
        data: {
            'array': JSON.stringify(datosentrada)
        },
        beforeSend: function (data) {
            swal.fire({
                title: "Generando venta...",
            });
        },
        success: function (data) {
            Swal.fire({
                type: 'success',
                title: 'Venta de Servicio',
                text: 'Se genero la factura No.' + data,
            })
            $("#documentoventa").val(data);
            $("#tipo").prop('disabled', true);
            $("#entrada").prop('disabled', true);
            $("#cliente").prop('disabled', true);
            $(".addservicio").hide();
            $(".guardar").hide();
            $(".borrar").remove();
            $("#observacion").prop('disabled', true);
        }
    });


}
function AgregarEntradas()
{
    $("#buscarentradas").modal();
    GetEntradas();
}
function AgregarSalidas()
{
    $("#buscarsalidas").modal();

    GetSalidas();
}
function ReporteSalida() {
    var salida = $("#entrada").val();
    var altura = 380;
    var anchura = 630;
    // calculamos la posicion x e y para centrar la ventana
    var y = parseInt((window.screen.height / 2) - (altura / 2));
    var x = parseInt((window.screen.width / 2) - (anchura / 2));

    // mostramos la ventana centrada
    window.open('' + base_url + 'index.php/ControladorReportesSalida/ReporteSalida?salida=' + salida + '', target = 'blank', 'width=' + anchura + ',height=' + altura + ',top=' + y + ',left=' + x + ',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,directories=no,resizable=no')
}
function ReporteVenta() {
 var factura = $("#documentoventa").val();   
    
 Swal.fire({
        title: 'Tipo de reporte',
        text: "Tamaño hoja",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#229320',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Ticket',
        confirmButtonText: '1/2 Carta'
    }).then(function (result) {
        if (result.value) {
            
    var altura = 380;
    var anchura = 630;
    // calculamos la posicion x e y para centrar la ventana
    var y = parseInt((window.screen.height / 2) - (altura / 2));
    var x = parseInt((window.screen.width / 2) - (anchura / 2));

    // mostramos la ventana centrada
    window.open('' + base_url + 'index.php/ControladorReportesVenta/ReporteVenta?factura=' + factura + '', target = 'blank', 'width=' + anchura + ',height=' + altura + ',top=' + y + ',left=' + x + ',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,directories=no,resizable=no')
        }else{
            
             var altura = 380;
    var anchura = 630;
    // calculamos la posicion x e y para centrar la ventana
    var y = parseInt((window.screen.height / 2) - (altura / 2));
    var x = parseInt((window.screen.width / 2) - (anchura / 2));

    // mostramos la ventana centrada
    window.open('' + base_url + 'index.php/Reportes/ticketventa?factura=' + factura + '', target = 'blank', 'width=' + anchura + ',height=' + altura + ',top=' + y + ',left=' + x + ',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,directories=no,resizable=no')
            
        }
  
    });   
}
function Reporte() {
    var entrada = $("#entrada").val();
    var proveedor = $("#proveedor").val();
    var factura = $("#nfactura").val();
    var tipo = $("#tipo").val();
    var fecha = $("#fechacompra").val();
    var altura = 380;
    var anchura = 630;

    // calculamos la posicion x e y para centrar la ventana
    var y = parseInt((window.screen.height / 2) - (altura / 2));
    var x = parseInt((window.screen.width / 2) - (anchura / 2));

    // mostramos la ventana centrada
    window.open('' + base_url + 'index.php/ControladorReportes/ReporteEntrada?entrada=' + entrada + '&tipo=' + tipo + '&proveedor=' + proveedor + '&fecha=' + fecha + '&factura=' + factura + '', target = 'blank', 'width=' + anchura + ',height=' + altura + ',top=' + y + ',left=' + x + ',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,directories=no,resizable=no')
}
function ReporteVentaServicio(){
   
    
    Swal.fire({
        title: 'Reportes',
        text: "Escoja el tipo de reporte",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#229320',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Detalle de cargos',
        confirmButtonText: 'Cuenta de cobro'
    }).then(function (result) {
        if (result.value) { 
            
    var factura = $("#documentoventa").val();
    var altura = 380;
    var anchura = 630;

    // calculamos la posicion x e y para centrar la ventana
    var y = parseInt((window.screen.height / 2) - (altura / 2));
    var x = parseInt((window.screen.width / 2) - (anchura / 2));

    // mostramos la ventana centrada
    window.open('' + base_url + 'index.php/ReporteCuentaCobro/CuentaCobro?factura=' + factura + '', target = 'blank', 'width=' + anchura + ',height=' + altura + ',top=' + y + ',left=' + x + ',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,directories=no,resizable=no')    

        }else{
            
    var factura = $("#documentoventa").val();
    var altura = 380;
    var anchura = 630;

    // calculamos la posicion x e y para centrar la ventana
    var y = parseInt((window.screen.height / 2) - (altura / 2));
    var x = parseInt((window.screen.width / 2) - (anchura / 2));

    // mostramos la ventana centrada
    window.open('' + base_url + 'index.php/ReporteDetalleServicio/getservicios?factura=' + factura + '', target = 'blank', 'width=' + anchura + ',height=' + altura + ',top=' + y + ',left=' + x + ',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,directories=no,resizable=no')   
            
        }
        
        
        
    });
    
    

}
function GuardarSalidas() {
    $('.imprimir').show();
    var datosentrada = [];
    var tipo = $("#tipo").val();
    var fecha = $("#fechasalida").val();
    $('#articulossalida .dato').each(function () {

        var that = $(this);
        var codigo = that.find('td').eq(0).text();
        var cantidad = that.find('td').eq(2).text();
        var valorunitario = that.find('td').eq(3).text();
        var total = that.find('td').eq(4).text();
        var datos = {
            'tipo': tipo,
            'fecha': fecha,
            'codigo': codigo,
            'cantidad': cantidad,
            'valorunitario': valorunitario,
            'total': total,
            'usuario':usuario,
        };
        datosentrada.push(datos);



    });




    if (datosentrada.length == 0) {
        swal.fire("Debe escoger al menos un item!!!");
        return false;
    }
    $.ajax({
        url: base_url + 'index.php/ControladorEntradaArticulo/SalidaArticulo',
        type: "post",
        data: {
            'array': JSON.stringify(datosentrada)
        },
        beforeSend: function (data) {
            swal.fire({
                title: "Generando salida...",
            });
        },
        success: function (data) {
            
            Swal.fire({
                type: 'success',
                title: 'Salida de articulo',
                text: 'Se genero la salida No.' + data,
            })
            $("#entrada").val(data);
            $("#tipo").prop('disabled', true);
            $("#entrada").prop('disabled', true);
            $(".coger").hide();
            $(".guardar").hide();
            $(".borrar").remove();
            
        }
    });


}
function guardartarifa() {
    codigo = $("#codigo").val();
    tarifa = $("#tarifa").val();

    $.ajax({
        url: base_url + 'index.php/ControladorArticulo/InsertTarifaArticulo',
        type: 'POST',
        data: {codigo: codigo, tarifa: tarifa,usuario:usuario},
        beforeSend: function (data) {

        },
        success: function (data) {


            if (data == 1) {
                $("#modaltarifas").modal('toggle');
                Swal.fire({
                    type: 'success',
                    title: 'Tarifa de articulo',
                    text: 'Tarifa guardada',
                })
                return false;
            }
            if (data == 2) {
                $("#modaltarifas").modal('toggle');
                Swal.fire({
                    type: 'success',
                    title: 'Tarifa de articulo',
                    text: 'Tarifa actualizada',
                })
                return false;
            } else {
                $(".msgtarifa").notify(data,
                        {position: "bottom"}
                )
                return false;
            }





        }
    })




}
function AgregarServicio(){
    $("#ModalVentasServicios").modal(); 
    getcargosservicios();
}
function AgregarVentasServicios()
{
    $("#buscarsalidas").modal();
        BuscarVentasServicios();

}
function pagos(){
    var factura = $("#facturapago").val();
    var total = $("#totalpago").val();


    
 Swal.fire({
        title: 'Desea generar el pago ?',
        text: "",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#229320',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Pagar'
    }).then(function (result) {
        if (result.value) {
         $.ajax({
       
       url:base_url + 'index.php/ControladorPagos/InsertPagos',
       type:"post",
       data:{factura:factura,total:total,usuario:usuario},
       beforeSend: function (data) {
            
        },
       success: function (data) {
           
        if(data == 1){
           
          Swal.fire({
                    type: 'success',
                    title: 'Pagos',
                    text: "Registro guardado",
                    
                }) 
                $('.BtnPagos').hide();
                $('#totalpago').prop('disabled',true);
           return false;
        }
         
          Swal.fire({
                    type: 'error',
                    title: 'Pagos',
                    text: data,
                    
                }) 
           
       
          
       } 
    });   
        }else{}
        
        
        
    });

 
    
}
function sumatotal(columna,tabla){
   var columna = columna;
   var tabla = tabla;
   var suma = [];
   $('#'+tabla+' .dato').each(function () {
        var that = $(this);
        var total = that.find('td').eq(columna).text();
           var datos = {
            'total': total.replace(',','')
        };
        suma.push(datos);
    }); 
    var totalfactura = 0;
    for(i = 0;i < suma.length;i ++){
       totalfactura += parseInt(suma[i]['total']); 
    }
    $("#txttotal").text(number_format(totalfactura));  
}
function GuardarCargoServicio(){
    var detalle = $('#editor2').val();
    var cliente = $('#cliente_servicio').val();
    var tipo = $('#tipo_servicio').val();
    var fecha = $('#fechatiposervicio').val();
    var totalcargo = $('#totalcargo').val();
    

    
    

    $.ajax({
        url:base_url + 'index.php/ControladorServicios/InsertServicio',
        type:"post",
        data:{detalle:detalle,cliente:cliente,tipo:tipo,fecha:fecha,usuario:usuario,totalcargo:totalcargo},
        beforeSend: function (data) {
            
           
        },
        success: function (data) {
            
            var msg = JSON.parse(data);
            
            
            if(msg[0] == 2){
              Swal.fire({
                    type: 'info',
                    title: 'Servicio',
                    text: msg[1],
                    
                })  
            }
            if(msg[0] == 1){
              Swal.fire({
                    type: 'success',
                    title: 'Servicio',
                    text: msg[1]+msg[2]+msg[3],
                    
                })
                
              $('#consecutivo').val(msg[2]+msg[3]);  
              $('.BtnCargoServicio').hide();
    
    $("#cliente_servicio").prop('disabled',true);
    $("#fechatiposervicio").prop('disabled',true);
    $("#tipo_servicio").prop('disabled',true);
    $("#editor2").prop('disabled',true);
    $("#totalcargo").prop('disabled',true);
    $('.imprimircargoservicio').show(); 
            }

        }
        
    })
    
 
    
}
function ActualizarCargoServicio(){
    var detalle = $('#editor2').val();
    var cliente = $('#cliente_servicio').val();
    var tipo = $('#tipo_servicio').val();
    var fecha = $('#fechatiposervicio').val();
    var totalcargo = $('#totalcargo').val();    
    var consecutivo = $("#consecutivo").val();
    
      $.ajax({
        url:base_url + 'index.php/ControladorServicios/UpdateServicio',
        type:"post",
        data:{detalle:detalle,cliente:cliente,tipo:tipo,fecha:fecha,usuario:usuario,totalcargo:totalcargo,consecutivo:consecutivo},
        beforeSend: function (data) {
            
           
        },
        success: function (data) {
            
               var msg = JSON.parse(data);
            
            
            if(msg[0] == 2){
              Swal.fire({
                    type: 'info',
                    title: 'Servicio',
                    text: msg[1],
                    
                })  
            }
                     if(msg[0] == 1){
              Swal.fire({
                    type: 'success',
                    title: 'Servicio',
                    text: msg[1],
                    
                })
                
 
              $('.BtnActualizarCargoServicio').hide();
    
              $("#cliente_servicio").prop('disabled',true);
              $("#fechatiposervicio").prop('disabled',true);
              $("#tipo_servicio").prop('disabled',true);
              $("#editor2").prop('disabled',true);
              $("#totalcargo").prop('disabled',true);
            }
            
        }
        
    
    
    
    
})
}
function buscarcargoservicio(){
    var parametro = 1;
    $.ajax({
        
                            url:base_url + 'index.php/ControladorServicios/GetServicios',
                            type: 'POST',
                            data:{parametro : parametro},
                            success: function (response) {

                             var datos = JSON.parse(response);

                                $('#tablacargosservicios').DataTable().destroy();
                                $('#tablacargosservicios').DataTable({
                                    data: datos,
                                    columns: [
                                        {"data": "idcargo_servicio"},
                                        {"data": "razonsocial"},
                                        {"data": "fecha_servicio"},
                                        {"data": "total"},
                                        {"defaultContent": "<button class='Btn Btn-info btn-xs escogerservicio' style='width:100%;text-align:center;'>Escoger</button>"},
                                    ]

                                });
                                $("#modalcargosservicios").modal();



                            }

                        })
                        
                       
                        
                        
}
function editarcargoservicio(){
    consecutivo = $("#consecutivo").val();
    $.ajax({
        
        url:base_url + 'index.php/ControladorServicios/validacionservicio',
        type:"post",
        data:{consecutivo:consecutivo},
        beforeSend: function (data) {
            
        },
        success: function (data) {
         var datos = JSON.parse(data);
         var ccobro = datos[0]['cuenta_cobro'];
         var estado = datos[0]['estado'];
         if(estado == 0){
         $("#cliente_servicio").prop('disabled',false);
         $("#fechatiposervicio").prop('disabled',false);
         $("#tipo_servicio").prop('disabled',false);
         $("#editor2").prop('disabled',false);
         $("#totalcargo").prop('disabled',false);
         $('.BtnActualizarCargoServicio').show();
         return false;
         }
         if(estado == 1){
              Swal.fire({
                    type: 'info',
                    title: 'Informacion',
                    text: 'El cargo esta anulado, no se puede editar',
                    
                })  
                return false;
         }           
         if(estado == 2){
                 Swal.fire({
                    type: 'info',
                    title: 'Informacion',
                    text: 'El servicio esta relacionado a la cuenta de cobro '+ ccobro +', por los tanto no se puede editar',
                    
                })  
                return false;
         }
      
         
        }
   
    })
 
}
function anularcargoservicio(){
    consecutivo = $("#consecutivo").val();
    
   Swal.fire({
        title: 'Desea anular el cargo '+consecutivo+' ?',
        text: "",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#229320',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Anular'
    }).then(function (result) {
        if (result.value) {
  
        $.ajax({
        
        url:base_url + 'index.php/ControladorServicios/anularcargo',
        type:"post",
        data:{consecutivo:consecutivo,usuario:usuario},
        beforeSend: function (data) {
            
        },
        success: function (data) {
           var msg = JSON.parse(data);
            if(msg[0] == 2){
              Swal.fire({
                    type: 'info',
                    title: 'Anulacion',
                    text: msg[1],
                    
                }) 
              return false;  
            }
            if(msg[0] == 1){
              Swal.fire({
                    type: 'success',
                    title: 'Anulacion',
                    text: msg[1],
                    
                })  
            }
          
        }
   
    })
        }else{}
  
    }); 

}
function imprimircargoservicio(){
   consecutivo = $("#consecutivo").val();
   var altura = 380;
    var anchura = 630;
    // calculamos la posicion x e y para centrar la ventana
    var y = parseInt((window.screen.height / 2) - (altura / 2));
    var x = parseInt((window.screen.width / 2) - (anchura / 2));

    // mostramos la ventana centrada
    window.open('' + base_url + 'index.php/Reportes/cargoservicio?consecutivo=' + consecutivo + '', target = 'blank', 'width=' + anchura + ',height=' + altura + ',top=' + y + ',left=' + x + ',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,directories=no,resizable=no')
   
}





