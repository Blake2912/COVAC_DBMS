
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User Page Register Confirmation!</title>
</head>
<body>
    <?php
        $conn4 = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC"); 
        // Check connection
        if($conn4 === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
        $user_id = $_REQUEST['userIdInput'];
        $first_name =  $_REQUEST['firstnameInput'];
        $last_name = $_REQUEST['lastnameInput'];
        $phone_number = $_REQUEST['phoneNumberInput'];
        $email = $_REQUEST['emailInput'];
        $password = $_REQUEST['passwordInput'];
        $aadhaar_number = $_REQUEST['aadhaarInput'];
        $dob = $_REQUEST['dobInput'];
        
        // Performing insert query execution
        // here our table name is user
        $sql = "INSERT INTO USER  VALUES ('$user_id','$first_name','$last_name','$email','$password','$aadhaar_number','$dob','$phone_number')";
        
        if(mysqli_query($conn4, $sql)){
            echo "<h3>User Created successfully" 
                . " Please login with your phone number and password</h3>"; 

            echo nl2br("\n$first_name\n $last_name\n "
                . "$phone_number\n $aadhaar_number\n $email");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn4);
        }
        // Close connection
        mysqli_close($conn4);
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
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_login.php";
    };
    document.getElementById("go_to_reg").onclick = function () {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_other_reg_type.php";
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>