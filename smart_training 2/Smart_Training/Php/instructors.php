<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructors</title>
    <meta name="author" content="Lujain">
<meta name="keywords" content="instructors, trainers, educators, experts, teaching staff, Smart Training">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dehaze" />

<body></head>
        <div id="instructor-page">

 <h1 class='page-title'>Our instructors</h1>

    <div id="instructor-container">

    <?php
    $sql = "SELECT * FROM instructors";
    $result = mysqli_query($connect, $sql);
    $allinstructors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($allinstructors as $instructor) {
        $name = $instructor['name'];
        $role = $instructor['role'];
        $details = $instructor['details'];
$img=$instructor['image'];
        echo "
    <div class='instructor-card'>
<div class='card-img'><img src='$img' alt='instructor-img'></div>
    <h2>$name</h2>
    <h3>$role</h3>
<p>$details</p>

</div>
    ";
    }

    ?>
</div>
</div>

</body>

</html>