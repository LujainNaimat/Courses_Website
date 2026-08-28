<?php
include "../Php/connect.php";
$id=$_GET['id'];
$sql1="SELECT * FROM instructors where id=$id";
    $result = mysqli_query($connect, $sql1);
    $instructor=mysqli_fetch_assoc($result);
$name = $instructor['name'];
    $role = $instructor['role'];
    $details=$instructor['details'];
    $imglink=$instructor['image'];

if (isset($_POST['add_instructor'])) {

    $name = $_POST['name'];
    $role = $_POST['role'];
    $details=$_POST['details'];
        $imglink=$_POST['imglink'];

    $sql = "Update  instructors set name='$name',role='$role',details='$details',image='$imglink' Where id=$id";

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
            <!-- value not placeholder so that the value can be edited while the placeholder cant -->
            <input type="text" name="name" value="<?php echo $name?>" >


            <label> role:</label>
            <input type="text" name="role" value="<?php echo $role?>" >
            <label> details</label>
            <input type="text" name="details" value="<?php echo $details?>" >
 <label> image link</label>
            <input type="text" name="imglink" value="<?php echo $imglink?>" required>
            <button type="submit" name="add_instructor">Submit</button>

        </fieldset>
    </form>

</body>

</html>