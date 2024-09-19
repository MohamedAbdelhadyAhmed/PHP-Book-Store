<?php
require_once "app/models/Cart.php";
require_once "app/models/Wishlist.php";
$cart = new Cart();
$cartItems = $cart->getCartItems($_SESSION['user']['id'] ?? 1);

$wishlist = new Wishlist();
$wishlistItems = $wishlist->getWishlist($_SESSION['user']['id'] ?? 1);
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
      <!-- <li class="nav__link nav__link-user">
              <a class="d-flex align-items-center gap-2">
                حسابي
                <i class="fa-regular fa-user"></i>
                <i class="fa-solid fa-chevron-down fa-2xs"></i>
              </a>
              <ul class="nav__user-list position-absolute p-0 list-unstyled bg-white">
                <li class="nav__link nav__user-link"><a href="profile.php">لوحة التحكم</a></li>
                <li class="nav__link nav__user-link"><a href="orders.php">الطلبات</a></li>
                <li class="nav__link nav__user-link"><a href="account_details.php">تفاصيل الحساب</a></li>
                <li class="nav__link nav__user-link"><a href="favourites.php">المفضلة</a></li>
                <li class="nav__link nav__user-link"><a href="">تسجيل الخروج</a></li>
              </ul>
            </li> -->
      <li class="nav__link">
        <a class="d-flex align-items-center gap-2" href="account.php">
          تسجيل الدخول
          <i class="fa-regular fa-user"></i>
        </a>
      </li>
      <li class="nav__link">
        <a class="d-flex align-items-center gap-2" href="favourites.php">
          المفضلة
          <div class="position-relative">
            <i class="fa-regular fa-heart"></i>
            <div class="nav__link-floating-icon">
              <?= $wishlistItems->num_rows; ?>
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
              <?= $cartItems->num_rows; ?>
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
    <?php if ($cartItems->num_rows == 0) : ?>
      <p>سلة التسوق فارغة</p>
    <?php else : ?>
      <p>المنتجات في سلة التسوق</p>
      <?php $total_price = 0; ?>
      <?php while ($cart_item = mysqli_fetch_assoc($cartItems)) : ?>
        <div class="cart-products">
          <ul class="nav__list list-unstyled">
            <li class="cart-products__item d-flex justify-content-between gap-2">
              <div class="d-flex gap-2">
                <div>
                  <a class="cart-products__remove text-danger px-2 text-decoration-none" href="<?= "app/controller/FrontEnd/Book/remove_from_cart.php?id=" . $cart_item['id'] ?>">x</a>
                </div>
                <div>
                  <p class="cart-products__name m-0 fw-bolder"><a href="<?= "../single-product.php?id=" . $cart_item['book_id'] ?>" class="text-decoration-none text-dark"><?= $cart_item['title'] ?></a></p>
                  <?php if ($cart_item['offer'] > 0) : ?>
                    <span class="cart-products__price product__price--old m-0"><?= "$" . $cart_item['price'] ?></span>
                    <span class="cart-products__price m-0">price : <?= "$" . $price_after_offer = $cart_item['price'] - ($cart_item['price'] * ($cart_item['offer'] / 100)) ?></span>
                  <?php else : ?>
                    <p class="cart-products__price m-0">price : <?= "$" . $price_after_offer = $cart_item['price'] ?></p>
                  <?php endif; ?>
                  <p class="cart-products__price m-0">quantity :<?= $cart_item['quantity'] ?></p>
                  <p class="cart-products__price m-0">total price :<?= "$" . $price = $price_after_offer * $cart_item['quantity'] ?></p>
                </div>
              </div>
              <div class="cart-products__img">
                <a href="<?= "../single-product.php?id=" . $cart_item['book_id'] ?>" class="text-decoration-none">
                  <img class="w-100" src="<?= "Public/assets/Images/Books/" . $cart_item['image'] ?>" alt="<?= $cart_item['title'] ?>">
                </a>
              </div>
            </li>
          </ul>
        </div>
        <?php $total_price += $price; ?>
      <?php endwhile; ?>
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