<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
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
  </head>


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
                  <li><a href="managecourse.php"><i class="fa fa-home"></i> Manage Courses <span class="fafa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="">View</a></li>
                      <li><a href="">Manage</a></li>
                      <li><a href="">Delete</a></li>
                    </ul>
                  </li>
                  <li><a href="manageclass.php"><i class="fa fa-home"></i> Manage Class <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="create_rubric.php"><i class="fa fa-home"></i> Manage Rubrics <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="select_grading.php"><i class="fa fa-home"></i> Start Grading <span class="fa fa-chevron-down"></span></a>
                  </li>
                </ul>
              </div>
            
           <div class="sidebar-footer hidden-small">
        <!--    <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
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


<article id="manin">
 

<a href="addstudent.php">
   <input type="button" value="Add Class"/>
</a>
<?php
//session_start();
include_once 'dbConfig.php';

if(isset($_GET['action'])){
	if(!strcmp($_GET['action'], "deleteStudent")){
		$student_id = $_GET['sid'];
		$class_id =  $_GET['cid'];
		$query1 = $db->query("SELECT classname FROM class WHERE tid=".$_SESSION['teacher_id']." AND cid=".$class_id);
		$className = $query1->fetch_assoc();
		$tableName = $className['classname'].$_SESSION['teacher_id'];
		$db->query("DELETE FROM ".$tableName." WHERE student_id=".$student_id.";");
	}
	if(!strcmp($_GET['action'], "deleteClass")){
		 $class_id =  $_GET['cid'];
		 $tname=$db->query("SELECT classname FROM class WHERE cid=".$class_id.";")->fetch_assoc();
		 $tableName=$tname['classname'].$_SESSION['teacher_id'];
		 $db->query("DELETE FROM class WHERE cid=".$class_id.";");
				 $db->query("DROP TABLE ".$tableName.";");
	}
}	
 	$classname=$db->query("SELECT classname,cid FROM class WHERE tid=". $_SESSION['teacher_id'] );  
 
   while($row = $classname->fetch_assoc()){
   		
   		?>
      <table>
      <h2><?php echo $row['classname'];?><span><a href="manageclass.php?action=deleteClass&cid=<?php echo $row['cid']; ?>">Delete</a></span></h2>
   		   		
   		<thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        
   		<?php
   		$tablename=$row['classname'].$_SESSION['teacher_id'];

   		$classdata=$db->query("SELECT * FROM ".$tablename);

   		if($classdata->num_rows > 0){
        while($rows = $classdata->fetch_assoc()){

   		?>	

   		
   			<tr>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['phone']; ?></td>
                <td><a href="manageclass.php?action=deleteStudent&sid=<?php echo $rows['student_id'];?>&cid=<?php echo $row['cid']; ?>">Delete</a></td>
            </tr>    
   		
   		<?php }}
   		
   }
?>
</table>
</article>
</body>
</html>