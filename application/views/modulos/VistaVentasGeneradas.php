<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"14");
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
                <li class="active">Ventas generadas</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Ventas Generadas
                </h1>
            </div>
            <button class="btn btn-info btn-xs" style="margin-bottom: 5px;" onclick="window.location='<?php echo base_url() . "index.php/ventas" ?>';"><i class="fa fa-plus"></i> Nuevo registro</button>
            <table class="table table-condensed table-striped table-bordered "  id='tablaservicios' style="width:100%;font-size: 14px; ">
                <thead>
                    <tr>
                        <th>FACTURA</th>
                        <th>CLIENTE</th>
                        <th>FECHA</th>
                        <th>VALOR</th>
                        <th>IMPRIMIR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($totalventaarticulos as $item) {
                     echo "<tr>";
                     echo "<td>".$item->factura."</td>";
                     echo "<td>".$item->razonsocial."</td>";
                     echo "<td>".$item->fecha_registro."</td>";
                     echo "<td>".number_format($item->total)."</td>";
                     echo "<td><button class='Btn btn-danger btn-xs imprimircargo'><i class='fa fa-print'></i></button></td>";
                    }
                    ?>
                </tbody>
            </table>
           
            
        </div>
    </div>
</div>
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script>
$(document).ready(function (){
    $('#tablaservicios').DataTable({
        "order": [[3, "desc"]],
});
 $('#tablaservicios tbody').on('click', '.imprimircargo', function () {
       var altura = 380;
    var anchura = 630;
    // calculamos la posicion x e y para centrar la ventana
    var y = parseInt((window.screen.height / 2) - (altura / 2));
    var x = parseInt((window.screen.width / 2) - (anchura / 2));
     var consecutivo = $(this).parents("tr").find("td").eq(0).text();
     window.open('' + base_url + 'index.php/ControladorReportesVenta/ReporteVenta?factura=' + consecutivo + '', target = 'blank', 'width=' + anchura + ',height=' + altura + ',top=' + y + ',left=' + x + ',toolbar=no,location=no,status=no,menubar=no,scrollbars=no,directories=no,resizable=no')
     
     
 })
})
</script>



