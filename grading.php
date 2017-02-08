<?php
session_start();
include 'dbConfig.php';

$classStatus = true;
$courseStatus = false;
$rubricStatus = false;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grading</title>
</head>
<body>
	<form>
		<?php if($classStatus){ ?>
		Choose class: 
		<select>
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
		<?php } else if($courseStatus){ ?>
		Choose course: 
		<select>
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
		<?php } else if($rubricStatus){ ?>
		Choose rubrics: 
		<select>
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
		<?php } else if($courseStatus){ ?>
	</form>
</body>
</html>
