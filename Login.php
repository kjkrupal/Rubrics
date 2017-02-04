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
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.imgcontainer {
    text-align: center;
    margin: 22px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.password {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.password {
       display: block;
       float: none;
    }
}
</style>
<body>

<h2>Login</h2>

<form role="form" action="Login.php" method="post" name="loginform">
    <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label><b>email</b></label>
        <input type="text" placeholder="email" name="email" required>

        <label><b>password</b></label>
        <input type="password" placeholder="password" name="password" required>
        <center><input type="submit" name="login" value="Login"/></center>
    </div>
    New User? <a href="register.php">Sign Up Here</a>
</form>
    
    <?php if (isset($errormsg)) { echo $errormsg; } ?>
    
</body>
</html>