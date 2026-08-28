<?php
include "connect.php";
if (isset($_POST['sign_up'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone =$_POST['phone'];
    $country =$_POST['country'];
    $city =$_POST['city'];
    $DOB =$_POST['DOB'];
    $gender =$_POST['gender'];
    $sqlcheck="SELECT * FROM users where email='$email'";
   $send=mysqli_query($connect,$sqlcheck);
  
if(mysqli_num_rows($send)>0){
echo "<script>alert('Error:An account was created with this email already')</script>";
}else{
    //only insert if there arent any  emails like the entered email.
$sql="INSERT INTO users(fname,lname,email,password,phone,country,city,DOB,gender,role) VALUES ('$fname','$lname','$email','$password','$phone','$country','$city','$DOB','$gender','user')";
$result=mysqli_query($connect,$sql);

if($result){

header("Location:signin.php");
}else{
        echo "Error".mysqli_error($connect);
}
}
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sign up</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleregister.css">

</head>

<body>
    <section id="sign_up">
        <div class="register_container">
            <legend>Sign Up</legend>

            <form action="" method="post">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" required>

                <br>
                <br>

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" required>

                <br>
                <br>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <br>
                <br>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <br>
                <br>



                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>

                <br>
                <br>

                <label for="country">Country</label>
                <input type="text" id="country" name="country" required>

                <br>
                <br>

                <label for="city">City</label>
                <input type="text" id="city" name="city" required>

                <br>
                <br>

                <label for="DOB">Date of Birth</label>
                <input type="date" id="DOB" name="DOB" required>

                <br>
                <br>

                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <br><br>

                <button type="submit" name="sign_up">Sign Up</button>

            </form>
        </div>

    </section>
</body>

</html>