<?php
session_start();
include_once '../dbConfig.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

    <?php if (isset($_SESSION['teacher_id'])) { ?>
    Signed in as <?php echo $_SESSION['teacher_name']; ?><br><br>
    
    <a href="../course/courses.php">Manage courses</a><br>
    <a href="../addstudent.php">Manage Students</a><br>
    <a href="">Manage Rubrics</a><br>
    <a href="">Start Grading</a><br><br>
    <a href="logout.php">Log Out</a>
    <?php } else { ?>
    You are not Logged in! Kindly <a href="login.php">login here</a><br>
    New user? <a href="register.php">Sign Up here</a>
    <?php } ?>

</body>
</html>