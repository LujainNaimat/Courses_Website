<?php
session_start();
include 'connect.php';
if (isset($_POST['sign_in'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users where email='$email' AND password='$password'";
  $result = mysqli_query($connect, $sql);
  $row = mysqli_fetch_assoc($result);
// print_r($row);

// exit;
  if (mysqli_num_rows($result) > 0) {
    $_SESSION['student'] = $row['fname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['role'] = $row['role'];
    //redirct to home page accrodingly to role
    if ($row['role'] == 'admin') {

      header("Location:../admin/home.php");
    } else {
      header("Location: index.php");
    }

  } else {
    echo "<script>alert('Invalid Email or password')</script>";
  }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/styleregister.css">

</head>

<body>
  <div class="register_container">
    <legend>Sign in</legend>
    <form action="" method="post">
      <label for="sign in">Email</label>
      <input type="email" name="email" required>
      <br><br>
      <label for="password ">password</label>
      <input type="password" name="password" required>
      <br><br>

      <button type="submit" name="sign_in">Sign in</button>

    </form>
  </div>

  <button><a href="signup.php">Dont have an account?</a></button>
</body>

</html>