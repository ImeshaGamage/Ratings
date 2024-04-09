<?php

$host="localhost";
$dbname="ratings";
$username="root";
$password="";

$connection=mysqli_connect($host , $username , $password , $dbname);

if ($connection -> connect_error){
    die("Connection error: ");
}else{


}
