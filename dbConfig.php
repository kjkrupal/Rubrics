<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'sushant';
$dbName = 'rubric';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

?>