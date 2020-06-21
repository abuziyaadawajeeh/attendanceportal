<?php
        include ("php/conn.php");
	session_start();
	$query2 = "select fid,uname,message from chatroom where uname = '".$_SESSION["uname"]."'";
	$statement = mysqli_query($conn, $query2);
    echo('<h2>Chat Room</h2><table>');

    foreach($statement as $line)
    {
        echo('<tr><td>' . htmlspecialchars($line['fid']));
	echo('</td><td>' . htmlspecialchars($line['uname']));
        echo('</td><td>' . htmlspecialchars($line['message']).'</td></tr>');
    }

    ?>