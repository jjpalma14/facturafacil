<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"12");
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
                <li class="active">Reportes</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header">
                <h1>
                    Detallado de ventas

                </h1>
            </div>
           
            
            
            
            <div class="row">
                <div class="col-sm-4">
                    Elija el rango de fecha a consultar:
                    <div class="input-daterange input-group">
                        <input type="text" class="input-sm form-control" name="start" id="inicio" data-date-format="yyyy-mm-dd">
                        <span class="input-group-addon">
                            <i class="fa fa-exchange"></i>
                        </span>
                        <input type="text" class="input-sm form-control" name="end" id="fin" data-date-format="yyyy-mm-dd">
                        
                    </div>
                   
                    
                </div>
                <button class="Btn Btn-info btn-xs" id="BtnConsultarDetalleVenta" type="button" style="margin-top: 20px;"><i class="fa fa-search"></i> Consultar</button>
            </div>
            <i class="ace-icon fa fa-spinner fa-spin  bigger-180" style="margin-top: 15px;" id="icocargando"></i>
            <div class="row">
                <div class="col-md-8">
                  <iframe style='display:none;margin-top: 15px;border: 3px #147BA7 solid;' id='frame' width='100%' height='500' frameborder='0'></iframe>  
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/reportes.js"></script>
<script>
$(document).ready(function (){
    $('#inicio').datepicker();
    $('#fin').datepicker();
    $("#icocargando").hide();
})
</script>

