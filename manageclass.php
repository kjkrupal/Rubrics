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



table, th, td{
    border: 0.5px solid black;
    border-collapse: collapse;
}
</style>
</head>
<body>
<nav id="nav">
<?php include("home.php"); ?>
</nav>
<article id="manin">
 

<a href="addstudent.php">
   <input type="button" value="Add Class"/>
</a>
<?php
//session_start();
include_once 'dbConfig.php';

if(isset($_GET['action'])){
	if(!strcmp($_GET['action'], "deleteStudent")){
		$student_id = $_GET['sid'];
		$class_id =  $_GET['cid'];
		$query1 = $db->query("SELECT classname FROM class WHERE tid=".$_SESSION['teacher_id']." AND cid=".$class_id);
		$className = $query1->fetch_assoc();
		$tableName = $className['classname'].$_SESSION['teacher_id'];
		$db->query("DELETE FROM ".$tableName." WHERE student_id=".$student_id.";");
	}
	if(!strcmp($_GET['action'], "deleteClass")){
		 $class_id =  $_GET['cid'];
		 $tname=$db->query("SELECT classname FROM class WHERE cid=".$class_id.";")->fetch_assoc();
		 $tableName=$tname['classname'].$_SESSION['teacher_id'];
		 $db->query("DELETE FROM class WHERE cid=".$class_id.";");
				 $db->query("DROP TABLE ".$tableName.";");
	}
}	
 	$classname=$db->query("SELECT classname,cid FROM class WHERE tid=". $_SESSION['teacher_id'] );  
 
   while($row = $classname->fetch_assoc()){
   		
   		?>
      <table>
      <h2><?php echo $row['classname'];?><span><a href="manageclass.php?action=deleteClass&cid=<?php echo $row['cid']; ?>">Delete</a></span></h2>
   		   		
   		<thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        
   		<?php
   		$tablename=$row['classname'].$_SESSION['teacher_id'];

   		$classdata=$db->query("SELECT * FROM ".$tablename);

   		if($classdata->num_rows > 0){
        while($rows = $classdata->fetch_assoc()){

   		?>	

   		
   			<tr>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['phone']; ?></td>
                <td><a href="manageclass.php?action=deleteStudent&sid=<?php echo $rows['student_id'];?>&cid=<?php echo $row['cid']; ?>">Delete</a></td>
            </tr>    
   		
   		<?php }}
   		
   }
?>
</table>
</article>
</body>
</html>