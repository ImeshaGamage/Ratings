<?php
require 'connect.php';

session_start();

$CID=$_SESSION["C_username"];

$sql1="SELECT teachers.T_name,teachers.T_id FROM teachers,childrens WHERE childrens.C_id='$CID' && childrens.T_id=teachers.T_id";
$result=mysqli_query($connection, $sql1);

if(isset($_POST["submit"])){

 $T_id=$_POST["Tid"];
 $b1=$_POST["button1"];
 $b2=$_POST["button2"];
 $b3=$_POST["button3"];
 $b4=$_POST["button4"];
 $b5=$_POST["button5"];
 $b6=$_POST["button6"];
 $b7=$_POST["button7"];
 $b8=$_POST["button8"];
 $b9=$_POST["button9"];
 $b10=$_POST["button10"];

 $sql="SELECT T_id,rate_no,rate FROM teachers WHERE T_id='$T_id'";
 $results=mysqli_query($connection, $sql);

 $row=mysqli_fetch_array($results);
 $oldrate=$row['rate'];
 $oldrateNO=$row['rate_no'];

 $res=($b1+$b2+$b3+$b4+$b5+$b6+$b7+$b8+$b9+$b10)/40;
 $rate=bcmul($res,100);
 $finalRate=($rate+$oldrate)/2;
 $rate_No=$oldrateNO+1;

 $sql2="UPDATE teachers SET rate_no='$rate_No', rate='$finalRate' WHERE T_id='$T_id'";
 mysqli_query($connection, $sql2);
 
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Childen</title>
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

<form action="" method="post">

  <label class="Tname">Teacher name</label>
      <select id="" name="Tid">
                <option disabled selected>Select the teacher</option>
<?php 
while($row=mysqli_fetch_array($result)){
?>
                
                   <option value="<?php echo $row['T_id'] ?>"><?php echo $row['T_name'] ?></option>

<?php } ?>
            </select>
    

<br><br>
<fieldset>

  <label>1.The teacher is knowledgeable about the subject matter.</label><br>
      <label class="radio-button"><input type="radio" name="button1" value=1> Disagree</label>
      <label class="radio-button"><input type="radio" name="button1" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button1" value=3> Agree
      <label class="radio-button"><input type="radio" name="button1" value=4> Strongly Agree
      <br><br>
    <label>2.The teacher communicates clearly and effectively.</label><br>
      <label class="radio-button"><input type="radio" name="button2" value=1> Disagree
      <label class="radio-button"><input type="radio" name="button2" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button2" value=3> Agree
      <label class="radio-button"><input type="radio" name="button2" value=4> Strongly Agree
      <br><br>
    <label>3.The teacher encourages student participation and questions.</label><br>
      <label class="radio-button"><input type="radio" name="button3" value=1> Disagree
      <label class="radio-button"><input type="radio" name="button3" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button3" value=3> Agree
      <label class="radio-button"><input type="radio" name="button3" value=4> Strongly Agree
      <br><br>
    <label>4.The teacher creates a positive and inclusive learning environment.</label><br>
      <label class="radio-button"><input type="radio" name="button4" value=1> Disagree
      <label class="radio-button"><input type="radio" name="button4" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button4" value=3> Agree
      <label class="radio-button"><input type="radio" name="button4" value=4> Strongly Agree
      <br><br>
    <label>5.The teacher provides helpful feedback on assignments and assessments.</label><br>
      <label class="radio-button"><input type="radio" name="button5" value=1> Disagree
      <input type="radio" name="button5" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button5" value=3> Agree
      <label class="radio-button"><input type="radio" name="button5" value=4> Strongly Agree
      <br><br>
    <label>6.The teacher demonstrates patience and understanding towards students' questions and concerns.</label><br>
      <label class="radio-button"><input type="radio" name="button6" value=1> Disagree
      <label class="radio-button"><input type="radio" name="button6" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button6" value=3> Agree
      <label class="radio-button"><input type="radio" name="button6" value=4> Strongly Agree
      <br><br>
    <label>7.The teacher uses a variety of teaching methods to engage students and accommodate different learning styles.</label><br>
      <label class="radio-button"><input type="radio" name="button7" value=1> Disagree
      <label class="radio-button"><input type="radio" name="button7" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button7" value=3> Agree
      <label class="radio-button"><input type="radio" name="button7" value=4> Strongly Agree
      <br><br>
    <label>8.The teacher effectively manages classroom time and keeps lessons on track.</label><br>
      <label class="radio-button"><input type="radio" name="button8" value=1> Disagree
      <label class="radio-button"><input type="radio" name="button8" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button8" value=3> Agree
      <label class="radio-button"><input type="radio" name="button8" value=4> Strongly Agree
      <br><br>
    <label>9.The teacher demonstrates enthusiasm and passion for the subject matter, which enhances the learning experience.</label><br>
      <label class="radio-button"><input type="radio" name="button9" value=1> Disagree
      <label class="radio-button"><input type="radio" name="button9" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button9" value=3> Agree
      <label class="radio-button"><input type="radio" name="button9" value=4> Strongly Agree
      <br><br>
    <label>10.The teacher is approachable and available for extra help or clarification outside of class time.</label><br>
      <label class="radio-button"><input type="radio" name="button10" value=1> Disagree
      <label class="radio-button"><input type="radio" name="button10" value=2> Neutral
      <label class="radio-button"><input type="radio" name="button10" value=3> Very Good
      <label class="radio-button"><input type="radio" name="button10" value=4> Strongly Agree
      <br><br>

    <button type="submit" name="submit">Submit</button>
</form>
<br><br>

</fieldset>
    
</div>

</body>

</html>