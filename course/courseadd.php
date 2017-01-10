<?php

    
    //Escape user inputs for security

    $cname = mysqli_real_escape_string($db, $_POST['cname']);

    $clname = mysqli_real_escape_string($db, $_POST['clname']);

    $tname = mysqli_real_escape_string($db, $_POST['tname']);

    $sql = "INSERT INTO courses (cname, classname, coursedesc) VALUES ('$cname', '$clname', '$tname')";

    if(mysqli_query($db, $sql)){

        echo "Records added successfully.";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);

    }

?>

