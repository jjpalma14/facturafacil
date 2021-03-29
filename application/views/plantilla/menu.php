

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state sidebar-fixed">
        <script type="text/javascript">
            try {
                ace.settings.loadState('sidebar')
            } catch (e) {
            }
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success" onclick="window.location='<?php echo base_url() . "index.php/controladorventas/vistaventasgeneradas" ?>';">
                    <i class="ace-icon fa fa-shopping-basket"></i>
                </button>

                <button class="btn btn-info" onclick="window.location='<?php echo base_url() . "index.php/servicios" ?>';">
                    <i class="ace-icon fa fa-laptop"></i>
                </button>

                <button class="btn btn-warning" onclick="window.location='<?php echo base_url() . "index.php/usuarios" ?>';">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger" onclick="window.location='<?php echo base_url() . "index.php/generales" ?>';">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <li class="active">
                <a href="#">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Menu </span>
                </a>

                <b class="arrow"></b>
            </li>

        <?php
         $this->load->model('ModeloMenu');
         $obj = new ModeloMenu();
         $menus = array();
         $menus = $obj->getmenu();
         
         foreach ($menus as $menus) {
             $modulo = $menus->idmenu;
           ?>
             
              <li class="">
                <a href="#" class="dropdown-toggle">
                    <?php echo $menus->icono ?>

                    <span class="menu-text"><?php echo $menus->menu?></span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

               <?php
               
               $modulos = $obj->getmodulos($modulo);
               foreach ($modulos as $modulos) {
                   ?>
                
                <ul class="submenu">
                      
                     <li class="">
                        <a href="<?php echo base_url() . "index.php/".$modulos->ruta ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            <?php echo $modulos->modulo?>
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
                <?php
               }
               ?>
  
            </li>   
 
          <?php   
         }
        ?>
        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>
