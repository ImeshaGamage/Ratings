<?php
require 'connect.php';


if(isset($_POST["Tsubmit"])){

session_start();

 $T_id=$_POST["Tid"];
 $password=$_POST["password"];

 $sql="SELECT*FROM tealogin WHERE T_id='$T_id'";
 $result=mysqli_query($connection, $sql);
 $row=mysqli_fetch_array($result);

 $_SESSION["username"]="$T_id";

 if($row['password']==$password){
    header('Location: Tealog.php');
    exit();

 }else if($row['new_password']==$password){
    header('Location: Teacher.php');
    exit();

 }else{
    echo
"
<script>alert('Username or Password Incorrect')</script>
"; 
}
 }
 

 if(isset($_POST["Csubmit"])){

    session_start();

    $C_id=$_POST["Cid"];
    $password=$_POST["Cpassword"];
   
    $sql="SELECT*FROM child_login WHERE C_id='$C_id'";
    $result=mysqli_query($connection, $sql);
   
    $row=mysqli_fetch_array($result);

    $_SESSION["C_username"]="$C_id";
   
    if($row['C_password']==$password){
       
    
       header('Location: Childlog.php');
       exit();
   
    }else if($row['Cnew_password']==$password){
       header('Location: Children.php');
       exit();
   
    }else{
        echo
        "
        <script>alert('Username or Password Incorrect')</script>
        "; 
    }
    }

    $sql2="SELECT*FROM teachers";
    $result2=mysqli_query($connection, $sql2);
   
    
        //$filled_width = ($rate;
    
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Home</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="homecss.css" />

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
        <a class="home" href="#home">Home</a>
        <a class="home" href="admin.php#addTea">Admin</a>
        <a class="teacher" href="#teacher">Teacher</a>
        <a class="children" href="#children">Children</a>
    </nav>
    </header>

<div id="home" class="page">
    <h3>Welcome to Micro Academic Institute</h3>

<?php   
        while($row2=mysqli_fetch_array($result2)){
        $rate=$row2['rate'];  
        $T_id=$row2['T_id'];
        $subject=$row2['subject'];
        $T_name=$row2['T_name'];

        $sql3="SELECT*FROM subjects WHERE sub_id='$subject'";
        $result3=mysqli_query($connection, $sql3);
        $row3=mysqli_fetch_array($result3); 

        $sub=$row3['sub_name'];
?>

    <div class="rating-bar">
        <div class="filled-bar" style="width: <?php echo $rate; ?>%;"></div><br>
    </div>
    <span><?php echo $rate; ?>%</span>
    <?php echo "<a href='details.php?i=$T_id'>$T_name</a>"; ?>
    
    <span><?php echo $sub; ?></sapn>
    
<?php } ?>
</div>

<div id="content">
    <div id="teacher" class="page">
        <div class="teacher">
            <h3>Teachers login page</h3>

        <fieldset>
            <form action="" method="post">
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="username"></ion-icon>
                    </span>
                    <input type="text" name="Tid" required>
                    <label>Username</label><br>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="password"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" name="Tsubmit">log in</button>
            </form>
<?php ?>
        </fieldset>

        </div>
    </div>

    <div id="children" class="page">
        <div class="CHILDREN">
            <h3>Children login page</h3>
    
        <fieldset>
            <form action="" method="post">
            <h2>Login</h2>
                <div class="input-box">
                        <input type="text" name="Cid" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <input type="password" name="Cpassword" required>
                        <label>Password</label>
                    </div>
                <button type="submit" name="Csubmit">log in</button>
            </form>
        </fieldset>
        
    </div>

    </div>
</div>
         
    </main>

    <!-- <section class="footer">
        <div class="footer-content">
            <img src=".img/book home logo design.png">
            <h4 class="micro">Micro Academic Institute</h4>
        </div>

        <div class="footer-content">
            <h4>Location</h4>
            <p>No 34, ABC road
               <br>Rathnapura
            <br>Sri Lanka
            </p>
        </div>

        <div class="footer-content">
            <h4>About Us</h4>
            <p>we are creative
            <br>educated
            <br>we are 
            <br>we are </p>
        </div>

        <div class="footer-content">
            <h4>Contact</h4>
            <li>+9475 2365718</li>
            <li>microacademic@gmail.com</li>
            <li>we are </li>
        </div>
        
</section> -->
</body>

</html>
