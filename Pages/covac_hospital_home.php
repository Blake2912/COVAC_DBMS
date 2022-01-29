<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hospital Home</title>
</head>
<body>
    <div class="container">
        <br>
        <h2>Welcome 
            <?php 
            $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
            session_start();
            if($conn === false){
              die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $hospitalid = $_SESSION['hospital_id'];
            $sql = "SELECT * FROM HOSPITAL WHERE hospital_id=$hospitalid";
            $result = mysqli_query($conn,$sql);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo $row['hospital_name'];
                }
            }
            mysqli_close($conn);
            ?>
        </h2>
        <hr>
        <br>

        <div class="container">
            <div class="card">
                <div class="container">
                    <br>
                    <h3>Hospital Details</h3>
                    <br>
                    <?php
                        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                        session_start();
                        if($conn === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        $hospitalid = $_SESSION['hospital_id'];
                        $sql = "SELECT * FROM HOSPITAL WHERE hospital_id=$hospitalid";
                        $result = mysqli_query($conn,$sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                ?>
                                <div class="container">
                                    <div class="mb-3">
                                    <?php echo "<strong>Hospital ID:</strong> ".$row['hospital_id']; ?>
                                    </div>
                                    <div class="mb-3">
                                    <?php echo "<strong>Hospital Name:</strong> ".$row['hospital_name']; ?>
                                    </div>
                                    <div class="mb-3">
                                    <?php echo "<strong>Hospital Location:</strong> ".$row['hospital_loc']; ?>
                                    </div>
                                    <div class="mb-3">
                                    <?php echo "<strong>Hospital Pin Code:</strong> ".$row['hospital_pin']; ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="container">
            <div class="card">
                <div class="container">
                    <br>
                    <h4>Vaccinators Registered</h4>
                    <br>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                    session_start();
                    if($conn === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $hospitalid = $_SESSION['hospital_id'];
                    $sql = "SELECT * FROM VACCINATOR_DETAIL WHERE hospital_id=$hospitalid";
                    $result = mysqli_query($conn,$sql);
                    if ($result->num_rows > 0) {
                        ?>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Employee ID</th>
                            <th scope="col">Employee First Name</th>
                            <th scope="col">Employee Last Name</th>
                            <th scope="col">Employee Phone</th>
                            <th scope="col">Employee Email</th>
                            </tr>
                        </thead>
                        <?php
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['emp_id'];?></th>
                                <td><?php echo $row['first_name'];?> </td>
                                <td><?php echo $row['last_name'];?> </td>
                                <td><?php echo $row['phone_number'];?></td> 
                                <td><?php echo $row['email'];?> </td>
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
                            No Vaccinators Found for this hospital
                        </div>
                        <?php
                    }
                    mysqli_close($conn);
                    ?>
                </div>
                <br>
            </div>
        </div>

        <br>
        <br>
        <div class="container">
            <div class="card">
                <div class="container">
                    <br>
                    <h4>Vaccine Inventory</h4>
                    <br>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                    session_start();
                    if($conn === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $hospitalid = $_SESSION['hospital_id'];
                    $sql = "SELECT * FROM VACCINE V,VACCINE_INVENTORY I WHERE V.vaccine_id=I.vaccine_id AND I.hospital_id='$hospitalid'";
                    $result = mysqli_query($conn,$sql);
                    if ($result->num_rows > 0) {
                        ?>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Vaccine ID</th>
                            <th scope="col">Vaccine Name</th>
                            <th scope="col">Developed By</th>
                            <th scope="col">Time for 2nd Dose</th>
                            <th scope="col">Last updated on</th>
                            <th scope="col">Avaliable doses</th>
                            </tr>
                        </thead>
                        <?php
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['vaccine_id'];?></th>
                                <td><?php echo $row['vaccine_name'];?> </td>
                                <td><?php echo $row['dev_company'];?> </td>
                                <td><?php echo $row['time_for_sec_dose'];?></td> 
                                <td><?php echo $row['check_date'];?> </td>
                                <td><?php echo $row['doses_available'];?> </td>
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
                            No Vaccines Available, please update the vaccines invetory!
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
        <div class="container">
            <div class="card">
                <div class="container">
                    <br>
                    <h4>Update Vaccine Inventory</h4>
                    <hr>
                    <br>
                    <div class="container">
                        <form method="post">
                            <div class="mb-3">
                                <label for="vaccine_id" class="form-label">Enter your Vaccine ID</label>
                                <input type="text" class="form-control" name="vaccine_id" id="vaccine_id">
                            </div>
                            <div class="mb-3">
                                <label for="doses_available" class="form-label">Enter doses available</label>
                                <input type="number" class="form-control" name="doses_available" id="doses_available">
                            </div>
                            <div class="container">
                                <button type="submit" id="update_vaccine" name="update_vaccine" class="btn btn-warning">Update Doses Available</button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="container">
            <div class="card">
                <div class="container">
                    <br>
                    <h4>Add New Vaccines</h4>
                    <hr>
                    <div class="container">
                        <h6>Vaccines Available in our Database</h6>
                        <div class="container">
                        <?php
                            $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
                            session_start();
                            if($conn === false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $hospitalid = $_SESSION['hospital_id'];
                            $sql = "SELECT * FROM VACCINE";
                            $result = mysqli_query($conn,$sql);
                            if ($result->num_rows > 0) {
                                ?>
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Vaccine ID</th>
                                    <th scope="col">Vaccine Name</th>
                                    <th scope="col">Developed By</th>
                                    <th scope="col">Time for 2nd Dose</th>
                                    </tr>
                                </thead>
                                <?php
                                while($row = $result->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['vaccine_id'];?></th>
                                        <td><?php echo $row['vaccine_name'];?> </td>
                                        <td><?php echo $row['dev_company'];?> </td>
                                        <td><?php echo $row['time_for_sec_dose'];?></td> 
                                    </tr>
                                    <?php
                                }
                                ?>
                                </table>
                                <div id="emailHelp" class="form-text">If the vaccine that you are looking for is not found, please contact system admin to register the same!</div>
                                <?php
                            }
                            else{
                                ?>
                                <div class="container">
                                    No Vaccines Available, please contact system admin!
                                </div>
                                <?php
                            }
                            mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <form method="post">
                            <div class="mb-3">
                                <label for="new_vaccine_id" class="form-label">Enter new Vaccine ID from the list</label>
                                <input type="text" class="form-control" name="new_vaccine_id" id="new_vaccine_id">
                            </div>
                            <div class="mb-3">
                                <label for="initial_inventory" class="form-label">Enter doses available</label>
                                <input type="number" class="form-control" name="initial_inventory" id="initial_inventory">
                            </div>
                            <div class="container">
                                <button type="submit" id="add_vaccine" name="add_vaccine" class="btn btn-success">Add new Vaccine</button>
                            </div>
                        </form>
                        <br>
                    </div>
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
</body>
</html>

<script type="text/javascript">
    document.getElementById("logout").onclick = function () {
        location.href = "covac_welcome.php";
    };
    document.getElementById("refresh").onclick = function () {
        location.href = "covac_hospital_home.php";
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<?php
    if(array_key_exists('update_vaccine', $_POST)) {
        update_vaccine();
        // echo "<script type='text/javascript'>alert('Under Developemnt');</script>";
    }
    else if(array_key_exists('add_vaccine', $_POST)){
        add_vaccine();
    }

    function update_vaccine(){
        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
        if($conn === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        session_start();
        $hospitalid = $_SESSION['hospital_id'];
        $vaccine_id = $_POST['vaccine_id'];
        $doses_available = $_POST['doses_available'];
        $update_doses_sql = "UPDATE VACCINE_INVENTORY SET doses_available='$doses_available',check_date=CURDATE() WHERE vaccine_id='$vaccine_id' AND hospital_id='$hospitalid'";
        $update_result = mysqli_query($conn,$update_doses_sql);
        if($update_result){
            echo "<script type='text/javascript'>alert('Vaccine Inventory Updated!');</script>";
        } else{
            echo "ERROR: Hush! Sorry $update_doses_sql." 
                . mysqli_error($conn);
        }
        mysqli_close($conn);    
    }

    function add_vaccine(){
        $conn = mysqli_connect("localhost", "root", "1cr19cs073", "COVAC");
        if($conn === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        session_start();
        $hospitalid = $_SESSION['hospital_id'];
        $new_vaccine_id = $_POST['new_vaccine_id'];
        $initial_inventory = $_POST['initial_inventory'];
        $add_vaccine = "INSERT INTO VACCINE_INVENTORY VALUES('$new_vaccine_id','$hospitalid',CURDATE(),'$initial_inventory')";
        $add_result = mysqli_query($conn,$add_vaccine);
        if($add_result){
            echo "<script type='text/javascript'>alert('Vaccine Added!');</script>";
        } else{
            echo "ERROR: Hush! Sorry $add_vaccine." 
                . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>