<?php
session_start();
include "app/middleware/auth_user.php";
include "layouts/header.php";
include "layouts/nave.php";
include "app/models/order.php";
include "app/models/OrderItem.php";
$Oredr_Item = new OrderItem();
if (isset($_POST['id']) && isset($_POST['email'])) {
  $items = $Oredr_Item->GetOrderItemsbyEmail($_POST['id'], $_SESSION['user']->id, $_POST['email']);
  if ($items->num_rows == 0) {
    $_SESSION['errors']['orders'] = "لا يوجد بيانات لهذا الطلب";
    echo "<script>window.history.back()</script>";
    die;
  }
} elseif (isset($_GET['id'])) {
  $items = $Oredr_Item->GetOrderItems($_GET['id'], $_SESSION['user']->id);
} else {
  echo "<script>window.history.back()</script>";
  die;
}
$order = new Order();
$user = $order->GetOrderAddress($_GET['id'], $_SESSION['user']->id);
$orders = $order->GetOrder($_GET['id'], $_SESSION['user']->id);
?>

<main>
  <div
    class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>
          تفاصيل الطلب
        </h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray" href="index.php">الرئيسية</a> /
        <span class="text-gray">تفاصيل الطلب</span>
      </div>
    </div>
  </div>
  <section class="section-container my-5 py-5">
    <div class="container" dir="rtl">
      <?php
      $shipment_status = $order->shipment_status($_GET['id'], $_SESSION['user']->id);

      $progress_percentage = 0;
      list($shipment_status, $progress_percentage) = $order->GetShipmentStatus($shipment_status, $progress_percentage);
      $is_step_1_complete = $progress_percentage >= 25;
      $is_step_2_complete = $progress_percentage >= 50;
      $is_step_3_complete = $progress_percentage >= 75;
      $is_step_4_complete = $progress_percentage == 100;
      ?>
      <h2 class="text-center"><?= $shipment_status; ?></h2>
      <p class="text-center">
        <?php
        if ($shipment_status == "تم الشحن") {
          echo "وصلت الشحنة إلى آخر منشأة توصيل";
        } elseif ($shipment_status == "خرج للتوصيل") {
          echo "الشحنة في الطريق للتوصيل";
        } elseif ($shipment_status == "تم التوصيل") {
          echo "تم توصيل الشحنة بنجاح";
        } else {
          echo "تم طلب الشحنة وهي قيد التجهيز.";
        }
        ?>
      </p>
      <div>
        <div class="progress position-relative" style="height: 20px;">
          <div class="progress-bar" role="progressbar" style="width: <?= $progress_percentage; ?>%;" aria-valuenow="<?= $progress_percentage; ?>" aria-valuemin="0" aria-valuemax="100">
          </div>
        </div>
        <div>
          <div class="progress-circle circle-1 <?= $is_step_1_complete ? 'check' : ''; ?>">
            <i class="fas fa-check"></i>
          </div>
          <div class="progress-circle circle-2 <?= $is_step_2_complete ? 'check' : ''; ?>">
            <i class="fas fa-check"></i>
          </div>
          <div class="progress-circle circle-3 <?= $is_step_3_complete ? 'check' : ''; ?>">
            <i class="fas fa-check"></i>
          </div>
          <div class="progress-circle circle-4 <?= $is_step_4_complete ? 'check' : ''; ?>">
            <i class="fas fa-check"></i>
          </div>
        </div>
      </div>
      <div class="row text-center mt-4">
        <div class="col progress-step">
          <p class="<?= ($progress_percentage >= 25) ? 'text-success' : ''; ?>">تم طلبه</p>
        </div>
        <div class="col progress-step">
          <p class="<?= ($progress_percentage >= 50) ? 'text-success' : ''; ?>">تم الشحن</p>
        </div>
        <div class="col progress-step">
          <p class="<?= ($progress_percentage >= 75) ? 'text-success' : ''; ?>">خرج للتوصيل</p>
        </div>
        <div class="col progress-step">
          <p class="<?= ($progress_percentage == 100) ? 'text-success' : ''; ?>">تم التوصيل</p>
        </div>
      </div>
    </div>

    <section>
      <h2>تفاصيل الطلب</h2>
      <table class="success__table w-100 mb-5">
        <thead>
          <tr class="border-0 bg-danger text-white">
            <th>المنتج</th>
            <th class="d-none d-md-table-cell">الإجمالي</th>
          </tr>
        </thead>
        <tbody>
          <?php $price_after_offer = 0; ?>
          <?php $total_price = 0; ?>
          <?php while ($item = $items->fetch_assoc()) : ?>
            <tr>
              <td>
                <div>
                  <a href="<?= "single-product.php?id=" . $item['book_id']; ?>"><?= $item['title']; ?></a>
                </div>
                <div>
                  <span class="fw-bold">Quantity :</span>
                  <span><?= $item['quantity']; ?></span>
                </div>
                <div>
                  <span class="fw-bold">Price :</span>
                  <span><?= $item['price']; ?></span>
                </div>
              </td>
              <?php if ($item['offer'] > 0): ?>
                <td>
                  <?= "$" . $price_after_offer = (($item['price'] - ($item['price'] * ($item['offer'] / 100))) * $item['quantity']); ?>
                  <span class="text-decoration-line-through">
                    <?= "$" . $item['price'] * $item['quantity']; ?>
                  </span>
                </td>
              <?php else: ?>
                <td><?= "$" . $price_after_offer = $item['price'] * $item['quantity']; ?></td>
              <?php endif; ?>
            </tr>
            <?php $total_price += $price_after_offer; ?>
          <?php endwhile; ?>
          <tr>
            <th>المجموع:</th>
            <td class="fw-bolder"><?= "$" . $total_price; ?></td>
          </tr>
          <tr>
            <th>الإجمالي:</th>
            <td class="fw-bold"><?= "$" . $orders['total_amount'] ?></td>
          </tr>
        </tbody>
      </table>
    </section>
    <section class="mb-5">
      <h2>عنوان الفاتورة</h2>
      <div class="border p-3 rounded-3">
        <p class="mb-1"><?= $user['first_name'] . " " . $user['last_name'] ?></p>
        <p class="mb-1"><?= $user['street'] ?></p>
        <p class="mb-1"><?= $user['state'] ?></p>
        <p class="mb-1"><?= $user['phone'] ?></p>
        <p class="mb-1"><?= $user['email'] ?></p>
      </div>
    </section>
  </section>
</main>
<?php include "layouts/footer.php" ?>