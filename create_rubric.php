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



<style type="text/css">
	
	article{
  margin-left: 225px;    
    padding: 1em;
    padding-top: 100px;
    overflow: hidden;
    height: 550px;
    background-color: white;
    width:1125px;


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
include 'dbConfig.php';
$rubricStatus = true;
$rubricLevelStatus = false;
$rubricParameterStatus = false;
$showRubric = false;
//session_start();

if(isset($_POST['submitRubricName'])){
	
	$rubricName = $_POST['rubricName']; 
	$tid = $_SESSION['teacher_id'];
	$db->query("INSERT INTO rubrics (rubricname,tid) VALUES ('".$rubricName."','".$tid."');");
	$rubricLevel = $rubricName."level".$tid;
	$rubricParameter = $rubricName."parameter".$tid;
	$_SESSION['rubricLevel'] = $rubricLevel;
	$_SESSION['rubricParameter'] = $rubricParameter;
	$db->query("CREATE TABLE ".$rubricLevel." (level_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(100), minGrade INT, maxGrade INT, PRIMARY KEY (level_id));");
	$db->query("CREATE TABLE ".$rubricParameter." (param_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(100), PRIMARY KEY (param_id));");
	$rubricStatus = false;
	$rubricLevelStatus = true;
	$rubricParameterStatus = false;
	$showRubric = false;
}

if(isset($_POST['submitLevel'])){
	$level = $_POST['level'];
	$minGrade = $_POST['minGrade'];
	$maxGrade = $_POST['maxGrade'];
	$tname = $_SESSION['rubricLevel'];
	$db->query("INSERT INTO ".$tname." (name, minGrade, maxGrade) VALUES ('".$level."','".$minGrade."','".$maxGrade."')");
	$rubricStatus = false;
	$rubricLevelStatus = true;
	$rubricParameterStatus = false;
	$showRubric = true;
}

if(isset($_POST['startParameter'])){
	$rubricStatus = false;
	$rubricLevelStatus = false;
	$rubricParameterStatus = true;
	$showRubric = true;
}

if(isset($_POST['addParameter'])){
	$parameter = $_POST['parameter'];
	$tname = $_SESSION['rubricParameter'];
	$db->query("INSERT INTO ".$tname." (name) VALUES ('".$parameter."')");
	$rubricStatus = false;
	$rubricLevelStatus = false;
	$rubricParameterStatus = true;
	$showRubric = true;
}

?>
<!DOCTYPE html>
<html>
<head>
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
	<title>Create Rubric</title>
</head>
<body>

<article id="main">
	<?php if($rubricStatus){ ?>
	<form method="POST" action="create_rubric.php">
		Rubric name: <input type="text" name="rubricName"><br><br>
		<input type="submit" name="submitRubricName" value="Create">
	</form>
	<?php } else if($rubricLevelStatus){ ?>
		
		<form method="POST" action="create_rubric.php">
			Enter Level: <input type="text" name="level"><br><br>
			Enter Min grade for Level: <input type="text" name="minGrade"><br><br>
			Enter Max grade for Level: <input type="text" name="maxGrade"><br><br>
			<input type="submit" name="submitLevel" value="Add level"><br><br>
		</form>
		<form method="POST" action="create_rubric.php">
			<input type="submit" name="startParameter" value="Submit Levels and add parameter">
		</form>

	<?php } else if($rubricParameterStatus){ ?>
		<form method="POST" action="create_rubric.php">
			Enter parameter: <input type="text" name="parameter">
			<input type="submit" name="addParameter" value="Add parameter">
		</form>
		<form method="POST" action="create_rubric.php">
			<input type="submit" name="finish" value="Finish">
		</form>
	<?php } ?>

	<?php if($showRubric) { ?>

		<table>
			<tr><td>Category</td>
			<?php 
				include 'dbConfig.php';
				
				$level = $_SESSION['rubricLevel'];
				$parameter = $_SESSION['rubricParameter'];
				$levelQuery = $db->query("SELECT * FROM ".$level."  ORDER BY level_id ASC");
				$parameterQuery = $db->query("SELECT * FROM ".$parameter."  ORDER BY param_id ASC");
        		if($levelQuery->num_rows > 0){ 
            		while($row = $levelQuery->fetch_assoc()){ ?>
			<td><?php echo $row['name']  ?>
			<?php }} ?></tr>
			<?php if($parameterQuery->num_rows > 0){
					while($row = $parameterQuery->fetch_assoc()){ ?>
			<tr><td><?php echo $row['name'] ?></td></tr>
			<?php }} ?>
		</table>
	
	<?php } ?>
	</article>
</body>
</html>