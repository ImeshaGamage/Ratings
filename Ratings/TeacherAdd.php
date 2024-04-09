<?php 
 
 include 'connect.php';

 $T_id=$_POST('Tid');
 $T_name=$_POST('Tname');
 $Subject=$_POST('sub');
 $Qualif=$_POST('degree');
 $P_no=$_POST('pNo');
 $date=$_POST('Date');
 $time=$_POST('time');
 $room=$_POST('roomNo');

 $sql="INSERT INTO teachers(T_id,T_name,subject,qualification,phone_no,class_date,class_time,class_no) 
 VALUES('$T_id','$T_name','$Subject','$Qualif','$P_no','$date','$time','$room')";


mysqli_query($connection, $sql);
echo "Done";
?>
