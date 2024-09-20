<?php
session_start();
include "app/middleware/auth_user.php";
include "layouts/header.php";
include "layouts/nave.php";
 

?>

<main>
  <section
    class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>تتبع طلبك</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray" href="index.php">الرئيسية</a> /
        <span class="text-gray">تتبع طلبك</span>
      </div>
    </div>
  </section>
  <section class="section-container my-5 py-5">
    <p class="mb-5">فضلًا أدخل رقم طلبك في الصندوق أدناه وأضغط زر لتتبعه "تتبع الطلب" لعرض حالته. بإمكانك العثور على رقم الطلب في البريد المرسل إليك والذي يحتوي على فاتورة تأكيد الطلب.</p>
    <form action="order-details.php" method="POST">
      <div class="mb-4">
        <label for="id">رقم الطلب</label>
        <input class="form__input text-start" placeholder="ستجده في رسالة تأكيد طلبك" type="number" id="id" name="id" required>
      </div>
      <div class="mb-4">
        <label for="email">البريد الالكتروني للفاتورة</label>
        <input class="form__input text-start" placeholder="البريد الالكتروني الذي استخدمته اثناء اتمام الطلب" type="email" id="email" name="email" required>
      </div>
      <button class="primary-button" type="submit">تتبع طلبك</button>
    </form>
  </section>
</main>

<?php include "layouts/footer.php" ?>