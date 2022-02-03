
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
                    <h6>Admin Dashboard</h6>
                    <button type="button" class="btn btn-secondary" id="misc">Admin Dashboard</button>
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

<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

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
    document.getElementById("misc").onclick = function() {
        location.href = "covac_admin_misc.php";
    };
</script>