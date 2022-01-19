<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Vaccinator Home</title>
</head>
<body>
    <br>
    <div class="container">
        <h2>Welcome Vaccinator</h2>
    </div>
    <hr>
    <div class="container">
        <br>
        <div class="card">
            <br>
            <div class="container">
                <h4>Vaccinator Details</h4>
                <br>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "1cr19cs073";
                $databasename = "COVAC";
                session_start();
                $emp_id = $_SESSION['emp_id'];
                $conn = mysqli_connect($servername,$username,$password,$databasename);
                $sql = "SELECT * FROM VACCINATOR_DETAIL V, HOSPITAL H WHERE V.emp_id = '$emp_id' AND V.hospital_id = H.hospital_id";
                $result = mysqli_query($conn,$sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class = "container">
                            <?php echo "<strong>Employee ID:</strong> ".$row['emp_id']; ?>
                            <br>
                            <hr>
                            <?php echo "<strong>First Name:</strong> ".$row['first_name']; ?>
                            <br>
                            <?php echo "<strong>Last Name:</strong> ".$row['last_name']; ?>
                            <br>
                            <hr>
                            <?php echo "<strong>Phone number:</strong> ".$row['phone_number']; ?>
                            <br>
                            <?php echo "<strong>Email:</strong> ".$row['email']; ?>
                            <br>
                            <hr>
                            <?php echo "<strong>Hospital Name:</strong> ".$row['hospital_name']; ?>
                            <br>
                            <?php echo "<strong>Hospital Location:</strong> ".$row['hospital_loc']; ?>
                            <br>
                            <?php echo "<strong>Hospital Pin:</strong> ".$row['hospital_pin']; ?>
                        </div>
                    <?php
                    }
                }else {
                    echo "0 results";
                }
                ?>
                <br>
            </div>
        </div>
        <br>
        <div class="card">
            <br>
            <div class="container">
                <h5>First Dose Patient List</h5>
                <br>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "1cr19cs073";
                    $databasename = "COVAC";
                    $conn = mysqli_connect($servername,$username,$password,$databasename);
                    session_start();
                    $emp_id1 = $_SESSION['emp_id'];
                    $get_first_dose_list = "SELECT dose_date,F.user_id AS 'user_id',U.phone,U.first_name AS 'fName',U.last_name AS 'lName',aadhar_number,vaccine_name FROM USER_VACCINATION_FIRST F, USER U, VACCINE V, VACCINATOR_DETAIL D WHERE F.vaccinator_id IS NULL AND D.hospital_id = F.hospital_id AND F.vaccine_id = V.vaccine_id AND F.user_id = U.user_id";
                    $get_first_dose_list_result = mysqli_query($conn,$get_first_dose_list);
                    if ($get_first_dose_list_result->num_rows > 0) {
                        // output data of each row
                        ?>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Dose Date</th>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient First Name</th>
                            <th scope="col">Patient Last Name</th>
                            <th scope="col">Patient Phone</th>
                            <th scope="col">Patient Aadhaar</th>
                            <th scope="col">Vaccine Name</th>
                            </tr>
                        </thead>
                        <?php
                        while($row = $get_first_dose_list_result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['dose_date'];?></th>
                                <td><?php echo $row['user_id'];?> </td>
                                <td><?php echo $row['fName'];?> </td>
                                <td><?php echo $row['lName'];?> </td>
                                <td><?php echo $row['phone'];?></td> 
                                <td><?php echo $row['aadhar_number'];?> </td>
                                <td><?php echo $row['vaccine_name'];?> </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                    <?php
                    }
                    else{
                        ?>
                        <div class="container">
                        <?php
                        echo "<strong> First Dose Vaccination Appointments Not Found! </strong>";
                        ?>
                        </div>
                        <?php
                    }
                ?>
                <br>
                <h5>Administer vaccination</h5>
                <div class="container">
                    <p>Enter the user phone and aadhaar number to adminster first dose of the vaccine</p>
                    <form method="post">
                        <div class="mb-3">
                            <label for="phoneInput" class="form-label">Patient Phone Number</label>
                            <input type="text" class="form-control" id="phoneInput" name="phoneInput"aria-describedby="phoneInput" required>
                        </div>
                        <div class="mb-3">
                            <label for="aadhaarInput" class="form-label">Patient Aadhaar Number</label>
                            <input type="text" class="form-control" id="aadhaarInput" name="aadhaarInput"aria-describedby="aadhaarInput" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info" id="first_dose_vaccinate" name="first_dose_vaccinate">Vaccinate First Dose</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="card">
            <br>
            <div class="container">
                <h5>Second Dose Patient List</h5>
                <br>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "1cr19cs073";
                    $databasename = "COVAC";
                    $conn = mysqli_connect($servername,$username,$password,$databasename);
                    session_start();
                    $emp_id1 = $_SESSION['emp_id'];
                    $get_second_dose_list = "SELECT dose_date,F.user_id AS 'user_id2',U.phone,U.first_name AS 'fName2',U.last_name AS 'lName2',aadhar_number,vaccine_name FROM USER_VACCINATION_SECOND F, USER U, VACCINE V, VACCINATOR_DETAIL D WHERE F.vaccinator_id IS NULL AND D.hospital_id = F.hospital_id AND F.vaccine_id = V.vaccine_id AND F.user_id = U.user_id";
                    $get_second_dose_list_result = mysqli_query($conn,$get_second_dose_list);
                    if ($get_second_dose_list_result->num_rows > 0) {
                        // output data of each row
                        ?>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Dose Date</th>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient First Name</th>
                            <th scope="col">Patient Last Name</th>
                            <th scope="col">Patient Phone</th>
                            <th scope="col">Patient Aadhaar</th>
                            <th scope="col">Vaccine Name</th>
                            </tr>
                        </thead>
                        <?php
                        while($row = $get_second_dose_list_result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['dose_date'];?></th>
                                <td><?php echo $row['user_id2'];?> </td>
                                <td><?php echo $row['fName2'];?> </td>
                                <td><?php echo $row['lName2'];?> </td>
                                <td><?php echo $row['phone'];?></td> 
                                <td><?php echo $row['aadhar_number'];?> </td>
                                <td><?php echo $row['vaccine_name'];?> </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                    <?php
                    }
                    else{
                        ?>
                        <div class="container">
                        <?php
                        echo "<strong> Second Dose Vaccination Appointments Not Found! </strong>";
                        ?>
                        </div>
                        <?php
                    }
                ?>
                <br>
                <h5>Administer vaccination</h5>
                <div class="container">
                    <p>Enter the user phone and aadhaar number to adminster first dose of the vaccine</p>
                    <form method="post">
                        <div class="mb-3">
                            <label for="phoneInput" class="form-label">Patient Phone Number</label>
                            <input type="text" class="form-control" id="phoneInput2" name="phoneInput2"aria-describedby="phoneInput" required>
                        </div>
                        <div class="mb-3">
                            <label for="aadhaarInput" class="form-label">Patient Aadhaar Number</label>
                            <input type="text" class="form-control" id="aadhaarInput2" name="aadhaarInput2"aria-describedby="aadhaarInput" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info"id="second_dose_vaccinate" name="second_dose_vaccinate">Vaccinate Second Dose</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="logout">
            <button type="button" id="logout"class="btn btn-outline-dark">Log Out</button>
        </div>
        <br>
    </div>
    <br>
    <br>
</body>
</html>

<?php
if(array_key_exists('first_dose_vaccinate', $_POST)) {
    button1();
}
else if(array_key_exists('second_dose_vaccinate', $_POST)) {
    button2();
}
function button1() {
    $servername = "localhost";
    $username = "root";
    $password = "1cr19cs073";
    $databasename = "COVAC";

    $conn1 = mysqli_connect($servername,$username,$password,$databasename);
    session_start();
    $emp_id2 = $_SESSION['emp_id'];

    $phoneInput = $_POST['phoneInput'];
    $aadhaarInput = $_POST['aadhaarInput'];
    $update_first_dose = "UPDATE USER_VACCINATION_FIRST SET vaccinator_id = '$emp_id2' WHERE USER_VACCINATION_FIRST.user_id IN (SELECT user_id FROM USER U WHERE U.phone = '$phoneInput' AND U.aadhar_number = '$aadhaarInput');";
    $first_dose_result = mysqli_query($conn1,$update_first_dose);
    if($first_dose_result){
        echo "The patient is vaccinated! Refresh your page to view the result!";
    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($conn1);
    }
    mysqli_close($conn1);

}
function button2() {
    $servername = "localhost";
    $username = "root";
    $password = "1cr19cs073";
    $databasename = "COVAC";

    $conn2 = mysqli_connect($servername,$username,$password,$databasename);
    session_start();
    $emp_id3 = $_SESSION['emp_id'];

    $phoneInput2 = $_POST['phoneInput2'];
    $aadhaarInput2 = $_POST['aadhaarInput2'];
    $update_second_dose = "UPDATE USER_VACCINATION_SECOND SET vaccinator_id = '$emp_id3' WHERE USER_VACCINATION_SECOND.user_id IN (SELECT user_id FROM USER U WHERE U.phone = '$phoneInput2' AND U.aadhar_number = '$aadhaarInput2');";
    $second_dose_result = mysqli_query($conn2,$update_second_dose);
    if($second_dose_result){
        echo "Vaccine Scheduled Refresh your page to view the result!";
    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($conn2);
    }
    mysqli_close($conn2);
    mysqli_close($conn);
}
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript">
    document.getElementById("logout").onclick = function () {
        location.href = "covac_welcome.php";
    };
</script>
