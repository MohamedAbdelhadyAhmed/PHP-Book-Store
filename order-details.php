<?php
include "layouts/header.php";
include "layouts/nave.php";
include "app/models/order.php";
include "app/models/OrderItem.php";

$Oredr_Item = new OrderItem();
$items = $Oredr_Item->GetOrderItems($_GET['id'], ($_SESSION['user']['id'] ?? 1));

$orders = new Order();
$user = $orders->GetOrderAddress($_GET['id'], ($_SESSION['user']['id'] ?? 1));
$orders = $orders->GetOrder($_GET['id'], ($_SESSION['user']['id'] ?? 1));
?>

<main>
  <div
    class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>تتبع طلبك</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray" href="index.php">الرئيسية</a> /
        <span class="text-gray">تتبع طلبك</span>
      </div>
    </div>
  </div>

  <section class="section-container my-5 py-5">
    <h5 class="text-end">
      .Request #<?= $_GET['id']; ?> was submitted on <?= $orders['created_at']; ?> and is currently in <?= $orders['status']; ?>
    </h5>

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