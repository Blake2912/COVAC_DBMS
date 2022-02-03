<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <br>
        <h2>Admin Dashboard</h2>
        <hr>
        <br>
        <div class="container">
            <div class="card">
                <div class="container">
                    <br>
                    <h4>Application Usage Stats</h4>
                    <div class="container">
                        <ul>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                            session_start();
                            if($conn === false){
                              die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $sql = "SELECT COUNT(*) FROM USER";
                            $result = mysqli_query($conn,$sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    ?><li><?php echo "<strong>Number of users registered: </strong>".$row['COUNT(*)'];?></li><?php
                                }
                            }
                            mysqli_close($conn);
                            ?>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                            session_start();
                            if($conn === false){
                              die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $sql = "SELECT COUNT(*) FROM HOSPITAL";
                            $result = mysqli_query($conn,$sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    ?><li><?php echo "<strong>Number of hospitals registered: </strong>".$row['COUNT(*)'];?></li><?php
                                }
                            }
                            mysqli_close($conn);
                            ?>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                            session_start();
                            if($conn === false){
                              die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $sql = "SELECT COUNT(*) FROM VACCINE";
                            $result = mysqli_query($conn,$sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    ?><li><?php echo "<strong>Number of vaccine registered: </strong>".$row['COUNT(*)'];?></li><?php
                                }
                            }
                            mysqli_close($conn);
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="card">
                <div class="container">
                    <br>
                    <h5>List of Hospitals Registered</h5>
                    <div class="container">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                        session_start();
                        if($conn === false){
                          die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM HOSPITAL";
                        $result = mysqli_query($conn,$sql);
                        if ($result->num_rows > 0){
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Hospital ID</th>
                                    <th scope="col">Hospital Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Pin Code</th>
                                    </tr>
                                </thead>
                            <?php
                            while($row = $result->fetch_assoc()) {
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
                            <br>
                            <?php
                        }
                        else{
                            ?>
                            <div class="container">
                                <h6>No Hospitals Registered till now!</h6>
                            </div>
                            <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="card">
                <div class="container">
                    <br>
                    <h5>List of Vacccines Registered</h5>
                    <div class="container">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                        session_start();
                        if($conn === false){
                          die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM VACCINE";
                        $result = mysqli_query($conn,$sql);
                        if ($result->num_rows > 0){
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Vaccine ID</th>
                                    <th scope="col">Vaccine Name</th>
                                    <th scope="col">Developed By</th>
                                    <th scope="col">Time for 2nd dose</th>
                                    </tr>
                                </thead>
                            <?php
                            while($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['vaccine_id'];?></th>
                                    <td><?php echo $row['vaccine_name'];?></td>
                                    <td><?php echo $row['dev_company'];?></td>
                                    <td><?php echo $row['time_for_sec_dose'];?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </table>
                            <br>
                            <?php
                        }
                        else{
                            ?>
                            <div class="container">
                                <h6>No Vaccines Registered till now!</h6>
                            </div>
                            <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="card">
                <div class="container">
                    <br>
                    <h5>Update Vaccine Details</h5>
                    <div class="container">
                        <br>
                        <form method="post">
                            <div class="mb-3">
                                <label for="vaccine_id" class="form-label">Vaccine ID</label>
                                <input type="text" class="form-control" id="vaccine_id" name="vaccine_id" aria-describedby="phoneHelp">
                            </div>
                            <div class="mb-3">
                                <label for="vaccine_name" class="form-label">Vaccine Name</label>
                                <input type="text" class="form-control" id="vaccine_name" name="vaccine_name" aria-describedby="phoneHelp">
                            </div>
                            <div class="mb-3">
                                <label for="dose_vaccine" class="form-label">Number of Days for 2nd Dose</label>
                                <input type="text" class="form-control" id="dose_vaccine" name="dose_vaccine" aria-describedby="phoneHelp">
                            </div>
                            <div class="container">
                                <button type="submit" class="btn btn-warning" name="update_vaccine">Update Vaccine Details</button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="card">
                <div class="container">
                    <br>
                    <h5>Update Hospital Details</h5>
                    <div class="container">
                        <br>
                        <form method="post">
                            <div class="mb-3">
                                <label for="hospital_id" class="form-label">Hospital ID</label>
                                <input type="text" class="form-control" id="hospital_id" name="hospital_id" aria-describedby="phoneHelp">
                            </div>
                            <div class="mb-3">
                                <label for="hospital_name" class="form-label">Hospital Name</label>
                                <input type="text" class="form-control" id="hospital_name" name="hospital_name" aria-describedby="phoneHelp">
                            </div>
                            <div class="mb-3">
                                <label for="loc_hospital" class="form-label">Hospital Location</label>
                                <input type="text" class="form-control" id="loc_hospital" name="loc_hospital" aria-describedby="phoneHelp">
                            </div>
                            <div class="mb-3">
                                <label for="pin_hospital" class="form-label">Pin Code</label>
                                <input type="text" class="form-control" id="pin_hospital" name="pin_hospital" aria-describedby="phoneHelp">
                            </div>
                            <div class="container">
                                <button type="submit" class="btn btn-warning" name="update_hospital">Update Hospital Details</button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="container">
                <button type="button" id="refresh" name="refresh"class="btn btn-outline-dark">Refresh</button>
            </div>
            <br>
            <div class="container">
                <div class="logout">
                    <button type="button" id="logout"class="btn btn-outline-dark">Log Out</button>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
</body>
</html>

<script type="text/javascript">
    document.getElementById("logout").onclick = function () {
        location.href = "covac_welcome.php";
    };
    document.getElementById("refresh").onclick = function () {
        location.href = "covac_admin_misc.php";
    };
</script>

<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

<?php
    if(array_key_exists('update_vaccine', $_POST)) {
        update_vaccine();
        // echo "<script type='text/javascript'>alert('Under Developemnt');</script>";
    }
    else if(array_key_exists('update_hospital', $_POST)){
        update_hospital();
        // echo "<script type='text/javascript'>alert('Under Developemnt');</script>";
    }

    function update_vaccine(){
        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
        session_start();
        if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $no_of_days = $_POST['dose_vaccine'];
        $vaccine_id = $_POST['vaccine_id'];
        $vaccine_name = $_POST['vaccine_name'];
        $sql = "UPDATE VACCINE SET time_for_sec_dose='$no_of_days' WHERE vaccine_id='$vaccine_id' AND vaccine_name='$vaccine_name'";
        $update_result = mysqli_query($conn,$sql);
        if($update_result){
            echo "<script type='text/javascript'>alert('Vaccine Details Updated!');</script>";
        } else{
            echo "ERROR: Hush! Sorry $sql." 
                . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    function update_hospital(){
        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
        session_start();
        if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $hospital_id = $_POST['hospital_id'];
        $hospital_name = $_POST['hospital_name'];
        $loc_hospital = $_POST['loc_hospital'];
        $pin_hospital = $_POST['pin_hospital'];

        $sql = "UPDATE HOSPITAL SET hospital_name='$hospital_name',hospital_loc='$loc_hospital',hospital_pin='$pin_hospital' WHERE hospital_id='$hospital_id'";
        $update_result = mysqli_query($conn,$sql);
        if($update_result){
            echo "<script type='text/javascript'>alert('Hospital Details Updated!');</script>";
        } else{
            echo "ERROR: Hush! Sorry $sql." 
                . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>