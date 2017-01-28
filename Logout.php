<?php
session_start();

if(isset($_SESSION['teacher_id'])) {
	session_unset();
    session_destroy();
    unset($_SESSION['teacher_id']);
    unset($_SESSION['teacher_name']);
    header("Location: index.php");
} else {
    header("Location: login.php");
}


?>

