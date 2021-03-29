<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion, "07");
foreach ($data as $permiso) {
    $permiso = $permiso->permiso;
}
if ($permiso == 0) {
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
                <li class="active">Generales</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Ajustes generales

                </h1>
            </div>

            <div class="col-sm-12">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                        <li class="active liempresa">
                            <a data-toggle="tab" href="#empresa" aria-expanded="true">Empresa</a>
                        </li>

                        <li class="licliente">
                            <a data-toggle="tab" href="#cliente" aria-expanded="false">Clientes</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#proveedores" aria-expanded="false">Proveedores</a>
                        </li>


                    </ul>

                    <div class="tab-content">
                        <div id="empresa" class="tab-pane active">
                            <?php
                            foreach ($empresa as $item) {
                                $razon_social = $item->razon_social;
                                $nit = $item->nit;
                                $direccion = $item->direccion;
                                $telefono = $item->telefono;
                                $email = $item->email;
                            }
                            ?>
                          
                         
                                <div class="row">  
                                    <div class="col-md-6">
                                        Razon Social:<input class="form-control input-sm" type="text" value="<?php echo $razon_social; ?>" id="rsocial">
                                    </div>
                                    <div class="col-md-6">
                                        Nit:<input class="form-control input-sm" type="text" value="<?php echo $nit; ?>" id="nit">
                                    </div>
                                </div>
                                <div class="row">  

                                    <div class="col-md-6">
                                        Celular:<input class="form-control input-sm" type="text" value="<?php echo $telefono; ?>" id="telefono">
                                    </div>
                                    <div class="col-md-6">
                                        Email:<input class="form-control input-sm" type="text" value="<?php echo $email; ?>" id="email">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        Dirección:<input class="form-control input-sm" type="text" value="<?php echo $direccion; ?>" id="direccion">
                                    </div>
                                </div>
                            <div class="row">  
                                <div class="col-md-4" style="margin-top: 10px;">
                                    <button class="btn btn-success btn-sm BtnEmpresa" onclick="ModificarEmpresa()">Guardar</button>
                                </div>
                            </div>
                        </div>
                        <div id="cliente" class="tab-pane">
                            <div class="row">  
                                <div class="col-md-6">
                                    Razon Social:<input class="form-control input-sm" type="text"  id="rsocialcliente">
                                </div>
                                <div class="col-md-3">
                                    Nit:<input class="form-control input-sm" type="text"  id="nitcliente">
                                </div>
                                <div class="col-md-3">
                                    Dirección:<input class="form-control input-sm" type="text" id="direccioncliente">
                                </div>

                            </div>
                            <div class="row">  

                                <div class="col-md-4">
                                    Celular:<input class="form-control input-sm" type="text"  id="telefonocliente">
                                </div>
                                <div class="col-md-4">
                                    Email:<input class="form-control input-sm" type="text" id="emailcliente">
                                </div>
                                <div class="col-md-4">
                                    Estado:<select class="form-control input-sm" id="estadocliente">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">  
                                <div class="col-md-4" style="margin-top: 10px;">
                                    <button class="btn btn-success btn-sm BtnCliente" onclick="InsertCliente()">Guardar</button>
                                </div>


                            </div>
                            <div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter">Lista de clientes</h4>

                                    <div class="widget-toolbar no-border">


                                        <a href="#" data-action="reload">
                                            <i class="ace-icon fa fa-refresh" onclick="ListarClientes()"></i>
                                        </a>

                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>


                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                                        <table class="table table-condensed table-striped table-bordered"  id='tablaclientes' style="width:100%;font-size: 14px; ">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nit</th>
                                                    <th>Razon social</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div id="proveedores" class="tab-pane">
                            <div class="row">  
                                <div class="col-md-6">
                                    Razon Social:<input class="form-control input-sm" type="text"  id="rsocialproveedores">
                                </div>
                                <div class="col-md-3">
                                    Nit:<input class="form-control input-sm" type="text"  id="nitproveedores">
                                </div>
                                <div class="col-md-3">
                                    Dirección:<input class="form-control input-sm" type="text" id="direccionproveedores">
                                </div>

                            </div>
                            <div class="row">  

                                <div class="col-md-4">
                                    Celular:<input class="form-control input-sm" type="text"  id="telefonoproveedores">
                                </div>
                                <div class="col-md-4">
                                    Email:<input class="form-control input-sm" type="text" id="emailproveedores">
                                </div>
                                <div class="col-md-4">
                                    Estado:<select class="form-control input-sm" id="estadoproveedores">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">  
                                <div class="col-md-4" style="margin-top: 10px;">
                                    <button class="btn btn-success btn-sm BtnProveedor" onclick="InsertProveedores()">Guardar</button>
                                </div>


                            </div>
                            <div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter">Lista de proveedores</h4>

                                    <div class="widget-toolbar no-border">


                                        <a href="#" data-action="reload">
                                            <i class="ace-icon fa fa-refresh" onclick="ListarProveedores()"></i>
                                        </a>

                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>


                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                                        <table class="table table-condensed table-striped table-bordered"  id='tablaproveedores' style="width:100%;font-size: 14px; ">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nit</th>
                                                    <th>Razon social</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
</div>
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/funciones.js"></script>
<div class="modal fade" id="modalcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Información</h5>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <b>Razón social:</b><span id="inforazonsocial"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Nit:</b><span id="infonit"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Direccion:</b><span id="infodireccion"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Telefono:</b><span id="infotelefono"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Email:</b><span id="infoemail"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Estado:</b><span id="infoestado"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Fecha de creación:</b><span id="infofcreacion"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Usuario de creación:</b><span id="infoucreacion"></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalmodificarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
            </div>
            <div class="modal-body">
                <input type="text" id="txtid">
                <div class="row">
                    <div class="col-md-12">
                        <b>Razón social:</b><input type="text" class="form-control input-sm" id="txtrsocial">
                    </div>
                    <div class="col-md-12">
                        <b>Nit:</b><input type="text" class="form-control input-sm" id="txtnit">
                    </div>
                    <div class="col-md-12">
                        <b>Direccion:</b><input type="text" class="form-control input-sm" id="txtdireccion">
                    </div>
                    <div class="col-md-12">
                        <b>Telefono:</b><input type="text" class="form-control input-sm" id="txttelefono">
                    </div>
                    <div class="col-md-12">
                        <b>Email:</b><input type="text" class="form-control input-sm" id="txtemail">
                    </div>
                    <div class="col-md-12">
                        <b>Estado:</b><select class="form-control input-sm" id="txtestado">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm BtnModificarcliente"  onclick="ModificarCliente()">Modificar</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Información</h5>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <b>Razón social:</b><span id="inforazonsocialproveedor"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Nit:</b><span id="infonitproveedor"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Direccion:</b><span id="infodireccionproveedor"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Telefono:</b><span id="infotelefonoproveedor"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Email:</b><span id="infoemailproveedor"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Estado:</b><span id="infoestadoproveedor"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Fecha de creación:</b><span id="infofcreacionproveedor"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Usuario de creación:</b><span id="infoucreacionproveedor"></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalmodificarproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
            </div>
            <div class="modal-body">
                <input type="text" id="txtidproveedor">
                <div class="row">
                    <div class="col-md-12">
                        <b>Razón social:</b><input type="text" class="form-control input-sm" id="txtrsocialproveedor">
                    </div>
                    <div class="col-md-12">
                        <b>Nit:</b><input type="text" class="form-control input-sm" id="txtnitproveedor">
                    </div>
                    <div class="col-md-12">
                        <b>Direccion:</b><input type="text" class="form-control input-sm" id="txtdireccionproveedor">
                    </div>
                    <div class="col-md-12">
                        <b>Telefono:</b><input type="text" class="form-control input-sm" id="txttelefonoproveedor">
                    </div>
                    <div class="col-md-12">
                        <b>Email:</b><input type="text" class="form-control input-sm" id="txtemailproveedor">
                    </div>
                    <div class="col-md-12">
                        <b>Estado:</b><select class="form-control input-sm" id="txtestadoproveedor">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm BtnModificarproveedor"  onclick="ModificarProveedor()">Modificar</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<script>
    function ListarClientes() {
        $.ajax({

            url: base_url + 'index.php/ControladorGenerales/ListarClientes',
            type: 'POST',
            beforeSend: function (data) {

            },
            success: function (data) {
                var clientes = JSON.parse(data);
                $('#tablaclientes').DataTable().destroy();
                $('#tablaclientes').DataTable({
                    data: clientes,
                    columns: [
                        {"data": "idclientes"},
                        {"data": "nit"},
                        {"data": "razonsocial"},
                        {"data": "estado", render: function (data, type, row) {
                                return data == '1' ? '<span class="label label-sm label-success">Activo</span>' : '<span class="label label-sm label-danger">Inactivo</span>'
                            }},
                        {"defaultContent": "<button type='button' class='form btn btn-primary btn-xs detalle'> <span class='glyphicon glyphicon-search'></span></button>\n\
                                                                      <button type='button' class='form btn btn-warning btn-xs modificar'> <span class='glyphicon glyphicon-pencil'></span></button>"},
                    ]



                });
                $('#tablaclientes tbody').on('click', '.detalle', function () {

                    var id = $(this).parents("tr").find("td").eq(0).text();

                    $.ajax({

                        url: base_url + 'index.php/ControladorGenerales/GetClienteID',
                        type: 'POST',
                        data: {id: id},
                        beforeSend: function (data) {

                        },
                        success: function (data) {
                            var clientes = JSON.parse(data);
                            $("#inforazonsocial").text(" " + clientes[0]['razonsocial']);
                            $("#infonit").text(" " + clientes[0]['nit']);
                            $("#infodireccion").text(" " + clientes[0]['direccion']);
                            $("#infotelefono").text(" " + clientes[0]['telefono']);
                            $("#infoemail").text(" " + clientes[0]['email']);
                            if (clientes[0]['estado'] == 1) {
                                $("#infoestado").text(" Activo");
                            } else {
                                $("#infoestado").text(" Inactivo");
                            }
                            $("#infofcreacion").text(" " + clientes[0]['fecha_creacion']);
                            $("#infoucreacion").text(" " + clientes[0]['usuario_creacion']);
                        },

                    });
                    $("#modalcliente").modal();
                    ;


                });
                $('#tablaclientes tbody').on('click', '.modificar', function () {
                    var id = $(this).parents("tr").find("td").eq(0).text();
                    $.ajax({

                        url: base_url + 'index.php/ControladorGenerales/GetClienteID',
                        type: 'POST',
                        data: {id: id},
                        beforeSend: function (data) {

                        },
                        success: function (data) {
                            var clientes = JSON.parse(data);

                            $("#txtrsocial").val(clientes[0]['razonsocial']);
                            $("#txtnit").val(clientes[0]['nit']);
                            $("#txtdireccion").val(clientes[0]['direccion']);
                            $("#txttelefono").val(clientes[0]['telefono']);
                            $("#txtemail").val(clientes[0]['email']);
                            $("#txtestado").val(clientes[0]['estado']);
                            $("#txtid").val(clientes[0]['idclientes']);
                            $("#txtid").prop('disabled', true);
                            $("#txtid").hide();
                        },

                    });
                    $("#modalmodificarcliente").modal();
                });




            }
        })
    }
    function ListarProveedores() {
        $.ajax({

            url: base_url + 'index.php/ControladorGenerales/ListarProveedores',
            type: 'POST',
            beforeSend: function (data) {

            },
            success: function (data) {
                var proveedores = JSON.parse(data);
                $('#tablaproveedores').DataTable().destroy();
                $('#tablaproveedores').DataTable({
                    data: proveedores,
                    columns: [
                        {"data": "idproveedores"},
                        {"data": "nit"},
                        {"data": "razonsocial"},
                        {"data": "estado", render: function (data, type, row) {
                                return data == '1' ? '<span class="label label-sm label-success">Activo</span>' : '<span class="label label-sm label-danger">Inactivo</span>'
                            }},
                        {"defaultContent": "<button type='button' class='form btn btn-primary btn-xs detalleproveedor'> <span class='glyphicon glyphicon-search'></span></button>\n\
                                                                      <button type='button' class='form btn btn-warning btn-xs modificarproveedor'> <span class='glyphicon glyphicon-pencil'></span></button>"},
                    ]



                });
                $('#tablaproveedores tbody').on('click', '.detalleproveedor', function () {

                    var id = $(this).parents("tr").find("td").eq(0).text();

                    $.ajax({

                        url: base_url + 'index.php/ControladorGenerales/GetProveedorID',
                        type: 'POST',
                        data: {id: id},
                        beforeSend: function (data) {

                        },
                        success: function (data) {
                            var proveedor = JSON.parse(data);
                            $("#inforazonsocialproveedor").text(" " + proveedor[0]['razonsocial']);
                            $("#infonitproveedor").text(" " + proveedor[0]['nit']);
                            $("#infodireccionproveedor").text(" " + proveedor[0]['direccion']);
                            $("#infotelefonoproveedor").text(" " + proveedor[0]['telefono']);
                            $("#infoemailproveedor").text(" " + proveedor[0]['email']);
                            if (proveedor[0]['estado'] == 1) {
                                $("#infoestadoproveedor").text(" Activo");
                            } else {
                                $("#infoestadoproveedor").text(" Inactivo");
                            }
                            $("#infofcreacionproveedor").text(" " + proveedor[0]['fecha_creacion']);
                            $("#infoucreacionproveedor").text(" " + proveedor[0]['usuario_creacion']);
                        },

                    });
                    $("#modalproveedor").modal();



                });
                $('#tablaproveedores tbody').on('click', '.modificarproveedor', function () {
                    var id = $(this).parents("tr").find("td").eq(0).text();
                    $.ajax({

                        url: base_url + 'index.php/ControladorGenerales/GetProveedorID',
                        type: 'POST',
                        data: {id: id},
                        beforeSend: function (data) {

                        },
                        success: function (data) {
                            var proveedor = JSON.parse(data);

                            $("#txtrsocialproveedor").val(proveedor[0]['razonsocial']);
                            $("#txtnitproveedor").val(proveedor[0]['nit']);
                            $("#txtdireccionproveedor").val(proveedor[0]['direccion']);
                            $("#txttelefonoproveedor").val(proveedor[0]['telefono']);
                            $("#txtemailproveedor").val(proveedor[0]['email']);
                            $("#txtestadoproveedor").val(proveedor[0]['estado']);
                            $("#txtidproveedor").val(proveedor[0]['idproveedores']);
                            $("#txtidproveedor").prop('disabled', true);
                            $("#txtidproveedor").hide();
                        },

                    });
                    $("#modalmodificarproveedor").modal();
                });




            }
        })
    }
    $(document).ready(function () {
        ListarClientes();
        ListarProveedores();
    })
</script>
<?php
if (isset($_GET['clientes'])) {
    $cliente = $_GET['clientes'];
    ?>
    <script>
        $("#cliente").addClass('active');
        $("#empresa").removeClass('active');
        $(".licliente").addClass('active');
        $(".liempresa").removeClass('active');
    </script>
    <?php
} else {
    $test = '';
}
?>


