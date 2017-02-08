<?php
session_start();

if(isset($_SESSION['teacher_id'])!="") {
    header("Location: home.php");
}

include_once 'dbConfig.php';

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $result = mysqli_query($db, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['teacher_id'] = $row['teacher_id'];
        $_SESSION['teacher_name'] = $row['name'];
        header("Location: home.php");
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>Login</h2>

<form role="form" action="Login.php" method="post" name="loginform">
    </div>

    <div class="container">
        <label><b>email</b></label>
        <input type="text" placeholder="email" name="email" required><br>

        <label><b>password</b></label>
        <input type="password" placeholder="password" name="password" required><br>
        <input type="submit" name="login" value="Login"/>
    </div>
    New User? <a href="register.php">Sign Up Here</a>
</form>
    
    <?php if (isset($errormsg)) { echo $errormsg; } ?>
    
</body>
</html>