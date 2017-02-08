<?php
//session_start();
include 'dbConfig.php';

$classStatus = true;
$courseStatus = false;
$rubricStatus = false;

if(isset($_POST['submitClass'])){
	$_SESSION['grade_cid'] = $_POST['cid'];
	$classStatus = false;
	$courseStatus = true;
	$rubricStatus = false;
}

if(isset($_POST['submitCourse'])){
	$_SESSION['grade_coid'] = $_POST['coid'];
	$classStatus = false;
	$courseStatus = false;
	$rubricStatus = true;
}

if(isset($_POST['submitRubrics'])){
	$_SESSION['grade_rid'] = $_POST['rid'];
	$classStatus = false;
	$courseStatus = false;
	$rubricStatus = false;
	header("Location: grading.php");
}

?>
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
</style>
    <title>Select Grading</title>
</head>
<body>
	<nav id="nav">
<?php include("home.php"); ?>
</nav>
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
				$query = $db->query("SELECT * FROM course WHERE tid=".$_SESSION['teacher_id']);
				if($query->num_rows > 0){
					while ($row = $query->fetch_assoc()){
			?>
	
		<option value="<?php echo $row['coid']; ?>"><?php echo $row['coursename'];?></option>
	
		<?php }} else { ?>
			<option value="">No Course Available</option>
		<?php } ?>
	</select>
	<input type="submit" name="submitCourse" value="Submit">
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
		<?php } ?>
	</select>
	<input type="submit" name="submitRubrics" value="Submit">
	</form>
	<?php }  ?>
</article>
</body>
</html>
