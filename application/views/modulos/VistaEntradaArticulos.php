<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"04");
foreach ($data as $permiso) {
    $permiso = $permiso->permiso;
}
if($permiso == 0){
    ?>
<script>
     window.location.href = '' + base_url + 'index.php/errorpermisos';
</script>
<?php
}
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url() . "index.php/home" ?>">Home</a>
                </li>
                <li class="active">Entrada de articulos</li>
            </ul><!-- /.breadcrumb -->

  
        </div>

        <div class="page-content">

            <div class="page-header titulo">
                <h1>
                    Entrada de articulos

                </h1>
            </div>


            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-3">
                        Tipo:<select class="form-control input-sm" id="tipo">
                            <option value="01">Entrada por compras</option>
                            <option value="02">Obsequios</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        Proveedor:<select class="form-control input-sm" id="proveedor">
                            <?php
                            foreach ($proveedores as $item) {
                                echo "<option value=" . $item->idproveedores . ">" . $item->razonsocial . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2" >
                        No. factura:<input type="text" class="form-control input-sm" id="nfactura">
                    </div>
                    <div class="col-md-2" >
                        Fecha:<input type="text" class="form-control input-sm"  id="fechacompra">
                    </div>
                    <div class="col-md-2">
                        No. Entrada:<input type="text" class="form-control input-sm" id="entrada">
                    </div>
                </div>
                <button class="btn btn-info btn-xs nuevo" style="margin-top: 15px;margin-bottom: 5px;" onclick=""><i class="fa fa-file"></i></button>
                <button class="btn btn-primary btn-xs coger" style="margin-top: 15px;margin-bottom: 5px;" onclick="AgregarArticulosCompras()"><i class="fa fa-plus"></i></button> 
                <button class="btn btn-success btn-xs guardar" style="margin-top: 15px;margin-bottom: 5px" onclick="GuardarEntrada()"><i class="fa fa-save"></i></button>
                <button class="btn btn-lighter btn-xs buscar" style="margin-top: 15px;margin-bottom: 5px;" onclick="AgregarEntradas()"><i class="fa fa-search"></i></button>
                <button class="btn btn-danger btn-xs imprimir" style="margin-top: 15px;margin-bottom: 5px;" onclick="Reporte()"><i class="fa fa-print"></i></button>
                <button class="btn btn-white btn-warning btn-bold btn-sm imprimir" style="margin-top: 15px;margin-bottom: 5px;background-color:red" onclick=""><i class="fa fa-times-circle"></i></button>

            </div>

            <div class="col-md-12">
                 <div style="float: right;margin-top: -25px;border-bottom: medium solid #369;">Total: $ <span id="txttotal">0.00</span></div>
                <table class="table table-sm table-condensed table-striped table-bordered " id="articuloscompra" style="margin-top: 15px;font-size: 12px;">
                    <thead >
                        <tr>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Valor unitario</th>
                            <th>Valor total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="imprimir"></div>
            </div>
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<div class="modal fade" id="ModalEntradaArticulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" style=" max-width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Entrada de articulos</h5>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                        <table class="table table-condensed table-striped table-bordered"  id='tablaarticulos' style="width:100%;font-size: 12px; ">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Valor Unitario</th>
                                    <th>Escoger</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Terminado</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="buscarentradas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" style=" max-width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consultar</h5>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                        <table class="table table-condensed table-striped table-bordered"  id='tablaentradas' style="width:100%;font-size: 12px; ">
                            <thead>
                                <tr>
                                    <th>Entrada</th>
                                    <th>Proveedor</th>
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                    <th>Escoger</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/funciones.js"></script>
<script>
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
                    function GetEntradas() {


                        $.ajax({
                            url: base_url + 'index.php/ControladorEntradaArticulo/GetEntradas',
                            type: 'POST',
                            success: function (response) {



                                var entradas = JSON.parse(response);

                                $('#tablaentradas').DataTable().destroy();
                                $('#tablaentradas').DataTable({
                                    data: entradas,
                                    columns: [
                                        {"data": "identradas"},
                                        {"data": "razonsocial"},
                                        {"data": "fecha"},
                                        {"data": "valor_total"},
                                        {"defaultContent": "<button class='Btn Btn-info btn-xs escogerentrada' style='width:100%;text-align:center;'>Escoger</button>"},
                                    ]

                                });
                                $("#buscarentradas").modal();



                            }

                        })
                    }

                    $('#tablaentradas tbody').on('click', '.escogerentrada', function () {
                        $('.imprimir').show();
                        $('.coger').hide();
                        $('.guardar').hide();
                        $("#tipo").prop('disabled', true);
                        $("#proveedor").prop('disabled', true);
                        $("#nfactura").prop('disabled', true);
                        $("#entrada").prop('disabled', true);
                        
                       

                        $('.dato').remove();
                        var identrada = $(this).parents("tr").find("td").eq(0).text();

                        $.ajax({
                            url: base_url + 'index.php/ControladorEntradaArticulo/DetalleEntrada',
                            type: 'POST',
                            data: {identrada: identrada},
                            success: function (response) {

                                var datos = JSON.parse(response);

                                for (var i = 0; i < datos.length; i++) {

                                    $('#articuloscompra tbody').append("<tr class='dato'><td>" + datos[i]['codigo_producto'] + "</td><td>" + datos[i]['descripcion'] + "</td><td>" + datos[i]['cantidad'] + "</td><td>" + number_format(datos[i]['valor_unitario']) + "</td><td>" + number_format(datos[i]['valor_total']) + "</td><td></td></tr>");
                                    sumatotal(4,'articuloscompra');
                                }
                                $("#entrada").val(datos[0]['identradas']);
                                $("#fechacompra").val(datos[0]['fecha']);
                                $("#nfactura").val(datos[0]['numero_factura']);
                                $("#proveedor").val(datos[0]['proveedor']);
                                $('#buscarentradas').modal('hide');


                            }
                        });


                    })
                    function GetArticulos() {

                        
                        $.ajax({
                            url: base_url + 'index.php/ControladorArticulo/GetArticulos',
                            type: 'POST',
                            data:{parametro:2},
                            success: function (response) {



                                var articulos = JSON.parse(response);

                                $('#tablaarticulos').DataTable().destroy();
                                $('#tablaarticulos').DataTable({
                                    data: articulos,
                                    columns: [
                                        {"data": "codigo"},
                                        {"data": "descripcion"},
                                        {"defaultContent": "<input type='number' class='input-sm cantidad' style='width:100%;text-align:center;'>"},
                                        {"defaultContent": "<input type='text'  class='input-sm valor' style='width:100%;text-align:center;'>"},
                                        {"defaultContent": "<button class='Btn Btn-info btn-xs escoger' style='width:100%;text-align:center;'>Escoger</button>"},
                                    ]

                                });


                            }

                        })
                    }

                    $('#tablaarticulos tbody').on('click', '.escoger', function () {




                        var codigo = $(this).parents("tr").find("td").eq(0).text();
                        var articulo = $(this).parents("tr").find("td").eq(1).text();
                        var cantidad = $(this).parents("tr").find(".cantidad").val();
                        var valor = $(this).parents("tr").find(".valor").val();
                        var total = cantidad * valor;


                            var datosentrada = [];
                            $('#articuloscompra .dato').each(function () {
                            var that = $(this);
                            var codigo2 = that.find('td').eq(0).text();
                             datosentrada.push(codigo2);
                            });
                            
                        
                        if(jQuery.inArray( codigo , datosentrada ) >= 0 ){
                            $(".dataTables_length").notify(
                                    "Ya has seleccionado el item!!",
                                    {position: "right"}
                            );
                            return false;
                        };
                        
                        if (cantidad.length == 0 || valor.length == 0 || cantidad == 0 || valor == 0) {
                            $(".dataTables_length").notify(
                                    "El campo cantidad o valor debe ser mayor a 0!!",
                                    {position: "right"}
                            );
                            return false;
                        } else {


                            $("#entrada").val("");

                            $('#articuloscompra tbody').append("<tr class='dato'><td>" + codigo + "</td><td>" + articulo + "</td><td>" + cantidad + "</td><td>" + number_format(valor) + "</td><td>" + number_format(total) + "</td><td><button type='button' class='btn btn-danger btn-xs borrar'><i class='fa  fa-trash'></i></button></td></tr>");
                            sumatotal(4,'articuloscompra');
                            $(".guardar").show();
                        }


                    });
                    $(document).ready(function () {
                        $("#fechacompra").prop('disabled', true);
                        $('.imprimir').hide();

                    })
                    $(document).on('click', '.borrar', function (event) {
                        event.preventDefault();
                        $(this).closest('tr').remove();
                        sumatotal(4,'articuloscompra');
                    });

</script>
