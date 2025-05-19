<?php
// تمكين عرض الأخطاء للتصحيح
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// تحديد مسار ملف الاتصال (تأكد من المسار الصحيح)
include('contact.php'); // إذا كان في المجلد الرئيسي

// تأكد من الاتصال
if (!$conn) {
    die(json_encode(['error' => 'فشل الاتصال: ' . mysqli_connect_error()]));
}

// استعلام لجلب التصاميم
$result = mysqli_query($conn, "SELECT * FROM design");
if (!$result) {
    die(json_encode(['error' => 'فشل الاستعلام: ' . mysqli_error($conn)]));
}

$designs = [];

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // تنظيف مسار الصورة الأولى
        $filename1 = trim($row['page1'], '/');
        $filename1 = str_replace('images/', '', $filename1);
        $imagePath1 = 'dash/images/' . $filename1; // مسار نسبي من جذر المشروع
        
        // تنظيف مسار الصورة الثانية إذا كانت موجودة
        $imagePath2 = '';
        if (!empty($row['page2'])) {
            $filename2 = trim($row['page2'], '/');
            $filename2 = str_replace('images/', '', $filename2);
            $imagePath2 = 'dash/images/' . $filename2;
        }
        
        // تنظيف مسار الصورة الثالثة إذا كانت موجودة
        $imagePath3 = '';
        if (!empty($row['page3'])) {
            $filename3 = trim($row['page3'], '/');
            $filename3 = str_replace('images/', '', $filename3);
            $imagePath3 = 'dash/images/' . $filename3;
        }
        
        // إضافة التصميم إلى المصفوفة مع الصور الثلاث
        $designs[$row['name']] = [
            'page1' => $imagePath1,
            'page2' => $imagePath2,
            'page3' => $imagePath3,
            'name' => $row['name'],
            'price' => $row['price']
        ];
    }
}

// إرجاع البيانات بتنسيق JSON
header('Content-Type: application/json');
echo json_encode($designs);

mysqli_close($conn);
?>