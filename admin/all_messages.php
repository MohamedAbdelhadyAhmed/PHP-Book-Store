<?php
session_start();
include "../app/middleware/auth.php";
include_once "layouts/header.php";
include_once "layouts/nave.php";
include_once "layouts/sidebar.php";
include "../app/models/Contact.php";

$ContactObject = new Contact;
$result = $ContactObject->read();
if ($result) {
  $messages = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $messages = [];
}





?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Messages</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">All Messages</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <?php

  // if (isset($_SESSION["delete"])) {
  //   echo "<div class='alert alert-danger'>" .  $_SESSION["delete"] . "</div>";
  // }



  ?>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Messages</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
               
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Problem</th>
                    <th>Message</th>
                 
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($messages as $message) { ?>
                    <tr>
                   
                      <td> <?= $message['name'] ?></td>
                      <td> <?= $message['email'] ?></td>
                      <td> <?= $message['phone'] ?></td>
                      <td> <?= $message['title'] ?></td>
                      <td> <?= $message['message']?></td>
                        
                    </tr>
                  <?php  } ?>



                  <!-- Add more rows for other books as needed -->
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div> -->
          </div>


        </div>

      </div>

    </div>
  </section>
</div>
<?php
unset($_SESSION['delete']);
include_once "layouts/footer.php"; ?>