<?php
$identificacion = $_SESSION['identificacion'];
$this->load->model('ModeloLogin');
$obj = new ModeloLogin();
$data = $obj->getpermisosid($identificacion,"06");
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
                <li class="active">Articulos</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header">
                <h1>
                    Maestro de articulos

                </h1>
            </div>
            <div class="col-sm-12">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                        <li class="active">
                            <a data-toggle="tab" href="#articulos" aria-expanded="true" >Articulos</a>
                        </li>

                        <li class="">
                            <a data-toggle="tab" href="#categoria" aria-expanded="false">Categoria</a>
                        </li>

                        <li class="">
                            <a data-toggle="tab" href="#saldos" aria-expanded="false">Saldos</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div id="articulos" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-2">
                                    Codigo:<input type="text" class="form-control input-sm" id="codigoarticulo">
                                </div>
                                <div class="col-md-7">
                                    Descripción:<input type="text" class="form-control input-sm" id="descripcionarticulo">
                                </div>
                                <div class="col-md-3">
                                    Categoria:<select class="form-control input-sm" id="categoriaarticulo">
                                        <option disabled selected>Selecciona una opción</option>
                                        <?php
                                        foreach ($categoria as $item) {
                                            echo "<option value=" . $item->codigocategoria . ">" . $item->descripcion . "</option>";
                                        }
                                        ?>


                                    </select>
                                </div>
                            </div> 
                            <button class="Btn Btn-success Btn-sm BtnGuardarArticulo" style="margin-top: 15px;" onclick="GuardarArticulo()">Guardar</button>
                            <div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter">Lista de articulos</h4>

                                    <div class="widget-toolbar no-border">


                                        <a href="#" data-action="reload">
                                            <i class="ace-icon fa fa-refresh" onclick="GetArticulos();"></i>
                                        </a>

                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>


                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                                        <table class="table table-condensed table-striped table-bordered"  id='tablaarticulos' style="width:100%;font-size: 14px; ">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Descripcion</th>
                                                    <th>Categoria</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div id="categoria" class="tab-pane">
                            <div class="row">
                                <div class="col-md-2">
                                    Codigo:<input type="text" class="form-control input-sm" id="codigocategoria">
                                </div>
                                <div class="col-md-10">
                                    Descripción:<input type="text" class="form-control input-sm" id="descripcion">
                                </div>
                            </div> 
                            <button class="Btn Btn-success Btn-sm BtnGuardarCategoria" onclick="Guardarcategoria()" style="margin-top: 15px;">Guardar</button>
                            <div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter">Lista de categorias</h4>

                                    <div class="widget-toolbar no-border">


                                        <a href="#" data-action="reload">
                                            <i class="ace-icon fa fa-refresh" onclick="GetCategorias();"></i>
                                        </a>

                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>


                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-6 no-padding-left no-padding-right">

                                        <table class="table table-condensed table-striped table-bordered"  id='tablacategoria' style="width:100%;font-size: 14px; ">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Descripcion</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="saldos" class="tab-pane">
                            <table class="table table-condensed table-striped table-bordered"  id='tablasaldos' style="width:100%;font-size: 14px; ">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Descripcion</th>
                                        <th>Entradas</th>
                                        <th>Salidas</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div><!-- /.page-content -->

            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
</div>
<div class="modal fade" id="modaltarifas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tarifa de articulos</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        Codigo:<input type="text" class="form-control input-sm" id="codigo" value=""> 
                    </div>
                    <div class="col-md-8">
                        Descripción:<input type="text" class="form-control input-sm" id="articulotarifa">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Tarifa:<input  type="number" class="form-control input-sm msgtarifa" id="tarifa" pattern="^\d*(\.\d{0,2})?$" placeholder="0">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-xs" onclick="guardartarifa()">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Info</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <b>Codigo: </b><span id="txtcodigo"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Descripcion: </b><span id="txtdescripcion"></span>
                    </div>
                                         <div class="col-md-12">
                        <b>Ultimo precio de compra: </b><span id="txtpreciocompra"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Tarifa anterior: </b><span id="txttaranterior"></span>
                    </div>
                    <div class="col-md-12">
                        <b>Tarifa actual: </b><span id="txttaractual"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
            </div>
          
            <div class="modal-body">
                                  
                    
                        <div class="row">
                            <div class="col-md-4">
                                Codigo: <input type="text" class="form-control input-sm" id="codigomodificar">
                            </div>    
                               <div class="col-md-8">
                                Descripcion: <input type="text" class="form-control input-sm" id="descripcionmodificar">
                            </div> 
                    </div>
                <div class="row">
                             <div class="col-md-8">
                                Categoria: <select class="form-control input-sm" id="categoriamodificar">
                                        <option disabled selected>Selecciona una opción</option>
                                        <?php
                                        foreach ($categoria as $item) {
                                            echo "<option value=" . $item->codigocategoria . ">" . $item->descripcion . "</option>";
                                        }
                                        ?>


                                    </select>
                            </div>
                    <div class="col-md-4">
                        Estado: <select class="form-control input-sm" id="estadomodificar">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-xs"  onclick="ModificarArticulo()">Actualizar datos</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/funciones.js"></script>
