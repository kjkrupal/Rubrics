<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
    header("Location: home.php");
}

include_once 'dbconnect.php';

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
        header("Location: home.php");
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
</head>
<body>

    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                    
        Email: <input type="text" name="email"/><br>
        Password: <input type="password" name="password"/>
        <input type="submit" name="login" value="Login" class="btn btn-primary" />
                    
    </form>
    
    <?php if (isset($errormsg)) { echo $errormsg; } ?>
    
    New User? <a href="register.php">Sign Up Here</a>

</body>
</html>