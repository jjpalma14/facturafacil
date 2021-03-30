<script>var base_url = '<?php echo base_url() ?>';</script>
<?php
session_start();
if (isset($_SESSION['login_user'])){
$login = $_SESSION['login_user'];
$identificacion = $_SESSION['identificacion'];
$apellidos = $_SESSION['apellidos'];
if(empty($_SESSION['login_user']))
{
?>
<script>
     window.location.href = '' + base_url + '';
</script>
<?php
}
}else{
?>
<script> 
    window.location.href = '' + base_url + '';
</script>
<?php    
}
?>
<script>var usuario = '<?php echo $identificacion ?>';</script>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Facturacion</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
                <link rel="stylesheet" href="<?php echo base_url()."assets/"?>css/bootstrap.min.css" />
                <link rel="stylesheet" href="<?php echo base_url()."assets/"?>css/notify-metro.css" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/"?>font-awesome/4.5.0/css/font-awesome.min.css" />
                <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
                <link rel="stylesheet" href="<?php echo base_url()."assets/"?>css/sweetalert2/sweetalert2.min.css" />
                


		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url()."assets/"?>css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url()."assets/"?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		
		<link rel="stylesheet" href="<?php echo base_url()."assets/"?>css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url()."assets/"?>js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state navbar-fixed-top">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
                                                    <img src="<?php echo base_url()?>/assets/images/jpc.jpg" width="25" height="25">
							FacturaFacil
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
                                                
						

						

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                                            <i class="fa fa-user fa-2x" style="margin-top: 6px;margin-right: 5px;"></i>
								<span class="user-info">
									<small>Bienvenido,</small>
									<?php echo $login?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo base_url() ?>/index.php/configusuario">
										<i class="ace-icon fa fa-cog"></i>
										Configuracion
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo base_url() ?>/index.php/ControladorLogin/Logout">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