<script>
        function GetCategorias() {

            $.ajax({
                url: base_url + 'index.php/ControladorArticulo/GetCategorias',
                type: 'POST',
                success: function (response) {

                    var categorias = JSON.parse(response);
                    $('#tablacategoria').DataTable().destroy();
                    $('#tablacategoria').DataTable({
                        data: categorias,
                        columns: [
                            {"data": "codigocategoria"},
                            {"data": "descripcion"},
                            {"data": "estado", render: function (data, type, row) {
                                    return data == '1' ? '<span class="label label-sm label-success">Activo</span>' : '<span class="label label-sm label-danger">Inactivo</span>'
                                }},
                            {"defaultContent": "<button type='button' class='form btn btn-warning btn-xs modificar'> <span class='glyphicon glyphicon-pencil'></span></button>"},
                        ]



                    });

                }

            })

        }
        function GetArticulos() {

            $.ajax({
                url: base_url + 'index.php/ControladorArticulo/GetArticulos',
                type: 'POST',
                data:{parametro:1},
                success: function (response) {

                    var articulos = JSON.parse(response);

                    $('#tablaarticulos').DataTable().destroy();
                    $('#tablaarticulos').DataTable({
                        data: articulos,
                        columns: [
                            {"data": "codigo"},
                            {"data": "descripcion"},
                            {"data": "categoria"},
                            {"data": "estado", render: function (data, type, row) {
                                    return data == '1' ? '<span class="label label-sm label-success">Activo</span>' : '<span class="label label-sm label-danger">Inactivo</span>'
                                }},
                            {"defaultContent": "<button type='button' class='form btn btn-primary btn-xs info'> <span class='glyphicon glyphicon-search'></span></button>\n\
                                                                      <button type='button' class='form btn btn-warning btn-xs modificar'> <span class='glyphicon glyphicon-pencil'></span></button>\n\
                                                                      <button type='button' class='form btn btn-success btn-xs tarifa'> <span class='glyphicon glyphicon-usd'></span></button>"},
                        ]



                    });
                    $('#tablaarticulos tbody').on('click', '.tarifa', function () {

                        var codigo = $(this).parents("tr").find("td").eq(0).text();
                        var descripcion = $(this).parents("tr").find("td").eq(1).text();
                        $("#codigo").val(codigo);
                        $("#articulotarifa").val(descripcion);
                        $("#tarifa").val("");
                        $("#modaltarifas").modal();


                    })
                    $('#tablaarticulos tbody').on('click', '.info', function () {
                        var codigo = $(this).parents("tr").find("td").eq(0).text();
            
            
            
                $.ajax({
                    
                    url: base_url + 'index.php/ControladorArticulo/GetInfoTarifa',
                    type:"post",
                    data:{codigo:codigo},
                    beforeSend: function (response) {
                        
                    },
                    success: function (response) {
                        var datos = JSON.parse(response);
                        
                        $("#txtcodigo").text(datos[0]['codigo']);
                        $("#txtdescripcion").text(datos[0]['descripcion']);
                        $("#txttaranterior").text(datos[0]['tarifa_anterior']);
                        $("#txttaractual").text(datos[0]['tarifa_actual']);
                        $("#txtpreciocompra").text(datos[0]['costo_compra']);
                        
                        
                        $("#info").modal();
                    },
                    
                    
                })         


                    })
                    $('#tablaarticulos tbody').on('click', '.modificar', function () {
                        var codigo = $(this).parents("tr").find("td").eq(0).text();
                        
            
            
                $.ajax({
                    
                    url: base_url + 'index.php/ControladorArticulo/GetInfoTarifa',
                    type:"post",
                    data:{codigo:codigo},
                    beforeSend: function (response) {
                        
                    },
                    success: function (response) {
                        var datos = JSON.parse(response);
                        $("#codigomodificar").prop('disabled',true);
                        $("#codigomodificar").val(datos[0]['codigo']);
                        $("#descripcionmodificar").val(datos[0]['descripcion']);
                        $("#categoriamodificar").val(datos[0]['idcategoria']);
                        $("#estadomodificar").val(datos[0]['estado']);
                        $("#modificar").modal();
                      
                    },
                    
                    
                })         


                    })

                }

            })

        }


        function GetSaldos() {

            
            $.ajax({
                url: base_url + 'index.php/ControladorArticulo/GetSaldos',
                type: 'POST',
                data:{parametro:2},
                success: function (response) {



                    var articulos = JSON.parse(response);

                    $('#tablasaldos').DataTable().destroy();
                    $('#tablasaldos').DataTable({
                        "order": [[4, "desc"]],
                        data: articulos,
                        columns: [
                            {"data": "codigo_producto"},
                            {"data": "descripcion"},
                            {"data": "entradas"},
                            {"data": "salidas"},
                            {"data": "stock"},
                        ]


                    });


                }

            })
        }
        $(document).ready(function () {
            GetCategorias();
            GetArticulos();
            GetSaldos();
        })




</script>


