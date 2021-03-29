<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion, "10");
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
$id = $_GET['id'];
$data = array();
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->GetUsuarios($id);
foreach ($data as $usuario) {
    $nombres = $usuario->nombres;
    $apellidos = $usuario->apellidos;
    $identificacion = $usuario->identificacion;
    $estado = $usuario->estado;
}
$permisos = $obj->getpermisos($id);
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
                    Editar usuario

                </h1>
            </div>

            <div class="col-md-12"> 

                <div class="col-md-4">
                    <div class="widget-box ui-sortable-handle" id="widget-box-1">
                        <div class="widget-header">
                            <h5 class="widget-title">Editar usuario</h5>


                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-md-12">Nombres<small style="color:red;">(*)</small>:<input type="text" class="form-control input-sm" id="nombres" value="<?php echo $nombres ?>"></div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">Apellidos:<input type="text" class="form-control input-sm" id="apellidos" value="<?php echo $apellidos ?>"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">Identificación<small style="color:red;">(*)</small>:<input id="id" type="text" class="form-control input-sm ideditar" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $identificacion ?>"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">Estado:<select class="form-control input-sm" id="estado">
                                            <?php
                                            if ($estado == 0) {
                                                echo "<option value='0' selected>Activo</option>";
                                                echo "<option value='1' >Inactivo</option>";
                                            }if ($estado == 1) {
                                                echo "<option value='0' >Activo</option>";
                                                echo "<option value='1' selected>Inactivo</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4"><button class="btn btn-secondary btn-xs" type="button" style="margin-top: 18px;width: 100%;" onclick="window.location = '<?php echo base_url() . "index.php/usuarios" ?>';">Atras</button></div>
                                    <div class="col-md-4"><button class="btn btn-success btn-xs" type="button" style="margin-top: 18px;width: 100%;" onclick="insertusuario(2)">Actualizar</button></div>
                                    <div class="col-md-4"><button class="btn btn-info btn-xs" type="button" style="margin-top: 18px;width: 100%;" onclick="insertusuario(3)">Reset pass</button></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>  

                <div class="col-md-8">
                    <div class="widget-box">
                        <div class="widget-header"><h5 class="widget-title">Permiso de usuario</h5></div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <?php
                                    foreach ($permisos as $item) {
                                        ?>    
                                        <div class="col-md-4">
                                            <span class="lbl"> <?php echo $item->modulo; ?></span>:
                                            <select class="form-control input-sm permisos ">
                                                <?php
                                                if ($item->permiso == 0) {
                                                    echo "<option value='0'  selected>Sin Acceso</option>";
                                                    echo "<option value='1'  >Acceso</option>";
                                                }if ($item->permiso == 1) {
                                                    echo "<option value='0' >Sin Acceso</option>";
                                                    echo "<option value='1' selected>Acceso</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <button class="Btn btn-success btn-xs" style="margin-top: 15px;" id="BtnGuardarPermisos"><i class="ace-icon fa fa-spinner fa-spin  " id="icocargando"></i>Guardar</button>
                            </div> 
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
                                        $(document).ready(function () {
                                            $("#icocargando").hide();
                                        })
</script>




