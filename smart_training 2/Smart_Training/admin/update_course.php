<?php
include "../Php/connect.php";
$id=$_GET['id'];
$sql="SELECT *FROM services WHERE id=$id";
   
$result = mysqli_query($connect, $sql);
$row=mysqli_fetch_assoc($result);
// print_r($row);
$name=$row['name'];
$details=$row['details'];
$price=$row['price'];
$image=$row['image'];

if (isset($_POST['add_course'])) {
  
    $name = $_POST['name'];
    $details = $_POST['details'];
    $price=$_POST['price'];
    $image=$_POST['image'];
    $sql = "update  services set name='$name',details='$details',price='$price',image='$image' where id='$id'";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        header("Location:course.php");
    } else {
        mysqli_error(mysql: $connect);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Form</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

  <section id="navigation">
       <?php include"navbar.php"; ?>
    </section>
    <form method="POST">
        <fieldset>
            <legend>Course Form</legend>

            <label> Name:</label>
            <input type="text" name="name" value="<?php echo $name;?>" >


            <label> Details:</label>
            <input type="text" name="details" value="<?php echo $details;?>" >
            <label> Image</label>
            <input type="text" name="image" value="<?php echo $image;?>" >
            <label> price</label>
            <input type="number" name="price" value="<?php echo $price;?>">

            <button type="submit" name="add_course">Submit</button>

        </fieldset>
    </form>

</body>

</html>