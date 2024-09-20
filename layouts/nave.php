<?php
if (isset($_SESSION['user'])) {

  require_once "app/models/Cart.php";
  require_once "app/models/Wishlist.php";
  $cart = new Cart();
  $cartItems = $cart->getCartItems($_SESSION['user']->id);
  if ($cartItems) {
    $cart_result = $cartItems->fetch_all(MYSQLI_ASSOC);
  } else {
    $cart_result = [];
  }
  $cartItems = count($cart_result);
  // print_r($cartItems);die;

  $wishlist = new Wishlist();
  $wishlistItems = $wishlist->getWishlist($_SESSION['user']->id);
}
?>
<!--  nave  -->
<nav class="nav">
  <div class="section-container w-100 d-flex align-items-center gap-4 h-100">
    <div class="nav__categories-btn align-items-center justify-content-center rounded-1 d-none d-lg-flex">
      <button class="border-0 bg-transparent" data-bs-toggle="offcanvas" data-bs-target="#nav__categories">
        <i class="fa-solid fa-align-center fa-rotate-180"></i>
      </button>
    </div>
    <div class="nav__logo">
      <a href="index.php">
        <img class="h-100" src="assets/images/logo.png" alt="">
      </a>
    </div>
    <form action="<?= "shop.php" ?>" method="GET" class="nav__search w-100">
      <input class="nav__search-input w-100" type="search" name="search" id="search" placeholder="أبحث هنا عن اي شئ تريده...">
      <button class="nav__search-icon border-0 bg-transparent text-dark" type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </form>
    <ul class="nav__links gap-3 list-unstyled d-none d-lg-flex m-0">
      <?php if (isset($_SESSION['user'])) { ?>
        <li class="nav__link">
          <a class="d-flex align-items-center gap-2" href="account_details.php">
            <?= $_SESSION['user']->first_name . " " . $_SESSION['user']->last_name  ?>
            <i class="fa-regular fa-user"></i>
          </a>
        </li>
      <?php } else { ?>
        <li class="nav__link">
          <a class="d-flex align-items-center gap-2" href="login.php">
            تسجيل الدخول
            <i class="fa-regular fa-user"></i>
          </a>
        </li>
      <?php } ?>

      <li class="nav__link">
        <a class="d-flex align-items-center gap-2" href="favourites.php">
          المفضلة
          <div class="position-relative">
            <i class="fa-regular fa-heart"></i>
            <div class="nav__link-floating-icon">
              <?php if (isset($wishlistItems) && $wishlistItems->num_rows > 0) {
                echo $wishlistItems->num_rows;
              } else {
                echo 0;
              } ?>

            </div>
          </div>
        </a>
      </li>
      <li class="nav__link">
        <a class="d-flex align-items-center gap-2" data-bs-toggle="offcanvas" data-bs-target="#nav__cart">
          عربة التسوق
          <div class="position-relative">
            <i class="fa-solid fa-cart-shopping"></i>
            <div class="nav__link-floating-icon">
              <?php if (isset($cartItems)) {
                echo $cartItems;
              } else {
                echo 0;
              } ?>
            </div>
          </div>
        </a>
      </li>
    </ul>
  </div>
  <div class="nav-mobile fixed-bottom d-block d-lg-none">
    <ul class="nav-mobile__list d-flex justify-content-around gap-2 list-unstyled  m-0 border-top">
      <li class="nav-mobile__link">
        <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="index.php">
          <i class="fa-solid fa-house"></i>
          الرئيسية
        </a>
      </li>
      <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
        data-bs-target="#nav__categories">
        <i class="fa-solid fa-align-center fa-rotate-180"></i>
        الاقسام
      </li>
      <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
        <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="profile.php">
          <i class="fa-regular fa-user"></i>
          حسابي
        </a>
      </li>
      <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
        <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="favourites.php">
          <i class="fa-regular fa-heart"></i>
          المفضلة
        </a>
      </li>
      <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
        data-bs-target="#nav__cart">
        <i class="fa-solid fa-cart-shopping"></i>
        السلة
      </li>
    </ul>
    <!--  -->
  </div>
</nav>

