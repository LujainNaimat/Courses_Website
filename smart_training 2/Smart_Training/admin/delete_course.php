<?php
include "../Php/connect.php";
$id=$_GET['id'];
$sql="DELETE FROM services where id='$id'";
$result=mysqli_query($connect,$sql);
header("Location: course.php");
?>
