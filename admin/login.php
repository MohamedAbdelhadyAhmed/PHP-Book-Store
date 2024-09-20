<?php
session_start();
include "../app/middleware/guest.php";

// print_r($_SESSION);die;  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <h1>Admin Login</h1>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php
        if (isset($_SESSION['admin_added'])) {
          echo "<div class='alert alert-success'>" . $_SESSION['admin_added'] . "</div>";
        }
      
        ?>
        <form action="../app/controller/BackEnd/Auth/login.php" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?php
          if (isset($_SESSION['login_admin']['email'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['login_admin']['email'] . "</div>";
          }
          ?>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?php
          if (isset($_SESSION['login_admin']['password'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['login_admin']['password'] . "</div>";
          }
          ?>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <!-- <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                  Remember Me
                </label> -->
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-block btn-primary">Sign In</button>
            </div>

            <!-- /.col -->
          </div>
        </form>




        <p class="mb-0">
          <a href="register.php" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>

<?php

unset($_SESSION['create_admin']);
unset($_SESSION['admin_added']);
unset($_SESSION['login_admin']);
// unset($_SESSION['admin']);
?>