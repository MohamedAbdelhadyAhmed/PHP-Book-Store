<?php
session_start();
include_once "layouts/header.php";
include_once "layouts/nave.php";
include_once "layouts/sidebar.php";
include "../app/models/Category.php";
include "../app/models/Author.php";
include "../app/models/Publisher.php";

$CategoriesObject = new Category;
$result = $CategoriesObject->read();
if ($result) {
  $categories = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $categories = [];
}

$publishersObject = new Publisher;
$result = $publishersObject->read();
if ($result) {
  $publishers = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $publishers = [];
}

$authorsObject = new Author;
$result = $authorsObject->read();
if ($result) {
  $authors = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $authors = [];
}



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
            <li class="breadcrumb-item active">Add Book</li>
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
              <h3 class="card-title">Add New Book</h3>
            </div>


            <?php

            if (isset($_SESSION["book_added"])) {
              echo "<div class='alert alert alert-success'>" .  $_SESSION["book_added"] . "</div>";
            }
            ?>
            <form action="../app/controller/BackEnd/Book/add_book.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                  <?php
                  if (isset($_SESSION['add_book']['title'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['title'] . "</div>";
                  }
                  ?>
                </div>



                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
                  <?php
                  if (isset($_SESSION['add_book']['price'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['price'] . "/div>";
                  }
                  ?>
                </div>

                <div class="form-group">
                  <label for="offer">Offer</label>
                  <input type="text" class="form-control" id="offer" name="offer" placeholder="Enter offer">
                  <?php
                  if (isset($_SESSION['add_book']['offer'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['offer'] . "/div>";
                  }
                  ?>
                </div>


                <div class="form-group">
                  <label for="numberOfPages">Number of Pages</label>
                  <input type="number" class="form-control" id="numberOfPages" name="numberOfPages" placeholder="Enter number of pages">
                  <?php
                  if (isset($_SESSION['add_book']['numberOfPages'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['numberOfPages'] . "/div>";
                  }
                  ?>
                </div>




                <div class="form-group">
                  <label for="authorId">Author</label>
                  <select class="form-control" id="authorId" name="authorId">
                    <!-- Add options dynamically from the database or server-side -->
                    <option value="">Chose</option>

                    <?php if (isset($authors)) {
                      foreach ($authors as  $author) { ?>
                        <option value="<?= $author['id'] ?>"> <?= $author['name'] ?></option>

                    <?php   }
                    }
                    ?>

                  </select>
                  <?php
                  if (isset($_SESSION['add_book']['authorId'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['authorId'] . "/div>";
                  }

                  ?>
                </div>

                <div class="form-group"> 
                  <label for="subcategoryId">category</label>
                  <select class="form-control" id="subcategoryId" name="categoryId">
                    <!-- Add options dynamically from the database or server-side -->
                    <option value="">Chose</option>
                    <?php if (isset($categories)) {
                      foreach ($categories as  $category) { ?>
                        <option value="<?= $category['id'] ?>"> <?= $category['name'] ?></option>

                    <?php   }
                    }
                    ?>

                  </select>
                  <?php
                  if (isset($_SESSION['add_book']['categoryId'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['categoryId'] . "/div>";
                  }
                  ?>
                </div>

                <div class="form-group">
                  <label for="publisherId">Publisher </label>
                  <select class="form-control" id="publisherId" name="publisherId">
                    <!-- Add options dynamically from the database or server-side -->
                    <option value="">Chose</option>

                    <?php if (isset($publishers)) {
                      foreach ($publishers as  $publisher) { ?>
                        <option value="<?= $publisher['id'] ?>"> <?= $publisher['name'] ?></option>

                    <?php   }
                    }
                    ?>
                  </select>
                  <?php
                  if (isset($_SESSION['add_book']['publisherId'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['publisherId'] . "/div>";
                  }
                  ?>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                  <?php
                  if (isset($_SESSION['add_book']['description'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['description'] . "/div>";
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
                  if (isset($_SESSION['add_book']['image'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['add_book']['image'] . "/div>";
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
unset($_SESSION['add_book']);
unset($_SESSION['book_added']);
include_once "layouts/footer.php"; ?>