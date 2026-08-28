<?php

include "../Php/connect.php";
if (isset($_POST['add_schedule'])) {
    $course_name = $_POST['name'];

    $etime = $_POST['etime'];

    $stime = $_POST['stime'];

    $day = $_POST['day'];
    if ($stime < $etime) {
        $sql = "INSERT into course_schedule (name,stime,etime,day) Values ('$course_name','$stime','$etime','$day')";
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
            <input type="text" name="name" placeholder="enter name" required>


            <label> start time:</label>
            <input type="time" name="stime" required>
            <label> end time:</label>
            <input type="time" name="etime" required>



            <label> Day :</label>



            <select name="day" required>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>


            <button type="submit" name="add_schedule">Submit</button>

        </fieldset>
    </form>
</body>

</html>