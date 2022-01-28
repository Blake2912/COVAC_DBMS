<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<br>
  <div class="container">
    <h1>COVAC</h1>
  </div>
  <div class="container">
    <h3 >Admin Login</h3>
  </div>
  <br>
  <div class="container">
    <div class="card">
      <div class="container">
        <br>
        <form action="" name="admin_login_form" method="post">
          <div class="mb-3">
            <label for="exampleInputPhone1" class="form-label">User ID</label>
            <input type="phone" class="form-control" id="exampleInputPhone1" name="username" aria-describedby="phoneHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <br>
      </div>
    </div>
  </div>
  <br>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<?php
$servername = "localhost";
$username = "root";
$password = "1cr19cs073";
$databasename = "COVAC";
session_start();

$conn = mysqli_connect($servername,$username,$password,$databasename);

// Die connection if it is not successful
if(!$conn){
  die(mysqli_connect_error($conn));
}
$user_name = $_POST['username'];
$admin_password = $_POST['password'];
$_SESSION['admin_user_id']= $user_name;

$sql = "SELECT * FROM ADMIN WHERE admin_id='$user_name' AND admin_password='$admin_password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);

if($count == 1) {
  header("location: covac_admin_dashboard.php");
}else {
  $error = "Your Login Name or Password is invalid";
}

mysqli_close($conn);

?>

