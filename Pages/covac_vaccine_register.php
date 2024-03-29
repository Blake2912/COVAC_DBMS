<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Vaccine Registration</title>
</head>
<body>
    <br>
    <div class="container">
        <h2>Vaccine Registration</h2>
    </div>
    <hr>
    <br>
    <div class="container">
        <div class="card">
            <div class="container">
                <br>
                <form action="backend/register_vaccine.php">
                    <div class="mb-3">
                        <label for="vaccineIdInput" class="form-label">Vaccine ID</label>
                        <input type="number" class="form-control" id="vaccineIdInput" name="vaccineIdInput" aria-describedby="vaccineId" required>
                    </div>
                    <div class="mb-3">
                        <label for="vaccinenameInput" class="form-label">Vaccine Name</label>
                        <input type="text" class="form-control" id="vaccinenameInput" name="vaccinenameInput"aria-describedby="vaccineName" placeholder="COVAXIN" required>
                    </div>
                    <div class="mb-3">
                        <label for="vaccineDevInput" class="form-label">Developed by</label>
                        <input type="text" class="form-control" id="vaccineDevInput" name="vaccineDevInput" aria-describedby="vaccineDevInput" placeholder="Bharat BioTech" required>
                    </div>
                    <div class="mb-3">
                        <label for="vaccineTime" class="form-label">Time for Second Dose(in days)</label>
                        <input type="number" class="form-control" id="vaccineTime" name="vaccineTime" aria-describedby="vaccineTime" placeholder="10" required>
                    </div>
                    <p class="text-info bg-light">Note: All fields are compulsory</p>
                    <button type="submit" class="btn btn-primary" id="register_vaccine">Register Vaccine</button>
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