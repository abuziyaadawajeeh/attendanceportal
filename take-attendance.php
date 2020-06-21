<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Take Attendance</title>

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
    </style>
    <!-- Custom styles for this template -->
    <link href="css/takeattendance.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">IIITDM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard-faculty.php">Go Back <span class="sr-only">(current)</span></a>
        </li>
      </ul>
   
    </div>
  </nav>
</header>
    <form class="form-signin" action="" method="POST">
  <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please Enter Absentees</h1>
  <label for="inputEmail" class="sr-only">Course-id</label>
  <input type="text" id="inputEmail" name="cid" class="form-control" placeholder="Course-id" required autofocus>
  <label for="inputPassword" class="sr-only">Roll-No</label>
  <input type="text" id="inputPassword" name="rollno" class="form-control" placeholder="Roll-No" required>
  <label for="inputPassword" class="sr-only">Date</label>
  <input type="text" id="inputPassword" name="date" class="form-control" placeholder="Date" required>
  <div class="checkbox mb-3">
   
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="SendButton" type="submit">Submit</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2018 Batch</p>
</form>
<?php
include ("php/conn.php");
session_start();
if(isset($_POST['SendButton'])){
$cida=$_POST["cid"];
$rollnoa=$_POST["rollno"];
$datea=$_POST["date"];
$query5="insert into attendance (rollno, cid, date) values('$rollnoa','$cida','$datea');";
if ($conn->query($query5) === TRUE) {
  echo "Successfully Added";
} 
else
  echo "Error: " . $query5 . "<br>" . $conn->error;
}
?>
</body>
</html>
