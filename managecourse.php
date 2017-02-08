<!DOCTYPE html>
<html>
<head>
	<title>Course</title>
</head>
<body>

<a href="courses.php">Add Course</a>
<?php
session_start();
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
   	?> <h2><?php echo $row['classname'];?></h2>
   <br>
		<table>
      		<thead>
            <tr>
                <th><h4>Course</h4></th>
                <th><h4>Action</h4></th>
            </tr>
      		</thead>
      </table>

   <?php
	$course=$db->query("SELECT coursename, coid FROM course WHERE cid=".$row['cid']);
	while($row = $course->fetch_assoc())
	{
	 	?><br>
	 	<table>
	 	<tr>
	 	<td><?php echo $row['coursename']; ?></td>
	 	<td><a href="managecourse.php?action=deleteCourse&cn=<?php echo $row['coid'];?>">Delete</a></td>
	 	</tr>
	 	</table>
	<?php  } ?>
	 <br>
	 <?php 
	 } ?>
</body>
</html>