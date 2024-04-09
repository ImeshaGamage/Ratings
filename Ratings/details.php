<?php
require 'connect.php';

if(isset($_GET['i'])){
    $ID=$_GET['i'];
}

$sql="SELECT*FROM teachers WHERE T_id='$ID'";
$query=mysqli_query($connection, $sql);

$row1=mysqli_fetch_array($query);
$sid=$row1['subject'];
$rate=$row1['rate'];  

$sql2="SELECT*FROM subjects WHERE sub_id='$sid'";
$query2=mysqli_query($connection, $sql2);

$row2=mysqli_fetch_array($query2);



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Details</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="detailscss.css" />

  <style>
        .rating-bar {
            width: 600px; /* Total width of the rating bar */
            height: 30px; /* Height of the rating bar */
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            overflow: hidden;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .filled-bar {
            height: 100%;
            background-color: #ff9800; /* Color for filled portion */
            /* width:70px; */
        }
        span{
            color: black;
            font-family:cursive;
        }
    </style>

</head>

<body>
    <header>
        <img class="logo" src="logo.png">
        <h1>Micro Academic Institute</h1>

        <nav class="navigation">
            <a href="Home.php#home">Home</a>
        </nav> 
    </header>
<div class="title">
    <h2>Teacher Details</h2>
</div>
<br>
<div class="main-box">
    <fieldset>

        <div class="rating-bar">
            <div class="filled-bar" style="width: <?php echo $rate; ?>%;"></div><br>
        </div>
        <span><?php echo $rate; ?>%</span>
        <br><br>
      <label>Teacher Name: </label>  <label class="details"><?php echo $row1['T_name'] ?></label><br><br>
      <label>Subject: </label> <label class="details"><?php echo $row2['sub_name'] ?></label><br><br>
      <label>Teacher qualification: </label> <label class="details"><?php echo $row1['qualification'] ?></label><br><br>
      <label>Phone Number: </label> <label class="details"><?php echo $row1['phone_no'] ?></label><br><br>
      <label>Class date: </label> <label class="details"><?php echo $row1['class_date'] ?></label><br><br>
      <label>Class Time: </label> <label class="details"><?php echo $row1['class_time'] ?></label><br><br>
      <label>Class Room Number: </label> <label class="details"><?php echo $row1['class_no'] ?></label><br><br>
      <label>Number of rates: </label> <label class="details"><?php echo $row1['rate_no'] ?></label><br><br>

    </fieldset>
</div>
    
    

</body>

</html>