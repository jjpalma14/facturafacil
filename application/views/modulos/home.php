
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url() . "index.php/home" ?>">Home</a>
                </li>
                <li class="active">Escritorio</li>
            </ul><!-- /.breadcrumb -->
            <span style="float: right" class="text-info"><?php echo "<i class='fa fa-calendar'></i> ".date('M')." de ".date('Y');?></span>
        </div>
        

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Hola,
                            <?php echo $_SESSION['login_user']; ?>
                </h1>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"> <?php echo json_encode(count($total)); ?></div>
                                <div>Articulos</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . "index.php/articulos" ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <?php
            $tventaarticulo = 0;
            foreach ($totalventaarticulos as $ventaarticulo) {
             
             $tventaarticulo += $ventaarticulo->total;   
                
            }
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-basket fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"> <?php echo count($totalventaarticulos) ?></div>
                                <div>Ventas articulos</div>
                                <div class="infobox-content"><b><?php echo "$ ".number_format($tventaarticulo) ?></b></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . "index.php/ventasgeneradasart" ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-dollar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"> <?php
                                    $valorfactura = 0;
                                    $valorpagos = 0;
                                    foreach ($totalcobrar as $item) {
                                        $valorfactura += $item->total_credito;
                                    }
                                    foreach ($totalpagos as $item) {
                                        $valorpagos += $item->totalpagado;
                                    }


                                    echo json_encode(count($totalcobrar));
                                    ?></div>
                                <div>Facturas por cobrar</div>
                                <div class="infobox-content"><b><?php echo "$ " . number_format($valorfactura-$valorpagos); ?></b></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . "index.php/PagosFacturasCreditos" ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-laptop fa-5x"></i>
                            </div>
                            <?php 
                            $totalservicio = 0;
                                                                foreach ($servicios as $value) {
                                                                  $totalservicio += $value->total;  
                                                                }
                            ?>
                            <div class="col-xs-9 text-right">
                                <div class="huge"> <?php echo json_encode(count($servicios)); ?></div>
                                <div>Servicios</div>
                                <div class="infobox-content"><b><?php echo "$ " . number_format($totalservicio); ?></b></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . "index.php/servicios" ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Detalle</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-md-6">
                <div class="widget-box ui-sortable-handle" id="widget-box-1">
                    <div class="widget-header">
                                <h5 class="widget-title">Ventas <i class="ace-icon fa fa-angle-double-right"></i><small>
                            <span  class="text-info"><?php echo "<i class='fa fa-calendar'></i> ".date('M')." de ".date('Y');?></span>
                            </small></h5>

                        <div class="widget-toolbar">
                        

                           
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                       <canvas id="graficoventas" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" >
                <div class="widget-box ui-sortable-handle" id="widget-box-1">
                    <div class="widget-header">
                                <h5 class="widget-title">Stock de articulos</h5>

                        <div class="widget-toolbar">
                        

                           
                        </div>
                    </div>

                    <div class="widget-body" >
                        <div class="widget-main" >
                     
                                         <table class="table table-condensed table-striped table-bordered"  id='tablasaldos' style="width:100%;font-size: 12px;">
                                             <thead>
                                                 <tr>
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                            </table>
                            
                            
                        </div>
                    </div>
                </div>
            </div>

          <div class="col-md-12">
                <div class="widget-box ui-sortable-handle" id="widget-box-1">
                    <div class="widget-header">
                                <h5 class="widget-title">Ventas <i class="ace-icon fa fa-angle-double-right"></i><small>
                            </small></h5>
                        <div class="widget-toolbar">
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                       <canvas id="graficoventas2" width="400" height="120"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/Chart.min.js"></script>
<script>
var ventasservicios = <?php echo json_encode(count($servicios)); ?>;

var datos = [];
datos = <?php echo json_encode($acumuladoventas);?>;
var servicio = datos[0]['acumulado'];
var acticulo = datos[1]['acumulado'];
var ctx = $('#graficoventas');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Articulos', 'Servicios'],
        datasets: [{
            label: 'Acumulado',
            data: [ acticulo,ventasservicios], 
            backgroundColor: [
                'rgba(255, 99, 132,0.6)',
                'rgba(44, 138, 222,0.6)',
          
            ],
    
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
         $.ajax({
                url: base_url + 'index.php/ControladorArticulo/GetSaldos',
                type: 'POST',
                data:{parametro:2},
                success: function (response) {



                    var articulos = JSON.parse(response);

                   $('#tablasaldos').DataTable().destroy();
                    $('#tablasaldos').DataTable({
                        pageLength : 5,
                        "order": [[2, "desc"]],
                        "searching": false,
                        "lengthChange": false,
                        "info":     false,
                        "paging":   false,
                        "scrollY":        "172px",
                        "scrollCollapse": true,
                        
                        
                        data: articulos,
                        columns: [
                            {"data": "codigo_producto"},
                            {"data": "descripcion"},
                            {"data": "stock"},
                        ]


                    });


                }

            })
$('.pagination').css('font-size','8px');

</script>
<script>
var datos = [];
datos = <?php echo json_encode($acumuladoventas2);?>;
datos2 = <?php echo json_encode($acumuladoventas3);?>;
var total = [];
var meses = [];
for(i=0;i < datos.length;i++){
    total2 = datos[i]['total'];
    meses2 = datos[i]['mes'];
    total.push(total2);
    meses.push(meses2);
}
var total3 = [];
var meses3 = [];
for(i=0;i < datos2.length;i++){
    total4 = datos2[i]['total'];
    total3.push(total4);
    meses4 = datos2[i]['mes'];
    meses3.push(meses4)
}







 console.log(meses3);

		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				labels: meses3,
				datasets: [{
					label: 'Ventas Articulos',
					backgroundColor: 'rgba(255, 99, 132)',
                                        borderColor: 'rgba(255, 99, 132)',
					
					data: total,
					fill: false,
				}, {
					label: 'Ventas Servicios',
					fill: false,
					backgroundColor: 'rgba(44, 138, 222)',
                                        borderColor: 'rgba(44, 138, 222)',
					data: total3,
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Historico de ventas por meses'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Meses'
						},
                                                time: {

    unit: 'Meses',
   }
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Valor'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('graficoventas2').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

	

		
	

	
	

	
	</script>

