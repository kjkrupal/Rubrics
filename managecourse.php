
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
                  <li><a href="manageclass.php"><i class="fa fa-home"></i> Manage Class <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="managecourse.php"><i class="fa fa-home"></i> Manage Courses <span class="fa fa-chevron-down"></span></a></li>
                  
                  <li><a href="create_rubric.php"><i class="fa fa-home"></i> Manage Rubrics <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="select_grading.php"><i class="fa fa-home"></i> Start Grading <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="feedback.php"><i class="fa fa-home"></i> Feedback <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="chart.php"><i class="fa fa-home"></i> Graph <span class="fa fa-chevron-down"></span></a></li>
                </ul>
              </div>
            
            <div class="sidebar-footer hidden-small">
        <!--      <a data-toggle="tooltip" data-placement="top" title="Settings">
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


<article id="main">
<a href="courses.php">
<input type="button" value="Add Course"/></a>
<?php
//session_start();
include 'dbConfig.php';


if(isset($_GET['action'] )){
	if(!strcmp($_GET['action'], "deleteCourse")){
		$cname=$_GET['cn']; 
		$db->query("DELETE FROM course WHERE coid=".$cname. ";"); 
	}
}

	$classname=$db->query("SELECT classname,cid FROM class WHERE tid=".$_SESSION['teacher_id']);   
   
   while($row = $classname->fetch_assoc())
   {
   	?>
   	
   	 <h2><?php echo $row['classname'];?></h2>
   
		<table style="width: 20%">   		
            <tr>
            <thead>
                <th><h4>Course</h4></th>
                <th><h4>Action</h4></th>
            </thead>
            </tr>
   <?php
	$course=$db->query("SELECT coursename, coid FROM course WHERE cid=".$row['cid']);
	while($row1 = $course->fetch_assoc())
	{
	 	?>	 	
	 	<tr>
	 	<td><h3><a href="viewassignment.php?id=<?php echo  $row1['coid']; ?>"><?php echo  $row1['coursename']; ?></a></h3></td>
	 	<td><a href="managecourse.php?action=deleteCourse&cn=<?php echo $row1['coid'];?>">Delete</a></td>
	 	</tr>
	 	
	<?php  } ?>
	 <br></table>
	 <?php 
	 } 
   ?>
	 </article>
</body>
</html>