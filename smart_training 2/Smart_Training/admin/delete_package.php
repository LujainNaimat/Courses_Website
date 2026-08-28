<?php
include "../Php/connect.php";
$id=$_GET['id'];
$sql="DELETE FROM packages where id='$id'";
$result=mysqli_query($connect,$sql);
header("Location: package.php");
?>
