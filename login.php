<?php
if (!file_exists('config/db.php')) {
  header("location: install/paso1.php");
  exit;
}
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
  exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
  // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
  // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
  require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("config/db.php");

// load the login class
require_once("classes/Login.php");
include('libraries/inventory.php');
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();
// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
  // the user is logged in. you can do whatever you want here.
  // for demonstration purposes, we simply show the "you are logged in" view.
  require_once("config/conexion.php");
  $user_id = $_SESSION['user_id'];
  save_log('Login', 'Ingreso al sistema', $user_id);
  header("location: index.php");

?>

<?php
} else {
  $page_title = "Inventory Control | Login";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php echo $page_title; ?>
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body class="hold-transition">
  <div class="login-page">

    <div class="login-box">
      <div class="login-logo">
        <img class="login-logo-img" src="./assets/img/logo-login.png" alt="">
        <h3 class="login-logo-text-1">Hola de nuevo!</h3>
        <h4 class="login-logo-text-2">Por favor, ingresa tus credenciales para ingresar a la plataforma</h4>
      </div><!-- /.login-logo -->
      <form action="login.php" class="form_login_form" method="post">

        <div class="login_form_input_div">
          <div class="form-group-with-label">
            <label class="form-group_label">Usuario</label>
            <div class="form-group has-feedback">
              <input type="text" name="user_name" class="form-control" placeholder="Correo electrónico" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
          </div>
          <div class="form-group-with-label">
            <label class="form-group_label">Contraseña</label>
            <div class="form-group has-feedback">
              <input type="password" name="user_password" class="form-control" placeholder="Contraseña" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
          </div>
        </div>

        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Ingresar</button>
      </form>
      <div class="footer_drv">
        <span class="footer_drv_txt">PodoYimFeet™ 2022. Todos los derechos reservados</span>
      </div>
    </div><!-- /.login-box -->

    <div class="login-img-right">
      <!-- <img src="./assets/img/bkg-login.jpg" alt="" class="login_img_img"> -->
    </div>
  </div>

  <?php
  // show potential errors / feedback (from login object)
  if (isset($login)) {
    if ($login->errors) {
  ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <strong>Error!</strong>

    <?php
      foreach ($login->errors as $error) {
        echo $error;
      }
    ?>
  </div>
  <?php
    }
    if ($login->messages) {
  ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <strong>Aviso!</strong>
    <?php
      foreach ($login->messages as $message) {
        echo $message;
      }
    ?>
  </div>
  <?php
    }
  }
  ?>

  <!-- jQuery 2.1.4 -->
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
}
?>