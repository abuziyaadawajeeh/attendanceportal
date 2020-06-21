<?php
        include ("php/conn.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
</head>
<body>
    <form name="form" action="php/chatroom-faculty-util.php" method="POST">
	<label for="fname">To: </label>
        <input type="text" name="msgto" id="msgto">
	<label for="fname">Message: </label>
	<input type="text" name="msg" id="msg">
    </form>
    <button type="submit" form="form" value="Submit">Submit</button>
</body>
</html>