<?php
include("conatact.php");

// التحقق من أن جميع الحقول تم تعبئتها
if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["Email"]) && !empty($_POST['password'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $firstName = mysqli_real_escape_string($conn, trim($_POST["firstName"]));
        $lastName = mysqli_real_escape_string($conn, trim($_POST["lastName"]));
        $email = mysqli_real_escape_string($conn, trim($_POST["Email"]));
        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "البريد الإلكتروني غير صحيح!";
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $password); // ربط المتغيرات مع الاستعلام

        // تنفيذ 
        if ($stmt->execute()) {
            header('LOCATION:login.html');
        } else {
            echo "خطأ: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "الرجاء ملء جميع الحقول!";
}
?>
