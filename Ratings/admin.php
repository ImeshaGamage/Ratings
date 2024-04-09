<?php
require 'connect.php';

if(isset($_POST["submit"])){

 $T_id=$_POST["Tid"];
 $Subject=$_POST["sub"];
 $Dpass=$_POST["Dpassword"];

 $sql="INSERT INTO teachers(T_id,subject) VALUES('$T_id','$Subject')";


$query=mysqli_query($connection, $sql);

if($query){
    $sql2="INSERT INTO tealogin(T_id,password) VALUES('$T_id','$Dpass')";

    mysqli_query($connection, $sql2);

echo
"
<script>alert('Data Insert successfully')</script>
"; 
}else{
    echo
    "
    <script>alert('Data Insert not successfull')</script>
    ";
}
   
}

if(isset($_POST["childsubmit"])){

    $C_id=$_POST["Cid"];
    $Dpass=$_POST["ChildDpassword"];

    $sql2="INSERT INTO child_login(C_id,C_password) VALUES('$C_id','$Dpass')";

    mysqli_query($connection, $sql2);

echo
"
<script>alert('Data Insert successfully')</script>
"; 
}
   

if(isset($_POST["childsubjects"])){

    $C_id=$_POST["Cid"];
    $T_id=$_POST["T_id"];
   
    $sql="INSERT INTO childrens(C_id,T_id) VALUES('$C_id','$T_id')";

    mysqli_query($connection, $sql);

echo
"
<script>alert('Data Insert successfully')</script>
"; 
 
}  

if(isset($_POST["subsubmit"])){

 $S_id=$_POST["Sid"];
 $Sname=$_POST["Sname"];

 $query="INSERT INTO subjects VALUES('$S_id','$Sname')";

mysqli_query($connection, $query);
echo
"
<script>alert('Data Insert successfully')</script>
";    
}

if(isset($_POST["deleteSub"])){

    $S_id=$_POST["Sid"];

    $sql="DELETE FROM subjects WHERE sub_id='$S_id'";
    $query=mysqli_query($connection, $sql);

    if($query){
        $sql2="UPDATE teachers SET subject=null WHERE subject='$S_id'";
        mysqli_query($connection, $sql2);
    }
    echo
    "
    <script>alert('Delete successfully')</script>
    ";  

}
if(isset($_POST["deleteChild"])){

    $C_id=$_POST["Cid"];

    $sql="DELETE FROM childrens WHERE C_id='$C_id'";
    $query=mysqli_query($connection, $sql);

    if($query){
        $sql2="DELETE FROM child_login WHERE C_id='$C_id'";
        mysqli_query($connection, $sql2);
    }
    echo
    "
    <script>alert('Delete successfully')</script>
    ";  

}

if(isset($_POST["deleteTeacher"])){

    $T_id=$_POST["Tid"];

    $sql="DELETE FROM teachers WHERE T_id='$T_id'";
    $query=mysqli_query($connection, $sql);

    if($query){
        $sql2="DELETE FROM tealogin WHERE T_id='$T_id'";
        mysqli_query($connection, $sql2);
    }
    echo
    "
    <script>alert('Delete successfully')</script>
    ";  

}
$sql="SELECT*FROM subjects";
$result=mysqli_query($connection, $sql);

$sql2="SELECT T_id,T_name FROM teachers";
$result2=mysqli_query($connection, $sql2);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Admin</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="admincss.css" />

</head>

<body>
    <header>
        <img class="logo" src="logo.png">
        <h1>Micro Academic Institute</h1>

    <nav class="navigation">
        <a href="Home.php#home">Home</a>
        <a class="addTea" href="#addTea">Teacher</a>
        <a class="addChild" href="#addChild">Children</a>
        <a class="addSub" href="#addSub">Subject</a>
        
    </nav>
    </header>

<div id="addTea" class="page">
    <h2>Teacher</h2>
    
    <fieldset class="set1">
        <form action="" method="post">
            <h3>Add teachers</h3>
            <div class="input-box">
                <label>Teacher ID</label>
                    <input type="text" name="Tid">
                    <br><br>
            </div>
            <div class="input-box">
                <label>Subject</label>
                    <select name="sub">
                        <option disabled selected>Select the subject</option>
                    <?php 
while($row=mysqli_fetch_array($result)){
?>
                
                   <option value="<?php echo $row['sub_id'] ?>"><?php echo $row['sub_name'] ?></option>

<?php } ?>
                    </select>
            </div>
            <br>
            <div class="input-box">
                <label>Defalt Password</label>
                    <input type="text" name="Dpassword">
                    <br><br>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
        <img class="img1" src="pic8.jpg";>
    </fieldset>

        <br><br>
    
    <fieldset class="set2">
        <img class="img2" src="pic6.jpg";>
            <form action="" method="post">
                <h3>Delete teachers</h3><br>
                    <label>Teacher ID</label>
                        <input type="text" name="Tid">
                        <br><br>
                <button type="submit" name="deleteTeacher">Delete</button>
            </form>
    </fieldset>     
    
</div>

<div id="addChild" class="page">
    <h2>Children</h2>

    <fieldset class="set1">
        <form action="" method="post">
            <h3>Add Children</h3>
            <label>Children ID</label>
                <input type="text" name="Cid"><br><br>
            <label>Defalt Password</label>
                    <input type="text" name="ChildDpassword" required>
            <br><br>
            <button type="submit" name="childsubmit">Submit</button>
        </form>
        <img class="img1" src="pic3.jpg";>
    </fieldset>
 <br><br>

    <fieldset class="set2">
        <img class="img2" src="pic7.jpg";>
            <form action="" method="post">
                <h3>Add Children subjects</h3>
                <label>Children ID</label>
                    <input type="text" name="Cid"><br><br>
                <label>Teacher name</label>
                    <select name="T_id">
                            <option disabled selected>Select the subject</option>
    <?php 
    while($row2=mysqli_fetch_array($result2)){
    ?>
                    
                            <option value="<?php echo $row2['T_id'] ?>"><?php echo $row2['T_name'] ?></option>

    <?php } ?>
                    </select>
                    <br><br>
                <button type="submit" name="childsubjects">Add</button>
            </form>
    </fieldset>

    <br><br>

    <fieldset class="set1">
            <form action="" method="post">
                <h3>Delete Children</h3><br>
                    <label>Children ID</label>
                        <input type="text" name="Cid" required>
                        <br><br>
                <button type="submit" name="deleteChild">Delete</button>
            </form>
        <img class="img1" src="pic3.jpg";>
    </fieldset>
    
</div>

<div id="addSub" class="page">
    <h2>Subjects</h2>

    <fieldset class="set1">
            <form action="" method="post">
                <h3>Add Subjects</h3>
                    <label>Sublect ID</label>
                        <input type="text" name="Sid">
                        <br><br>
                    <label>Sublect Name</label>
                        <input type="text" name="Sname">
                        <br><br>
                    <button type="submit" name="subsubmit">Submit</button>
            </form>
        <img class="img1" src="pic3.jpg";>
    </fieldset>

    <br>

    <fieldset class="set2">
        <img class="img2" src="pic7.jpg";>
            <form action="" method="post">
                <h3>Delete Subject</h3><br>
                    <label>Subject ID</label>
                        <input type="text" name="Sid">
                        <br><br>
                <button type="submit" name="deleteSub">Delete</button>
            </form> 
    </fieldset>


</div>

</body>
</html>