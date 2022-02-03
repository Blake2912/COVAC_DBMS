<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>COVAC Hospital Login</title>
</head>
<body>
  <br>
  <div class="container">
    <h1>COVAC</h1>
  </div>
  <div class="container">
    <h3 >Hospital Login</h3>
  </div>
  <br>
  <div class="container">
    <div class="card">
      <div class="container">
        <br>
        <form method="post">
          <div class="mb-3">
            <label for="hospitalid" class="form-label">Hospital ID</label>
            <input type="text" class="form-control" name="hospital_id" id="hospital_id">
          </div>
          <div class="mb-3">
            <label for="hospitalname" class="form-label">Hospital Name</label>
            <input type="text" class="form-control" name="hospital_name" id="hospital_name">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <br>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="p-3 mb-2 bg-warning text-dark">
      <p>Still Not Registered to our service register here!</p>
      <button type="button" class="btn btn-secondary" id="register">Register</button>
    </div>
  </div>
</body>
</html>


<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
    document.getElementById("register").onclick = function () {
        location.href = "covac_hospital_register.php";
    };
</script>

<?php
    $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
    session_start();
    if($conn === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $hospitalId = $_POST['hospital_id'];
    $hospitalName = $_POST['hospital_name'];

    $sql = "SELECT * FROM HOSPITAL WHERE hospital_id='$hospitalId' AND hospital_name='$hospitalName'";
    $result = mysqli_query($conn,$sql);
    // echo var_dump($result);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    if($count == 1) {
      if ($result->num_rows > 0) {
       // output data of each row
      //  echo "Login Sucess!";
      echo $hospitalId;
      $_SESSION['hospital_id'] = $hospitalId;
      header("location: covac_hospital_home.php");
     } else {
       echo "0 results";
     }
     }else {
       $error = "Your Login Name or Password is invalid";
     }
     mysqli_close($conn);
?>