<?php
session_start();
include "app/middleware/auth_user.php";
include "layouts/header.php";
 include "layouts/nave.php";
include "app/models/Book.php";


if (isset($_SESSION['user'])) {
  // print_r($_SESSION['user']);die;

  $wishlistItems = $wishlist->getWishlist($_SESSION['user']->id);
}

?>

<main>
  <div
    class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>المفضلة</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray" href="index.php">الرئيسية</a> /
        <span class="text-gray">المفضلة</span>
      </div>
    </div>
  </div>

  <div class="my-5 py-5">
    <section class="section-container favourites">
      <?php if (mysqli_num_rows($wishlistItems) > 0) : ?>
        <table class="w-100">
          <thead>
            <th class="d-none d-md-table-cell"></th>
            <th class="d-none d-md-table-cell"></th>
            <th class="d-none d-md-table-cell">الاسم</th>
            <th class="d-none d-md-table-cell">السعر</th>
            <th class="d-none d-md-table-cell">تاريخ الاضافه</th>
            <th class="d-none d-md-table-cell">Add To Cart</th>
          </thead>
          <tbody class="text-center">
            <?php while ($wishlist_item = mysqli_fetch_assoc($wishlistItems)) : ?>
              <tr class="favourites__item">
                <td class="d-block d-md-table-cell">
                  <a href="<?= "app/controller/FrontEnd/Book/remove_from_favourite.php?id=" . $wishlist_item['book_id'] ?>" class="favourites__link text-decoration-none">
                    <span class="favourites__remove m-auto">
                      <i class="fa-solid fa-xmark text-danger"></i>
                    </span>
                  </a>
                </td>
                <td class="d-block d-md-table-cell favourites__img">
                  <img src="<?= "Public/assets/Images/Books/" . $wishlist_item['image'] ?>" alt="<?= $wishlist_item['title'] ?>" />
                </td>
                <td class="d-block d-md-table-cell">
                  <a href="<?= "single-product.php?id=" . $wishlist_item['book_id'] ?>" class="text-decoration-none"> <?= $wishlist_item['title'] ?> </a>
                </td>
                <td class="d-block d-md-table-cell">
                  <?php if ($wishlist_item['offer'] > 0) : ?>
                    <span class="product__price product__price--old"><?= "$" . $wishlist_item['price'] ?></span>
                    <span class="product__price"><?= "$" . $wishlist_item['price'] - ($wishlist_item['price'] * ($wishlist_item['offer'] / 100)) ?></span>
                  <?php else : ?>
                    <span class="product__price"><?= "$" . $wishlist_item['price'] ?></span>
                  <?php endif ?>
                </td>
                <td class="d-block d-md-table-cell"><?= $wishlist_item['created_at'] ?></td>
                <td class="d-block d-md-table-cell">
                  <a href="app/controller/FrontEnd/Book/add_to_cart.php?id=<?= $wishlist_item['book_id'] ?>&page=favourites" class="text-decoration-none">
                    <i class="fas fa-cart-plus fa-2x"></i>
                  </a>
                </td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
        <div class="row w-100 mt-5 ms-auto me-auto">
          <a class="nav__cart-btn text-center w-100 py-2 px-3 mb-3 bg-transparent text-decoration-none" href="shop.php">تابع التسوق</a>
          <a class="nav__cart-btn text-center text-white w-100 border-0 py-2 px-3 bg-danger text-decoration-none" href="app/controller/FrontEnd/Book/remove_all_from_favourite.php">حذف جميع المنتجات من المفضلة</a>
        </div>
      <?php else : ?>
        <div class="text-center">
          <h4>لا يوجد منتجات في المفضلة</h4>
        </div>
      <?php endif ?>
    </section>
  </div>
</main>
<?php include "layouts/footer.php" ?>