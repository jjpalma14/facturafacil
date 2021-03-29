<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"02");
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
                <li class="active">Cuentas de cobros</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div id="contenido">
                <div class="page-header">
                    <h1>
                        Cuentas
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            de cobro
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
                    <button class="btn btn-primary btn-xs addservicio" style="margin-top: 15px;margin-bottom: 5px;" onclick="AgregarServicio()"><i class="fa fa-plus"></i></button> 
                    <button class="btn btn-success btn-xs guardar" style="margin-top: 15px;margin-bottom: 5px" onclick="GuardarVentaServicio()"><i class="fa fa-save"></i></button>
                    <button class="btn btn-lighter btn-xs buscar" style="margin-top: 15px;margin-bottom: 5px;" onclick="AgregarVentasServicios()"><i class="fa fa-search"></i></button>
                    <button class="btn btn-danger btn-xs imprimir" style="margin-top: 15px;margin-bottom: 5px;" onclick="ReporteVentaServicio()"><i class="fa fa-print"></i></button>
                </div>
                <div class="col-md-12">
                    <div style="float: right;margin-top: -25px;border-bottom: medium solid #369;">Total: $ <span id="txttotal">0.00</span></div>
                    <table class="table table-sm table-condensed table-striped table-bordered " id="articulossalida" style="margin-top: 15px;font-size: 12px;">
                        <thead >
                            <tr>
                                <th>Id servicio</th>
                                <th>Tipo servicio</th>
                                <th>Valor Servicio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table
                </div>
                Observación:<textarea id ="observacion" class="form-control" style="resize: none;height: 100px;" placeholder="Ingrese la observacion"></textarea>
            </div>

        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
</div>
<div class="modal fade" id="ModalVentasServicios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Servicio</h5>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">


                        <table class="table table-condensed table-striped table-bordered"  id='tablacargosservicios' style="width:100%;font-size: 12px; ">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-plus"></i></th>
                                    <th>Servicio</th>
                                    <th>Id tipo</th>
                                    <th>Tipo</th>
                                    <th>Fecha</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table> 







                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm add" id="BtnSeleccionado">Agregar</button>
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

                        <table class="table table-condensed table-striped table-bordered"  id='tablaventasservicios' style="width:100%;font-size: 12px; ">
                            <thead>
                                <tr>
                                    <th>Factura</th>
                                    <th>Cliente</th>
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
<script src="<?php echo base_url() . "assets/" ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/buttons.flash.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/buttons.print.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/dataTables.select.min.js"></script>

