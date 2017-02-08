<?php
//load the database configuration file
session_start();
include 'dbConfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Student data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}

if(isset($_GET['temp_id'])){
    deleteStudent($_GET['temp_id']);
}
if(isset($_POST['action'])){
    addStudent($_POST['name1'], $_POST['email1'], $_POST['phone1']);
}

if(isset($_POST['action1'])){
    
    if(isset($_POST['cname'])){
        include 'dbConfig.php';

        $tname = $_POST['cname'].$_SESSION['teacher_id'];
        $tid = $_SESSION['teacher_id'];
        
        $db->query("CREATE TABLE ".$tname." (student_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(100) NOT NULL, email VARCHAR(40) NOT NULL UNIQUE, phone VARCHAR(100) NOT NULL, PRIMARY KEY ( student_id ));");
        
        $db->query("INSERT INTO ".$tname." (name,email,phone) SELECT DISTINCT name,email,phone FROM temp_data WHERE teacher_id=".$_SESSION['teacher_id']);
        
        $db->query("DELETE FROM temp_data WHERE teacher_id = ".$_SESSION['teacher_id'].";");
        

        $db->query("INSERT INTO class (classname,tid) VALUES ('".$_POST['cname']."','".$_SESSION['teacher_id']."')");
    } 
    else{
        $classmsg = "Please enter name of class" ;
    }

}

function deleteStudent($id){
    //echo "DELETE FROM temp_data WHERE id=".$id;
    include 'dbConfig.php';
    $db->query("DELETE FROM temp_data WHERE temp_id=".$id);

}

function addStudent($name, $email, $phone){
        include 'dbConfig.php';
    $teacher_id = $_SESSION['teacher_id'];
    $db->query("INSERT INTO temp_data (name, email, phone, teacher_id) VALUES ('".$name."','".$email."','".$phone."','".$teacher_id."')");

}


?>
<!DOCTYPE html>
<html lang="en">

<body>
    <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
                
    <?php 
        if(!empty($statusMsg)){
            echo '<br><br><div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
        } 
    ?>

        <input type="file" name="file" />
        <input type="submit" name="importSubmit" value="IMPORT">
    </form>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //get rows query
                $query = $db->query("SELECT * FROM temp_data ORDER BY temp_id DESC");
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><a href="addstudent.php?temp_id=<?php echo $row['temp_id']; ?>">Delete</a> 
                <a href="Edit.php">Edit</a></td>
            </tr>
            <?php } } 
                else{ ?>
            <tr><td colspan="5">No member(s) found</td></tr>
            <?php } ?>
            <form action="addstudent.php" method="post">
                <tr>
                    <input type="hidden" name="action" value="add">
                    <td><input type="text" name="name1" required></td>
                <td><input type="email" name="email1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required></td>
                    <td><input type="tel" name="phone1"  required></td>
                    <td><input type="submit" value="ADD"></td>
                </tr>
            </form>

        </tbody>
    </table>
    <form action="addstudent.php" method="post">
        Class Name: <input type="text" name="cname" required >

    <?php 
        if(!empty($class)){
            echo ' <div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
        } 
    ?>
        <input type="hidden" name="action1" value="addclass" required>
        <br><br><input type="submit" name="submit" value="Add Class">
        <br><a href="manageclass.php">Back</a>
    </form>
</body>
</html>

