<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"09");
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
$factura = $_GET['factura'];
$data = array();
$this->load->model('ModeloVenta');
$obj = new ModeloVenta();
$data = $obj->TotalVentasCreditosFactura($factura);
$data2 = $obj->TotalPagos($factura);
$saldo = 0;
foreach ($data as $item) {
    $factura = $item->factura;
    $cliente = $item->razonsocial;
    $totalcredito = $item->total_credito;
}
foreach ($data2 as $item) {
    $totalpagado = $item->totalpagado;
}
$saldo = $totalcredito - $totalpagado;
?>
<div class="main-content">
 
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url() . "index.php/home" ?>">Home</a>
                </li>
                <li class="active">Pagos creditos</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Pagos creditos

                </h1>
            </div>


            <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable" id="widget-container-col-1">
                <div class="widget-box ui-sortable-handle" id="widget-box-1">
                    <div class="widget-header">
                        <h5 class="widget-title">Pagos</h5>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">  
                        
                                <label>
                                    <input name="switch-field-1" id="checkpagos" class="ace ace-switch" type="checkbox" checked>
                                    <span class="lbl"></span>
                                </label>
                      
                            <div class="row">
                                <div class="col-md-12">
                                    Factura:<input class="form-control input-sm" id="facturapago" value="<?php echo $factura ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Cliente:<input class="form-control input-sm" id="clientepago" value="<?php echo $cliente ?>">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    Total a pagar:<input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" class="form-control input-sm" id="totalpago" value="<?php echo number_format($saldo) ?>">
                                </div>
                            </div>
                            <a href="<?php echo base_url() . "index.php/PagosFacturasCreditos" ?>" class="btn btn-secondary btn-xs" style="margin-top: 10px;">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Atrás
                            </a>
                            <button class="Btn btn-success btn-xs BtnPagos" style="margin-top: 10px;" onclick="pagos()"><span id="msgboton">Pago total</span></button>
                        </div>
                    </div>
                </div>
            </div>





        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/funciones.js"></script>
<script>
const checkbox = document.getElementById('checkpagos')
var total = <?php echo $saldo ?>;
checkbox.addEventListener('change', (event) => {
  if (event.currentTarget.checked) {
    $("#totalpago").prop('disabled',true);
    $("#totalpago").val(total);
    $("#msgboton").text("Pago total");
  } else {
    $("#totalpago").prop('disabled',false);
    $("#totalpago").val("");
    $("#msgboton").text("Pago parcial");
    $( "#totalpago" ).focus();
    
  }
})
  
</script>


