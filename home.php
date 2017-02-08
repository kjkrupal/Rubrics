<?php
session_start();
include_once 'dbConfig.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
    ul {
   list-style-type: none;
    margin: 0;
    padding: 0;
    width: 15%;
    background-color: #00ff99;
    position: fixed;
    height: 100%;
    }

div{   
    display: block; 
    color:#b35900 ;
    padding: 8px 16px;
    font-size: 25px;
    }

div logout{
    color: cyan;
    font-size: 20px;
    padding: 8px 16px;
}    

li a {
    display: block;
    color: black;
    padding: 8px 16px;
    text-decoration: none;
    font-size: 25px;
}

li a.active {
    background-color: #ffd633;
    color: white;
}

li a:hover:not(.active) {
    background-color: #ffd633;
    color: white;
}

</style>

 <head>
<link rel="stylesheet" type="text/css" href="home.css">
<title>Home</title>

</head>
<body>
<form>
<ul> <div > <h3> 
    <?php if (isset($_SESSION['teacher_id'])) { ?>
    Welcome <?php echo $_SESSION['teacher_name']; ?></h3><br><br></div>
    

   <li><a href="home.php" >Home</a><br>     
    <li><a href="managecourse.php" >Manage Courses</a> <br></li>    
    <li><a href="manageclass.php"  >Manage Class</a> <br></li>
    <li> <a href="create_rubric.php" >Manage Rubrics</a> <br> </li>   
    <li><a href="select_grading.php" >Start Grading</a><br> </li>   <br><br><br><br>
    <div id="logout"><a href="javascript://" onclick="self.parent.location='logout.php'" >Logout</a><div1>

    
    <?php } else { ?>
<!--<center>
<a href="Login.php" class="button">Click to login</a>
<a href="Register.php" class="button">Click to Register</a>
</center>
    
<center><input type="button" value="Click to login" onclick="window.location.href='Login.php'"/>
    <input type="button" value="Click to Register" onclick="window.location.href='Register.php'"/></center> -->
    
<!--   You are not Logged in! Kindly <a href="login.php">login here</a><br>
    New user? <a href="register.php">Sign Up here</a> -->
    
    <?php } ?>
</form></ul> 
</body>
</html>