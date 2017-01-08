<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}

include_once 'dbconnect.php';

$error = false;

if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    
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
        if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>

    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">

        Name: <input type="text" name="name" required value="<?php if($error) echo $name; ?>"/><br>
        <?php if (isset($name_error)) echo $name_error; ?>
                   
        Email: <input type="text" name="email" required value="<?php if($error) echo $email; ?>"/><br>
        <?php if (isset($email_error)) echo $email_error; ?>
                    
        Password: <input type="password" name="password" required/><br>
        <?php if (isset($password_error)) echo $password_error; ?>
                    
        Re-type Password: <input type="password" name="cpassword" required/><br>
        <?php if (isset($cpassword_error)) echo $cpassword_error; ?>
                    
        <input type="submit" name="signup" value="Sign Up"/>
                    
    </form>
    <?php if (isset($successmsg)) { echo $successmsg; } ?>
    <?php if (isset($errormsg)) { echo $errormsg; } ?>
          
    Already Registered? <a href="login.php">Login Here</a>
</body>
</html>