<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registrations</title>
</head>
<body>
    <br>
    <div class="container">
        <h2>Registrations</h2>
    </div>
    <hr>
    <div class="container">
        <h5>Select type of registration</h5>
    </div>
    <br>
    <div class="container">
    <div class="card">
            <br>
            <div class="container">
                <h6>To Register a user please click here</h6>
                <button type="button" class="btn btn-success" id="user_reg">Register User</button>
            </div>
            <br>
        </div>
        <br>
        <div class="card">
            <br>
                <div class="container">
                    <h6>To Register a vaccinator please click here</h6>
                    <button type="button" class="btn btn-warning" id="reg_vaccinator">Register Vaccinator</button>
                </div>
            <br>
        </div>
    </div>
    <br>
    <div class="contaner">
        <div class="container">
            <button type="button" class="btn btn-outline-success" id="go_to_welcome">Go to welcome</button>
        </div>
    </div>
    <br>
    <br>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script type="text/javascript">
    document.getElementById("go_to_welcome").onclick = function() {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_welcome.php";
    };
    document.getElementById("user_reg").onclick = function() {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_user_register.php";
    };
    document.getElementById("reg_vaccinator").onclick = function() {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_vaccinator_register.php";
    };
</script>