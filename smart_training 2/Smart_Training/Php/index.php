<?php
include "connect.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home_Page</title>
    <meta name="author" content="Lujain">
<meta name="description" content="Welcome to Smart Training, your platform for professional learning, skill development, course enrollment, and career growth.">
<meta name="keywords" content="Smart Training, online learning, professional training, education, courses, skill development, career growth">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" type="text/css">
<script src="../Javascript/script.js"></script>
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dehaze" />

    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <section class="hero_video">
<video src="..//assets/video.mp4" autoplay muted loop ></video>      
    <div class="hero_text">
        <h1>Welcome to Smart Training Institute</h1>
        <p>Your future in technology starts here.</p>
        <div class="course-btn-container">
    <a href="courses.php" class="course-btn" >View Courses</a>
    
</div>
    </div>
</section>

    <section id="navigation">
       
    <?php include "navbar.php" ?>
    </section>
    <section="hero">

        <?php
        if(isset($_SESSION['student'])){ echo "welcome" . " " . $_SESSION['student'];}
        ?>
        </section>

   <section id="instructor">
        <?php include "instructors.php" ?>
    </section>
    <section id="why_choose_us">
    <div id="hero_img">
    <img src="/Smart_Training/assets/teamwork.png" alt="Our Team at Work">
    
    <div class="content-overlay">
        <h2>Why Choose Us?</h2>
        <ul class="features-list">
            <li>Multiple training classrooms</li>
            <li>Modern computer labs</li>
            <li>Online learning resources</li>
            <li>Certification preparation programs</li>
            <li>Professional workshops</li>
        </ul>
    </div>
</div>
</section>
    </div>
    <section id="social media">
<div id="social">

<a class="app" href="https://www.facebook.com/reg/?entry_point=aymh&next="><i class="fa-brands fa-facebook"></i></a>
<a class="app" href="https://www.instagram.com/accounts/emailsignup/"><i class="fa-brands fa-square-instagram"></i></a>
<a class="app" href="https://web.whatsapp.com/"><i class="fa-brands fa-whatsapp"></i></a>
<i class="fa-solid fa-xmark" id="close-btn" onclick="Social()"></i>

</div>
<i class="fa-solid fa-plus" id="plus-btn" onclick="Social()"></i>
</section>
<section class="testimonials">
    <h2>Student Success Stories</h2>
    
    <div class="testimonial-container">
        <div class="testimonial-card">
            <img src="../assets/student1.jpg" alt="Student photo" class="student-photo">
            <p class="quote">"The Web Development course helped me land my first job as a Junior Developer!"</p>
            <h3 class="name">Rami Ahmed</h3>
            <p class="title">Software Engineer at TechSolutions</p>
        </div>

        <div class="testimonial-card">
            <img src="../assets/student2.jpg" alt="Student photo" class="student-photo">
            <p class="quote">"The instructors at Smart Training Institute are industry experts. Highly recommended."</p>
            <h3 class="name">Omar Khalid</h3>
            <p class="title">Data Analyst at DataCorp</p>
        </div>
                <div class="testimonial-card">
            <img src="../assets/student3.jpg" alt="Student photo" class="student-photo">
            <p class="quote">"I transitioned into Cybersecurity thanks to the hands-on labs and expert mentoring."</p>
            <h3 class="name">Layla Noor</h3>
            <p class="title">Security Analyst at CyberGuard</p>
        </div>
    </div>
</section>
</body>

</html>