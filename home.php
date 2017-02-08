<?php
session_start();
include_once 'dbConfig.php';
?>
<!DOCTYPE html>
<html>
<head>
 <head>
<link rel="stylesheet" type="text/css" href="home.css">
   
    <title>Home</title>
    
</head>
<body>
<form>
    <?php if (isset($_SESSION['teacher_id'])) { ?>
    Signed in as <?php echo $_SESSION['teacher_name']; ?><br><br>
    
    <a href="home.php" target="abc" >Home</a><br>
    <a href="courses.php" target="abc">Manage courses</a><br>
    <a href="addstudent.php" target="abc" >Manage Students</a><br>
    <a href="create_rubric.php" target="abc">Manage Rubrics</a><br>    
    <a href="grading.php" target="abc">Start Grading</a><br><br>       
    <a href="javascript://" onclick="self.parent.location='logout.php'" target="abc">Logout</a>

    <?php } else { ?>
<br>
<br>
<center>
<a href="Login.php" class="button">Click to login</a>
<a href="Register.php" class="button">Click to Register</a>
</center>
<!-- <center><input type="button" value="Click to login" onclick="window.location.href='Login.php'"/>
    <input type="button" value="Click to Register" onclick="window.location.href='Register.php'"/></center> -->
    
<!--   You are not Logged in! Kindly <a href="login.php">login here</a><br>
    New user? <a href="register.php">Sign Up here</a> -->
    <?php } ?>
</form>
</body>
</html>