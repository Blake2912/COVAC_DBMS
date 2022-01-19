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
                    $get_first_dose_list = "SELECT F.dose_date AS '$dose_date', F.user_id AS 'user_id', U.first_name AS user_first_name, U.phone AS 'phone', VC.vaccine_name, U.aadhar_number FROM USER_VACCINATION_FIRST F, VACCINATOR_DETAIL V, HOSPITAL H, USER U, VACCINE VC WHERE vaccinator_id IS NULL AND V.emp_id = '$emp_id1' AND V.hospital_id = H.hospital_id AND U.user_id = F.user_id";
                    $get_first_dose_list_result = mysqli_query($conn,$sql);
                    if ($get_first_dose_list_result->num_rows > 0) {
                        // output data of each row
                        ?>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Dose Date</th>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Patient Phone</th>
                            <th scope="col">Patient Aadhaar</th>
                            <th scope="col">Vaccine Name</th>
                            </tr>
                        </thead>
                        <?php
                        while($row = $get_first_dose_list_result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row[$dose_date];?></th>
                                <td><?php echo $row['user_id'];?></td>
                                <td><?php echo $row['user_first_name'];?></td>
                                <td><?php echo $row['phone'];?></td> 
                                <td><?php echo $row['aadhar_number'];?></td>
                                <td><?php echo $row['vaccine_name'];?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                    <?php
                    }
                    else{
                        echo "Current First Dose Vaccination Appointments Not Found!";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
