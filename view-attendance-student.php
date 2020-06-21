<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>View Attendance</title>

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
      .go-to{
        background-image: linear-gradient(to right, #379628, #5aac31, #7bc23b, #9dd946, #bfef51);
        height:45px;
        border-radius:5px;
        margin-left:10px;
        font-weight: 500;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/grid.css" rel="stylesheet">
</head>
<body class="py-4">
<form action="dashboard-student.php">
    <input class="go-to" type="submit" value="Go Back → "/>
</form>
<div class="container" id="containers">
  
  
</div>

<div class="container themed-container">
<?php
        include ("php/conn.php");
	session_start();
	$query1 = "select cid,cname from course;";
	$statement1 = mysqli_query($conn, $query1);
	$query2 = "select * from attendance where rollno = '".$_SESSION["rollno"]."'";
	$statement2 = mysqli_query($conn, $query2);
    echo('<h2>Absent Dates :-</h2><table class="table table-dark">');

    foreach($statement1 as $line)
    {
	foreach($statement2 as $line1)
	{
        if($line['cid'] == $line1['cid']) {
	echo('<tr><td>' . 'COURSE NAME:' . htmlspecialchars($line['cname']));
	echo('</td><td>' . 'COURSE ID:' . htmlspecialchars($line['cid']));
        echo('</td><td>' . 'DATE:' . htmlspecialchars($line1['date']).'</td></tr>'); }
	}
     }
?> 
</div>
</body>
</html>  