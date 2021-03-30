<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url() . "index.php/home" ?>">Home</a>
                </li>
                <li class="active">Error</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">


            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="error-container">
                        <div class="well">
                            <h1 class="grey lighter smaller">
                                <span class="blue bigger-125">
                                    <i class="ace-icon fa fa-sitemap"></i>
                                    404
                                </span>
                                Pagina no encontrada
                            </h1>

                            <hr>
                            <h3 class="lighter smaller">
¡Buscamos por todas partes pero no pudimos encontrarlo!</h3>

                            <div>
                                <form class="form-search">
                                    <span class="input-icon align-middle">
                                        <i class="ace-icon fa fa-search"></i>
                                        <input type="text" class="search-query" placeholder="Introduzca modulo a buscar" style="width: 300px;" id="txtbusqueda">
                                    </span>
                                    <button class="btn btn-sm" type="button" id="BtnBuscar">Consultar</button>
                                </form>

                                <div class="space"></div>
                            </div>
                            <div id="contenido"></div>
                            <hr>
                            <div class="space"></div>

                            <div class="center">
                                <a href="javascript:history.back()" class="btn btn-grey">
                                    <i class="ace-icon fa fa-arrow-left"></i>
                                    Atrás
                                </a>

                                <a href="<?php echo base_url() . "index.php/home" ?>" class="btn btn-primary">
                                    <i class="ace-icon fa fa-tachometer"></i>
                                    Inicio
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div>


        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script src="<?php echo base_url() . "assets/" ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/busqueda.js"></script>


