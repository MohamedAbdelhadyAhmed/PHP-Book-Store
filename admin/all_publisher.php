<?php
session_start();
include_once "layouts/header.php";
include_once "layouts/nave.php";
include_once "layouts/sidebar.php";
include "../app/models/Publisher.php";

$publishersObject = new Publisher;
$result = $publishersObject->read();
if ($result ) {
  $publishers = $result->fetch_all(MYSQLI_ASSOC);
}else {
  $authors = [];
}

 


?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Publisher</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">All Publisher</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  
  <?php

if (isset($_SESSION["delete"])) {
  echo "<div class='alert alert-danger'>" .  $_SESSION["delete"] . "</div>";
}


 
?>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Publisher</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($publishers as $publisher) { ?>
                    <tr>
                      <td> <?= $publisher['id'] ?></td>
                      <td> <?= $publisher['name'] ?></td>
                      <td> <?= $publisher['phone'] ?></td>
                      <td>
                        <a href="edit_publisher.php?id=<?= $publisher['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="../app/controller/BackEnd/publisher/delete_publisher.php?id=<?= $publisher['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                  <?php  } ?>



                  <!-- Add more rows for other books as needed -->
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>


        </div>

      </div>

    </div>
  </section>
</div>
<?php
unset($_SESSION['delete']);
 include_once "layouts/footer.php"; ?>