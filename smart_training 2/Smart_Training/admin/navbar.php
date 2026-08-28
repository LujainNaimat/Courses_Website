<?php
include "../Php/connect.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}if ($_SESSION['role'] != 'admin') {
    header("Location: ../Php/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">

    <title>navigation</title>
</head>

<body>
    <div class="navbar">

        <div class="logo">Smart Training Institute</div>

        <div class="nav-left">
            <a href="home.php" class="navlink">Home</a>
            <a href="course.php" class="navlink">Courses</a>

            <a href="package.php" class="navlink">Packages</a>
            <a href="schedule.php" class="navlink">Schedule </a>

            <a href="instructor.php" class="navlink">instructors</a>
        </div>


        <div class="navbar-right">

            <a href="../Php/signout.php" class="navlink" id="signout">sign out</a>
        </div>
    </div>
</body>

</html>