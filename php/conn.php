or references in the same repository. Learn more

<?php
//file to establish connection with the database
$dbservername="localhost";
$dbusername="id13504856_admin";
$dbpassword="\jBHKy_49H?!_Ibz";
$dbname="id13504856_cgpaa";

$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if($conn->error)
    header("Location:../index.php?databaseconnectionerror");