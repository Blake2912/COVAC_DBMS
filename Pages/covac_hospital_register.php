<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Hospital Registration</title>
</head>
<body>
    <br>
    <div class="container">
        <h2>Hospital Registration</h2>
    </div>
    <hr>
    <br>
    <div class="container">
        <div class="card">
            <div class="container">
                <br>
                <form action="backend/register_hospital.php">
                    <div class="mb-3">
                        <label for="hospitalIdInput" class="form-label">Hospital ID*</label>
                        <input type="text" class="form-control" id="hospitalIdInput" aria-describedby="hospitalId" name="hospitalIdInput" required>
                    </div>
                    <div class="mb-3">
                        <label for="hospitalnameInput" class="form-label">Hospital Name*</label>
                        <input type="text" class="form-control" id="hospitalnameInput" name="hospitalnameInput" aria-describedby="hospitalName" placeholder="Hospital Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="hospitalLocInput" class="form-label">Hospital Location*</label>
                        <input type="text" class="form-control" id="hospitalLocInput" name="hospitalLocInput"aria-describedby="hospitalLocInput" placeholder="Hospital Location" required>
                    </div>
                    <div class="mb-3">
                        <label for="hospitalPinInput" class="form-label">Hospital Pin*</label>
                        <input type="number" class="form-control" id="hospitalPinInput" name="hospitalPinInput" aria-describedby="hospitalPin" placeholder="560037" required>
                    </div>
                    <p class="text-info bg-light">Note: All fields are compulsory</p>
                    <button type="submit" class="btn btn-primary" id="register_hospital">Register Hospiatal</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="contaner">
        <div class="container">
            <button type="button" class="btn btn-outline-success" id="go_to_login">Go to login</button>
        </div>
    </div>
    <br>
    <div class="contaner">
        <div class="container">
            <button type="button" class="btn btn-outline-dark" id="go_to_reg">Go to registrations</button>
        </div>
    </div>
</body>
</html>

<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
    document.getElementById("go_to_reg").onclick = function () {
        location.href = "covac_other_reg_type.php";
    };
    document.getElementById("go_to_login").onclick = function() {
        location.href = "covac_login.php";
    };
</script>