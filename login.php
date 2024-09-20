<?php
session_start();
include "app/middleware/guest_user.php";
include "layouts/header.php";
include "layouts/nave.php";
 

?>

<main>
  <div class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>تسجيل الدخول</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray" href="index.html">الرئيسية</a> /
        <span class="text-gray">تسجيل الدخول</span>
      </div>
    </div>
  </div>

  <div class="page-full pb-5">
    <div class="account account--login mt-5 pt-5">
      <div class="account__login w-100">
        <form class="mb-5" action="./app/controller/FrontEnd/Auth/login.php" method="POST">
          <?php
          if (isset($_SESSION['login_user']['email'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['login_user']['email'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input type="text" name="email" class="form-control p-3" placeholder="البريد الالكتروني" aria-label="Email" />
            <span class="input-group-text login__input-icon"><i class="fa-solid fa-envelope"></i></span>
          </div>

          <?php
          if (isset($_SESSION['login_user']['password'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['login_user']['password'] . "</div>";
          }
          ?>
          
          <div class="input-group rounded-1 mb-3">
            <input type="password" name="password" class="form-control p-3" placeholder="كلمة السر" aria-label="Password" />
            <span class="input-group-text login__input-icon"><i class="fa-solid fa-key"></i></span>
          </div>

          <div class="login__bottom d-flex justify-content-between mb-3">
            <a href="register.php">تسجيل حساب جديد</a>
            <!-- <a class="login__forget-btn" href="">نسيت كلمة المرور؟</a> -->
            <div><input type="checkbox" /><label for="">تذكرني</label></div>
          </div>

          <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">تسجيل الدخول</button>
        </form>
      </div>
    </div>
  </div>
</main>

<?php
unset($_SESSION['login_user']);
include "layouts/footer.php";
?>