<?php
include "connect.php";


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <meta name="author" content="Lujain">

        <link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dehaze" />
<script src="../Javascript/script.js"></script></head>
</head>
<body>
    <button id="menu"class="menu-toggle" onclick="toggleMenu()"><span class="material-symbols-outlined">
dehaze
</span></button>

      <div class="navbar">
      

            <div class="logo">Smart Training Institute</div>
            <div class="navbar-left">
                <a href="index.php" class="navlink">Home</a>
                <a href="courses.php" class="navlink">Courses</a>
                <a href="courseschedule.php" class="navlink">Schedule</a>

                <a href="index.php#instructor" class="navlink">Instructors</a>
                <a href="packages.php" class="navlink">Packages</a>
<?php if (isset($_SESSION['pay']) && $_SESSION['pay'] === true) {
       echo' <a href="mycourses.php" class="navlink">My Courses</a>';}
    ?>
                <a href="about.php" class="navlink">About us</a>
            </div>

      
          <div class="navbar-right">
    <?php
    if (isset($_SESSION['student'])) {
        echo '
        <a href="cart.php" class="navlink" id=shopping_cart ><span class="material-symbols-outlined">
shopping_cart
</span></a>
    <a href="signout.php" class="navlink" id="sign_out">sign out</a> ';


    } else {
        echo '
    <a href="signin.php" class="navlink" id=sign_in>Enroll now</a>
    ';
    
    }

    ?>
   </div>  </div>
</body>
</html>