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


if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}

include_once 'dbConfig.php';

$error = false;

if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
    
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if(mysqli_query($db, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>




<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css" type="text/css" />
<body>
    
    <div id="nav-Bar">
  <div id="nav-Frame">
    <div id="logo"> <a href="Login.php">Rubrics</a> </div>
    <div id="header-main-right">
      <div id="header-main-right-nav">
     <form role="form" action="Login.php" method="post" name="loginform">
          <table border="0" style="border:none">
            <tr>
              <td ><input type="text" tabindex="1"  id="email" placeholder="Email" name="email" class="inputtext radius1" value="" required></td>
              <td ><input type="password" tabindex="2" id="pass" placeholder="Password" name="password" class="inputtext radius1" required ></td>
              <form role="form" action="Login.php" method="post" name="loginform">
    </div>
              <td ><input type="submit" class="fbbutton" name="login" value="Login" /></td>
            </tr>
            <tr>
              <td><label>
              <td><label><a href="" style="color:#ccc; text-decoration:none">forgot password?</a></label></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<div class="loginbox radius">
  <h2 style="color:#141823; text-align:center;">Welcome to Rubrics</h2>
  <div class="loginboxinner radius">
    <div class="loginheader">
      <h4 class="title">SignUp with Us.</h4>
    </div>
    <!--loginheader-->
    <div class="loginform">
      <form role="form" action="Login.php" method="post" name="signupform">
        <p>
          <input type="text" id="firstname" name="name" placeholder="First Name" value="" class="radius" required />
        </p>
        <p>
          <input type="text" id="email" name="email" placeholder="Your Email" value="" class="radius" required />
        </p>
        <p>
          <input type="password" id="password" name="password" placeholder="New Password" class="radius" required />
        </p>
        <p>
          <input type="password" id="password" name="cpassword" placeholder="Re-Enter Password" class="radius" required />
        </p>
        <p>
          <button class="radius title" name="signup">Sign Up for Rubrics</button>
        </p>
      </form>
        <?php if (isset($errormsg)) { echo $errormsg; } ?>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
    
    <?php if (isset($errormsg)) { echo $errormsg; } ?>
    
</body>
</html>