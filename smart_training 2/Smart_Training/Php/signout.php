<?php

session_start();
unset($_SESSION['student']);
unset($_SESSION['Email']);
unset($_SESSION['role']);
session_destroy();
header("Location:index.php");
?>