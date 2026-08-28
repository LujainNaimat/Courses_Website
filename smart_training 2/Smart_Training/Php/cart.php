<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Lujain">
<meta name="keywords" content="shopping cart, course checkout, selected courses, training purchase, Smart Training">
<meta name="description" content="Review your selected courses and packages before completing your purchase">
<title>Shopping Cart</title>

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dehaze" />

    <script src="../Javascript/script.js"></script>
    
</head>


<body>
    <section id="navigation">
        <?php include "navbar.php"; ?>
    </section>
    <div id="my_cart">
        <h2>My Cart</h2>
        <!-- //displaycourses -->
        <?php
        include "connect.php";
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM orders WHERE user_email='$email'  And course_name IS NOT NULL";
        //echo $sql;
        $result = mysqli_query($connect, $sql);
        $allorders = mysqli_fetch_all($result, MYSQLI_ASSOC);//imp
        $has_courses = 0;

        if (mysqli_num_rows($result) > 0) {
            $has_courses = 1;


            echo "
<table class='cart_table'>

    <tr class='cart-header'>
        <th><h3>Course Name</h3></th>
        <th><h3>Price</h3></th>
        <th><h3>Action</h3></th>
    </tr>
";
            foreach ($allorders as $order) {
                $course_name = $order['course_name'];
                $course_price = $order['course_price'];
                $id = $order['id'];
                echo "
      <tr class='cart-row'>
<td>$course_name</td>

<td>
$course_price</td>


<td><a href=delete.php?id=$id class=delete_btn><span class='material-symbols-outlined'>
close

</span></a>
</td>
   </tr>";
            }

            echo "</table>";
        }

        // display packages
        $sql2 = "SELECT * FROM orders 
         WHERE user_email='$email' 
         AND package_name IS NOT NULL";

        $result2 = mysqli_query($connect, $sql2);
        $packages = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        $has_packages = 0;

        if (mysqli_num_rows($result2) > 0) {
            $has_packages = 1;
            echo "<h3>Packages</h3>";
            echo "
<table class='cart_table'>
    <tr class='cart-header'>
        <th>Package Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
";


            foreach ($packages as $order) {
                $package_name = $order['package_name'];
                $package_price = $order['package_price'];
                $id = $order['id'];
                echo "
    <tr class='cart-row'>
        <td>$package_name</td>
        <td>$package_price</td>
<td><a href='delete.php?id=$id&from=cart' class='delete_btn'><span class='material-symbols-outlined'>close</span></a></td>

    </tr>
    ";
            }

            echo "</table>";
        }
        //if user didnt buy yet
        if (!$has_courses && !$has_packages) {
            echo "<h4>  <span class='material-symbols-outlined'>
shopping_cart
</span>Your cart is empty</h4>";

        }
        //total 
        if (isset($_SESSION['email']) && ($has_courses || $has_packages)) {

            $Totalsql = "SELECT 
    SUM(course_price) + SUM(package_price) AS total_price
FROM orders
WHERE user_email = '$email' ";
            $send_sql = mysqli_query($connect, $Totalsql);
            $result = mysqli_fetch_assoc($send_sql);
            // print_r($result);
        

            $total = $result['total_price'];

            ?>
            <div class='cart_total'>
                <h2>Total Price</h2>
                <?php echo $total; ?>

                <!-- //buy button+closing total parenthesis -->
                <?php

                echo " <form method='POST'> 
                <button name='pay' class='payment_btn' type='submit' onclick='paynow()'>Pay now
                </button>
                 </form>
                                  </div>

";
                if (isset($_POST['pay'])) {
                    $_SESSION['pay'] = true;
                }


        } ?>










        </div>
</body>

</html>