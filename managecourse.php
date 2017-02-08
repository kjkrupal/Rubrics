<!DOCTYPE html>
<html>
<head>

<style>

nav{
	float:left;
	height: 100%;
	width: 200px;
	
}

article{
	margin-left: 250px;    
    padding: 1em;
    overflow: hidden;
}

table, th, td{
    border: 0.5px solid black;
    border-collapse: collapse;
}
</style>

	<title>Course</title>
</head>

<body>
<nav id="nav">
<?php include("home.php"); ?>
</nav>

<article id="main">
<button type="button" onclick="courses.php">Add Course</button>
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
	while($row = $course->fetch_assoc())
	{
	 	?>	 	
	 	<tr>
	 	<td><h3><?php echo  $row['coursename']; ?></h3></td>
	 	<td><a href="managecourse.php?action=deleteCourse&cn=<?php echo $row['coid'];?>">Delete</a></td>
	 	</tr>
	 	
	<?php  } ?>
	 <br></table>
	 <?php 
	 } ?>
	 </article>
</body>
</html>