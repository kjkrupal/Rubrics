<?php
include 'dbConfig.php';
session_start();

if(isset($_POST['submit'])){
	
	$rubricname = $_POST['rubricname']; 
	$tid = $_SESSION['teacher_id'];
	$db->query("INSERT INTO rubrics (rubricname,tid) VALUES ('".$rubricname."','".$tid."');");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Rubric</title>
</head>
<body>
	<form method="POST" action="create_rubric.php">
		Rubric name: <input type="text" name="rubricname"><br><br>
		<input type="submit" name="submit" value="Create">
	</form>
</body>
</html>