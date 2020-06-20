<?php

$fid=$_POST["fid"];
$password=$_POST["password"];
$query = "select * from faculty where fid =?;";
include ("conn.php");
if($conn->error)
{
    header("Location:../index.php?dbconnerror");
    exit();
}
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query))
    header("location:../index.php?stmtpreparationfailed");
mysqli_stmt_bind_param($stmt, "s",$fid);
mysqli_stmt_execute($stmt);
// mysqli_stmt_store_result($stmt);
// $num=mysqli_stmt_num_rows($stmt);
// if($num==0)
//     header("Location:../index.php?registerfirst");
$result=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
if(!$row){
    header("Location:../index.php?message=registerfirst");

    exit();

}

else
{
    if(!password_verify($password,$row["pwd"])){
        header("Location:../index.php?message=incorrectpassword");
    
        exit();

    }
    else{
        session_start();
        $_SESSION["name"]=$row["name"];

        there: 
        include ("conn.php");

  
        header("location:../main.php?loginsuccessful?".$_SESSION["name"]");
        exit();
        }
        
        exit();
    }
}
