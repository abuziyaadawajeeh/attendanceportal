<?php

$rollno=$_POST["child-roll-no"];
$password=$_POST["pass"];
$query = "select * from parent where rollno =?;";
include ("conn.php");
if($conn->error)
{
    header("Location:../login-parents.php?dbconnerror");
    exit();
}
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query))
    header("location:../login-parents.php?stmtpreparationfailed");
mysqli_stmt_bind_param($stmt, "s",$rollno);
mysqli_stmt_execute($stmt);
// mysqli_stmt_store_result($stmt);
// $num=mysqli_stmt_num_rows($stmt);
// if($num==0)
//     header("Location:../login-parents.php?registerfirst");
$result=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
if(!$row){
    header("Location:../login-parents.php?message=registerfirst");

    exit();

}

else
{
    if(!password_verify($password,$row["pwd"])){
        header("Location:../login-parents.php?message=incorrectpassword");
    
        exit();

    }
    else{
        session_start();
        $_SESSION["rollno"]=$row["rollno"];
        $_SESSION["uname"]=$row["uname"];

        there: 
        include ("conn.php");

  
        header("location:../dashboard-parent.php?loginsuccessful?".$_SESSION["uname"]);
        exit();
        }
        
        exit();
}
