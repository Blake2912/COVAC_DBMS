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
        <h2>Hello 
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

        

        
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>