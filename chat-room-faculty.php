<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chat Room</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title">
						Send Message
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="fid" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="text" name="pass" placeholder="Message">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div style="display: none" id="message"><?php if(isset($_GET["message"]))
                                  echo $_GET["message"]; ?>
          
          </div> <br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="SendButton">
							Send
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
						</span>
						<a class="txt2" href="#">
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="chat-history-faculty.php">
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                        <a class="txt2" href="chat-history-faculty.php">
							Want to go back
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<?php
include ("php/conn.php");
session_start();

if(isset($_POST['SendButton'])){
$msgto=$_POST["fid"];
$msg=$_POST["pass"];
$query4="insert into chatroom (fid, uname, message, frm, msgto) values('".$_SESSION["fid"]."','$msgto','$msg','".$_SESSION["name"]."','$msgto');";
if ($conn->query($query4) === TRUE) {
  echo "Sent successfully";
} 
else
  echo "Error: " . $query4 . "<br>" . $conn->error;		
}
?>
	
<
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>