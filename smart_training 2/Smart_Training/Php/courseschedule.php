<?php  include "connect.php" ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
<meta name="author" content="Lujain">
<meta name="keywords" content="course schedule, training timetable, class schedule, learning calendar, Smart Training">
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dehaze" />

<title>Course Schedule</title>
</head>
<body>
    <section id="navigation">
        <?php include "navbar.php" ?>
    </section>
    <section id="schedule">
<div id="schedule-container">
<?php

$days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
$sql = "SELECT DISTINCT stime, etime FROM course_schedule ORDER BY stime ASC";
$result = mysqli_query($connect, $sql);
$times = mysqli_fetch_all($result,MYSQLI_ASSOC);
// print_r($times);
//select the schedule
$sql2="SELECT *FROM course_schedule";
$result2 = mysqli_query($connect, $sql2);
$schedules = mysqli_fetch_all($result2,MYSQLI_ASSOC);

echo "<table>
 <tr><td><b>Time/Day</b></td>
";
foreach($days as $day){
    echo"<th>$day</th>";
}
echo "</tr>";

foreach ($times as $time) {

    $timeLabel = $time['stime'] . " - " . $time['etime'];

    echo "<tr>";
    echo "<td><b>$timeLabel</b></td>";

foreach($days as $day){
$coursename="";

foreach($schedules as $schedule ){
if($schedule['stime']==$time['stime']&&$schedule['etime']==$time['etime']&& $schedule['day']==$day){
$coursename=$schedule['name'];
break;}
}
echo "<td>".$coursename."</td>";
}  echo"</tr>"; }
 echo"</table>";
?>




</div>
</section>

</body>
</html>