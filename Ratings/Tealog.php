<?php
require 'connect.php';

session_start();

$id=$_SESSION["username"];

$sql1="SELECT subjects.sub_name FROM teachers,subjects WHERE teachers.T_id='$id' && teachers.subject=subjects.sub_id";
$query1=mysqli_query($connection, $sql1);
$row=mysqli_fetch_array($query1);

if(isset($_POST["submit"])){

 $T_id=$_POST["Tid"];
 $T_name=$_POST['Tname'];
 $Subject=$_POST["Tsub"];
 $Npass=$_POST["password"];

 $sql="UPDATE teachers SET T_name='$T_name' WHERE T_id='$T_id'";

 $query=mysqli_query($connection, $sql);

 if($query){
    $sql2="UPDATE tealogin SET password=null, new_password='$Npass' WHERE T_id='$T_id'";
    mysqli_query($connection, $sql2);
 }
 header('Location: Home.php#teacher');
 exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>TeacherLogin</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="Teacss.css" />

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
        <h2>Create teacher account</h2>
    </div>

<div class="teacherlog">

    <fieldset>
        <form action="" method="post">
            <div class="">
                <br>
                <label>Teacher's ID</label>
                <input type="text" name="Tid" value="<?php echo $id ?>">
                <br><br>
                <label>Teacher name</label>
                <input type="text" name="Tname">
                <br><br>
                <label>Teacher's subject</label>
                <input type="text" name="Tsub" value="<?php echo $row['sub_name'] ?>">
                <br><br>
                <label>New Password</label>
                <input type="password" name="password">
                <br><br>

                <button type="submit" name="submit"> Save </button>
        </form>
    </fieldset>

</div>
<body>

<html>