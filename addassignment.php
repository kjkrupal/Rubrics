<!DOCTYPE html>
<html>
<head>
	<title>
		addassignemnt
	</title>
</head>
<body>

<?php
session_start();
include 'dbConfig.php'; 


if(isset($_POST['action1'])){
	if(!isset($_POST['submit'])){

	$cname=$db->query("SELECT coursename FROM course")->fetch_assoc();
	$course = implode($cname);
	$coursetable= $course.$_SESSION['teacher_id'];
	$aname = $_POST['aname'];
	$deadline= $_POST['deadline'];
	$db->query("INSERT INTO ".$coursetable." (name, Deadline) VALUES ('".$_POST['aname']."', '".$_POST['deadline']."')");
    
		}
		else{
			echo "Please enter required fields";
		}
	}
?>

	<form action="addassignment.php" method="post">
	<input type="hidden" name="action1" value="submit">
	Name: <input type="text" name="aname" required><br>
	Deadline: <input type="date" name="deadline"><br>
	<input type="submit" name="assignmentssubmit" value="submit">
		<a href="viewassignment.php">Back</a>
	</form>
</body>
</html>