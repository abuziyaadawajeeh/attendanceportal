<?php

$fid=$_POST["fid"];
$password=$_POST["pass"];
$query = "select * from faculty where fid =?;";
include ("conn.php");
if($conn->error)
{
    header("Location:../login-faculty.php?dbconnerror");
    exit();
}
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query))
    header("location:../login-faculty.php?stmtpreparationfailed");
mysqli_stmt_bind_param($stmt, "s",$fid);
mysqli_stmt_execute($stmt);
// mysqli_stmt_store_result($stmt);
// $num=mysqli_stmt_num_rows($stmt);
// if($num==0)
//     header("Location:../login-faculty.php?registerfirst");
$result=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
if(!$row){
    header("Location:../login-faculty.php?message=registerfirst");

    exit();

}

else
{
    if(!password_verify($password,$row["pwd"])){
        header("Location:../login-faculty.php?message=incorrectpassword");
    
        exit();

    }
    else{
        session_start();
        $_SESSION["name"]=$row["name"];
	$_SESSION["fid"]=$row["fid"];
	$_SESSION["did"]=$row["did"];
        there: 
        include ("conn.php");

  
        header("location:../dashboard-faculty.php?loginsuccessful?".$_SESSION["name"]);
        exit();
        }
        
        exit();
}
