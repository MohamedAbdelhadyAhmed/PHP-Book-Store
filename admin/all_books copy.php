<?php
session_start();
include "../app/middleware/auth.php";
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
          <h1>All Books</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">All Books</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Books</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Publisher</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>The Great Gatsby</td>
                    <td>F. Scott Fitzgerald</td>
                    <td>$10.99</td>
                    <td>Fiction</td>
                    <td>Scribner</td>
                    <td>
                      <a href="edit_book.php?id=1" class="btn btn-primary btn-sm">Edit</a>
                      <a href="../app/controller/BackEnd/Book/delete_book.php?id=1" class="btn btn-danger btn-sm">Delete</a>
                    </td>

                  </tr>
                  <tr>
                    <td>2</td>
                    <td>To Kill a Mockingbird</td>
                    <td>Harper Lee</td>
                    <td>$8.99</td>
                    <td>Fiction</td>
                    <td>J.B. Lippincott & Co.</td>
                    <td>
                      <a href="edit_book.php?id=1" class="btn btn-primary btn-sm">Edit</a>
                      <a href="delete_book.php?id=1" class="btn btn-danger btn-sm">Delete</a>
                    </td>

                  </tr>
               
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
<?php include_once "layouts/footer.php"; ?>