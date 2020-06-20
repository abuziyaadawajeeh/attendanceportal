<?php

// if(!isset($_POST['SUBMIT']))
//     header("Location:..\index.php?accessdenied");
$rollno=$_POST["rollno"];
$name=$_POST["name"];
$password=$_POST["password"];
$sno=$_POST["sem"];
$did=$_POST["did"];

// to connect to the db
include_once ("conn.php");
if($conn->connect_error){
        header("Location:../index.php?message=connectiontodbfailed1");
        exit();
}



// before signup the user make sure that the email is not already registered with

$query2="select rollno from student where rollno =?;";
include_once ("conn.php");
if($conn->connect_error)
    die("connection error:".$conn->connect_error);


$stmt2 = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt2,$query2))
    header("Location:../index.php?statementpreparationfailedforchecking");
mysqli_stmt_bind_param($stmt2,"s",$rollno);
mysqli_stmt_execute($stmt2);
mysqli_stmt_store_result($stmt2);

$count = mysqli_stmt_num_rows($stmt2);

if($count>0){
    header("Location:../index.php?message=emailalreadyregistered");
    exit();
}
mysqli_stmt_close($stmt2);

}


$hashedpassword= password_hash($password, PASSWORD_DEFAULT);
$query="insert into student (rollno, name, did, sno, pwd) values(?,?,?,?,?);";



//to execute a prepared statement
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$query)){
    header("Location:../index.php?statementpreparationfailed");
    exit();
}
mysqli_stmt_bind_param($stmt,"sssds",$rollno,$name,$did,$sno,$hashedpassword);
mysqli_stmt_execute($stmt);

if(!$conn->connect_error)
    header("Location:../index.php?message=registrationsuccesful");