<?php

session_start();
unset($_SESSION['student']);
unset($_SESSION['email']);
unset($_SESSION['pay']);
unset($_SESSION['role']);
session_destroy();
header("Location:index.php");
?>