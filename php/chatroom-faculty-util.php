<?php
		include ("php/conn.php");
		session_start();
		//$a=$_POST["msgto"];
		//$b=$_POST["msg"];
		$query3="insert into chatroom (fid, uname, message, frm, msgto) values('".$_SESSION["fid"]."','".$_SESSION["fid"]."','".$_SESSION["fid"]."','".$_SESSION["name"]."','".$_SESSION["fid"]."');";
		if (mysqli_query($conn, $query3)) {
		header("Location:../chatroomfaculty.php?Messagesentsuccessfully");
		} 
		else {
			
		  header("Location:../chatroom-faculty.php?databaseconnectionerror");
		}
		
?>