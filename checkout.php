<?php
session_start();
// print_r($_SESSION['user'] );die;
include "app/middleware/auth_user.php";
include "layouts/header.php";
include "layouts/nave.php";
include "app/models/Book.php";
// include "app/models/Cart.php";

$cart = new Cart();
$cartItems = $cart->getCartItems($_SESSION['user']->id);
// print_r($_SESSION['user']);die;
if (isset($_GET['total_price'])) {
  $total_price = $_GET['total_price'];
} else {
  header("Location: index.php");
}

// $user_id = ($_SESSION['user']->id );
// $conn = mysqli_connect("localhost", "root", "", "book_store2");
// $sql = "SELECT `users`.*, `addresses`.`city`, `addresses`.`state`, `addresses`.`street`, `addresses`.`id` AS `address_id` FROM `users` INNER JOIN `addresses` ON `users`.`id` = `addresses`.`user_id` WHERE `users`.`id` = $user_id";
// $result = mysqli_query($conn, $sql);
// $user = mysqli_fetch_assoc($result);
?>

<main>
  <section
    class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>إتمام الطلب</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray" href="index.php">الرئيسية</a> /
        <span class="text-gray">إتمام الطلب</span>
      </div>
    </div>
  </section>
  <section class="section-container my-5 py-5 d-lg-flex">
    <div class="checkout__form-cont w-50 px-3 mb-5">
      <h4>الفاتورة </h4>
      <form class="checkout__form" action="app/controller/FrontEnd/Order/add.php" method="POST">
        <div class="d-flex gap-3 mb-3">
          <div class="w-50">
            <label for="first_name">الاسم الأول <span class="required">*</span></label>
            <input class="form__input text-dark" type="name" name="first_name" id="first_name"
             value="<?= $_SESSION['user']->first_name?>" required />
          <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            </div>
          <div class="w-50">
            <label for="last_name">الاسم الأخير <span class="required">*</span></label>
            <input class="form__input text-dark" type="name" name="last_name" id="last_name"
             value="<?= $_SESSION['user']->last_name ?>" required />
          </div>
        </div>
        <div class="mb-3">
          <label for="state">المدينة / المحافظة<span class="required">*</span></label>
          <input
            class="form__input text-dark"
            placeholder="المدينة / المحافظة"
            type="text"
            name="state"
            id="state"   required />
        </div>
      
        <div class="mb-3">
          <label for="street">  ( المنطقة  )<span
              class="required">*</span></label>
          <input
            class="form__input text-dark"
            placeholder=" المنطقة"
            type="text"
            name="city"
            id="street"   required />
        </div>
        <div class="mb-3">
          <label for="street">  ( الشارع  )<span
              class="required">*</span></label>
          <input
            class="form__input text-dark"
            placeholder=" المنطقة"
            type="text"
            name="street"
            id="street"   required />
        </div>
        <div class="mb-3">
          <label for="phone">رقم الهاتف<span class="required">*</span></label>
          <input class="form__input text-dark" type="number" name="phone" id="phone" 
          value="<?=$_SESSION['user']->phone ?>" required />
        </div>
        <div class="mb-3">
          <label for="email">البريد الإلكتروني (اختياري)<span class="required">*</span></label>
          <input class="form__input text-dark" type="email" name="email" id="email"
           value="<?= $_SESSION['user']->email ?>" required />
        </div>
        <div class="mb-3">
          <h2>معلومات اضافية</h2>
          <label for="notes">ملاحظات الطلب (اختياري)<span class="required">*</span></label>
          <textarea
            class="form__input text-dark"
            placeholder="ملاحظات حول الطلب, مثال: ملحوظة خاصة بتسليم الطلب."
            type="text"
            name="not"
            id="notes"></textarea>
        </div>
        <button class="primary-button w-100 py-2" type="submit">تاكيد الطلب</button>
      </form>
    </div>
    <div class="checkout__order-details-cont w-50 px-3">
      <h4>طلبك</h4>
      <div>
        <table class="w-100 checkout__table">
          <thead>
            <tr class="border-0">
              <th>المجموع</th>
              <th>المنتج</th>
            </tr>
          </thead>
          <tbody>
            <?php $price_offer = 0; ?>
            <?php while ($cart_item = mysqli_fetch_assoc($cartItems)): ?>
              <tr>
                <td>
                  <div
                    class="product__price text-center d-flex gap-2 flex-wrap">
                    <?php if ($cart_item['offer'] > 0): ?>
                      <span class="product__price product__price--old">
                        <?= "$" . $cart_item['price']; ?>
                      </span>
                      <span class="product__price"><?= "$" . $price_after_offer = ($cart_item['price'] - ($cart_item['price'] * ($cart_item['offer'] / 100))); ?></span>
                    <?php else: ?>
                      <span class="product__price"><?= "$" . $price_after_offer = $cart_item['price']; ?></span>
                    <?php endif; ?>
                  </div>
                </td>
                <td><?= $cart_item['title']; ?> × <?= $cart_item['quantity']; ?></td>
              </tr>
              <?php $price_offer += ($cart_item['price'] * ($cart_item['offer'] / 100)); ?>
            <?php endwhile; ?>
            <tr>
              <th>المجموع</th>
              <td class="fw-bolder"><?= "$" . $total_price; ?></td>
            </tr>
            <tr class="bg-green">
              <th>قمت بتوفير</th>
              <td class="fw-bolder"><?= "$" . $price_offer; ?></td>
            </tr>
            <tr>
              <th>الإجمالي</th>
              <td class="fw-bolder"><?= "$" . $total_amount = $total_price + 10; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="checkout__payment py-3 px-4 mb-3">
        <p class="m-0 fw-bolder">الدفع نقدا عند الاستلام</p>
      </div>
    </div>
  </section>
</main>
<?php include "layouts/footer.php" ?>