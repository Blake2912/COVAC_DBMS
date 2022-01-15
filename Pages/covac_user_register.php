<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User Register</title>
</head>
<body>
    <br>
    <div class="container">
        <h2>User Registration</h2>
    </div>
    <div class="container">
        <h5>Hello new user please register here!</h5>
    </div>
    <br>
    <div class="container">
        <div class="card">
            <div class="container">
                <br>
                <form action="backend/register_user.php" method="post" name="user_registration">
                    <div class="mb-3">
                        <label for="userIdInput" class="form-label">User ID*</label>
                        <input type="text" class="form-control" id="userIdInput" aria-describedby="UserId" required name="userIdInput">
                    </div>
                    <div class="mb-3">
                        <label for="firstnameInput" class="form-label">First Name*</label>
                        <input type="text" class="form-control" id="firstnameInput" name="firstnameInput"aria-describedby="firstName" placeholder="John" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastnameImput" class="form-label">Last Name*</label>
                        <input type="text" class="form-control" id="lastnameInput" name="lastnameInput" aria-describedby="LastName" placeholder="Doe" required>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumberInput" class="form-label">Phone Number*</label>
                        <input type="text" class="form-control" id="phoneNumberInput" name="phoneNumberInput" aria-describedby="LastName" placeholder="Phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email Address*</label>
                        <input type="email" class="form-control" id="emailInput" name="emailInput" aria-describedby="emailInput" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Password*</label>
                        <input type="password" class="form-control" id="passwordInput" name="passwordInput" aria-describedby="passwordInput" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="aadhaarInput" class="form-label">Aadhaar Number*</label>
                        <input type="text" class="form-control" id="aadhaarInput" name="aadhaarInput" aria-describedby="aadhaarInput" placeholder="Aadhaar Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="dobInput" class="form-label">Date Of Birth*</label>
                        <input type="date" class="form-control" id="dobInput" name="dobInput" aria-describedby="dobInput" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="register">Register</button>
                    </div>
                    <p class="text-info bg-light">Note: All fields are compulsory</p>
                </form>
            </div>
        </div>
    </div>
    <br>
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
    <br>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script type="text/javascript">
    document.getElementById("go_to_login").onclick = function() {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_login.php";
    };
    document.getElementById("go_to_reg").onclick = function () {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_other_reg_type.php";
    };
</script>