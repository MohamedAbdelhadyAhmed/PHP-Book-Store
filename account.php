<?php
session_start();
$title = "login";
// include "app/middleware/auth.php";
include "layouts/header.php";
include "layouts/nave.php"; ?>


<main>
  <div
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
  </div>

  <div class="page-full pb-5">
    <div class="account account--login mt-5 pt-5">
      <div class="account__tabs w-100 d-flex mb-3">
        <div
          class="account__tab account__tab--login text-center fs-6 py-3 w-50">
          تسجيل الدخول
        </div>
        <div
          class="account__tab account__tab--register text-center fs-6 py-3 w-50">
          حساب جديد
        </div>
      </div>
      <?php
      if (isset($_SESSION["user_added"])) {
        echo "<div class='alert alert-danger'>" .  $_SESSION["user_added"] . "</div>";
      }
      if (isset($_SESSION['email_unique'])) {
        foreach ($_SESSION['email_unique']  as $key => $value) { ?>
          <div class='alert alert-danger'> <?php echo $_SESSION['email_unique']["$key"] ?> </div>

      <?php   }
      }
      ?>
      <!-- login -->
      <div class="account__login w-100">
        <form class="mb-5" action="./app/controller/FrontEnd/Auth/login.php" method="POST">
          <?php
          if (isset($_SESSION['login_user']['email'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['login_user']['email'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input
              type="text"
              name="email"
              class="form-control p-3"
              placeholder="البريد الالكتروني"
              aria-label="Email"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-envelope"></i>
            </span>
          </div>

          <?php
          if (isset($_SESSION['login_user']['password'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['login_user']['password'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input
              type="password"
              name="password"
              class="form-control p-3"
              placeholder="كلمة السر"
              aria-label="Password"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-key"></i>
            </span>
          </div>

          <div class="login__bottom d-flex justify-content-between mb-3">
            <a class="login__forget-btn" href="">نسيت كلمة المرور؟</a>
            <div>
              <input type="checkbox" />
              <label for="">تذكرني</label>
            </div>
          </div>

          <button
            class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
            تسجيل الدخول
          </button>
        </form>
      </div>

      <!-- register -->
      <div class="account__register w-100">
        <form class="mb-5" action="./app/controller/FrontEnd/Auth/register.php" method="POST">

          <?php
          if (isset($_SESSION['create_user']['firstname'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['firstname'] . "</div>";
          }
          ?>

          <!-- firstname -->
          <div class="input-group rounded-1 mb-3">
            <input
              type="text"
              name="firstname"
              class="form-control p-3"
              placeholder="الاسم الاول"
              aria-label="firstname"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-user"></i>
            </span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['lastname'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['lastname'] . "</div>";
          }
          ?>
          <div class="input-group rounded-1 mb-3">
            <input
              type="text"
              name="lastname"
              class="form-control p-3"
              placeholder="الاسم الثاني"
              aria-label="lastname"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-user"></i>
            </span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['email'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['email'] . "</div>";
          }
          ?>

          <!-- email -->
          <div class="input-group rounded-1 mb-3">
            <input
              type="text"
              name="email"
              class="form-control p-3"
              placeholder="البريد الالكتروني"
              aria-label="Email"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-envelope"></i>
            </span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['phone'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['phone'] . "</div>";
          }
          ?>

          <!-- phone -->
          <div class="input-group rounded-1 mb-3">
            <input
              type="text"
              name="phone"
              class="form-control p-3"
              placeholder="رقم الهاتف"
              aria-label="phone"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-user"></i>
            </span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['password'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['password'] . "</div>";
          }
          ?>

          <!-- password -->
          <div class="input-group rounded-1 mb-3">
            <input
              type="password"
              name="password"
              class="form-control p-3"
              placeholder="كلمة السر"
              aria-label="Password"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-key"></i>
            </span>
          </div>

          <?php
          if (isset($_SESSION['create_user']['password_confirmation'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['create_user']['password_confirmation'] . "</div>";
          }
          ?>

          <div class="input-group rounded-1 mb-3">
            <input
              type="password"
              name="password_confirmation"
              class="form-control p-3"
              placeholder=" تاكيد كلمة السر"
              aria-label="Password"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-key"></i>
            </span>
          </div>

          <button
            class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
            حساب جديد
          </button>
          <?php echo $_SESSION['user']['success'] ?? " " ?>

        </form>
      </div>


      <div class="account__forget">
        <p>
          فقدت كلمة المرور الخاصة بك؟ الرجاء إدخال عنوان البريد الإلكتروني
          الخاص بك. ستتلقى رابطا لإنشاء كلمة مرور جديدة عبر البريد
          الإلكتروني.
        </p>
        <form action="">
          <div class="input-group rounded-1 mb-3">
            <input
              type="text"
              class="form-control p-3"
              placeholder="البريد الالكتروني"
              aria-label="Username"
              aria-describedby="basic-addon1" />
            <span
              class="input-group-text login__input-icon"
              id="basic-addon1">
              <i class="fa-solid fa-envelope"></i>
            </span>
          </div>
          <button
            class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
            اعادة تعيين كلمة المرور
          </button>
        </form>
      </div>
    </div>
  </div>
</main>


<?php
unset($_SESSION['create_user']);
unset($_SESSION['login_user']);
unset($_SESSION["user_added"]);
unset($_SESSION["email_unique"]);
include "layouts/footer.php"
?>