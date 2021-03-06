<?php
//load the database configuration file
include 'dbConfig.php';
session_start();
if(isset($_POST['importSubmit'])){
    $sql = "";
    //validate whether uploaded file is a csv file
    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) == True){
                //check whether member already exists in database with same email
                $teacher_id = $_SESSION['teacher_id'];
                $prevQuery = "SELECT temp_id FROM temp_data WHERE email = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                if($prevResult->num_rows >= 1){
                    $sql = "UPDATE dbit SET name = '".$line[0]."', phone = '".$line[2]."', teacher_id = '".$teacher_id."' WHERE email = '".$line[1]."'" ;
                    $db->query($sql);
                }else{
                    
                        $sql = "INSERT INTO temp_data (name, email, phone, teacher_id) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$teacher_id."')" ;
                        $db->query($sql);
                    
                }
            }
            
            //close opened csv file
            fclose($csvFile);

            if($db->query($sql) == True){
                $qstring = '?status=succ';
            }
            

        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
header("Location: addstudent.php".$qstring);