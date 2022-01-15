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
    <?php
        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        $emp_id = $_REQUEST['userIdInput'];
        $first_name =  $_REQUEST['firstnameInput'];
        $last_name = $_REQUEST['lastnameInput'];
        $phone_number = $_REQUEST['phoneNumberInput'];
        $password = $_REQUEST['passwordInput'];
        $email = $_REQUEST['emailInput'];
        $hospital_id = $_REQUEST['hosipitalIdInput'];

        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO VACCINATOR_DETAIL  VALUES ('$emp_id','$first_name', 
        '$last_name','$phone_number','$password','$email','$hospital_id')";

        if(mysqli_query($conn, $sql)){
            echo "<h3>Vaccinator Created successfully" 
                . " Please login with your Phone Number and Password</h3>"; 

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script type="text/javascript">
    document.getElementById("go_to_login").onclick = function() {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_login.php";
    };
    document.getElementById("go_to_reg").onclick = function () {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_other_reg_type.php";
    };
</script>