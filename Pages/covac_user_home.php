<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User Home</title>
</head>
<body>
    <br>
    <div class="container">
        <h2>Welcome User</h2>
    </div>
    <hr>
    <div class="container">
        <br>
        <div class="card">
            <br>
            <div class="container">
                <h4>User Details</h4>
                <br>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "1cr19cs073";
                $databasename = "COVAC";
                session_start();
                $usr_id = $_SESSION['user_id'];
                $conn = mysqli_connect($servername,$username,$password,$databasename);
                $sql = "SELECT * FROM USER WHERE user_id = '$usr_id'";
                $result = mysqli_query($conn,$sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class = "container">
                            <?php echo "<strong>User ID:</strong> ".$row['user_id']; ?>
                            <br>
                            <hr>
                            <?php echo "<strong>First Name:</strong> ".$row['first_name']; ?>
                            <br>
                            <?php echo "<strong>Last Name:</strong> ".$row['last_name']; ?>
                            <br>
                            <hr>
                            <?php echo "<strong>Phone number:</strong> ".$row['phone']; ?>
                            <br>
                            <?php echo "<strong>Email:</strong> ".$row['email']; ?>
                            <br>
                            <hr>
                            <?php echo "<strong>Aadhaar Number:</strong> ".$row['aadhar_number']; ?>
                            <br>
                            <?php echo "<strong>Date of Birth:</strong> ".$row['dob']; ?>
                        </div>
                    <?php
                    }
                }else {
                    echo "0 results";
                }
                ?>
                <br>
                <br>
            </div>
        </div>
        <br>
        <br>
        <div class="card">
            <form method="post">
                <div class="container">
                    <br>
                    <h3>First Dose Vaccine</h3>
                    <br>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "1cr19cs073";
                    $databasename = "COVAC";
                    session_start();
                    $usr_id = $_SESSION['user_id'];
                    $conn = mysqli_connect($servername,$username,$password,$databasename);
                    $sql = "SELECT * FROM USER_VACCINATION_FIRST F, HOSPITAL H, VACCINE V WHERE user_id = '$usr_id' AND F.hospital_id = H.hospital_id AND V.vaccine_id = F.vaccine_id";
                    $result = mysqli_query($conn,$sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        ?>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Dose Date</th>
                            <th scope="col">Vaccinator ID</th>
                            <th scope="col">Hospital Name</th>
                            <th scope="col">Hospital Location</th>
                            <th scope="col">Hospital PinCode</th>
                            <th scope="col">Vaccine Name</th>
                            </tr>
                        </thead>
                        <?php
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['dose_date'];?></td>
                                <td><?php echo $row['vaccinator_id'];?></td>
                                <td><?php echo $row['hospital_name'];?></td>
                                <td><?php echo $row['hospital_loc'];?></td>
                                <td><?php echo $row['hospital_pin'];?></td>
                                <td><?php echo $row['vaccine_name'];?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                        <?php
                    }else {
                        ?>
                        <p>Please Schedule your <strong>first dose of vaccine</strong>
                        <div class="container">
                            <div class="mb-3">
                                <label for="user_id_ip_first" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id_ip_first" name="user_id_ip_first" aria-describedby="user_id_ip" required>
                            </div>
                            <div class="mb-3">
                                <label for="first_dose_date" class="form-label">First Dose Date</label>
                                <input type="date" class="form-control" id="first_dose_date" name="first_dose_date" aria-describedby="dobInput" required>
                            </div>
                            <div class="container">
                                <p> Please select from the <strong>hospitals</strong> shown below</p>
                                <?php
                                    $hospital_list = "SELECT * FROM HOSPITAL";
                                    $hospital_result = mysqli_query($conn,$hospital_list);
                                    if ($hospital_result->num_rows > 0) {
                                        // output data of each row
                                        ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">Hospital ID</th>
                                                <th scope="col">Hospital Name</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">PinCode</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            while($row = $hospital_result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row['hospital_id'];?></th>
                                                    <td><?php echo $row['hospital_name'];?></td>
                                                    <td><?php echo $row['hospital_loc'];?></td>
                                                    <td><?php echo $row['hospital_pin'];?></td>
                                                    
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                        <?php
                                        $vaccine_list = "SELECT * FROM VACCINE V, VACCINE_INVENTORY I, HOSPITAL H WHERE V.vaccine_id = I.vaccine_id AND H.hospital_id = I.hospital_id";
                                        $vaccine_result = mysqli_query($conn,$vaccine_list);
                                        if ($vaccine_result->num_rows > 0){
                                            ?>
                                            <p> Please select from the <strong>available vaccines</strong> shown below</p>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Vaccine ID</th>
                                                    <th scope="col">Vaccine Name</th>
                                                    <th scope="col">Developed By</th>
                                                    <th scope="col">Time for next dose</th>
                                                    <th scope="col">Available Doses</th>
                                                    <th scope="col">Last Updated on</th>
                                                    <th scope="col">Hospital Name</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                while($row = $vaccine_result->fetch_assoc()) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $row['vaccine_id'];?></th>
                                                        <td><?php echo $row['vaccine_name'];?></td>
                                                        <td><?php echo $row['dev_company'];?></td>
                                                        <td><?php echo $row['time_for_sec_dose'];?></td> 
                                                        <td><?php echo $row['doses_available'];?></td>
                                                        <td><?php echo $row['check_date'];?></td>
                                                        <td><?php echo $row['hospital_name'];?></td> 
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        <?php
                                        }
                                    }
                                    else{
                                        echo "Please contact COVAC Customer Support!";
                                    }
                                ?>
                            </div>
                            <br>
                            <input type="phone" class="form-control" id="hospital_id_ip_first" name="hospital_id_ip_first" aria-describedby="phoneHelp" placeholder="Hospital ID" required>
                            <div id="emailHelp" class="form-text">Please enter the Hospital ID from the list shown.</div>
                            <br>
                            <input type="phone" class="form-control" id="vaccine_id_ip_first" name="vaccine_id_ip_first" aria-describedby="phoneHelp" placeholder="Vaccine ID" required>
                            <div id="emailHelp" class="form-text">Please enter the Vaccine ID from the list shown.</div>
                            <br>
                            <div class="schedule_btn">
                                <button type="submit" name="button1" id="button1" class="btn btn-warning">Schedule First Dose</button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <br>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="card">
            <form method="post">
                <div class="container">
                    <br>
                    <h3>Second Dose Vaccine</h3>
                    <br>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "1cr19cs073";
                    $databasename = "COVAC";
                    session_start();
                    $usr_id = $_SESSION['user_id'];
                    $conn = mysqli_connect($servername,$username,$password,$databasename);
                    $sql = "SELECT * FROM USER_VACCINATION_SECOND S, HOSPITAL H, VACCINE V WHERE user_id = '$usr_id' AND S.hospital_id = H.hospital_id AND V.vaccine_id = S.vaccine_id";
                    $result = mysqli_query($conn,$sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        ?>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Dose Date</th>
                            <th scope="col">Vaccinator ID</th>
                            <th scope="col">Hospital Name</th>
                            <th scope="col">Hospital Location</th>
                            <th scope="col">Hospital PinCode</th>
                            <th scope="col">Vaccine Name</th>
                            </tr>
                        </thead>
                        <?php
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['dose_date'];?></td>
                                <td><?php echo $row['vaccinator_id'];?></td>
                                <td><?php echo $row['hospital_name'];?></td>
                                <td><?php echo $row['hospital_loc'];?></td>
                                <td><?php echo $row['hospital_pin'];?></td>
                                <td><?php echo $row['vaccine_name'];?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                        <?php
                    }else {
                        ?>
                        <p>Please Schedule your <strong>second dose of vaccine</strong>
                        <div class="container">
                            <div class="mb-3">
                                <label for="user_id_ip_second" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="user_id_ip_second" name="user_id_ip_second" aria-describedby="user_id_ip" required>
                            </div>
                            <div class="mb-3">
                                <label for="second_dose_date" class="form-label">Second Dose Date</label>
                                <input type="date" class="form-control" id="second_dose_date" name="second_dose_date" aria-describedby="dobInput" required>
                            </div>
                            <p> Please select from the <strong>hospitals</strong> shown below
                            <div class="container">
                                <?php
                                    $hospital_list = "SELECT * FROM HOSPITAL";
                                    $hospital_result = mysqli_query($conn,$hospital_list);
                                    if ($hospital_result->num_rows > 0) {
                                        // output data of each row
                                        ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">Hospital ID</th>
                                                <th scope="col">Hospital Name</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">PinCode</th>
                                                </tr>
                                            </thead>
                                        <?php
                                        while($row = $hospital_result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['hospital_id'];?></th>
                                                <td><?php echo $row['hospital_name'];?></td>
                                                <td><?php echo $row['hospital_loc'];?></td>
                                                <td><?php echo $row['hospital_pin'];?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </table>
                                        <?php
                                    }
                                    else{
                                        echo "Please contact COVAC Customer Support!";
                                    }
                                    $vaccine_list = "SELECT * FROM VACCINE V, VACCINE_INVENTORY I, HOSPITAL H WHERE V.vaccine_id = I.vaccine_id AND H.hospital_id = I.hospital_id";
                                        $vaccine_result = mysqli_query($conn,$vaccine_list);
                                        if ($vaccine_result->num_rows > 0){
                                            ?>
                                            <p> Please select from the <strong>available vaccines</strong> shown below</p>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Vaccine ID</th>
                                                    <th scope="col">Vaccine Name</th>
                                                    <th scope="col">Developed By</th>
                                                    <th scope="col">Time for next dose</th>
                                                    <th scope="col">Available Doses</th>
                                                    <th scope="col">Last Updated on</th>
                                                    <th scope="col">Hospital Name</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                while($row = $vaccine_result->fetch_assoc()) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $row['vaccine_id'];?></th>
                                                        <td><?php echo $row['vaccine_name'];?></td>
                                                        <td><?php echo $row['dev_company'];?></td>
                                                        <td><?php echo $row['time_for_sec_dose'];?></td> 
                                                        <td><?php echo $row['doses_available'];?></td>
                                                        <td><?php echo $row['check_date'];?></td>
                                                        <td><?php echo $row['hospital_name'];?></td> 
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        <?php
                                        }
                                        else{
                                            echo "Please contact COVAC Customer Support!";
                                        }
                                ?>
                            </div>
                            <br>
                            <input type="phone" class="form-control" id="hospital_id_ip_second" name="hospital_id_ip_second" aria-describedby="phoneHelp" placeholder="Hospital ID" required>
                            <div id="emailHelp" class="form-text">Please enter the Hospital ID from the list shown.</div>
                            <br>
                            <input type="phone" class="form-control" id="vaccine_id_ip_second" name="vaccine_id_ip_second" aria-describedby="phoneHelp" placeholder="Vaccine ID" required>
                            <div id="emailHelp" class="form-text">Please enter the Vaccine ID from the list shown.</div>
                        </div>
                        <br>
                        <div class="schedule_btn">
                            <button type="submit" name="button2" id="button2" class="btn btn-warning">Schedule Second Dose</button>
                        </div>
                        <?php
                    }
                    ?>
                    <br>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="logout">
            <button type="button" id="logout"class="btn btn-outline-dark">Log Out</button>
        </div>
    </div>
    <br>
    <br>
    <?php
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button1() {
            $servername = "localhost";
            $username = "root";
            $password = "1cr19cs073";
            $databasename = "COVAC";

            $conn1 = mysqli_connect($servername,$username,$password,$databasename);

            $user_id1 = $_POST['user_id_ip_first'];
            $first_dose_date = $_POST['first_dose_date'];
            $hospital_id_1 = $_POST['hospital_id_ip_first'];
            $vaccine_id_1 = $_POST['vaccine_id_ip_first'];
            $insert_first_dose = "INSERT INTO USER_VACCINATION_FIRST VALUES('$user_id1','$first_dose_date',NULL,'$hospital_id_1','$vaccine_id_1')";
            $first_dose_result = mysqli_query($conn1,$insert_first_dose);
            if($first_dose_result){
                echo "Vaccine Scheduled Refresh your page to view the result!";
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

            $user_id2 = $_POST['user_id_ip_second'];
            $second_dose_date = $_POST['second_dose_date'];
            $hospital_id_2 = $_POST['hospital_id_ip_second'];
            $vaccine_id_2 = $_POST['vaccine_id_ip_second'];
            $insert_second_dose = "INSERT INTO USER_VACCINATION_SECOND VALUES('$user_id2','$second_dose_date',NULL,'$hospital_id_2','$vaccine_id_2')";
            $second_dose_result = mysqli_query($conn2,$insert_second_dose);
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

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript">
    document.getElementById("logout").onclick = function () {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_welcome.php";
    };
</script>