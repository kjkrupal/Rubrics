<?php
session_start();
include 'dbConfig.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grading</title>
</head>
<body>
	<form>
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
	</form>
</body>
</html>
