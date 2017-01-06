

    <?php

    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */

    $link = mysqli_connect("localhost", "root", "sushant","testdb");

     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

     

    // Escape user inputs for security

    $cname = mysqli_real_escape_string($link, $_POST['cname']);

    $clname = mysqli_real_escape_string($link, $_POST['clname']);

    $tname = mysqli_real_escape_string($link, $_POST['tname']);

     

    // attempt insert query execution

    $sql = "INSERT INTO courses (cname, classname, coursedesc) VALUES ('$cname', '$clname', '$tname')";

    if(mysqli_query($link, $sql)){

        echo "Records added successfully.";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }

     

    // close connection

    mysqli_close($link);

    ?>

