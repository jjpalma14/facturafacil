<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url() . "index.php/home" ?>">Home</a>
                </li>
                <li class="active">Configuración usuario</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Configuración Usuario

                </h1>
            </div>
            <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable" id="widget-container-col-1">
                <div class="widget-box ui-sortable-handle" id="widget-box-1">
                    <div class="widget-header">
                        <h5 class="widget-title">Información</h5>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Identificación: </div>

                                    <div class="profile-info-value">
                                        <span class="editable editable-click" id="username"><?php echo $_SESSION['identificacion']; ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nombres </div>

                                    <div class="profile-info-value">
                                        <span class="editable editable-click" id="country"><?php echo $_SESSION['login_user']; ?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Apellidos </div>

                                    <div class="profile-info-value">
                                        <span class="editable editable-click" id="age"><?php echo $_SESSION['apellidos']; ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row" id="updatepassword">
                                    <div class="profile-info-name">Contraseña </div>

                                    <div class="profile-info-value">
                                        <span class="editable editable-click" id="country">       <div class="input-group">
                                <input class="form-control input-sm" type="password" id="password" placeholder="**********">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-success" type="button" id="Btnpassword">
                                        <i class="ace-icon fa fa-retweet bigger-110"></i>
                                    </button>
                                </span>
                            </div></span>
                                    </div>
                                </div>  
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
