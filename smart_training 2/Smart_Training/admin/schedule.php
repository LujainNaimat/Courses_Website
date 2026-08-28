<?php
include "../Php/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>schedule</title>
</head>

<body>
    <section id="navigation">
        <?php include "navbar.php" ?>
    </section>
    <section id="schedule">
        <button type="button" class="btn btn-primary btn-lg"><a href="add_schedule.php">Add Time slot</a></button>

        <div id="schedule-container">
            <table>
                <tr>
                    <th>course_name</th>
                    <th>start-time</th>
                    <th>end-time</th>
                    <th>Day</th>
                    <th id="action_col">Action</th>
                </tr>

                <?php

                //select the schedule
                $sql2 = "SELECT *FROM course_schedule ORDER BY FIELD(day, 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'),
stime ASC";
                $result2 = mysqli_query($connect, $sql2);
                $schedules = mysqli_fetch_all($result2, MYSQLI_ASSOC);



                foreach ($schedules as $schedule) {
                    $id = $schedule['id'];
                    $course_name = $schedule['name'];
                    $stime = $schedule['stime'];
                    $etime = $schedule['etime'];
                    $day = $schedule['day'];

                    echo "
 <tr><td>$course_name</td>
 <td>$stime</td>
  <td>$etime</td>
  <td>$day</td>
<td><a href='delete_schedule.php?id=$id' class='btn btn-danger btn-sm me-2' role='button'>
        Delete
    </a>
    

    <a href='update_schedule.php?id=$id' class='btn btn-primary btn-sm'>
        Update
    </a>
 </td>
 
 </tr>




";


                }

                ?>
            </table>

        </div>




    </section>
</body>

</html>