<?php
include"../Php/connect.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ( $_SESSION['role'] != 'admin') {
    header("Location: ../Php/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<include
       <section id="navigation">
       <?php include"navbar.php"; ?>
    </section>

    <section class="dashboard-header">
    <h2 class="greeting">Hello, <?php echo $_SESSION['student']; ?></h2>
    <h1 class="title">Welcome to Admin Dashboard !</h1>
    <p class="subtitle">Manage courses,schedules,packages,and instructors efficiently.</p>
</section>

<section class="dashboard-links">
    <a href="course.php" class="dashboard-card">Courses</a>
    <a href="schedule.php" class="dashboard-card">Schedule</a>
    <a href="package.php" class="dashboard-card">Packages</a>
    <a href="instructor.php" class="dashboard-card">Instructors</a>
</section>
</body>
</html>
