<?php
session_start();
include "connect.php";
if (isset($_POST['buybtn'])) {
    $price = $_POST['course_price'];
    $course_name = $_POST['course_name'];
    $email = $_SESSION['email'];
    $sql = "INSERT INTO orders (course_name,course_price ,user_email ) VALUES ('$course_name' ,$price,  '$email') ";
    //echo $sql;
    $result = mysqli_query($connect, $sql);
    header("Location: courses.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <meta name="author" content="Lujain">
<meta name="keywords" content="Smart Training, online learning, professional training, education, courses, skill development, career growth">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dehaze" />

    </head>

<body>
    <section id="navigation">
        <?php include "navbar.php" ?>
    </section>

    <section id="courses">
        <div id="courses-container">
            <?php
            $sql = "SELECT * FROM services";
            $result = mysqli_query($connect, $sql);
            //to check if the rows are correct
            $allcourses = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // foreach($allcourses as $course ){
//     echo $course["name"]." ";
// }
            foreach ($allcourses as $course) {
                $id = $course['id'];
                $course_name = $course['name'];
                $details = $course['details'];
                $price = $course['price'];

$image=$course['image'];
                echo "   <div class='card'>

         <div class='card-img'><img src=$image alt='course-img'></div>

<h2> $course_name</h2>
<p>$details </p>
<h2>$price JD</h2>

<form method='POST'> 
 <input id='course_name' name='course_name' value='$course_name' hidden>
                <input id='course_price' name='course_price' value='$price' hidden> ";
                
               
            
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];

                    $check_sql = "SELECT * FROM orders WHERE course_name = '$course_name' AND user_email = '$email'";

                    $result2 = mysqli_query($connect, $check_sql);
                    $row = mysqli_fetch_assoc($result2);
                    $exist = mysqli_num_rows($result2);

                    if ($exist) {
                        $order_id = $row['id'];
                        echo "<a class='delete_link' href='delete.php?id=$order_id&from=courses'>
            <span class='material-symbols-outlined'>
cancel
</span>
          </a>
          
        
          
          
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

                ?>
            <?php
            
            
            
            }//ends the for each loop 

            //the floating cart button
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $check_all_sql = "SELECT * FROM orders WHERE user_email = '$email'";
    $result_all = mysqli_query($connect, $check_all_sql);
// print_r($result_all);
    if (mysqli_num_rows($result_all) > 0) {
         echo "<a href='cart.php' class='cart_btn'>
<span class='material-symbols-outlined'>
shopping_cart_checkout
</span>          </a>";
    }
}

   

            
            
            
            ?>

















        </div>



    </section>





</body>

</html>