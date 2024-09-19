<?php
session_start();
include "layouts/header.php";
include "layouts/nave.php";
include "app/models/Book.php";
$bookObject = new Book();
if (isset($_GET['lang'])) {
  $lang = $_GET['lang'];
  $books = $bookObject->GetBooksByLang($lang);
} elseif (isset($_GET['search'])) {
  $search = $_GET['search'];
  $books = $bookObject->GetBooksBySearch($search);
  if ($books->num_rows <= 0) { ?>
    <script>
      alert("لا يوجد نتائج");
    </script>
<?php $books = $bookObject->GetBooks();
  }
} else {
  $books = $bookObject->GetBooks();
}
$wishlist = new Wishlist();
?>
<main>
  <div
    class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>المتجر</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray text-decoration-none" href="index.php">الرئيسية</a> /
        <span class="text-gray">المتجر</span>
      </div>
    </div>
  </div>

  <div class="section-container d-block d-lg-flex gap-5 shop mt-5 pt-5">
    <div class="shop__products col-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <form action="<?= "shop.php" ?>" method="GET">
            <div class="filter__search position-relative">
              <input
                class="w-100 py-1 ps-2"
                type="text"
                name="search"
                id="search"
                placeholder="بتدور علي ايه؟" />
              <div
                class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center">
                <button class="border-0 bg-transparent mt-1" type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="d-flex gap-3">
          <a class="fs-5 text-decoration-none h3 text-dark" href="shop.php?lang=ar">Arabic</a>
          <a class="fs-5 text-decoration-none h3 text-dark" href="shop.php?lang=en">English</a>
          <a class="fs-5 text-decoration-none h3 active text-dark" href="shop.php">All</a>
        </div>
      </div>
      <div class="row products__list">
        <?php while ($book = mysqli_fetch_assoc($books)) : ?>
          <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
            <div class="product__header mb-3">
              <a href="single-product.php?id=<?= $book['id'] ?>">
                <div class="product__img-cont">
                  <img
                    class="product__img w-100 h-100 object-fit-cover"
                    src="<?= "Public/assets/Images/Books/" . $book['image'] ?>"
                    data-id="white"
                    alt="<?= $book['title'] ?>" />
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
                  <a href="<?= "app/controller/FrontEnd/Book/remove_from_favourite.php?id=" . $book['id'] ?>" class="text-decoration-none text-dark">
                    <i class="fa-solid fa-heart text-danger"></i>
                  </a>
                <?php else : ?>
                  <a href="<?= "app/controller/FrontEnd/Book/add_to_favourite.php?id=" . $book['id'] ?>" class="text-decoration-none text-dark">
                    <i class="fa-regular fa-heart text-dark"></i>
                  </a>
                <?php endif; ?>
              </div>
            </div>
            <br>
            <div class="product__title text-center">
              <a
                class="text-black text-decoration-none"
                href="single-product.php?id=<?= $book['id'] ?>">
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
      <!-- <div
        class="products__pagination mb-5 d-flex justify-content-center gap-2">
        <span class="pagination__btn rounded-1 pagination__btn--next"><i class="fa-solid fa-arrow-right-long"></i></span>
        <span class="pagination__btn rounded-1 active">1</span>
        <span class="pagination__btn rounded-1">2</span>
        <span class="pagination__btn rounded-1">3</span>
        <span class="pagination__btn rounded-1">4</span>
        <span class="pagination__btn rounded-1 pagination__btn--prev"><i class="fa-solid fa-arrow-left-long"></i></span>
      </div> -->
    </div>
  </div>
</main>

<?php require_once "layouts/footer.php"; ?>