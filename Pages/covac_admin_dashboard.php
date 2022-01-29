
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
        <h2>Welcome <?php session_start(); $user_id = $_SESSION['admin_user_id']; echo $user_id; ?></h2>
        <hr>
        <div class="container">
            <div class="card">
                <br>
                <div class="container">
                    <h6>To Register a hospital please click here</h6>
                    <button type="button" class="btn btn-info" id="hospital_reg">Register Hospital</button>
                </div>
                <br>
            </div>
            <br>
            <div class="card">
                <br>
                <div class="container">
                    <h6>To Register a vaccine please click here</h6>
                    <button type="button" class="btn btn-danger" id="reg_vaccine">Register Vaccine</button>
                </div>
                <br>
            </div>
            <br>
            <div class="card">
                <br>
                <div class="container">
                    <h6>Miscellaneous Services</h6>
                    <button type="button" class="btn btn-secondary" id="misc"> Misc</button>
                </div>
                <br>
            </div>
            <br>
        </div>
        <div class="contaner">
            <div class="container">
                <button type="button" class="btn btn-outline-success" id="go_to_welcome">Log out</button>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script type="text/javascript">

    document.getElementById("go_to_welcome").onclick = function() {
        location.href = "covac_welcome.php";
    };
    document.getElementById("hospital_reg").onclick = function() {
        location.href = "covac_hospital_register.php";
    };
    document.getElementById("reg_vaccine").onclick = function() {
        location.href = "covac_vaccine_register.php";
    };
</script>