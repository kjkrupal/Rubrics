<?php
session_start();

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
    margin: 24px 0 12px 0;
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
<head>
    <h1>User Registration</h1>
<body>

    <form role="form" action="Register.php" method="post" name="signupform">
        <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar"><br>
        Name: <input type="text" name="name" required value="<?php if($error) echo $name; ?>"/><br>
        <?php if (isset($name_error)) echo $name_error; ?>
                   
        Email: <input type="text" name="email" required value="<?php if($error) echo $email; ?>"/><br>
        <?php if (isset($email_error)) echo $email_error; ?>
                    
        Password: <input type="password" name="password" required/><br>
        <?php if (isset($password_error)) echo $password_error; ?>
                    
        Re-type Password: <input type="password" name="cpassword" required/><br>
        <?php if (isset($cpassword_error)) echo $cpassword_error; ?>
                    
            <center><input type="submit" name="signup" value="Sign Up"/></center><br>
                    
    </form>
    <?php if (isset($successmsg)) { echo $successmsg; } ?>
    <?php if (isset($errormsg)) { echo $errormsg; } ?>
          
    Already Registered? <a href="login.php">Login Here</a>
</head>
</body>
</html>
