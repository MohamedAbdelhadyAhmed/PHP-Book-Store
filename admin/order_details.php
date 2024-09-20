<?php
if (!isset($_GET['id'])) {
  header('location:all_orders.php');
}
session_start();
include "../app/middleware/auth.php";
include_once "layouts/header.php";
include_once "layouts/nave.php";
include_once "layouts/sidebar.php";
include "../app/models/OrderItem.php";


$order_items = new OrderItem;
$order_items->setOrderId($_GET['id']);
$result = $order_items->read();
if ($result) {
  $items = $result->fetch_all(MYSQLI_ASSOC);
  $counter = count($items);
  // print_r($items);
  // die;
} else {
  $items = [];
}








?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Order Details</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">

      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <div class="row">
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted"> Order Items</span>
                    <span class="info-box-number text-center text-muted mb-0"><?= (isset($counter)) ? $counter : 0; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Total Price </span>
                    <span class="info-box-number text-center text-muted mb-0"><?= (isset($items[0]['total_amount'])) ? $items[0]['total_amount'] : 0; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Address</span>
                    <span class="info-box-number text-center text-muted mb-0"><?= (isset($items[0]['full_address'])) ? $items[0]['full_address'] : ''; ?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <?php if (isset($items)) {
                $total_price = 0;
                foreach ($items as $key => $item) {
                  $total_price += $item['price'];
              ?>
                  <div class="col-12">
                    <h4>Book Name : <?= $item['title'] ?> </h4>
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                          Quantity :<?= $item['quantity'] ?>
                        </span>
                        <span class="username">Date : <?= $item['created_at'] ?></span>
                        <span class="username">Price :<?= $item['price'] ?> </span>
                      </div>
                    </div>



                  </div>

              <?php }
              } ?>

            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Invoice </h3>
            <br>
            <div class="text-muted">
              <p class="text-sm"> <b> Price : <?= (isset($total_price)) ? $total_price : 0; ?> $</b> </p>
              <hr>
              <p class="text-sm"> <b> Price After Discount : <?= (isset($items[0]['total_amount'])) ? $items[0]['total_amount'] : 0; ?>$</b> </p>
              <hr>
              <p class="text-sm"> <b> Address : <?= (isset($items[0]['full_address'])) ? $items[0]['full_address'] : ''; ?></b> </p>
              <hr>

              <p class="text-sm"> <b> Note About Address : <?= (isset($items[0]['not'])) ? $items[0]['not'] : ''; ?></b> </p>
              <hr>
              <p class="text-sm"> <b> Order Status : <?= (isset($items[0]['status'])) ? $items[0]['status'] : ''; ?></b> </p>

            </div>
            <form action="../app/controller/BackEnd/Order/change_status.php" method="post">
              <div class="form-group clearfix">
                <div class="icheck-danger d-inline">
                  <input type="radio" name="status" <?= ($items[0]['status'] == "pending") ? "checked" : ''; ?> id="radioDanger1" value="pending">
                  <label for="radioDanger1">
                    pending
                  </label>
                </div>
                <div class="icheck-danger d-inline">
                  <input type="radio" name="status"  id="radioDanger2" 
                  <?= ($items[0]['status'] == "shipped") ? "checked" : ''; ?> value="shipped">
                  <label for="radioDanger2">
                    shipped
                  </label>
                </div>
                <div class="icheck-danger d-inline">
                  <input type="radio" name="status" id="radioDanger3" 
                  <?= ($items[0]['status'] == "delivered") ? "checked" : ''; ?> value="delivered">
                  <input type="hidden" name="order_id" value="<?= (isset($items[0]['order_id'])) ? $items[0]['order_id'] : ''; ?>">

                  <label for="radioDanger3">
                    delivered
                  </label>
                </div>
                
              </div>
              <div class="text-center mt-5 mb-3">
              <input type="submit" class="btn btn-sm btn-warning"   value="Change Order Status">

               </div>
            </form>


          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>

<?php
unset($_SESSION['delete']);
include_once "layouts/footer.php"; ?>