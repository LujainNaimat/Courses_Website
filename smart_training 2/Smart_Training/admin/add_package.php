<?php
include "../Php/connect.php";




if (isset($_POST['add_package'])) {
  
    $name = $_POST['name'];
    $details = $_POST['details'];
    $price=$_POST['price'];
    $sql = "INSERT INTO packages (name,details,price) values('$name','$details',$price)";
// print_r($sql);
    $result = mysqli_query($connect, $sql);

    if ($result) {
        header("Location:package.php");
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
    <title>package Form</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

  <section id="navigation">
       <?php include"navbar.php"; ?>
    </section>
    <form method="POST">
        <fieldset>
            <legend>Package Form</legend>

            <label> Name:</label>
            <input type="text" name="name" placeholder="enter name" required>


            <label> Details:</label>
            <input type="text" name="details" placeholder="enter details" required>
            <label> price</label>
            <input type="number" name="price" placeholder="enter price" required>

            <button type="submit" name="add_package">Submit</button>

        </fieldset>
    </form>

</body>

</html>