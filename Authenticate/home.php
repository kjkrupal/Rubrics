<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

    <?php if (isset($_SESSION['usr_id'])) { ?>
    Signed in as <?php echo $_SESSION['usr_name']; ?>
    <a href="logout.php">Log Out</a>
    <?php } else { ?>
    You are not Logged in! Kindly <a href="login.php">login here</a><br>
    New user? <a href="register.php">Sign Up here</a>
    <?php } ?>

</body>
</html>