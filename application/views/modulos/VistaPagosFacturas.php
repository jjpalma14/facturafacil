<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"11");
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
                <li class="active">Facturas pendientes por cobrar</li>
            </ul><!-- /.breadcrumb -->

      
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Facturas pendientes por cobrar

                </h1>
            </div>
                 <div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
               
    <div class="widget-body">
                                    <div class="widget-main padding-6 no-padding-left no-padding-right">
                                    <table class="table table-condensed table-striped table-bordered"  id='tablafacturascreditos' style="width:100%;font-size: 14px; ">
                                            <thead>
                                                <tr>
                                                    <th>Factura</th>
                                                    <th>Cliente</th>
                                                    <th>Total factura</th>
                                                    <th>Total Pagado</th>
                                                    <th>Saldo</th>
                                                    <th>Fecha</th>
                                                     <th>Estado</th>
                                                  
                                                </tr>
                                            </thead>
                                            <body>
                                                <?php
                                                $saldo = 0;
                                                foreach ($totalcobrar as $item) { 
                                                $obj = new ModeloVenta;
                                                $saldos = $obj->TotalPagos($item->factura);
                                                foreach ($saldos as $item2) {
                                                       $saldo = $item2->totalpagado;
                                                  } 
                                                $saldo2 = $item->total_credito - $item2->totalpagado;  
                                                  echo "<tr>"; 
                                                  echo "<td>".$item->factura."</td>";
                                                  echo "<td>".$item->razonsocial."</td>";
                                                  echo "<td>".number_format($item->total_credito)."</td>";
                                                  echo "<td>".number_format($item2->totalpagado)."</td>";
                                                  echo "<td>".number_format($saldo2)."</td>";
                                                  echo "<td>".$item->fecha_registro."</td>";
                                                  if($saldo2 <= 0){
                                                      echo "<td><span class='label label-success '>Pagada</span></td>";
                                                  }else{
                                                     echo "<td><span class='label label-warning '>En mora</span><button type='button' class='form btn btn-info btn-xs tarifa' style='margin-left:5px;'> <span class='glyphicon glyphicon-usd'></span></button></td>";
                                                  }
                                              
                                                 
                                                  echo "</tr>";  
                                                  
                                                  
                                                  
                                                }
                                                ?>
                                            </body>
                                        </table>
                                    </div>
    </div>
                 </div>
        </div><!-- /.page-content -->
    </div>
</div>
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script><!-- /.main-content -->
<script>
 $(document).ready(function(){
$('#tablafacturascreditos').DataTable({
    "order": [[6, "asc"]],
});

 })
 $('#tablafacturascreditos tbody').on('click', '.tarifa', function () {
     
     var factura = $(this).parents("tr").find("td").eq(0).text();
     window.location.href = '' + base_url + 'index.php/pagoscreditos?factura=' + factura + '';
     
     
 })
</script>




