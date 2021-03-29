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

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
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

                                        <input type="text" class="search-query" placeholder="Give it a search...">
                                    </span>
                                    <button class="btn btn-sm" type="button">Go!</button>
                                </form>

                                <div class="space"></div>
                                <h4 class="smaller">Prueba con esto:</h4>

                                <ul class="list-unstyled spaced inline bigger-110 margin-15">
                                    <li>
                                        <i class="ace-icon fa fa-hand-o-right blue"></i>
                                         Vuelva a comprobar la URL en busca de errores tipográficos
                                    </li>

                                </ul>
                            </div>

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



