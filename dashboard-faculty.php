<?php
session_start();
if(!isset($_SESSION["fid"]) )
  header("Location:../login-faculty.php?loginproperly");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Faculty Portal</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body{
        background-image: linear-gradient(to right top, #58bfe0, #61abcb, #6597b5, #66849d, #627285, #627787, #647b89, #66808b, #719da0, #87b9ab, #acd3b0, #deeab5);
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">ATTENDANCE PORTAL </h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="#">Home</a>
        <a class="nav-link active" href="#">Take Attendance</a>&nbsp
        <a class="nav-link active" href="#">View Attendance</a>&nbsp
	<a class="nav-link active" href="#">Edit Attendance</a>&nbsp
	<a class="nav-link active" href="chat-history-faculty.php">Query</a>&nbsp
	<a class="nav-link active" href="./php/logout.php">Logout</a>&nbsp
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading">Hi 
	<?php 
	echo $_SESSION["name"]; 
	 ?></h1>
	
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
     <p>IIITDM</p>
    </div>
  </footer>
</div>
</body>
</html>
