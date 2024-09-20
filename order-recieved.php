<?php
session_start();
include "app/middleware/auth_user.php";
$title = "تاكيد الطلب";
include "layouts/header.php";
include "layouts/nave.php";
include "app/models/order.php";
include "app/models/OrderItem.php";
if (isset($_GET['id'])) {
  $Oredr_Item = new OrderItem();
  $items = $Oredr_Item->GetOrderItems($_GET['id'], ($_SESSION['user']->id));

  $order = new Order();
  $user = $order->GetOrderAddress($_GET['id'], ($_SESSION['user']->id));
  $orders = $order->GetOrder($_GET['id'], ($_SESSION['user']->id));
} else {
  echo "<script>window.history.back()</script>";
  die;
}

?>

<main>

  <section class="section-container profile my-5 py-5">
    <div class="text-center mb-5">
      <div class="success-gif m-auto">
        <img class="w-100" src="assets/images/success.gif" alt="" />
      </div>
      <h4 class="mb-4">جاري تجهيز طلبك الآن</h4>
      <p class="mb-1">
        سيقوم أحد ممثلي خدمة العملاء بالتواصل معك لتأكيد الطلب
      </p>
      <p>برجاء الرد على الأرقام الغير مسجلة</p>
      <a class="primary-button text-decoration-none" href="shop.php">تصفح منتجات اخري</a>
    </div>
    <div>
      <p>شكرًا لك. تم استلام طلبك.</p>
      <div class="d-flex flex-wrap gap-2">
        <div class="success__details">
          <p class="success__small">رقم الطلب:</p>
          <p class="fw-bolder">#<?= $orders['id'] ?></p>
        </div>
        <div class="success__details">
          <p class="success__small">التاريخ:</p>
          <p class="fw-bolder"><?= $orders['created_at'] ?></p>
        </div>
        <div class="success__details">
          <p class="success__small">البريد الإلكتروني:</p>
          <p class="fw-bolder"><?= $user['email'] ?></p>
        </div>
        <div class="success__details">
          <p class="success__small">الإجمالي:</p>
          <p class="fw-bolder"><?= "$" . $orders['total_amount'] ?></p>
        </div>
      </div>
    </div>
  </section>

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
</main>
<?php include "layouts/footer.php" ?>