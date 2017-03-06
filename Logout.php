<?php
session_start();

if(isset($_SESSION['teacher_id'])) {
	session_unset();
    session_destroy();
    unset($_SESSION['teacher_id']);
    unset($_SESSION['teacher_name']);
    unset($_SESSION['ass_coid']);
    
    header("Location: login.php");
} else {
    header("Location: login.php");
}


?>

