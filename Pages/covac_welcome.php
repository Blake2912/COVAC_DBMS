<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Welcome</title>
</head>
<body>
<br>
    <div class="container">
        <h2>Welcome To COVAC Application</h2>
    </div>
    <hr>
    <div class="container">
        <h5>Select an Option from the following</h5>
    </div>
    <br>
    <div class="container">
        <div class="card">
            <br>
            <div class="container">
                <h6>New to the Application, please click here </h6>
                <button type="button" class="btn btn-success" id="register">Registration</button>
            </div>
            <br>
        </div>
        <br>
        <div class="card">
            <br>
            <div class="container">
                <h6>Already Registered, click here to Avail Services</h6>
                <button type="button" class="btn btn-info" id="login">Login</button>
            </div>
            <br>
        </div>
        <br>
        <div class="card">
            <br>
            <div class="container">
                <h6>Admin Login</h6>
                <button type="button" class="btn btn-danger" id="admin_login">Login</button>
            </div>
            <br>
        </div>
    <br>
    <div class="container">
        <img src="assets/home_page_vaccine.jpeg" class="img-fluid" width="550px"height="550px">
    <div>
    <br>
    <br>
</body>
</html>


<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
        

<script type="text/javascript">

    document.getElementById("register").onclick = function() {
        location.href = "covac_other_reg_type.php";
    };
    document.getElementById("login").onclick = function() {
        location.href = "covac_login.php";
    };
    document.getElementById("admin_login").onclick = function() {
        location.href = "covac_admin.php";
    };
    
</script>