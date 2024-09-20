<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.php" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Book Store</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="profile.php" class="d-block">
          <?php
          if (isset($_SESSION['admin'])) {
            echo $_SESSION['admin']->name;
          }
          ?>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>

          </ul>
        </li> -->

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Books
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="all_books.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Books</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="create_book.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create Book</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Category
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="all_categories.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add_category.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Author
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">


            <li class="nav-item">
              <a href="all_authors.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Authors </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add_author.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Author </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Publisher
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="add_publisher.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Publisher</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="all_publisher.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Publishers</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Orders
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="all_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Orders</p>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Messages
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="all_messages.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Messages</p>
              </a>
            </li>


          </ul>
        </li>




      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>