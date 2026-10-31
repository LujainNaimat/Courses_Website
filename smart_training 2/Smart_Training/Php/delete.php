<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
include"connect.php";
$id=$_GET['id'];
$sql="DELETE from orders where id=$id";
$result=mysqli_query($connect,$sql);
$check = isset($_GET['from']) ? $_GET['from'] : '';
if($check=='cart'){
  header("Location: cart.php");
}
else if($check=='courses'){
  header("Location: courses.php");
}
else{
  header("Location: mycourses.php");
}
exit();
?>
</body>
</html>
