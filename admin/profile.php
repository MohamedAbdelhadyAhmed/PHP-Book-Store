<?php
session_start();
include "../app/middleware/auth.php";
include_once "layouts/header.php";
include_once "layouts/nave.php";
include_once "layouts/sidebar.php";


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                  src="../publice/img/user4-128x128.jpg"
                  alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"> <?php
                                                        if (isset($_SESSION['admin'])) {
                                                          echo $_SESSION['admin']->name;
                                                        }


                                                        ?></h3>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-pr imary">

            <!-- /.card-header -->

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active"  href="change-password.php"  >Change Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <?php
              if (isset($_SESSION['admin_profile_updated'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['admin_profile_updated'] . "</div>";
              }

              ?>

              <div class="tab-pane">
                <form class="form-horizontal" action="../app/controller/BackEnd/Auth/edit_profile.php" method="POST">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control"
                      value=" <?= $_SESSION['admin']->name; ?>  " id="inputName" placeholder="Name">
                      <input type="hidden" name="id" value=" <?= $_SESSION['admin']->id; ?>  " >
                      <?php
                      if (isset($_SESSION['login_admin']['name'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['login_admin']['name'] . "</div>";
                      }
                      ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email"
                      value=" <?= $_SESSION['admin']->email; ?>  " class="form-control" id="inputEmail" placeholder="Email">
                      <?php
                      if (isset($_SESSION['login_admin']['email'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['login_admin']['email'] . "</div>";
                      }
                      ?>
                    </div>
                  </div>



                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">

                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>



            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php
unset($_SESSION['admin_profile_updated']);
unset($_SESSION['login_admin']);
include_once "layouts/footer.php"; ?>