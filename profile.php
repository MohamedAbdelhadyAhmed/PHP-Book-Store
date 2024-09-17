<?php include "layouts/header.php" ?>
<?php include "layouts/nave.php" ?>
<?php include "app/models/Book.php" ?>
 
    <main>
      <section
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>حسابي</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="index.php">الرئيسية</a> /
            <span class="text-gray">حسابي</span>
          </div>
        </div>
      </section>

      <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
        <div class="profile__right mb-5">
          <div class="profile__user mb-3 d-flex gap-3 align-items-center">
            <div class="profile__user-img rounded-circle overflow-hidden">
              <img class="w-100" src="assets/images/user.png" alt="" />
            </div>
            <div class="profile__user-name">moamenyt</div>
          </div>
          <ul class="profile__tabs list-unstyled ps-3">
            <li class="profile__tab active">
              <a class="py-2 px-3 text-black text-decoration-none" href="profile.php">لوحة التحكم</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="orders.php">الطلبات</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="account_details.php">تفاصيل الحساب</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="favourites.php">المفضلة</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="">تسجيل الخروج</a>
            </li>
          </ul>
        </div>
        <div class="profile__left mt-4 mt-md-0 w-100">
          <div class="profile__tab-content active">
            <p class="mb-5">
              مرحبا <span class="fw-bolder">moamenyt</span> (لست
              <span class="fw-bolder">moamenyt</span>?
              <a class="text-danger" href="">تسجيل الخروج</a>)
            </p>

            <p>
              من خلال لوحة تحكم الحساب الخاص بك، يمكنك استعراض
              <a class="text-danger" href="orders.php">أحدث الطلبات</a>،
             والفواتير
              الخاصة بك، بالإضافة إلى
              <a class="text-danger" href="account_details.php">تعديل كلمة المرور وتفاصيل حسابك</a>.
            </p>
          </div>
        </div>
      </section>
    </main>
    <?php include "layouts/footer.php" ?>
