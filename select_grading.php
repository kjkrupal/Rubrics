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
                  <li><a href="managecourse.php"><i class="fa fa-home"></i> Manage Courses <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="manageclass.php"><i class="fa fa-home"></i> Manage Class <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="create_rubric.php"><i class="fa fa-home"></i> Manage Rubrics <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="select_grading.php"><i class="fa fa-home"></i> Start Grading <span class="fa fa-chevron-down"></span></a>
                  </li>
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
              </a>  -->
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
<?php
//session_start();
$dbName = 'rubric';
include 'dbConfig.php';

$classStatus = true;
$courseStatus = false;
$assignmentStatus = false;
$rubricStatus = false;

if(isset($_POST['submitClass'])){
	$_SESSION['grade_cid'] = $_POST['cid'];
	$classStatus = false;
	$courseStatus = true;
  $assignmentStatus = false;
	$rubricStatus = false;  
}

if(isset($_POST['submitCourse'])){
	$_SESSION['grade_coid'] = $_POST['coid'];
	$classStatus = false;
	$courseStatus = false;
  $assignmentStatus = true;
	$rubricStatus = false;   
}

if(isset($_POST['submitAssignment'])){
  $classStatus = false;
  $courseStatus = false;
  $assignmentStatus = false;
  $rubricStatus = true;

}

if(isset($_POST['submitRubrics'])){
	$_SESSION['grade_rid'] = $_POST['rid'];
	$classStatus = false;
	$courseStatus = false;
	$rubricStatus = false;
  $assignmentStatus = false;
	 $result=$db->query("SHOW TABLES FROM rubric ");
  $coid = $_SESSION['grade_coid'];
  $query1 = $db->query("SELECT coursename, coursetable, cid FROM course WHERE coid=".$coid)->fetch_assoc(); 
  $coursesn= $query1['coursename'];
  $coursesid = $coid; 
  $tablename = $query1['coursetable'];
  $classid=$query1['cid'];
  $tid=$_SESSION['teacher_id'];
  $ttable=$tid."_grade";
  $coursetable=$coursesn."_grade";
  //$abc=$cname.$_SESSION['teacher_id'];

  $query2 =$db->query("SELECT assignment_id, name FROM $tablename  ")->fetch_assoc();
  $assname=$query2['name'];
  $assid=$query2['assignment_id'];

  $stud="studnetgrade_".$classid.$coursesid.$assid;
  $rid=$_POST['rid'];
  $rubricid=$rid;
  $query2 =$db->query("SELECT rubricname FROM rubrics WHERE rid=".$rid)->fetch_assoc();
  $rubricParameter = $query2['rubricname']."parameter".$tid;
  $query3=$db->query("SELECT name FROM ".$rubricParameter );
  
  if($result==$ttable){

  }
  else{

    $db->query("INSERT INTO startgrading ( tid_grade) VALUES ('".$ttable."');");
    $db->query("CREATE TABLE " .$ttable." (tablegrade_id INT NOT NULL AUTO_INCREMENT, coursename VARCHAR(100),  coid int(11), PRIMARY KEY (tablegrade_id));");

     $db->query("INSERT INTO ".$ttable." ( coursename, coid) VALUES ('".$coursetable."','".$coursesid."');");
     $db->query("CREATE TABLE " .$coursetable." (coursegrade_id INT NOT NULL AUTO_INCREMENT, assignment_name VARCHAR(100),  assignment_id int(11), PRIMARY KEY (coursegrade_id));");

     $db->query("INSERT INTO ".$coursetable." ( assignment_name, assignment_id) VALUES ('".$assname."','".$assid."');");

     $sqlrubric1 = "CREATE TABLE ".$stud." (stgrade_id INT NOT NULL AUTO_INCREMENT, student_id INT, ";
     $sqlrubric2 = "";

     if($query3->num_rows > 0){
        while($rows = $query3->fetch_assoc()){

          $sqlrubric2 = $sqlrubric2.$rows['name']." INT, ";

        }
      }
      $sqlrubric = $sqlrubric1.$sqlrubric2."total INT, PRIMARY KEY (stgrade_id));";

      $db->query($sqlrubric);
   }
   
}

?>

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
</style>
    <title>Select Grading</title>
</head>
<body>
<article id="main">


	<?php if($classStatus){ ?>
	<form method="post" action="select_grading.php">
	Choose class: 
	<select name="cid">
		<option value="">--SELECT--</option>
			<?php
				$query = $db->query("SELECT * FROM class WHERE tid=".$_SESSION['teacher_id']);
				if($query->num_rows > 0){
					while ($row = $query->fetch_assoc()){
			?>
	
		<option value="<?php echo $row['cid']; ?>"><?php echo $row['classname'];?></option>
	
		<?php }} else { ?>
			<option value="">No Class Available</option>
		<?php } ?>
	</select>
	<input type="submit" name="submitClass" value="Submit">
	</form>


	
	<?php } else if($courseStatus){ ?>
	 <form method="post" action="select_grading.php">
	 Choose course: 
	 <select name="coid">
		<option value="">--SELECT--</option>
			<?php
				$query = $db->query("SELECT * FROM course WHERE cid=".$_POST['cid']);
				if($query->num_rows > 0){
					while ($row = $query->fetch_assoc()){

           ?>
	
		<option value="<?php echo $row['coid']; ?>"><?php echo $row['coursename'];?></option>
	
		<?php }} else { ?>
			<option value="">No Course Available</option>
		<?php } ?>
	</select>
  <?php
        $query = $db->query("SELECT * FROM course WHERE cid=".$_POST['cid']);
        if($query->num_rows > 0){
          while ($row = $query->fetch_assoc()){
      ?>
  <input type="hidden" name="coursetable" value="<?php echo $row['coursetable']?>">    
  <?php }} ?>    
	<input type="submit" name="submitCourse" value="Submit">
  <a href="select_grading"><input type="button" value="Back"/></a>
	</form>



  <?php } else if($assignmentStatus){ ?>
  <form method="post" action="select_grading.php">
  Choose assignment: 
  <select name="assignment_id">
    <option value="">--SELECT--</option>
      <?php
        $query = $db->query("SELECT * FROM ".$_POST['coursetable']);
        if($query->num_rows > 0){
          while ($row = $query->fetch_assoc()){

      ?>
  
    <option value="<?php echo $row['assignment_id']; ?>"><?php echo $row['name'];?></option>
  
    <?php }} else { ?>
      <option value="">No Assignment Available</option>
    <?php } ?>
  </select>
  <input type="submit" name="submitAssignment" value="Submit">
  <a href="select_grading"><input type="button" value="Back"/></a>
  </form>



	
	<?php } else if($rubricStatus){ ?>
	<form method="post" action="select_grading.php">
	Choose rubrics: 
	<select name="rid">
		<option value="">--SELECT--</option>
			<?php
				$query = $db->query("SELECT * FROM rubrics WHERE tid=".$_SESSION['teacher_id']);
				if($query->num_rows > 0){
					while ($row = $query->fetch_assoc()){
			?>
	
		<option value="<?php echo $row['rid']; ?>"><?php echo $row['rubricname'];?></option>
	
		<?php }} else { ?>
			<option value="">No Rubrics Available</option>
		<?php }?>
	</select>
	<input type="submit" name="submitRubrics" value="Submit">
	</form> 
  <?php  }?>
</article>
</body>
</html>