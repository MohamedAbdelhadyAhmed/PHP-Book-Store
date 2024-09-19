<?php
session_start();
include "layouts/header.php";
include "layouts/nave.php";
include "app/models/Book.php";
$bookObject = new Book();
$books_top_sell = $bookObject->GettopSellingBooks();
$books_offer = $bookObject->GetBooksWithOffer();
$books_new = $bookObject->GetNewBooks();

$wishlist = new Wishlist();
?>

<!-- Page Content Start -->
<main class="pt-4">
  <!-- Hero Section Start -->
  <section class="section-container hero">
    <div class="owl-carousel hero__carousel owl-theme">
      <div class="hero__item">
        <img class="hero__img" src="assets/images/carousel-2.png" alt="">
      </div>
      <div class="hero__item">
        <img class="hero__img" src="assets/images/carousel-2.png" alt="">
      </div>
      <div class="hero__item">
        <img class="hero__img" src="assets/images/carousel-2.png" alt="">
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Offer Section Start -->
  <section class="section-container mb-5 mt-3">
    <div class="offer d-flex align-items-center justify-content-between rounded-3 p-3 text-white">
      <div class="offer__title fw-bolder">
        عروض اليوم
      </div>
      <div class="offer__time d-flex gap-2 fs-6">
        <div class="d-flex flex-column align-items-center">
          <span class="fw-bolder">06</span>
          <div>ساعات</div>
        </div>:
        <div class="d-flex flex-column align-items-center">
          <span class="fw-bolder">10</span>
          <div>دقائق</div>
        </div>:
        <div class="d-flex flex-column align-items-center">
          <span class="fw-bolder">13</span>
          <div>ثواني</div>
        </div>
      </div>
    </div>
  </section>
  <!-- Offer Section End -->

  <!-- Products Section Start -->
  <section class="section-container mb-4">
    <div class="section-title mb-3 d-flex align-items-center justify-content-between">
      <?php while ($book = mysqli_fetch_assoc($books_offer)) : ?>
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="single-product.php?id=<?= $book['id'] ?>">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="<?= "Public/assets/Images/Books/" . $book['image'] ?>" data-id="white">
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
                <a href="<?= "app/controller/FrontEnd/Book/remove_from_favourite.php?id=" . $book['id'] . "&page=index" ?>" class="text-decoration-none text-dark">
                  <i class="fa-solid fa-heart text-danger"></i>
                </a>
              <?php else : ?>
                <a href="<?= "app/controller/FrontEnd/Book/add_to_favourite.php?id=" . $book['id'] . "&page=index" ?>" class="text-decoration-none text-dark">
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
  <!-- Products Section End -->

  <!-- Categories Section Start -->
  <section class="section-container mb-5">
    <div class="categories row gx-4">
      <div class="col-md-6 p-2">
        <div class="p-4 border rounded-3">
          <a href="shop.php?lang=ar">
            <img class="w-100" src="assets/images/category-1.png" alt="">
          </a>
        </div>
      </div>
      <div class="col-md-6 p-2">
        <div class="p-4 border rounded-3">
          <a href="shop.php?lang=en">
            <img class="w-100" src="assets/images/category-2.png" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section End -->

  <!-- Best Sales Section Start -->
  <section class="section-container mb-5">
    <div class="products__header mb-4 d-flex align-items-center justify-content-between">
      <h4 class="m-0">الاكثر مبيعا</h4>
      <button class="products__btn py-2 px-3 rounded-1">
        <a href="shop.php" class="text-decoration-none text-dark">
          تسوق الأن
        </a>
      </button>
    </div>
    <div class="section-title mb-3 d-flex align-items-center justify-content-between">
      <?php while ($book = mysqli_fetch_assoc($books_top_sell)) : ?>
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="single-product.php?id=<?= $book['id'] ?>">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="<?= "Public/assets/Images/Books/" . $book['image'] ?>" data-id="white">
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
                <a href="<?= "app/controller/FrontEnd/Book/remove_from_favourite.php?id=" . $book['id'] . "&page=index" ?>" class="text-decoration-none text-dark">
                  <i class="fa-solid fa-heart text-danger"></i>
                </a>
              <?php else : ?>
                <a href="<?= "app/controller/FrontEnd/Book/add_to_favourite.php?id=" . $book['id'] . "&page=index" ?>" class="text-decoration-none text-dark">
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
  <!-- Best Sales Section End -->

  <!-- Newest Section Start -->
  <section class="section-container mb-5">
    <div class="products__header mb-4 d-flex align-items-center justify-content-between">
      <h4 class="m-0">وصل حديثا</h4>
      <button class="products__btn py-2 px-3 rounded-1">
        <a href="shop.php" class="text-decoration-none text-dark">
          تسوق الأن
        </a>
      </button>
    </div>
    <div class="section-title mb-3 d-flex align-items-center justify-content-between">
      <?php while ($book = mysqli_fetch_assoc($books_new)) : ?>
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="single-product.php?id=<?= $book['id'] ?>">
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover" src="<?= "Public/assets/Images/Books/" . $book['image'] ?>" data-id="white">
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
                <a href="<?= "app/controller/FrontEnd/Book/remove_from_favourite.php?id=" . $book['id'] . "&page=index" ?>" class="text-decoration-none text-dark">
                  <i class="fa-solid fa-heart text-danger"></i>
                </a>
              <?php else : ?>
                <a href="<?= "app/controller/FrontEnd/Book/add_to_favourite.php?id=" . $book['id'] . "&page=index" ?>" class="text-decoration-none text-dark">
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
  <!-- Newest Section End -->
</main>
<!-- Page Content End -->
<?php include "layouts/footer.php" ?>