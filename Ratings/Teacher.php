<?php
require 'connect.php';

session_start();

$ID=$_SESSION["username"];

$sql1="SELECT subjects.sub_name,teachers.T_name FROM teachers,subjects WHERE teachers.T_id='$ID' && teachers.subject=subjects.sub_id";
$query1=mysqli_query($connection, $sql1);
$row=mysqli_fetch_array($query1);

if(isset($_POST["submit"])){

 $T_id=$_POST["Tid"];
 $T_name=$_POST["Tname"];
 $Subject=$_POST["sub"];
 $Qualif=$_POST["degree"];
 $P_no=$_POST["pNo"];
 $date=$_POST["date"];
 $time=$_POST["time"];
 $room=$_POST["roomNo"];

 $query="UPDATE teachers SET T_name='$T_name', subject='$Subject', qualification='$Qualif', phone_no='$P_no', class_date='$date', class_time='$time', class_no='$room' WHERE T_id='$ID'";


mysqli_query($connection, $query);
echo
"
<script>alert('Data Insert successfully')</script>
";
    
}

$sql="SELECT*FROM subjects";
$result=mysqli_query($connection, $sql);


?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Teacher</title>
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
<div class="teacher">
    <form action="" method="post">
    <div class="details">
        <label>Teacher's class ID</label>
        <input type="text" name="Tid" value="<?php echo $ID ?>" required>
        <br><br>
        <label>Teacher name</label>
        <input type="text" name="Tname" value="<?php echo $row['T_name'] ?>" required>
        <br><br>
        <label>Teacher's subject</label>
            <select id="sub" name="sub">
            <option disabled selected>Selecte subject</option>
<?php 
while($row=mysqli_fetch_array($result)){
?>
                
                   <option value="<?php echo $row['sub_id'] ?>"><?php echo $row['sub_name'] ?></option>

<?php } ?>
            </select>
        <br><br>
        <label>Qualifications (Dgree/Diploma)</label>
        <input type="text" name="degree" required>
        <br><br>
        <label>Phone number</label>
        <input type="text" name="pNo" required>
        <br><br>
        <label>Class date</label>
            <select id="Date" name="date">
                <option disabled selected>Select the class date</option>
                   <option value="monday">Monday</option>
                   <option value="tuesday">Tuesday</option>
                   <option value="wednesday">Wednesday</option>
                   <option value="thursday">Thursday</option>
                   <option value="friday">Friday</option>
                   <option value="saterday">Saterday</option>
                   <option value="sunday">Sunday</option>
            </select>
        <br><br>
        <label>Class time</label>
        <input type="text" name="time" required>
        <br><br>
        <label>Class room number</label>
        <select id="roomNo" name="roomNo">
                <option disabled selected>Select the class room</option>
                   <option value="A01">A01</option>
                   <option value="A02">A02</option>
                   <option value="A03">A03</option>
                   <option value="A04">A04</option>
                   <option value="A05">A05</option>
                   <option value="B01">B01</option>
                   <option value="B02">B02</option>
                   <option value="B03">B03</option>
                   <option value="B04">B04</option>
                   <option value="B05">B05</option>
            </select>
        <br><br><br>
        <button type="submit" name="submit">Save</button>
    </div>
<br>
    </form>
</div>
    
</body>
</html>