<?php
session_start();
include "../app/middleware/guest.php";

// print_r($_SESSION);die; text-decoration-none 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
        <?php
        if (isset($_SESSION['admin_added'])) {
          echo "<div class='alert alert-success'>" . $_SESSION['admin_added'] . "</div>";
        }
        if (isset($_SESSION['email_unique'])) {
          echo "<div class='alert alert-danger'>" . $_SESSION['email_unique'] . "</div>";
        }
        ?>


        <form action="../app/controller/BackEnd/Auth/register.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?php
          if (isset($_SESSION['create_admin']['name'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_admin']['name'] . "</div>";
          }
          ?>


          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?php
          if (isset($_SESSION['create_admin']['email'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_admin']['email'] . "</div>";
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
          if (isset($_SESSION['create_admin']['password'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_admin']['password'] . "</div>";
          }
          ?>

          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?php
          if (isset($_SESSION['create_admin']['password_confirmation'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_admin']['password_confirmation'] . "</div>";
          }
          if (isset($_SESSION['create_admin']['password_confirm'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_admin']['password_confirm'] . "</div>";
          }
          ?>

          <div class="row">

            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

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
unset($_SESSION['email_unique']);
unset($_SESSION['admin_added']);
?>