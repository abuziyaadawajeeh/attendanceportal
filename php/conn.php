<?php
//file to establish connection with the database
$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="test";

$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if($conn->error)
    header("Location:../signup-student.php?databaseconnectionerror");
