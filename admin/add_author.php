<?php
session_start();
// print_r($_SESSION['add_author']);die;
include_once "layouts/header.php";
include_once "layouts/nave.php";
include_once "layouts/sidebar.php";
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Authore </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Add Authore</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Authore</h3>
            </div>
            <?php

            if (isset($_SESSION["author_added"])) {
              echo "<div class='alert alert alert-success'>" .  $_SESSION["author_added"] . "</div>";
            }
            ?>
            <form action="../app/controller/BackEnd/author/add_author.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                  <?php
                  if (isset($_SESSION['add_author']['name'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_author']['name'] . "</div>";
                  }
                  ?>
                </div>


                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                  <?php
                  if (isset($_SESSION['add_author']['description'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_author']['description'] . "</div>";
                  }
                  ?>
                </div>

                <div class="form-group">
                  <label for="image">Image Upload</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  <?php
                  if (isset($_SESSION['add_author']['image'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_author']['image'] . "</div>";
                  }
                  ?>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>



          </div>
          <!-- /.card -->
          <?php
          // if (isset($_SESSION['add_book'])) {
          //   print_r($_SESSION['add_book']);
          //   die;
          // } 
          ?>


        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php
unset($_SESSION['add_author']);
unset($_SESSION['author_added']);
include_once "layouts/footer.php"; ?>