<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"08");
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
                <li class="active">Usuarios</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Maestro de usuarios

                </h1>
            </div>

            <div class="col-md-12"> 

                <div class="col-xs-4 col-sm-4 widget-container-col ui-sortable" id="widget-container-col-1">
                    <div class="widget-box ui-sortable-handle" id="widget-box-1">
                        <div class="widget-header">
                            <h5 class="widget-title">Creación de usuarios</h5>

               
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-md-12">Nombres<small style="color:red;">(*)</small>:<input type="text" class="form-control input-sm" id="nombres"></div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">Apellidos:<input type="text" class="form-control input-sm" id="apellidos"> </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-12">Identificación<small style="color:red;">(*)</small>:<input id="id" type="text" class="form-control input-sm" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div>
                                  </div>
                                <div class="row">
                                     <div class="col-md-12">Contraseña<small style="color:red;">(*)</small>:<input id="pass" type="password" class="form-control input-sm" placeholder="*********"> </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-12">Estado:<select class="form-control input-sm" id="estado">
                                                <option value="0">Activo</option>
                                                <option value="1">Inactivo</option>
                                            </select>
                                </div>
                                        <div class="col-md-12"><button class="btn btn-success btn-xs" type="button" style="margin-top: 18px;width: 100%;" onclick="insertusuario(1)">Guardar</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-xs-8 col-sm-8 widget-container-col ui-sortable" id="widget-container-col-12">
                    <div class="widget-box ui-sortable-handle" id="widget-box-1">
                        <div class="widget-header">
                            <h5 class="widget-title">Lista de usuarios</h5>

               
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                              <table class="table table-condensed table-striped table-bordered"  id='tablausuarios' style="width:100%;font-size: 14px; ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombres</th>
                                                     <th>Apellidos</th>
                                                    <th>Estado</th>
                                                     <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <body>
                                                <span id="msg"></span> 
                                            </body>
                                        </table> 
                        </div>
                    </div>
                </div>
            </div> 
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/usuarios.js"></script>
<script>
function GetUsuarios() {

            $.ajax({
                url: base_url + 'index.php/ControladorLogin/GetUsuarios',
                type: 'POST',
                beforeSend: function (response) {
                   $("#msg").text("Leyendo datos...");     
                    },
                success: function (response) {
                    $("#msg").text(""); 
                    var usuarios = JSON.parse(response);
                    $('#tablausuarios').DataTable().destroy();
                    $('#tablausuarios').DataTable({
                         pageLength : 5,
                        "order": [[2, "desc"]],
                     
                        "lengthChange": false,
                        "info":     false,
                        "paging":   false,
                        "scrollY":        "176px",
                        "scrollCollapse": true,
                        data: usuarios,
                        columns: [
                            {"data": "identificacion"},
                            {"data": "nombres"},
                            {"data": "apellidos"},
                            {"data": "estado", render: function (data, type, row) {
                                    return data == '0' ? '<span class="label label-sm label-success">Activo</span>' : '<span class="label label-sm label-danger">Inactivo</span>'
                                }},
                            {"defaultContent": "<button type='button' class='form btn btn-warning btn-xs modificar'> <span class='glyphicon glyphicon-pencil'></span></button>"},
                        ]



                    });
                    
                       $('#tablausuarios tbody').on('click', '.modificar', function () {

                        var id = $(this).parents("tr").find("td").eq(0).text();
                        window.location.href = '' + base_url + 'index.php/editarusuario?id=' + id + '';
                        
    });

                }

            })

        }
 $(document).ready(function (){
 GetUsuarios();
 })       
</script>

