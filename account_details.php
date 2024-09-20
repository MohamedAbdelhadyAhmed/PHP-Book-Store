<?php
session_start();
include "app/middleware/auth_user.php";
$title = "حسابي - " . $_SESSION['user']->first_name . " " . $_SESSION['user']->last_name;
include "layouts/header.php";
include "layouts/nave.php";

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

  <section
    class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
    <div class="profile__right">
      <div class="profile__user mb-3 d-flex gap-3 align-items-center">
        <div class="profile__user-img rounded-circle overflow-hidden">
          <img class="w-100" src="assets/images/user.png" alt="" />
        </div>
        <div class="profile__user-name"><?= $_SESSION['user']->first_name . " " . $_SESSION['user']->last_name  ?></div>
      </div>
      <ul class="profile__tabs list-unstyled ps-3">
        <li class="profile__tab active">
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
        <li class="profile__tab">
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
      <div class="profile__tab-content active">
        <form class="profile__form border p-3" action="./app/controller/FrontEnd/Auth/profile.php" method="POST">
          <?php
          if (isset($_SESSION['user_profile_updated'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['user_profile_updated'] . "</div>";
          }
          ?>
          <div class="d-flex gap-3 mb-3">
            <div class="w-100">
              <label class="fw-bold mb-2" for="first-name">
                الاسم الاول <span class="required">*</span>
              </label>
              <input type="text" name="first_name" class="form__input" id="first-name"
                value="<?= $_SESSION['user']->first_name ?>" required />
            </div>
            <div class="w-100">
              <label class="fw-bold mb-2" for="last-name">
                الاسم الأخير <span class="required">*</span>
              </label>
              <input type="text" name="last_name" class="form__input" id="last-name"
                value="<?= $_SESSION['user']->last_name ?>" required />
            </div>
          </div>
          <?php
          if (isset($_SESSION['errors']['phone'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['errors']['phone'] . "</div>";
          }
          ?>
          <div class="w-100">
            <label class="fw-bold mb-2" for="displayed-name">
              رقم الهاتف <span class="required">*</span>
            </label>
            <input type="text" name="phone" class="form__input" id="displayed-name"
              value="<?= $_SESSION['user']->phone ?>" required />
          </div>
          <?php
          if (isset($_SESSION['errors']['email'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['errors']['email'] . "</div>";
          }
          ?>
          <div class="w-100 mb-3">
            <label class="fw-bold mb-2" for="email">
              البريد الالكتروني<span class="required">*</span>
            </label>
            <input type="text" name="email" class="form__input" id="email"
              value="<?= $_SESSION['user']->email ?>" required />
          </div>
          <button class="primary-button" type="submit">تعديل</button>
        </form>

        <form class="mb-5" action="./app/controller/FrontEnd/Auth/change_password.php" method="POST">
          <?php
          if (isset($_SESSION['user_password_updated'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['user_password_updated'] . "</div>";
          }
          ?>
          <fieldset>
            <legend class="fw-bolder">تغيير كلمة المرور</legend>
            <div class="w-100 mb-3">
              <label class="fw-bold mb-2" for="curr-password">
                كلمة المرور الحالية (اترك الحقل فارغاً إذا كنت لا تودّ
                تغييرها)
              </label>
              <input type="password" name="password" class="form__input" id="curr-password" />
              <?php
              if (isset($_SESSION['password_user']['password'])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['password_user']['password'] . "</div>";
              }
              ?>
            </div>
            <div class="w-100 mb-3">
              <label class="fw-bold mb-2" for="curr-password">
                كلمة المرور الجديدة (اترك الحقل فارغاً إذا كنت لا تودّ
                تغييرها)
              </label>
              <input type="password" name="new_password" class="form__input" id="curr-password" />
              <?php
              if (isset($_SESSION['password_user']['new_password'])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['password_user']['new_password'] . "</div>";
              }
              ?>
            </div>
            <div class="w-100 mb-3">
              <label class="fw-bold mb-2" for="curr-password">
                تأكيد كلمة المرور الجديدة
              </label>
              <input type="password" name="password_confirmation" class="form__input" id="curr-password" />
              <?php
              if (isset($_SESSION['password_user']['password_confirmation'])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['password_user']['password_confirmation'] . "</div>";
              }
              ?>
            </div>
            <button class="primary-button">تغيير كلمة المرور</button>
          </fieldset>
        </form>
      </div>
    </div>
  </section>
</main>
<?php
unset($_SESSION['user_profile_updated']);
unset($_SESSION['errors']['phone']);
unset($_SESSION['errors']['email']);
unset($_SESSION['user_password_updated']);
unset($_SESSION['password_user']);
include "layouts/footer.php" ?>