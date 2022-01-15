<?php
$servername = "localhost";
$username = "root";
$password = "1cr19cs073";
$databasename = "COVAC";

$conn = mysqli_connect($servername,$username,$password,$databasename);

// Die connection if it is not successful
if(!$conn){
  die(mysqli_connect_error($conn));
}
echo "connection success!";
?>