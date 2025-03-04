<?php

// $courseName = $_POST['name'];
// $description = $_POST['description'];
// $max = $_POST['max'];
// $startDate = $_POST['start_date'];
// $endDate = $_POST['end_date'];
// $userId = $_SESSION['user_id'];

// $result = createCourse($courseName, $description, $max, $startDate, $endDate, $userId);

// if ($result) {
//     header('Location: /');
// } else {
//     echo 'เกิดข้อผิดพลาดในการสร้างกิจกรรม';
// }

if (isset($_POST['submit'])) {
    $statusMessages = []; // เก็บสถานะของแต่ละไฟล์

    // อัปโหลดไฟล์ image1 - image4
    for ($i = 1; $i <= 4; $i++) {
        $inputName = "image" . $i;
        if (isset($_FILES[$inputName])) {
            $statusMessages[] = uploadImage($inputName);
        }
    }

    // แสดงข้อความผลลัพธ์
    foreach ($statusMessages as $msg) {
        echo $msg . "<br>";
    }
}
?>