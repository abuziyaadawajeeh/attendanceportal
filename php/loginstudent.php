<?php

$rollno=$_POST["roll"];
$password=$_POST["pass"];
$query = "select * from student where rollno =?;";
include ("conn.php");
if($conn->error)
{
    header("Location:../login-student.php?dbconnerror");
    exit();
}
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $query))
    header("location:../login-student.php?stmtpreparationfailed");
mysqli_stmt_bind_param($stmt, "s",$rollno);
mysqli_stmt_execute($stmt);
// mysqli_stmt_store_result($stmt);
// $num=mysqli_stmt_num_rows($stmt);
// if($num==0)
//     header("Location:../login-student.php?registerfirst");
$result=mysqli_stmt_get_result($stmt);
$row=mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
if(!$row){
    header("Location:../login-student.php?message=registerfirst");

    exit();

}

else
{
    if(!password_verify($password,$row["pwd"])){
        header("Location:../login-student.php?message=incorrectpassword");
    
        exit();

    }
    else{
        session_start();
        $_SESSION["rollno"]=$row["rollno"];
        $_SESSION["name"]=$row["name"];
	$_SESSION["sno"]=$row["sno"];
	$_SESSION["did"]=$row["did"];

        there: 
        include ("conn.php");

        $finalarray = array(); 
         function assarrpush($array, $key, $value){
            $array[$key]=$value;
            return $array;
        }
          function dostuff($cid){
        

            $sql= "SELECT date from attendance where cid=$cid and rollno='".$GLOBALS["rollno"]."' ";
            include ("conn.php");

            $rslt= mysqli_query($conn,$sql);
            $newarray = array();
            while($rows = mysqli_fetch_assoc($rslt))
                array_push($newarray, $rows["date"]);
            
            $GLOBALS["finalarray"] = assarrpush($GLOBALS["finalarray"], $cid, $newarray);
        }

        $query = " SELECT cid from course";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        while($row = mysqli_fetch_assoc($result)){
            dostuff($row["cid"]);
        }
        
       
      

        $_SESSION["dates"] = $finalarray;

  
        header("location:../dashboard-student.php?loginsuccessful?".$_SESSION["name"]);
        exit();
        }
        
        exit();
}
