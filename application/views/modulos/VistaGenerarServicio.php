<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"03");
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
                <li class="active">Generar servicio</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Generar servicio

                </h1>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        Cliente:<select class="form-control input-sm" id="cliente_servicio">
                            <?php
                            foreach ($clientes as $item) {
                                echo "<option value='" . $item->idclientes . "'>" . $item->razonsocial . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            Fecha del servicio:<input class="form-control date-picker input-sm" id="fechatiposervicio" type="text" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="col-md-3">
                      
                            Tipo:<select class="form-control input-sm" id="tipo_servicio">
                                <?php
                                foreach ($tipo as $item) {
                                    echo "<option value='" . $item->idtipo_servicio . "'>" . $item->tipo . "</option>";
                                }
                                ?>
                            </select>
                       
                    </div>
                    <div class="col-md-3">
                        Numero de servicio:
                        <input type="text" class="form-control input-sm" id="consecutivo">
                    </div>

                </div>
                <button class="btn btn-info btn-xs nuevocargoservicio" style="margin-top: 15px;margin-bottom: 5px;" onclick=""><i class="fa fa-file"></i></button>
                <button class="btn btn-lighter btn-xs buscarcargoservicio" style="margin-top: 15px;margin-bottom: 5px;" onclick="buscarcargoservicio()"><i class="fa fa-search"></i></button>
                <button class="btn btn-danger btn-xs imprimircargoservicio" style="margin-top: 15px;margin-bottom: 5px;" onclick="imprimircargoservicio()"><i class="fa fa-print"></i></button>
                <button class="btn btn-success btn-xs editarcargoservicio" style="margin-top: 15px;margin-bottom: 5px;" onclick="editarcargoservicio()"><i class="fa fa-edit"></i></button>
                <button class="btn btn-warning btn-xs anularcargoservicio" style="margin-top: 15px;margin-bottom: 5px;" onclick="anularcargoservicio()"><i class="fa fa-remove"></i></button>
                <h4 class="header blue">Descripción del servicio</h4>

                <div class="widget-box widget-color-blue">


                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <textarea class="form-control" style="height: 200px;resize: none" placeholder="Ingrese el texto" id="editor2"></textarea>
                        </div>

                        <div class="widget-toolbox padding-4 clearfix">

                            Valor servicio<input id="totalcargo" type="number" class="form-control input-sm" style="margin-bottom: 5px;width: 200px;" placeholder="$"><span style="color:red;float: right;margin-top: -20px;font-style: italic;" id="estado"></span>
                            <div class="btn-group pull-left">
                                
                                <button class="btn btn-sm btn-success BtnCargoServicio" onclick="GuardarCargoServicio()" >
                                    <i class="ace-icon fa fa-floppy-o bigger-125"></i>
                                    Guardar
                                </button>
                                  <button class="btn btn-sm btn-success BtnActualizarCargoServicio" onclick="ActualizarCargoServicio()" >
                                    <i class="ace-icon fa fa-refresh bigger-125"></i>
                                    Actulizar
                                </button>

                            </div>
                     
                    </div>
                </div>
</div>
            </div>
        </div><!-- /.page-content -->
    </div>
</div>
<div class="modal fade" id="modalcargosservicios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" style=" max-width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consultar</h5>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                        <table class="table table-condensed table-striped table-bordered"  id='tablacargosservicios' style="width:100%;font-size: 12px; ">
                            <thead>
                                <tr>
                                    <th>Servicio ID</th>
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
<script src="<?php echo base_url() . "assets/" ?>js/funciones.js"></script>
<script>
$(document).ready(function (){
    $('#fechatiposervicio').datepicker();
    $('.BtnCargoServicio').hide();
    $('.BtnActualizarCargoServicio').hide();
    $('.imprimircargoservicio').hide();
    $('.editarcargoservicio').hide();
    $('.anularcargoservicio').hide();
    $("#consecutivo").prop('disabled',true);
    $("#totalcargo").prop('disabled',true);
    $("#cliente_servicio").prop('disabled',true);
    $("#fechatiposervicio").prop('disabled',true);
    $("#tipo_servicio").prop('disabled',true);
    $("#editor2").prop('disabled',true);
})
$('.nuevocargoservicio').click(function (){
    $("#estado").text('');
    $('.BtnCargoServicio').show();
    $("#cliente_servicio").prop('disabled',false);
    $("#fechatiposervicio").prop('disabled',false);
    $("#tipo_servicio").prop('disabled',false);
    $("#editor2").prop('disabled',false);
    $("#fechatiposervicio").val('');
    $("#consecutivo").val('');
    $("#editor2").val('');
    $("#totalcargo").val('');
    $("#totalcargo").prop('disabled',false);
    $('.editarcargoservicio').hide();
    $('.anularcargoservicio').hide();
    $('.BtnActualizarCargoServicio').hide();
    $('.imprimircargoservicio').hide(); 
    
})
$('#tablacargosservicios tbody').on('click', '.escogerservicio', function () {
            
            
           
           var idservicio = $(this).parents("tr").find("td").eq(0).text();
           $.ajax({
        
                            url:base_url + 'index.php/ControladorServicios/GetServicios',
                            type: 'POST',
                            data:{parametro : idservicio},
                            success: function (response) {
                             var datos = JSON.parse(response);
                             $("#consecutivo").prop('disabled',true);
                             $("#totalcargo").prop('disabled',true);
                             $("#cliente_servicio").prop('disabled',true);
                             $("#fechatiposervicio").prop('disabled',true);
                             $("#tipo_servicio").prop('disabled',true);
                             $("#editor2").prop('disabled',true);
                             $("#cliente_servicio").val(datos[0]['idcliente']);
                             $("#fechatiposervicio").val(datos[0]['fecha_servicio']);
                             $("#tipo_servicio").val(datos[0]['idtipo_servicio']); 
                             $("#consecutivo").val(datos[0]['idcargo_servicio']); 
                             $("#editor2").val(datos[0]['descripcion']); 
                             $("#totalcargo").val(datos[0]['total']); 
                              $('.BtnCargoServicio').hide();
                              $("#modalcargosservicios").modal('hide');
                              if(datos[0]['estado'] == 1){
                                  $("#estado").text('Cargo anulado');
                              }else{
                                  $("#estado").text('');
                              }
                             
                            



                            }

                        })       
              $('.editarcargoservicio').show();
              $('.anularcargoservicio').show(); 
              $('.imprimircargoservicio').show(); 
              $('.BtnActualizarCargoServicio').hide();
       }) 
</script>






