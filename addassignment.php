<?php  
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		addassignemnt
	</title>
</head>
<body>

<?php
include 'dbConfig.php';

if(isset())

?>

	<form action="addassignemnt.php" method="post">
	Name: <input type="text" name="aname" required><br>
	Deadline: <input type="date" name="deadline"><br>
	<input type="submit" name="assignmentssubit" value="submit">
	<a href="viewassignment.php">Back</a>

</form>

</body>
</html>