<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>COVAC Hospital Login</title>
</head>
<body>
  <br>
  <div class="container">
    <h1>COVAC</h1>
  </div>
  <div class="container">
    <h3 >Hospital Login</h3>
  </div>
  <br>
  <div class="container">
    <div class="card">
      <div class="container">
        <br>
        <form>
          <div class="mb-3">
            <label for="hospitalid" class="form-label">Hospital  Id</label>
            <input type="number" class="form-control" id="hospitalid" aria-describedby="hospitalid">
           
          </div>
          <div class="mb-3">
            <label for="hospitalname" class="form-label">Hospital Name</label>
            <input type="text" class="form-control" id="hospitalid">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="p-3 mb-2 bg-warning text-dark">
      <p>Still Not Registered to our service register here!</p>
      <button type="submit" class="btn btn-secondary" id="register">Register</button>
    </div>
  </div>
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script type="text/javascript">
    document.getElementById("register").onclick = function () {
        location.href = "http://localhost:8080/COVAC/COVAC_DBMS/Pages/covac_hospital_register.php";
    };
</script>