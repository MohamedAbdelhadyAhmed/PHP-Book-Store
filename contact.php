<?php
session_start();
include "layouts/header.php";
include "layouts/nave.php";
$conn = mysqli_connect('localhost', 'root', '', 'book_store2');
$user_id = $_SESSION['user']['id'] ?? 1;
$sql = "SELECT * FROM users WHERE id = $user_id";
$user = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($user);
?>

<main>
  <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>تواصل معنا</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray" href="index.php">الرئيسية</a> /
        <span class="text-gray">تواصل معنا</span>
      </div>
    </div>
  </section>

  <section class="section-container py-5">
    <div class="row">
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="contact__item h-100 d-flex align-items-center gap-2">
          <div class="contact__icon">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div>
            <h6 class="contact__item-title m-0">اتصل بنا</h6>
            <p class="contact__item-text m-0">01063888667</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="contact__item h-100 d-flex align-items-center gap-2">
          <div class="contact__icon">
            <i class="fa-regular fa-envelope"></i>
          </div>
          <div>
            <h6 class="contact__item-title m-0">راسلنا علي الايميل</h6>
            <p class="contact__item-text m-0">eraasoft@gmail.com</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="contact__item h-100 d-flex align-items-center gap-2">
          <div class="contact__icon">
            <i class="fa-solid fa-location-dot"></i>
          </div>
          <div>
            <h6 class="contact__item-title m-0">العنوان</h6>
            <p class="contact__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="contact__item h-100 d-flex align-items-center gap-2">
          <div class="contact__icon">
            <i class="fa-solid fa-comments"></i>
          </div>
          <div>
            <h6 class="contact__item-title m-0">دعم متواصل</h6>
            <p class="contact__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-container contact d-md-flex align-items-center mb-3">
    <div class="contact__side w-50">
      <h4 class="mb-3">يسعدنا تواصلك معنا في أى وقت</h4>
      <p>إذا كنت تواجه أي مشكلة أو ترغب في إسترجاع أو إستبدال المنتج لا تتردد أبدأ بالتواصل معنا في أي وقت. كل ماعليك هو ملئ النموذج التالي ببيانات صحيحة وسنقوم بمراجعة طلبك في أسرع وقت.</p>
      <form class="contact__form" action="<?= "app/controller/FrontEnd/Contact/add_message.php" ?>" method="POST">
        <div class="d-flex gap-3 mb-3">
          <div class="w-50">
            <label for="first_name">الاسم الاول<span class="required">*</span></label>
            <input class="contact__input text-end" type="text" id="first_name" name="first_name" placeholder="الاسم الاول" value="<?= $user['first_name'] ?>" required>
            <h5 class="text-end text-danger"><?= $_SESSION['error']['contact']['name'] ?? '' ?></h5>
          </div>
          <div class="w-50">
            <label for="last_name">الاسم الثاني<span class="required">*</span></label>
            <input class="contact__input text-end" type="text" id="last_name" name="last_name" placeholder="الاسم الثاني" value="<?= $user['last_name'] ?>" required>
            <h5 class="text-end text-danger"><?= $_SESSION['error']['contact']['name'] ?? '' ?></h5>
          </div>
        </div>
        <div class="mb-3">
          <label for="phone">رقم الهاتف<span class="required">*</span></label>
          <input class="contact__input" type="number" id="phone" name="phone" placeholder="رقم الهاتف" value="<?= $user['phone'] ?>" required>
          <h5 class="text-end text-danger"><?= $_SESSION['error']['contact']['phone'] ?? '' ?></h5>
        </div>
        <div class="mb-3">
          <label for="email">البريد الالكتروني<span class="required">*</span></label>
          <input class="contact__input" type="email" id="email" name="email" placeholder="البريد الالكتروني" value="<?= $user['email'] ?>" required>
          <h5 class="text-end text-danger"><?= $_SESSION['error']['contact']['email'] ?? '' ?></h5>
        </div>
        <div class="mb-3">
          <label for="title">سبب التواصل<span class="required">*</span></label>
          <select class="contact__input" id="title" name="title" required>
            <option value="استفسار" selected>استفسار</option>
            <option value="استبدال">استبدال</option>
            <option value="استرجاع">استرجاع</option>
            <option value="استعجال الطلب">استعجال الطلب</option>
            <option value="اخري">اخري</option>
          </select>
          <h5 class="text-end text-danger"><?= $_SESSION['error']['contact']['title'] ?? '' ?></h5>
        </div>
        <div>
          <label for="message">نص الرسالة<span class="required">*</span></label>
          <textarea class="contact__input" name="message" id="message" placeholder="نص الرسالة" required></textarea>
          <h5 class="text-end text-danger"><?= $_SESSION['error']['contact']['message'] ?? '' ?></h5>
        </div>
        <button class="primary-button w-100 rounded-2" type="submit">ارسال الطلب</button>
      </form>
    </div>
    <div class="contact__side w-50 text-center">
      <img class="w-100" src="assets/images/contact-1.png" alt="">
    </div>
  </section>

  <div class="section-container my-5 px-4">
    <div class="contact__map"></div>
  </div>
</main>

<?php
unset($_SESSION['error']);
include "layouts/footer.php";
?>