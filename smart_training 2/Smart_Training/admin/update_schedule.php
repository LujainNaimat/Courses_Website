<?php

include "../Php/connect.php";
$id=$_GET['id'];
$sql="SELECT * from course_schedule WHERE id=$id";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$stime=$row['stime'];
$etime=$row['etime'];
$day=$row['day'];



if (isset($_POST['update_schedule'])) {
    $course_name = $_POST['name'];

    $etime = $_POST['etime'];

    $stime = $_POST['stime'];

    $day = $_POST['day'];
    if ($stime < $etime) {
        $sql = "update  course_schedule set name='$course_name',stime='$stime',etime='$etime',day='$day' where id='$id'";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("Location:schedule.php");
            exit;
        }
    } else {
        echo "<script>alert('End time must be after start time!')</script>";
    }




}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule form</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <section id="navigation">
        <?php include "navbar.php"; ?>
    </section>
    <form method="POST">
        <fieldset>
            <legend>schedule Form</legend>

            <label> Name:</label>
            <input type="text" name="name" value="<?php echo $name?>" required>


            <label> start time:</label>
            <input type="time" name="stime" value="<?php echo $stime?>"required>
            <label> end time:</label>
            <input type="time" name="etime" value="<?php echo $etime?>"required>



            <label> Day :</label>



            <select name="day" required value="<?php echo $day?>">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>


            <button type="submit" name="update_schedule">Submit</button>

        </fieldset>
    </form>
</body>

</html>