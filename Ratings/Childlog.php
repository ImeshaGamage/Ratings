<?php
require 'connect.php';

session_start();

$Cid=$_SESSION["C_username"];

if(isset($_POST["save"])){

 $C_id=$_POST["Cid"];
 $C_name=$_POST['Cname'];
 $Grade=$_POST["grade"];
 $Npass=$_POST["password"];

 $sql="UPDATE child_login SET C_password=null, Cnew_password='$Npass', C_name='$C_name', grade='$Grade' WHERE C_id='$C_id'";

 $query=mysqli_query($connection, $sql);

 header('Location: Home.php#children');
 exit();
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>ChildrenLogin</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="chidcss.css" />

</head>

<body>
<header>
        <img class="logo" src="logo.png">
        <h1>Micro Academic Institute</h1>

    <nav class="navigation">
        <a href="Home.php#home">Home</a>
    </nav>
</header>

<div class="children">
        <fieldset>   
            <form action="" method="post">    
                <label>Student's ID</label>
                    <input type="text" name="Cid" value="<?php echo $Cid ?>">
                <br><br>
                <label>Student name</label>
                    <input type="text" name="Cname" required>
                <br><br>
                
                <label>Grade</label>
                    <input type="text" name="grade" required>
                <br><br>
                <label>New Password</label>
                    <input type="password" name="password" required>
                <br><br>

                <button type="submit" name="save"> Save </button>
            
            </form>
        </fieldset>
</div>
    
<body>

<html>