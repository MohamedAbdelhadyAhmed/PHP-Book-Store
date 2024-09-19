<?php
session_start();
include "layouts/header.php";
include "layouts/nave.php";
include "app/models/Book.php";
$bookObject = new Book();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $book = $bookObject->GetBookById($id);
  $books_offer = $bookObject->GetBooksWithOffer();
  $books_related = $bookObject->GetBooksbyCategory($book['category_id']);
} else {
  header("location:index.php");
}
$wishlist = new Wishlist();
$book_in_wishlist = $wishlist->checkWishlistbyBookId($_GET['id'], ($_SESSION['user_id'] ?? 1));
?>
<main>
  <!-- Product details Start -->
  <section class="section-container my-5 pt-5 d-md-flex gap-5">
    <div class="single-product__details w-100 d-flex flex-column justify-content-between text-end">
      <div>
        <h4><?= $book['title'] ?></h4>
        <div class="product__author mb-3 h5 text-dark">By: <?= $book['author_name'] ?></div>
        <div class="product__author mb-3 h5 text-dark">Category: <?= $book['category_name'] ?></div>
        <div class="product__author mb-3 h5 text-dark">Language: <?= $book['lang'] ?></div>
        <div class="product__author mb-3 h5 text-dark">Publisher: <?= $book['publisher_name'] ?></div>
        <div class="product__author mb-3 h5 text-dark">Pages: <?= $book['number_of_pages'] ?></div>
        <div class="product__price mb-3 text-center d-flex gap-2 justify-content-end">
          <?php if ($book['offer'] > 0) : ?>
            <span class="product__price product__price--old fs-6">
              <?= '$' . $book['price'] ?>
            </span>
            <span class="product__price fs-5">
              <?= '$' . ($book['price'] - ($book['price'] * ($book['offer'] / 100))) ?>
            </span>
          <?php else : ?>
            <span class="product__price fs-5">
              <?= '$' . $book['price'] ?>
            </span>
          <?php endif; ?>
          <p class="fs-5 mb-0">: Prise</p>
        </div>
        <form action="app/controller/FrontEnd/Book/add_to_cart.php" method="POST">
          <input type="hidden" name="book-id" value="<?= $book['id'] ?>">
          <input type="hidden" name="page" value="single-product">
          <div class="row">
            <div class="d-flex justify-content-end mb-3">
              <input type="number" name="quantity" id="quantity" value="1" class="form-control w-25" min="1" step="1" required>
              <label for="quantity" class="col-form-label text-end h5 ms-3"> : Quantity </label>
            </div>
          </div>
          <div class=" row">
            <div class="card-footer d-flex justify-content-between bg-light border">
              <button type="submit" class="single-product__add-to-cart primary-button w-100">
                <i class="fas fa-cart-plus"></i>
                Add To Cart
              </button>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="card-footer d-flex justify-content-between bg-light border mt-3">
            <?php if ($book_in_wishlist->num_rows > 0) : ?>
              <a href="<?= "app/controller/FrontEnd/Book/remove_from_favourite.php?id=" . $book['id'] ?>" class="single-product__add-to-favourite primary-button w-100 text-decoration-none text-center">
                <i class="fa-solid fa-heart text-danger"></i>
                حذف من المفضلة
              </a>
            <?php else : ?>
              <a href="<?= "app/controller/FrontEnd/Book/add_to_favourite.php?id=" . $book['id'] ?>" class="single-product__add-to-favourite primary-button w-100 text-decoration-none text-center">
                <i class="fa-regular fa-heart"></i>
                اضافة للمفضلة
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="single-product__categories">
        <p class="mb-0">رمز المنتج: <?= $book['code'] ?></p>
      </div>
    </div>
    <div class="single-product__img w-100" id="main-img">
      <img src="<?= "Public/assets/Images/Books/" . $book['image'] ?>" alt="<?= $book['title'] ?>">
    </div>
  </section>
  <!-- Product details End -->

  <!-- Description and questions Start -->
  <section class="section-container">
    <nav class="mb-0">
      <div class="nav nav-tabs single-product__nav pb-0 gap-2" id="nav-tab" role="tablist">
        <button class="single-product__tab nav-link active" id="single-product__describtion-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
          الوصف
        </button>
        <button class="single-product__tab nav-link" id="single-product__questions-tab" data-bs-toggle="tab" data-bs-target="#single-product__questions" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
          الاسئلة الشائعة
        </button>
      </div>
    </nav>
    <div class="tab-content pt-4 " id="nav-tabContent">
      <div class="tab-pane show active text-end" id="nav-description" role="tabpanel" aria-labelledby="single-product__describtion-tab" tabindex="0">
        <?= $book['description'] ?>
      </div>
      <div class="questions tab-pane" id="single-product__questions" role="tabpanel" aria-labelledby="single-product__questions-tab" tabindex="0">
        <div class="questions__list accordion" id="question__list">
          <div class="questions__item accordion-item">
            <h2 class="questions__header accordion-header" id="question1">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                الشحن بيوصل خلال قد ايه؟
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="question1" data-bs-parent="#question__list">
              <div class="accordion-body">
                خلال 3 ايام داخل القاهرة والجيزة و7 ايام خارج القاهرة والجيزة.
              </div>
            </div>
          </div>
          <div class="questions__item accordion-item">
            <h2 class="questions__header accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                خامات التصنيع؟
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#question__list">
              <div class="accordion-body">
                خامات مصرية عالية الجودة.
              </div>
            </div>
          </div>
          <div class="questions__item accordion-item">
            <h2 class="questions__header accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                متاح استبدال او استرجاع المنتج
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#question__list">
              <div class="accordion-body">
                نعم، متاح الاستبدال والاسترجاع خلال 7 ايام، برجاء مراجعة <a class="text-danger" href="refund-policy.php">سياسة الاسترجاع والاستبدال</a>.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Description and questions End -->

  <!-- Features Start -->
  <section class="section-container py-5">
    <div class="row">
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="features__item d-flex align-items-center gap-2">
          <div class="features__img">
            <img class="w-100" src="assets/images/feature-1.png" alt="">
          </div>
          <div>
            <h6 class="features__item-title m-0">شحن سريع</h6>
            <p class="features__item-text m-0">سعر شحن موحد لجميع المحافظات ويصلك في أقل من 72 ساعة</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="features__item d-flex align-items-center gap-2">
          <div class="features__img">
            <img class="w-100" src="assets/images/feature-2.png" alt="">
          </div>
          <div>
            <h6 class="features__item-title m-0">ضمان الجودة</h6>
            <p class="features__item-text m-0">خامات عالية الجودة ومرونه فى طلبات الاستبدال والاسترجاع</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="features__item d-flex align-items-center gap-2">
          <div class="features__img">
            <img class="w-100" src="assets/images/feature-3.png" alt="">
          </div>
          <div>
            <h6 class="features__item-title m-0">دعم فني</h6>
            <p class="features__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="features__item d-flex align-items-center gap-2">
          <div class="features__img">
            <img class="w-100" src="assets/images/feature-4.png" alt="">
          </div>
          <div>
            <h6 class="features__item-title m-0">استبدال سهل</h6>
            <p class="features__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Features End -->

  <!-- May love Start -->
  <section class="section-container mb-4">
    <div class="d-flex gap-4 align-items-center w-100 mb-4">
      <h5 class="m-0">قد يعجبك ايضا...</h5>
      <hr class="flex-grow-1">
    </div>
    <div class="section-title mb-3 d-flex align-items-center justify-content-between">
      <?php while ($book = mysqli_fetch_assoc($books_offer)) : ?>
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="single-product.php?id=<?= $book['id'] ?>">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="<?= "Public/assets/Images/Books/" . $book['image'] ?>" data-id="white" alt="<?= $book['title'] ?>">
              </div>
            </a>
          </div>
          <div class="position-relative mb-3 product__overlay d-flex justify-content-center">
            <?php if ($book['offer'] > 0) : ?>
              <div
                class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                <?= $book['offer'] . "%" ?>
              </div>
            <?php endif; ?>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <?php $book_in_wishlist = $wishlist->checkWishlistbyBookId($book['id'], ($_SESSION['user_id'] ?? 1)); ?>
              <?php if ($book_in_wishlist->num_rows > 0) : ?>
                <a href="<?= "app/controller/FrontEnd/Book/remove_from_favourite.php?id=" . $book['id']  ?>" class="text-decoration-none text-dark">
                  <i class="fa-solid fa-heart text-danger"></i>
                </a>
              <?php else : ?>
                <a href="<?= "app/controller/FrontEnd/Book/add_to_favourite.php?id=" . $book['id']  ?>" class="text-decoration-none text-dark">
                  <i class="fa-regular fa-heart"></i>
                </a>
              <?php endif; ?>
            </div>
          </div>
          <br>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.php?id=<?= $book['id'] ?>">
              <?= $book['title'] ?>
            </a>
          </div>
          <div class="product__author text-center">
            <?= $book['author_name'] ?>
          </div>
          <div class="product__author text-center">
            <?= $book['category_name'] ?>
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <?php if ($book['offer'] > 0) : ?>
              <span class="product__price product__price--old">
                <?= '$' . $book['price'] ?>
              </span>
              <span class="product__price">
                <?= '$' . ($book['price'] - ($book['price'] * ($book['offer'] / 100))) ?>
              </span>
            <?php else : ?>
              <span class="product__price">
                <?= '$' . $book['price'] ?>
              </span>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
  <!-- May love End -->

  <!-- Related products Start -->
  <section class="section-container">
    <div class="d-flex gap-4 align-items-center w-100 mb-4">
      <h5 class="m-0">منتجات ذات صلة</h5>
      <hr class="flex-grow-1">
    </div>
    <div class="row">
      <?php while ($book = mysqli_fetch_assoc($books_related)) : ?>
        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
          <div class="product__header mb-3">
            <a href="single-product.php?id=<?= $book['id'] ?>">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="<?= "Public/assets/Images/Books/" . $book['image'] ?>" data-id="white" alt="<?= $book['title'] ?>">
              </div>
            </a>
          </div>
          <div class="position-relative mb-3 product__overlay d-flex justify-content-center">
            <?php if ($book['offer'] > 0) : ?>
              <div
                class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                <?= $book['offer'] . "%" ?>
              </div>
            <?php endif; ?>
            <div
              class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <?php $book_in_wishlist = $wishlist->checkWishlistbyBookId($book['id'], ($_SESSION['user_id'] ?? 1)); ?>
              <?php if ($book_in_wishlist->num_rows > 0) : ?>
                <a href="<?= "app/controller/FrontEnd/Book/remove_from_favourite.php?id=" . $book['id']  ?>" class="text-decoration-none text-dark">
                  <i class="fa-solid fa-heart text-danger"></i>
                </a>
              <?php else : ?>
                <a href="<?= "app/controller/FrontEnd/Book/add_to_favourite.php?id=" . $book['id']  ?>" class="text-decoration-none text-dark">
                  <i class="fa-regular fa-heart"></i>
                </a>
              <?php endif; ?>
            </div>
          </div>
          <br>
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="single-product.php?id=<?= $book['id'] ?>">
              <?= $book['title'] ?>
            </a>
          </div>
          <div class="product__author text-center">
            <?= $book['author_name'] ?>
          </div>
          <div class="product__author text-center">
            <?= $book['category_name'] ?>
          </div>
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            <?php if ($book['offer'] > 0) : ?>
              <span class="product__price product__price--old">
                <?= '$' . $book['price'] ?>
              </span>
              <span class="product__price">
                <?= '$' . ($book['price'] - ($book['price'] * ($book['offer'] / 100))) ?>
              </span>
            <?php else : ?>
              <span class="product__price">
                <?= '$' . $book['price'] ?>
              </span>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
  <!-- Related products End -->

  <!-- Users comments Start -->
  <section class="section-container comments mb-5">
    <div class="d-flex gap-4 align-items-center w-100 mb-4">
      <h5 class="m-0">أعرف اراء عملاؤنا</h5>
      <hr class="flex-grow-1">
    </div>
    <div class="comments__slider owl-carousel owl-theme">
      <div class="comments__item">
        <div class="comments__icon">
          <img class="w-100" src="assets/images/quote.png" alt="">
        </div>
        <div class="comments__text mb-3">
          الكتاب جميل جدا
        </div>
        <div class="comments__author d-flex align-items-center gap-2">
          <div class="comments__author-dash"></div>
          <div class="comments__author-name fw-bolder">
            Moamen Sherif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Users comments End -->
</main>

<?php include "layouts/footer.php" ?>