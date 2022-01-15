<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hospital Registration Acknoledgment</title>
</head>
<body>
    <?php

        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
        
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        $hospital_id = $_REQUEST['hospitalIdInput'];
        $hospital_name =  $_REQUEST['hospitalnameInput'];
        $hospital_loc = $_REQUEST['hospitalLocInput'];
        $hospital_pin = $_REQUEST['hospitalPinInput'];

        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO HOSPITAL  VALUES ('$hospital_id','$hospital_name', 
            '$hospital_loc','$hospital_pin')";

        if(mysqli_query($conn, $sql)){
            echo "<h3>Hospital Details Created successfully" 
                . " Please login with your Hospital ID and Hospital Name</h3>"; 

            echo nl2br("\n$first_name\n $last_name\n "
                . "$phone_number\n $aadhaar_number\n $email");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
        // Close connection
        mysqli_close($conn);
    ?>
    <div class="contaner">
        <div class="container">
            <button type="button" class="btn btn-outline-success" id="go_to_login">Go to login</button>
        </div>
    </div>
    <br>
    <div class="contaner">
        <div class="container">
            <button type="button" class="btn btn-outline-dark" id="go_to_reg">Go to registrations</button>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    document.getElementById("go_to_login").onclick = function() {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_admin_dashboard.php";
    };
    document.getElementById("go_to_reg").onclick = function () {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_admin_dashboard.php";
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>