<?php
$searchInput = isset($_GET['q']) ? $_GET['q'] : null;
$courses = [];

if ($searchInput) {

    $result = searchCoursesWithSingleInput($searchInput);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }
} else {
    $courses = $data['courses'];
}

if (isset($_SESSION['timestamp'])) {
?>

    <head>
        <title>TrainSkill</title>
    </head>
    
    <div class="container mt-4">
            <?php if ($searchInput): ?>
                <h1>ผลการค้นหา: <?= htmlspecialchars($searchInput) ?></h1>
            <?php endif; ?>

            <?php if (!empty($courses)): ?>
                <?php foreach ($courses as $activity): ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-2 d-flex align-items-center">
                                <?php
                                // $imageData = base64_encode($activity['image1']);
                                // echo '<img src="data:image/jpeg;base64,' . $imageData . '" class="img-fluid rounded-start" alt="กิจกรรม">';

                                $query = getConnection()->query("SELECT * FROM images");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) {
                                            $imageURL = 'uploads/' . $row["file_name"];
                                    ?>
                                        <img src="<?php echo $imageURL ?>" class="img-fluid rounded-start" alt="กิจกรรม">
                                    <?php }
                                    } else { ?>
                                        <p>No......</p>
                                    <?php }
                                ?>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title">ชื่อกิจกรรม: <?= $activity['course_name'] ?></h5>
                                    <p class="card-text">ผู้สร้าง: <?= $activity['user_name'] ?></p>
                                    <p class="card-text">รายละเอียด: <?= $activity['description'] ?></p>
                                    <p class="card-text">จำกัดจำนวน: <?= $activity['max'] ?> คน</p>
                                    <a href="/course?id=<?= $activity['course_id'] ?>" class="btn btn-primary">รายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                <?php endforeach; ?>
            <?php else: ?>
                <p>ไม่พบกิจกรรมที่ตรงกับเงื่อนไข</p>
            <?php endif; ?>
        </div>

<?php
} else {
?>
    <?php
        header('Location: /login');
        exit;
    ?>
<?php

}