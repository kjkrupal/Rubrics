<?php
session_start();
include_once 'dbConfig.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rubrics</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

<style>
article{
  margin-left: 225px;    
    padding: 1em;
    padding-top: 100px;
    overflow: hidden;
    height: 550px;
    background-color: white;
    width:1125px;
    
}

table, th, td{
    border: 0.5px solid black;
    border-collapse: collapse;
}
</style>

</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="home.php" class="site_title"><i class="fa fa-paw"></i> <span>Rubrics</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              
              <div class="profile_info">
                <span>Welcome,</span>
                <h2> <?php if (isset($_SESSION['teacher_id'])) { ?><?php echo $_SESSION['teacher_name']; ?></h3><br><br></h2>
              </div>
            </div>


            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="home.php" ><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="manageclass.php"><i class="fa fa-home"></i> Manage Class <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="managecourse.php"><i class="fa fa-home"></i> Manage Courses <span class="fa fa-chevron-down"></span></a></li>
                  
                  <li><a href="create_rubric.php"><i class="fa fa-home"></i> Manage Rubrics <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="select_grading.php"><i class="fa fa-home"></i> Start Grading <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="feedback.php"><i class="fa fa-home"></i> Feedback <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="chart.php"><i class="fa fa-home"></i> Graph <span class="fa fa-chevron-down"></span></a></li>
                </ul>
              </div>
            
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="javascript://" onclick="self.parent.location='logout.php'" >
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            </div>
            </div>
            </div>

            <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   
                    <span class=" fa fa-angle-down"><?php echo $_SESSION['teacher_name']; ?></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>   


    
    <?php }?>
<article>

<?php
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
        <a href="manageclass.php"><input type="button" value="Back" > </a>
    </form>
</article>
</body>
</html>

