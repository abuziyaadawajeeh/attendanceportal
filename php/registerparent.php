<?php


$rollno=$_POST["Roll-no"];
$username=$_POST["name"];
$password=$_POST["password"];

// to connect to the db
include_once ("conn.php");
if($conn->connect_error){
        header("Location:../signup-parents.php?message=connectiontodbfailed1");
        exit();
}



// before signup the user make sure that the email is not already registered with

$query2="select rollno from parent where rollno =?;";
include_once ("conn.php");
if($conn->connect_error)
    die("connection error:".$conn->connect_error);


$stmt2 = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt2,$query2))
    header("Location:../signup-parents.php?statementpreparationfailedforchecking");
mysqli_stmt_bind_param($stmt2,"s",$rollno);
mysqli_stmt_execute($stmt2);
mysqli_stmt_store_result($stmt2);

$count = mysqli_stmt_num_rows($stmt2);

if($count>0){
    header("Location:../signup-parents.php?message=alreadyregistered");
    exit();
}
mysqli_stmt_close($stmt2);


$hashedpassword= password_hash($password, PASSWORD_DEFAULT);
$query="insert into parent (uname, rollno, pwd) values(?,?,?);";



//to execute a prepared statement
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$query)){
    header("Location:../signup-parents.php?statementpreparationfailed");
    exit();
}
mysqli_stmt_bind_param($stmt,"sss",$username,$rollno,$hashedpassword);
mysqli_stmt_execute($stmt);

if(!$conn->connect_error)
    header("Location:../login-parents.php?message=registrationsuccesful");
