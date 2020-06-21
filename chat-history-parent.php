<?php
        include ("php/conn.php");
	session_start();
	$query1 = "select fid,name from faculty;";
	$statement1 = mysqli_query($conn, $query1);
	$query2 = "select fid,uname,message,frm,msgto from chatroom where uname = '".$_SESSION["uname"]."'";
	$statement2 = mysqli_query($conn, $query2);
    echo('<h2>Chat History</h2><table>');

    foreach($statement1 as $line)
    {
	foreach($statement2 as $line1)
	{
        if($line['fid'] == $line1['fid']) {
        echo('<tr><td>' . 'FROM:' . htmlspecialchars($line1['frm']));
	echo('</td><td>' . 'TO:' . htmlspecialchars($line1['msgto']));
        echo('</td><td>' . 'MESSAGE:' . htmlspecialchars($line1['message']).'</td></tr>'); }
	}
     }
?>