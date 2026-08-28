<?php
include "../Php/connect.php";
$id=$_GET['id'];
$sql="DELETE FROM course_schedule where id='$id'";
$result=mysqli_query($connect,$sql);
header("Location: schedule.php");
?>
