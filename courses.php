<?php
    
    session_start();
    if(isset($_POST['submitCourse'])){
      $tid = $_SESSION['teacher_id'];
      $cname = $_POST['cname'];
      $cid = $_POST['cid'];
      $description = $_POST['description'];
      $sql = "INSERT INTO course (coursename, description, cid, tid) VALUES ('".$cname."', '".$description."', '".$cid."', '".$tid."')";
    }

?>
<!DOCTYPE html>
<html>
<body>

  <form action="courses.php" method="POST">
    Course name: <input type="text" name="cname" required/><br><br>
    Class name: 
    <select name="cid">
      <?php 
		    include 'dbConfig.php';
		    $query = $db->query("SELECT * FROM class  ORDER BY cid DESC");
        if($query->num_rows > 0){ 
          while($row = $query->fetch_assoc()){?>
            <option value="<?php echo $row['cid']; ?>"><?php echo $row['classname'];?></option>
            <?php }} else{ ?>
          <option value="none">No class created</option>
      <?php } ?>
    </select><br><br>
    <input type="submit" name="submitCourse" value="submit">
    <a href="managecourse.php">Back</a>
  </form>
</body>
</html>