<script>
                        function getcargosservicios() {
                            $.ajax({
                                url: base_url + 'index.php/ControladorServicios/getcargos',
                                type: 'POST',
                                data: {cliente: $("#cliente").val()},
                                success: function (response) {
                                    var datos = JSON.parse(response);
                                    var table = $('#tablacargosservicios').DataTable().destroy();
                                    var table = $('#tablacargosservicios').DataTable({
                                        data: datos,
                                        columns: [
                                            {"defaultContent": ""},
                                            {"data": "idcargo_servicio"},
                                            {"data": "idtipo_servicio"},
                                            {"data": "tipo"},
                                            {"data": "fecha_servicio"},
                                            {"data": "total"},
                                        ],
                                        columnDefs: [{
                                                orderable: false,
                                                className: 'select-checkbox',
                                                targets: 0
                                            }],
                                        select: {
                                            style: 'multi', //'os' para seleccion unica 
                                            selector: 'td:first-child'
                                        }




                                    });

                                }



                            });
                        }


                        $('#BtnSeleccionado').click(function () {
                            var table = $('#tablacargosservicios').DataTable();
                            var registros = table.rows('.selected').data().toArray();
                            
                            codigos = [];
                            for(var i = 0;i < registros.length;i ++){
                                var codigo_servicio = registros[i]['idcargo_servicio'];
                                codigos.push(codigo_servicio);
                            }
                        var datosentrada = [];
                        $('#articulossalida .dato').each(function () {
                            var that = $(this);
                            var codigo2 = that.find('td').eq(0).text();
                            datosentrada.push(codigo2);
                        });
                        
                        for(var i = 0;i < registros.length;i ++){
                                               
                        
                            if (jQuery.inArray(codigos[i], datosentrada) >= 0) {
                            $(".dataTables_length").notify(
                                    "Uno o mas cargos ya han sido seleccionados",
                                    {position: "right"}
                            );
                            return false;
                        }
                        }
               
                        

                          if (registros.length == 0) {
                                Swal.fire({
                                    type: 'info',
                                    title: 'Servicios',
                                    text: 'Debe seleccionar al menos un item',

                                })
                                return false;
                            } else {
                                
                                for (j = 0; j < registros.length; j++) {
                                    
                                    
                                    
                                    $('#articulossalida tbody').append("<tr class='dato'><td>" + registros[j]['idcargo_servicio'] + "</td><td>" + registros[j]['tipo'] + "</td><td>" + number_format(registros[j]['total']) + "</td><td><button type='button' class='btn btn-danger btn-xs borrar'><i class='fa  fa-trash'></i></button></td></tr>");
                                }
                                sumatotal(2, 'articulossalida');
                                $(".guardar").show();
                                }
                        })





                        function BuscarVentasServicios() {
                            $.ajax({
                                url: base_url + 'index.php/ControladorVentasServicios/VentasServicios',
                                type: 'POST',
                                success: function (response) {



                                    var ventas = JSON.parse(response);



                                    $('#tablaventasservicios').DataTable().destroy();
                                    $('#tablaventasservicios').DataTable({
                                        data: ventas,
                                        columns: [
                                            {"data": "factura"},
                                            {"data": "razonsocial"},
                                            {"data": "fecha_registro"},
                                            {"data": "total"},
                                            {"defaultContent": "<button class='Btn Btn-info btn-xs escogerventa' style='width:100%;text-align:center;'>Escoger</button>"},
                                        ]

                                    });
                                    $('#tablaventasservicios tbody').on('click', '.escogerventa', function () {
                                        
                                        
                                        
                                        
                                        $("#observacion").prop('disabled', true);
                                        var factura = $(this).parents("tr").find("td").eq(0).text();
                                        $.ajax({
                                            url: base_url + 'index.php/ControladorVentasServicios/GetVentasServicios',
                                            type: 'POST',
                                            data: {factura: factura},
                                            success: function (response) {
                                                $('.dato').remove();
                                                var datos = JSON.parse(response);
                                                
                                              


                                               var observacion = "";
                                                for (var i = 0; i < datos.length; i++) {
                                                    observacion = datos[i]['observacion'];
                                                    $("#cliente").val(datos[i]['idclientes']);
                                                    $("#fechaventa").val(datos[i]['fecha_registro']);
                                                    $("#tipo").val(datos[i]['tipo']);
                                                    $("#documentoventa").val(datos[i]['factura']);

                                                   $('#articulossalida tbody').append("<tr class='dato'><td>" + datos[i]['idcargo_servicio'] + "</td><td>" + datos[i]['tiposervicio'] + "</td><td>" + number_format(datos[i]['total']) + "</td><td></td></tr>");
                                                    sumatotal(2, 'articulossalida');
                                                }
                                                ;
                                                $("#observacion").val(observacion);
                                                $("#cliente").prop('disabled', true);
                                                $("#tipo").prop('disabled', true);
                                                $(".addservicio").hide();
                                                $(".guardar").hide();
                                                $('.imprimir').show();
                                                $("#buscarsalidas").modal('hide');
                                                
                                            }
                                        });
                                    })




                                }

                            })
                        }

                        $(document).on('click', '.borrar', function (event) {
                            event.preventDefault();
                            $(this).closest('tr').remove();
                            sumatotal(2, 'articulossalida');
                        });
                        $(document).ready(function () {
                            $('.imprimir').hide();
                            $("#observacion").prop('disabled', true);
                        })
</script>




