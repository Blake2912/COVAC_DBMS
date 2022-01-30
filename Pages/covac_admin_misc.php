<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                                    <th scope="col">PinCode</th>
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

        </div>
        <br>
        <br>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>