<?php
// بدء الـ Session لحفظ حالة تسجيل الدخول
session_start();

// التثبت إذا البيانات تبعثت عبر طريقة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // استقبال البيانات من الفورم
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // هنا مستقبلاً نربطوها بقاعدة البيانات (MySQL)
    // للتجربة حالياً: نحدد رقم سرّي افتراضي
    $correct_phone = "20123456";
    $correct_password = "123";

    if ($phone === $correct_phone && $password === $correct_password) {
        // تسجيل الدخول بنجاح
        $_SESSION['user_phone'] = $phone;
        $_SESSION['loggedin'] = true;

        echo "<h2 style='color: green; text-align: center; font-family: sans-serif; margin-top: 50px;'>
                Connexion réussie ! Bienvenue.
              </h2>";
        // تنجم تعمله redirection للسيت الأساسي:
        // header("Location: index.html");
    } else {
        // خطأ في البيانات
        echo "<h2 style='color: red; text-align: center; font-family: sans-serif; margin-top: 50px;'>
                Numéro ou mot de passe incorrect !
              </h2>";
        echo "<p style='text-align: center;'><a href='login.html'>Réessayer</a></p>";
    }

} else {
    // إذا دخل شخص للملف مباشرة بدون ملء الفورم
    header("Location: login.html");
    exit();
}
?>