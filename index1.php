<?php
//load the database configuration file
include 'dbConfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
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

if(isset($_GET['id'])){
    deleteStudent($_GET['id']);
}
if(isset($_POST['action'])){
    addStudent($_POST['name1'], $_POST['email1'], $_POST['phone1']);
}

function deleteStudent($id){
    //echo "DELETE FROM members WHERE id=".$id;
    include 'dbConfig.php';
    $db->query("DELETE FROM members WHERE id=".$id);

}

function addStudent($name, $email, $phone){
    //echo "DELETE FROM members WHERE id=".$id;
    include 'dbConfig.php';
    $db->query("INSERT INTO members (name, email, phone) VALUES ('".$name."','".$email."','".$phone."')");

}


?>
<!DOCTYPE html>
<html lang="en">

<body>

<div class="container">
    
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Members list
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Import Members</a>
        </div>
        <div class="panel-body">
            <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
            <table class="table table-bordered">
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
                    $query = $db->query("SELECT * FROM members ORDER BY id DESC");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){
                        ?>
                    <tr>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><a href="index1.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No member(s) found</td></tr>
                    <?php } ?>
                    <form action="index1.php" method="post">
                        <tr>
                            <input type="hidden" name="action" value="add">
                            <td><input type="text" name="name1"></td>
                            <td><input type="text" name="email1"></td>
                            <td><input type="text" name="phone1"></td>
                            <td><input type="submit" value="ADD"></td>
                        </tr>
                    </form>
                </tbody>

            </table>
        </div>
    </div>
</div>

</body>
</html>