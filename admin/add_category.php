<?php
session_start();
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
          <h1>Add Book</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Add Category</li>
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
              <h3 class="card-title">Add New Category</h3>
            </div>

            <?php

           


            if (isset($_SESSION["category_added"])) {
              echo "<div class='alert alert-success'>" .  $_SESSION["category_added"] . "</div>";
            }
            ?>
            <form action="../app/controller/BackEnd/Book/add_category.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control" id="title" name="name" placeholder="Enter Name">
                  <?php
                  if (isset($_SESSION['add_book']['name'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['name'] . "</div>";
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
// unset($_SESSION['delete']);
unset($_SESSION['category_added']);
include_once "layouts/footer.php"; ?>