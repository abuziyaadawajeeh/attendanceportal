<?php
        include ("php/conn.php");
	session_start();
	$query1 = "select uname from parent;";
	$statement1 = mysqli_query($conn, $query1);
	$query2 = "select fid,uname,message,frm,msgto from chatroom where fid = '".$_SESSION["fid"]."'";
	$statement2 = mysqli_query($conn, $query2);
    echo('<h2>Chat History</h2><table>');

    foreach($statement1 as $line)
    {
	foreach($statement2 as $line1)
	{
        if($line['uname'] == $line1['uname']) {
        echo('<tr><td>' . 'FROM:' . htmlspecialchars($line1['frm']));
	echo('</td><td>' . 'TO:' . htmlspecialchars($line1['msgto']));
        echo('</td><td>' . 'MESSAGE:' . htmlspecialchars($line1['message']).'</td></tr>'); }
	}
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form action="chatroom-faculty.php">
    <input type="submit" value="Go to Chat Room" />
</form>
 
</body>
</html>