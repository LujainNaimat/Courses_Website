<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "connect.php";
if (isset($_POST['buybtn'])) {
    $price = $_POST['package_price'];
    $package_name = $_POST['package_name'];
    $email = $_SESSION['email'];
    $sql = "INSERT INTO orders (package_name,package_price ,user_email ) VALUES ('$package_name' ,$price,  '$email') ";
    // $sql;
    $result = mysqli_query($connect, $sql);

    header("Location:cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lujain">
    <meta name="keywords"
        content="training packages, subscription plans, course bundles, pricing, learning packages, Smart Training">
    <meta name="keywords"
        content="Smart Training navigation, website menu, courses, instructors, schedules, packages, learning platform">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dehaze" />

        <title>Packages</title>
</head>

<body>

    <!-- <h1 class='page-title'>Our Packages</h1> -->
    <section id="navigation">
        <?php include "navbar.php" ?>
    </section>
    <h1 class='page-title'>Our packages</h1>

    <?php
    include "connect.php";
    $sql = "SELECT * FROM packages";
    $result = mysqli_query($connect, $sql);
    $allpackages = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo "<div id='packages'>
";

    // print_r($allpackages);
    
    foreach ($allpackages as $package) {
        $package_name = $package['name'];
        $package_details = $package['details'];
        $package_price = $package['price'];
        echo "
<div class='package_row'>

<h1> $package_name</h1>
<p>$package_details </p>
<h2>$package_price JD</h2>

<form method='POST'>
 <input type='hidden' name='package_name' value='$package_name'>
<input type='hidden' name='package_price' value='$package_price'>"

        ;
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];

            $check_sql = "SELECT *
FROM orders
WHERE user_email = '$email'
AND package_name IS NOT NULL
";

            $result2 = mysqli_query($connect, $check_sql);
            $exist = mysqli_num_rows($result2) > 0;

            if ($exist) {
                $row = mysqli_fetch_assoc($result2);

                $order_id = $row['id'];
                echo "
               <a href='Cart.php' class='packagecart'><span class='material-symbols-outlined'>
shopping_cart
</span>already enrolled in package check cart</a>
          ";
            } else {


                echo "<button class='buybtn' name='buybtn' type='submit'> enroll <span class='material-symbols-outlined'>
shopping_cart
</span></button>";
            }


        } else {
            // Shows a message for guests
            echo "<a href='signin.php' class='buybtn'>Sign in to Enroll</a>";
        }
        echo "</form>
 </div>
 
 
 ";









    }

    echo "</div>";


    ?>
</body>

</html>