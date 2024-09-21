<?php
session_start();
include "app/middleware/guest_user.php";
$title = "حساب جديد";
include "layouts/header.php";
include "layouts/nave.php";


?>

<main>
  <div class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>حساب جديد</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-primary text-decoration-none" href="index.html">الرئيسية</a> /
        <span class="text-gray">حساب جديد</span>
      </div>
    </div>
  </div>
  <?php
        if (isset(  $_SESSION['email_unique']['email'])) {
          echo "<div class='alert alert-danger'>" .   $_SESSION['email_unique']['email'] . "</div>";
        }
        if (isset($_SESSION['email_unique']['phone']) ){
          echo "<div class='alert alert-danger'>" .   $_SESSION['email_unique']['phone'] . "</div>";
        }
        ?>


  <div class="page-full pb-5">
    <div class="account account--register mt-5 pt-5">
      <div class="account__register w-100">
        <form class="mb-5" action="./app/controller/FrontEnd/Auth/register.php" method="POST">

          <?php
          if (isset($_SESSION['create_user']['firstname'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['firstname'] . "</div>";
          }
          ?>

          <div class="input-group rounded-1 mb-3">
            <input type="text" name="firstname" class="form-control p-3" placeholder="الاسم الاول" aria-label="firstname" />
            <span class="input-group-text login__input-icon"><i class="fa-solid fa-user"></i></span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['lastname'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['lastname'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input type="text" name="lastname" class="form-control p-3" placeholder="الاسم الثاني" aria-label="lastname" />
            <span class="input-group-text login__input-icon"><i class="fa-solid fa-user"></i></span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['email'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['email'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input type="text" name="email" class="form-control p-3" placeholder="البريد الالكتروني" aria-label="Email" />
            <span class="input-group-text login__input-icon"><i class="fa-solid fa-envelope"></i></span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['phone'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['phone'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input type="text" name="phone" class="form-control p-3" placeholder="رقم الهاتف" aria-label="phone" />
            <span class="input-group-text login__input-icon"><i class="fa-solid fa-user"></i></span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['password'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['password'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input type="password" name="password" class="form-control p-3" placeholder="كلمة السر" aria-label="Password" />
            <span class="input-group-text login__input-icon"><i class="fa-solid fa-key"></i></span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['password_confirmation'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['password_confirmation'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input type="password" name="password_confirmation" class="form-control p-3" placeholder="تاكيد كلمة السر" aria-label="Password" />
            <span class="input-group-text login__input-icon"><i class="fa-solid fa-key"></i></span>
          </div>
          <p><a href="login.php">If you have an acounnt</a> </p>
          <!-- <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">حساب جديد</button> -->
          <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">حساب جديد</button>
          <?php //echo $_SESSION['user']['success'] ?? " " 
          ?>

        </form>

      </div>

    </div>
  </div>
</main>

<?php
unset($_SESSION['create_user']);
unset($_SESSION['email_unique']);
include "layouts/footer.php";
?>