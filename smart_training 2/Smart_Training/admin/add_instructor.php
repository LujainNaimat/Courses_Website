<?php
include "../Php/connect.php";




if (isset($_POST['add_instructor'])) {

    $name = $_POST['name'];
    $role = $_POST['role'];
    $details=$_POST['details'];
    $imglink=$_POST['imglink'];
    $sql = "INSERT INTO instructors (name,role,details,image) values('$name','$role','$details','$imglink');";

    $result = mysqli_query($connect, $sql);

    if ($connect) {
        header("Location:instructor.php");
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
    <title>Instructor Form</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

  <section id="navigation">
       <?php include"navbar.php"; ?>
    </section>
    <form method="POST">
        <fieldset>
            <legend>Instructor Form</legend>

            <label> Name:</label>
            <input type="text" name="name" placeholder="enter name" required>


            <label> role:</label>
            <input type="text" name="role" placeholder="enter role" required>
            <label> details</label>
            <input type="text" name="details" placeholder="enter details" required>
   <label> image link</label>
            <input type="text" name="imglink" placeholder="enter image link" required>
            <button type="submit" name="add_instructor">Submit</button>

        </fieldset>
    </form>

</body>

</html>