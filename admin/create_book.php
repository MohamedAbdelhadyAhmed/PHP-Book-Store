<?php
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
            <!-- /.card-header -->
            <!-- form start -->
            <!-- <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form> -->
            <form action="../app/controller/BackEnd/Book/add_book.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                </div>



                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
                </div>

                <div class="form-group">
                  <label for="offer">Offer</label>
                  <input type="text" class="form-control" id="offer" name="offer" placeholder="Enter offer">
                </div>


                <div class="form-group">
                  <label for="numberOfPages">Number of Pages</label>
                  <input type="number" class="form-control" id="numberOfPages" name="numberOfPages" placeholder="Enter number of pages">
                </div>




                <div class="form-group">
                  <label for="authorId">Author</label>
                  <select class="form-control" id="authorId" name="authorId">
                    <!-- Add options dynamically from the database or server-side -->
                    <option value="1">Author 1</option>
                    <option value="2">Author 2</option>
                    <option value="3">Author 3</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="subcategoryId">Subcategory</label>
                  <select class="form-control" id="subcategoryId" name="subcategoryId">
                    <!-- Add options dynamically from the database or server-side -->
                    <option value="1">Subcategory 1</option>
                    <option value="2">Subcategory 2</option>
                    <option value="3">Subcategory 3</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="publisherId">Publisher </label>
                  <select class="form-control" id="publisherId" name="publisherId">
                    <!-- Add options dynamically from the database or server-side -->
                    <option value="1">Publisher 1</option>
                    <option value="2">Publisher 2</option>
                    <option value="3">Publisher 3</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
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
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>



          </div>
          <!-- /.card -->


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
<?php include_once "layouts/footer.php"; ?>