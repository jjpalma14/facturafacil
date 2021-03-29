<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"01");
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
                <li class="active">Ventas</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">


            <div id="contenido">
                <div class="page-header">
                    <h1>
                        Ventas 
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Productos
                        </small>
                    </h1>

                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-3">
                            Cliente:<select class="form-control input-sm" id="cliente">
                                <?php
                                foreach ($clientes as $item) {
                                    echo "<option value='" . $item->idclientes . "'>" . $item->razonsocial . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            Tipo de venta:<select class="form-control input-sm" id="tipo">
                                <option value="1">Contado</option>
                                <option value="2">Credito</option>
                            </select>
                        </div>
                        <div class="col-md-3" >
                            Fecha:<input type="text" class="form-control input-sm"  id="fechaventa">
                        </div>
                        <div class="col-md-3">
                            No. Venta:<input type="text" class="form-control input-sm" id="documentoventa">
                        </div>
                    </div>
                    <button class="btn btn-info btn-xs nuevo" style="margin-top: 15px;margin-bottom: 5px;" ><i class="fa fa-file"></i></button>
                    <button class="btn btn-primary btn-xs coger" style="margin-top: 15px;margin-bottom: 5px;" onclick="AgregarArticulosSalida()"><i class="fa fa-plus"></i></button> 
                    <button class="btn btn-success btn-xs guardar" style="margin-top: 15px;margin-bottom: 5px" onclick="GuardarVenta()"><i class="fa fa-save"></i></button>
                    <button class="btn btn-lighter btn-xs buscar" style="margin-top: 15px;margin-bottom: 5px;" onclick="AgregarSalidas()"><i class="fa fa-search"></i></button>
                    <button class="btn btn-danger btn-xs imprimir" style="margin-top: 15px;margin-bottom: 5px;" onclick="ReporteVenta()"><i class="fa fa-print"></i></button>
                </div>
                <div class="col-md-12">
                    <div style="float: right;margin-top: -25px;border-bottom: medium solid #369;">Total: $ <span id="txttotal">0.00</span></div>
                    <table class="table table-sm table-condensed table-striped table-bordered " id="articulossalida" style="margin-top: 15px;font-size: 12px;">
                        <thead >
                            <tr>
                                <th>Codigo</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Valor Unitario</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>




            </div>

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<div class="modal fade" id="ModalSalidaArticulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" style=" max-width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lista de articulos<small style="color:red;"> (los articulos sin tarifa no apareceran en este listado)</small></h5>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                        <table class="table table-condensed table-striped table-bordered"  id='tablasalidaarticulos' style="width:100%;font-size: 12px; ">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>valor</th>
                                    <th>Cantidad</th>
                                    <th>Saldo</th>
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
<div class="modal fade" id="buscarsalidas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" style=" max-width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consultar</h5>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                        <table class="table table-condensed table-striped table-bordered"  id='tablasalidas' style="width:100%;font-size: 12px; ">
                            <thead>
                                <tr>
                                    <th>Factura</th>
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
                    function GetSaldos() {


                        $.ajax({
                            url: base_url + 'index.php/ControladorArticulo/GetSaldosVentas',
                            type: 'POST',
                            success: function (response) {

                                var articulos = JSON.parse(response);

                                $('#tablasalidaarticulos').DataTable().destroy();
                                $('#tablasalidaarticulos').DataTable({
                                    data: articulos,
                                    columns: [
                                        {"data": "codigo"},
                                        {"data": "descripcion"},
                                        {"data": "tarifa_actual"},
                                        {"defaultContent": "<input type='number' min='1' pattern='^[0-9]+' class='input-sm cantidad' style='width:100%;text-align:center;'>"},
                                        {data: "stock", render: function (data, type, row) {
                                                if (data == null) {
                                                    return '0';
                                                } else {
                                                    return data;
                                                }
                                            }
                                        },
                                        {"defaultContent": "<button class='Btn Btn-info btn-xs escoger' style='width:100%;text-align:center;'>Escoger</button>"},
                                    ],
                                });
                            }

                        })
                    }
                    function GetSalidas() {
                    
                        var parametro = 1;
                        $.ajax({
                            url: base_url + 'index.php/ControladorEntradaArticulo/GetSalidas',
                            type: 'POST',
                            data:{parametro : parametro},
                            success: function (response) {



                                var entradas = JSON.parse(response);

                                $('#tablasalidas').DataTable().destroy();
                                $('#tablasalidas').DataTable({
                                    data: entradas,
                                    columns: [
                                        {"data": "documento_salida"},
                                        {"data": "fecha"},
                                        {"data": "valor"},
                                        {"defaultContent": "<button class='Btn Btn-info btn-xs escogerentrada' style='width:100%;text-align:center;'>Escoger</button>"},
                                    ]

                                });
                                $("#buscarentradas").modal();



                            }

                        })
                    }
                    $('#tablasalidaarticulos tbody').on('click', '.escoger', function () {




                        var codigo = $(this).parents("tr").find("td").eq(0).text();
                        var articulo = $(this).parents("tr").find("td").eq(1).text();
                        var valor = $(this).parents("tr").find("td").eq(2).text();
                        var stock = $(this).parents("tr").find("td").eq(4).text();
                        var cantidad = $(this).parents("tr").find(".cantidad").val();
                        var total = cantidad * valor;




                        if (parseInt(cantidad) > parseInt(stock)) {
                            $(".dataTables_length").notify(
                                    "No puedes sacar mas de lo que tienes en stock",
                                    {position: "right"}
                            );
                            return false;
                        }


                        var datosentrada = [];
                        $('#articulossalida .dato').each(function () {
                            var that = $(this);
                            var codigo2 = that.find('td').eq(0).text();
                            datosentrada.push(codigo2);
                        });


                        if (jQuery.inArray(codigo, datosentrada) >= 0) {
                            $(".dataTables_length").notify(
                                    "Ya has seleccionado el item!!",
                                    {position: "right"}
                            );
                            return false;
                        }
                        ;

                        if (cantidad.length == 0 || cantidad <= 0) {
                            $(".dataTables_length").notify(
                                    "El campo cantidad  debe ser mayor a 0!!",
                                    {position: "right"}
                            );
                            return false;
                        } else {


                            $("#entrada").val("");

                            $('#articulossalida tbody').append("<tr class='dato'><td>" + codigo + "</td><td>" + articulo + "</td><td>" + cantidad + "</td><td>" + number_format(valor) + "</td><td>" + number_format(total) + "</td><td><button type='button' class='btn btn-danger btn-xs borrar'><i class='fa  fa-trash'></i></button></td></tr>");
                            $(".guardar").show();
                        }

                         sumatotal(4,'articulossalida');
                    });
                    $('#tablasalidas tbody').on('click', '.escogerentrada', function () {
                        $('.imprimir').show();
                        $('.coger').hide();
                        $('.guardar').hide();
                        $("#tipo").prop('disabled', true);
                        $("#cliente").prop('disabled', true);
                        $("#documentoventa").prop('disabled', true);

                        $('.dato').remove();
                        var factura = $(this).parents("tr").find("td").eq(0).text();

                        $.ajax({
                            url: base_url + 'index.php/ControladorVentas/DetalleVenta',
                            type: 'POST',
                            data: {factura: factura},
                            success: function (response) {

                                var datos = JSON.parse(response);
                                for (var i = 0; i < datos.length; i++) {

                                    var total = datos[i]['cantidad'] * datos[i]['valor_unitario'];
                                    $('#articulossalida tbody').append("<tr class='dato'><td>" + datos[i]['cod_articulo'] + "</td><td>" + datos[i]['descripcion'] + "</td><td>" + datos[i]['cantidad'] + "</td><td>" + number_format(datos[i]['valor_unitario']) + "</td><td>" + number_format(total) + "</td><td></td></tr>");
                                    sumatotal(4,'articulossalida');
                                }
                                $("#documentoventa").val(datos[0]['factura']);
                                $("#tipo").val(datos[0]['tipo']);
                                $("#cliente").val(datos[0]['cliente']);
                                $("#fechaventa").val(datos[0]['fecha_registro']);
                                $('#buscarsalidas').modal('hide');


                            }
                        });

                     
                    })
                    $(document).on('click', '.borrar', function (event) {
                        event.preventDefault();
                        $(this).closest('tr').remove();
                        sumatotal(4,'articulossalida');
                    });
                    $(document).ready(function () {

                        $('.imprimir').hide();

                    })
</script>



