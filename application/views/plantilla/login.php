<script>var base_url = '<?php echo base_url() ?>';</script>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ingreso</title>
  <script src="<?php echo base_url()."assets/"?>js/jquery-2.1.4.min.js" type="text/javascript"></script>

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>font-awesome/4.5.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>css/sweetalert2/sweetalert2.min.css" />
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="<?php echo base_url()."assets/"?>images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
  
              </div>
              <p class="login-card-description">Iniciar sesión en su cuenta</p>
              <form action="#!">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="user" class="form-control" placeholder="Ususario">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <button name="login" id="login"  class="btn btn-block login-btn mb-4" type="button"><span id="textboton"></span>  <i class="ace-icon fa fa-spinner fa-spin  bigger-180"  id="icocargando"></i></i></button>
                </form>
                
                <nav class="login-card-footer-nav">
                  <a href="#!">Condiciones de uso.</a>
                  <a href="#!">Política de privacidad</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets/"?>js/login.js" type="text/javascript"></script>
    <script src="<?php echo base_url() . "assets/" ?>js/sweetalert2/sweetalert2.all.min.js"></script>
</body>
</html>



