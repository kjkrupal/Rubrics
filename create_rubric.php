<?php
include 'dbConfig.php';
$status = false;
session_start();

if(isset($_POST['submitRubricName'])){
	
	$rubricname = $_POST['rubricname']; 
	$tid = $_SESSION['teacher_id'];
	$db->query("INSERT INTO rubrics (rubricname,tid) VALUES ('".$rubricname."','".$tid."');");
	$status = true;
	$_SESSION['rubricname'] = $rubricname;
	$rubricLevel = $rubricname."level";
	$rubricParameter = $rubricname."parameter";
	$db->query("CREATE TABLE ".$rubricLevel." (level_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(100), grade INT, PRIMARY KEY (level_id));");
	$db->query("CREATE TABLE ".$rubricParameter." (param_id INT NOT NULL AUTO_INCREMENT, name VARCHAR(100), PRIMARY KEY (param_id));");
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
			<input type="text" name="">
		</form>

	<?php } ?>
</body>
</html>