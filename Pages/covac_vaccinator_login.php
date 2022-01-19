<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>COVAC Vaccinator Login</title>
</head>
<body>
  <br>
  <div class="container">
    <h1>COVAC</h1>
  </div>
  <div class="container">
    <h3 >Vaccinator Login</h3>
  </div>
  <br>
  <div class="container">
    <div class="card">
      <div class="container">
        <br>
        <form method="post">
          <div class="mb-3">
            <label for="exampleInputid" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="phone_number" name = "phone_number"aria-describedby="phonenoid">
           
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="p-3 mb-2 bg-warning text-dark">
      <p>Still Not Registered to our service register here!</p>
      <button type="submit" class="btn btn-secondary" id="register">Register</button>
    </div>
  </div>
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script type="text/javascript">
    document.getElementById("register").onclick = function () {
        location.href = "covac_vaccinator_register.php";
    };
</script>

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
  $phone_number = $_POST['phone_number'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM VACCINATOR_DETAIL WHERE phone_number ='$phone_number' AND `password` ='$password'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];

  $count = mysqli_num_rows($result);

  if($count == 1) {
   $sql1 = "SELECT emp_id FROM VACCINATOR_DETAIL WHERE phone_number ='$phone_number' AND `password` ='$password'";
   $result1 = mysqli_query($conn,$sql);
   if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
      $usr_id = $row["emp_id"];
      $_SESSION['emp_id'] = $usr_id;
      header("location: covac_vaccinator_home.php");
    }
  } else {
    echo "0 results";
  }
  }else {
    $error = "Your Login Name or Password is invalid";
  }
  mysqli_close($conn);
?>