<div class="nav__categories offcanvas offcanvas-start px-4 py-2" tabindex="-1" id="nav__categories"
  aria-labelledby="nav__categories">
  <div class="nav__categories-header offcanvas-header justify-content-end">
    <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
      aria-label="Close">
      <i class="fa-solid fa-x fa-1x fw-light"></i>
    </button>
  </div>
  <div class="nav__categories-body offcanvas-body pt-0">
    <div class="nav__side-logo mb-2">
      <img class="w-100" src="assets/images/logo.png" alt="">
    </div>
    <ul class="nav__list list-unstyled">
      <li class="nav__link nav__side-link"><a href="shop.php" class="py-3">جميع المنتجات</a></li>
      <li class="nav__link nav__side-link"><a href="shop.php?lang=ar" class="py-3">كتب عربيه</a></li>
      <li class="nav__link nav__side-link"><a href="shop.php?lang=en" class="py-3">كتب انجليزية</a></li>
    </ul>
  </div>
</div>

<div class="nav__cart offcanvas offcanvas-end px-3 py-2" tabindex="-1" id="nav__cart" aria-labelledby="nav__cart">
  <div class="nav__categories-header offcanvas-header align-items-center">
    <h5>سلة التسوق</h5>
    <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
      aria-label="Close">
      <i class="fa-solid fa-x fa-1x fw-light"></i>
    </button>
  </div>
  <div class="nav__categories-body offcanvas-body pt-4">
    <?php if (empty($cart_result)) : ?>
      <p>سلة التسوق فارغة</p>
    <?php elseif (isset($cart_result)) : ?>
      <p>المنتجات في سلة التسوق</p>
      <?php
      $total_price = 0; ?>

      <?php if (isset($cart_result)) {
        foreach ($cart_result as $value) {   ?>
          <div class="cart-products">
            <ul class="nav__list list-unstyled">
              <li class="cart-products__item d-flex justify-content-between gap-2">
                <div class="d-flex gap-2">
                  <div>
                    <a class="cart-products__remove text-danger px-2 text-decoration-none" href="<?= "app/controller/FrontEnd/Book/remove_from_cart.php?id=" . $value['id'] ?>">x</a>
                  </div>
                  <div>
                    <p class="cart-products__name m-0 fw-bolder"><a href="<?= "single-product.php?id=" . $value['book_id'] ?>" class="text-decoration-none text-dark"><?= $value['title'] ?></a></p>
                    <?php if ($value['offer'] > 0) : ?>
                      <span class="cart-products__price product__price--old m-0"><?= "$" . $value['price'] ?></span>
                      <span class="cart-products__price m-0">price : <?= "$" . $price_after_offer = $value['price'] - ($value['price'] * ($value['offer'] / 100)) ?></span>
                    <?php else : ?>
                      <p class="cart-products__price m-0">price : <?= "$" . $price_after_offer = $value['price'] ?></p>
                    <?php endif; ?>
                    <p class="cart-products__price m-0">quantity :<?= $value['quantity'] ?></p>
                    <p class="cart-products__price m-0">total price :<?= "$" . $price = $price_after_offer * $value['quantity'] ?></p>
                  </div>
                </div>
                <div class="cart-products__img">
                  <a href="<?= "../single-product.php?id=" . $value['book_id'] ?>" class="text-decoration-none">
                    <img class="w-100" src="<?= "Public/assets/Images/Books/" . $value['image'] ?>" alt="<?= $value['title'] ?>">
                  </a>
                </div>
              </li>
            </ul>
          </div>
          <?php $total_price += $price; ?>
      <?php  }
      } ?>
      <!-- <?php //endwhile; 
            ?> -->
      <div class="d-flex justify-content-between">
        <p class="fw-bolder">المجموع:</p>
        <p><?= "$" . $total_price ?></p>
      </div>
      <div class="row">
        <a class="nav__cart-btn text-center w-100 py-2 px-3 mb-3 bg-transparent text-decoration-none" href="shop.php">تابع التسوق</a>
        <a class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3 bg-success text-decoration-none" href="checkout.php?total_price=<?= $total_price ?>">اتمام الطلب</a>
        <a class="nav__cart-btn text-center text-white w-100 border-0 py-2 px-3 bg-danger text-decoration-none" href="app/controller/FrontEnd/Book/remove_all_from_cart.php">حذف السلة</a>
      </div>
    <?php endif; ?>
  </div>
</div>
</div>


<!-- News Content Start -->
<section class="sales text-center p-2 d-block d-lg-none">
  شحن مجاني للطلبات 💥 عند الشراء ب 699ج او اكثر
</section>
<!-- News Content End -->
</div>
<!-- Header Content End -->