<!DOCTYPE html>
<html>
<body>

<form action="courseadd.php" method="post">
    <h1>Add Course</h1>
  Course name:<br>
<input type="text" name="cname" required class="form-control" />
  <br><br>
  Class name:<br>
<select name="classname">
	<?php 
		include '../dbConfig.php';
		$query = $db->query("SELECT * FROM class  ORDER BY cid DESC");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){?>
	<option value="<?php echo $row['cid']; ?>"><?php echo $row['classname'];?></option>
	<?php }} else{ ?>
	<option value="none">No class created</option>
	<?php } ?>
</select>
  <br><br>
  Course Description:<br>
  <textarea rows="4" name="tname" cols="20">
</textarea><br><br>
<input type="submit" name="submit" value="submit">
</form>

</body>
</html>
