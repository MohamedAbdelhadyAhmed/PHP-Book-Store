<?php
session_start();
include "app/middleware/auth_user.php";
$title = "طلباتي";
include "layouts/header.php";
include "layouts/nave.php";
include "app/models/Order.php";
$order = new Order();
$orders = $order->get_orders($_SESSION['user']->id);
?>
<main>
  <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>حسابي</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-primary text-decoration-none" href="index.php">الرئيسية</a> /
        <span class="text-gray">حسابي</span>
      </div>
    </div>
  </section>

  <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
    <div class="profile__right">
      <div class="profile__user mb-3 d-flex gap-3 align-items-center">
        <div class="profile__user-img rounded-circle overflow-hidden">
          <img class="w-100" src="assets/images/user.png" alt="">
        </div>
        <div class="profile__user-name"><?= $_SESSION['user']->first_name . " " . $_SESSION['user']->last_name  ?></div>
      </div>
      <ul class="profile__tabs list-unstyled ps-3">
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="account_details.php">تفاصيل الحساب</a>
        </li>
        <li class="profile__tab active">
          <a class="py-2 px-3 text-black text-decoration-none" href="orders.php">الطلبات</a>
        </li>
        <li class="profile__tab">
          <a
            class="py-2 px-3 text-black text-decoration-none"
            href="cart.php">السلة</a>
        </li>
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="favourites.php">المفضلة</a>
        </li>
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="">تسجيل الخروج</a>
        </li>
      </ul>
    </div>
    <div class="profile__left mt-4 mt-md-0 w-100">
      <div class="profile__tab-content orders active">
        <?php if ($orders->num_rows == 0):  ?>
          <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4">
            <p class="m-0">لم يتم تنفيذ اي طلب بعد.</p>
            <!-- <button class="primary-button">تصفح المنتجات</button> -->
            <a class="primary-button " style="text-decoration: none;" href="shop.php">تصفح المنتجات</a>
          </div>
        <?php else: ?>
          <table class="orders__table w-100">
            <thead>
              <th class="d-none d-md-table-cell">الطلب</th>
              <th class="d-none d-md-table-cell">التاريخ</th>
              <th class="d-none d-md-table-cell">الحالة</th>
              <th class="d-none d-md-table-cell">الاجمالي</th>
              <th class="d-none d-md-table-cell">اجراءات</th>
            </thead>
            <tbody>
              <?php while ($order = $orders->fetch_assoc()): ?>
                <tr class="order__item">
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">الطلب:</div>
                    <div><a href="<?= "order-details.php?id=" . $order['id']; ?>">#<?= $order['id']; ?></a></div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">التاريخ:</div>
                    <div><?= $order['created_at']; ?></div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">الحالة:</div>
                    <div><?= $order['status']; ?></div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">الاجمالي:</div>
                    <div><?= "$" . $order['total_amount']; ?></div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">اجراءات:</div>
                    <div><a class="primary-button text-decoration-none" href="<?= "order-details.php?id=" . $order['id']; ?>">عرض</a></div>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php include "layouts/footer.php" ?>