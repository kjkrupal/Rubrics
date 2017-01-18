<?php
include 'dbConfig.php';
$status = false;
$parameterstatus = false;
session_start();

if(isset($_POST['submitRubricName'])){
	
	$rubricname = $_POST['rubricname']; 
	$tid = $_SESSION['teacher_id'];
	$db->query("INSERT INTO rubrics (rubricname,tid) VALUES ('".$rubricname."','".$tid."');");
	$status = true;
	$rubricLevel = $rubricname."level".$tid;
	$rubricParameter = $rubricname."parameter".$tid;
	$_SESSION['rubricname'] = $rubricLevel;
	$db->query("CREATE TABLE ".$rubricLevel." (level_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(100), grade INT, PRIMARY KEY (level_id));");
	$db->query("CREATE TABLE ".$rubricParameter." (param_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(100), PRIMARY KEY (param_id));");
}

if(isset($_GET['action'])){
	$level = $_POST['level'];
	$grade = $_POST['grade'];
	$tname = $_SESSION['rubricname'];
	$db->query("INSERT INTO ".$tname." (name, grade) VALUES ('".$level."','".$grade."')");
	$status = true;
}

if(isset($_POST['submitLevel'])){
	$parameterstatus = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Rubric</title>
</head>
<body>
	<?php if(!$status){ ?>
	<form method="POST" action="create_rubric.php">
		Rubric name: <input type="text" name="rubricname"><br><br>
		<input type="submit" name="submitRubricName" value="Create">
	</form>
	<?php } else { ?>
		
		<form method="POST" action="create_rubric.php">
			Enter Level: <input type="text" name="level"><br><br>
			Enter grade for Level: <input type="text" name="grade"><br><br>
			<a href="create_rubric.php?action=level">Add Level</a>
			<input type="submit" name="submitLevel" value="Submit and Add Parameter">
		</form>

	<?php } if($parameterstatus){ ?>

		<form method="POST" action="create_rubric.php">
			Enter Parameter: <input type="text" name="level"><br><br>
			<input type="submit" name="submitParameter" value="Add Parameter">
		</form>

	<?php } ?>

</body>
</html>