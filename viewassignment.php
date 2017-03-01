
<!DOCTYPE html>
<html>
<head>

<style>
article{
  margin-left: 225px;    
    padding: 1em;
    padding-top: 100px;
    overflow: hidden;
    height: 550px;
    background-color: white;
    width:1125px;
}

table, th, td{
    border: 0.5px solid black;
    border-collapse: collapse;
}
</style>

</head>
<body>



<?php
session_start();
include 'dbConfig.php';
?>

<?php
   // $row=$_SESSION['$coid']; 
   $course=$db->query("SELECT coursename, coid FROM course");
   $row = $course->fetch_assoc()

    ?>

<a href="addassignment.php?id=<?php echo  $row['coid']; ?>">Add Assignment</a>
<br><br>
<table>
	<tbody>
        <td>SR_NO</td>
		<td>Name</td>
		<td>Deadline</td><br>
        <a href="managecourse.php">Back</a>
			
	</tbody>
</table>

</body>
=======
<!DOCTYPE html>
<html>
<head>

<style>
article{
  margin-left: 225px;    
    padding: 1em;
    padding-top: 100px;
    overflow: hidden;
    height: 550px;
    background-color: white;
    width:1125px;
}

table, th, td{
    border: 0.5px solid black;
    border-collapse: collapse;
}
</style>

</head>
<body>
<a href="addassignment.php">Add Assignment</a>

<?php
session_start();
include 'dbConfig.php';
?>

<br><br>
<table>
	<tbody>
		<td>Name</td>
		<td>Deadline</td>
			
	</tbody>
</table>

</body>

</html>