<?php session_start();
include "app/middleware/auth_user.php";
$title = "السلة";
?>

<?php include "layouts/header.php" ?>
<?php include "layouts/nave.php" ?>
<?php include "app/models/Book.php";

?>

<main>
  <section
    class="page-top d-flex justify-content-center align-items-center flex-column text-center">
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
    <div class="profile__right mb-5">
      <div class="profile__user mb-3 d-flex gap-3 align-items-center">
        <div class="profile__user-img rounded-circle overflow-hidden">
          <img class="w-100" src="assets/images/user.png" alt="" />
        </div>
        <div class="profile__user-name"><?= $_SESSION['user']->first_name . " " . $_SESSION['user']->last_name  ?></div>
      </div>
      <ul class="profile__tabs list-unstyled ps-3">
        <li class="profile__tab">
          <a
            class="py-2 px-3 text-black text-decoration-none"
            href="account_details.php">
            تفاصيل الحساب
          </a>
        </li>
        <li class="profile__tab">
          <a
            class="py-2 px-3 text-black text-decoration-none"
            href="orders.php">الطلبات</a>
        </li>
        <li class="profile__tab active">
          <a class="py-2 px-3 text-black text-decoration-none" href="cart.php">
            السلة
          </a>
        </li>
        <li class="profile__tab">
          <a
            class="py-2 px-3 text-black text-decoration-none"
            href="favourites.php">المفضلة</a>
        </li>
        <li class="profile__tab">
          <a class="py-2 px-3 text-black text-decoration-none" href="./app/controller/FrontEnd/Auth/logout.php">تسجيل الخروج</a>
        </li>
      </ul>
    </div>
    <div class="profile__left mt-4 mt-md-0 w-100">
      <div class="profile__tab-content orders active">
        <?php if (empty($cart_result)) : ?>
          <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4">
            <p class="m-0">لا توجد منتجات في سلة التسوق</p>
            <a class="primary-button " style="text-decoration: none;" href="shop.php">تصفح المنتجات</a>
          </div>
        <?php else: ?>
          <table class="orders__table w-100">
            <thead>
              <th class="d-none d-md-table-cell">الكتاب</th>
              <th class="d-none d-md-table-cell">السعر</th>
              <th class="d-none d-md-table-cell">الكمية</th>
              <th class="d-none d-md-table-cell">الاجمالي</th>
              <th class="d-none d-md-table-cell">اجراءات</th>
            </thead>
            <tbody>
              <?php foreach ($cart_result as $value): ?>
                <tr class="order__item">
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">الكتاب:</div>
                    <div><a href="<?= "single-product.php?id=" . $value['book_id'] ?>"><?= $value['title']; ?></a></div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">السعر:</div>
                    <div>
                      <?php if ($value['offer'] > 0) : ?>
                        <del class="text-gray"><?= "$" . $value['price']; ?></del>
                        <span><?= "$" . $price = ($value['price'] - ($value['price'] * ($value['offer'] / 100))); ?></span>
                      <?php else: ?>
                        <?= "$" . $price = $value['price']; ?>
                      <?php endif; ?>
                    </div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">الكمية:</div>
                    <div><?= $value['quantity']; ?></div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">الاجمالي:</div>
                    <div><?= "$" . $price * $value['quantity']; ?></div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="fw-bolder d-md-none">اجراءات:</div>
                    <div><a class="btn btn-danger text-decoration-none" href="<?= "app/controller/FrontEnd/Book/remove_from_cart.php?id=" . $value['id'] ?>">حذف</a>
                      <a class="btn btn-success text-decoration-none" href="<?= "app/controller/FrontEnd/Book/add_to_favourite.php?id=" . $value['book_id'] ?>">
                        <i class="fas fa-heart fa-lg mr-2"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="d-flex mt-3">
            <div class="fw-bolder">الاجمالي:</div>
            <div class="fw-bolder ms-2"><?= "$" . $total_price ?></div>
          </div>
          <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4 mt-4">
            <a class="btn btn-success" style="text-decoration: none;" href="checkout.php?total_price=<?= $total_price ?>">اتمام الطلب</a>
            <a class="btn btn-danger" style="text-decoration: none;" href="app/controller/FrontEnd/Book/remove_all_from_cart.php">حذف السلة</a>
            <a class="primary-button" style="text-decoration: none;" href="shop.php">تصفح المنتجات</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php include "layouts/footer.php" ?>