<?php
include("conatact.php");

ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
if($_SERVER['HTTP_HOST'] != 'localhost') {
    ini_set('session.cookie_secure', 1);
}
session_start();
session_regenerate_id(true);

// تسجيل المحاولات الفاشلة
if(!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['last_attempt_time'] = 0;
}

$wait_time = 3;  // الوقت الذي يجب الانتظار فيه بعد تجاوز الحد المسموح به
if($_SESSION['login_attempts'] >= 3) {
    if(time() - $_SESSION['last_attempt_time'] < $wait_time) {
        die("لقد تجاوزت عدد المحاولات المسموح بها. يرجى الانتظار ".$wait_time." ثواني ثم المحاولة مرة أخرى");
    } else {
        // إعادة تعيين المحاولات بعد تجاوز الوقت المحدد
        $_SESSION['login_attempts'] = 0;
    }
}

if(isset($_POST['submit'])) {
    $_SESSION['login_attempts']++;
    $_SESSION['last_attempt_time'] = time();
    
    if(empty($_POST['Email']) || empty($_POST['Password'])) {
        die("يرجى ملء جميع الحقول");
    }

    $EMAIL = mysqli_real_escape_string($conn, $_POST['Email']);
    $PASS = mysqli_real_escape_string($conn, $_POST['password']);

    // استخدام Prepared Statements لتجنب SQL Injection
    $query = "SELECT * FROM `registration` WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $EMAIL);  // ربط المتغير مع الاستعلام
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);
        
        // التحقق من كلمة المرور باستخدام password_verify
        if(password_verify($PASS, $user['password'])) {
            $_SESSION['login_attempts'] = 0;  // إعادة تعيين المحاولات
            $_SESSION['user'] = $EMAIL;
            $_SESSION['role'] = 'admin';  // تعيين دور المستخدم

            header("Location:index.html");
            exit;
        } else {
            echo '<script>alert("❌ البريد الإلكتروني أو كلمة المرور غير صحيحة!");</script>';
        }
    } else {
        echo '<script>alert("❌ البريد الإلكتروني أو كلمة المرور غير صحيحة!");</script>';
    }

    mysqli_stmt_close($stmt);
}
?>
