<?php
include 'dbConfig.php';
$rubricStatus = true;
$rubricLevelStatus = false;
$rubricParameterStatus = false;
$showRubric = false;
session_start();

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
	<title>Create Rubric</title>
</head>
<body>
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
			<tr><td></td><td></td></tr>
		</table>
	
	<?php } ?>
</body>
</html>