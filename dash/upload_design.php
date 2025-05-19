<?php
include('contact.php');

if (!empty($_POST['name']) && !empty($_POST['price']) && isset($_FILES['images'])) {

    $NAME = mysqli_real_escape_string($conn, $_POST['name']);
    $PRICE = mysqli_real_escape_string($conn, $_POST['price']);

    $targetDir = "images/";
    $uploadedImages = [];

    foreach ($_FILES['images']['name'] as $key => $imageName) {
        $imageTmp = $_FILES['images']['tmp_name'][$key];
        $targetFile = $targetDir . basename($imageName);

        if (move_uploaded_file($imageTmp, $targetFile)) {
            $uploadedImages[] = $targetFile;
        } else {
            echo "فشل في رفع الصورة: " . $imageName;
            exit;
        }
    }

    if (count($uploadedImages) >= 3) {
        $insert = "INSERT INTO design(name, price, image, image2, image3) VALUES('$NAME', '$PRICE', '$uploadedImages[0]', '$uploadedImages[1]', '$uploadedImages[2]')";
        if (mysqli_query($conn, $insert)) {
           header('LOCATION:edit_design.php');
        } else {
            echo "خطأ في قاعدة البيانات: " . mysqli_error($conn);
        }
    } else {
        echo "يرجى رفع ثلاث صور على الأقل.";
    }

} else {
    echo "يرجى إدخال جميع البيانات المطلوبة.";
}
?>