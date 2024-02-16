<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hospital Management System - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body class="bg-dark">
  <div class="container d-flex justify-content-center align-items-center">
    <div class="container w-50">
      <form action="./process/processReg.php" method="post" class="my-5">
        <h3 class="text-center text-light my-2">Sign Up</h3>
        <div class="form-floating my-3">
          <input type="text" class="form-control" name="fname" id="userName" autocomplete="off" required placeholder="" />
          <label for="userName">Full Name</label>
        </div>
        <div class="form-floating my-3">
          <input type="text" class="form-control" name="uname" id="userName" autocomplete="off" required placeholder="" />
          <label for="userName">Username</label>
        </div>
        <div class="form-floating my-3">
          <input type="email" class="form-control" name="uemail" id="userEmail" autocomplete="off" required placeholder="" />
          <label for="userEmail">Email</label>
        </div>
        <div class="form-floating my-3">
          <input type="number" class="form-control" name="umobile" id="userNo" autocomplete="off" required placeholder="" />
          <label for="userNo">Mobile Number</label>
        </div>
        <div class="form-floating my-3">
          <input type="password" class="form-control" name="upassword" id="Password" autocomplete="off" required placeholder="" />
          <label for="Password">Password</label>
        </div>
        <div class="form-floating my-3">
          <input type="password" class="form-control" name="cpassword" id="CPassword" autocomplete="off" required placeholder="" />
          <label for="CPassword">Confirm Password</label>
        </div>
        <input type="submit" value="Sign Up" class="form-control text-light bg-primary my-3 py-3 w-100" />
        <div class="text-center text-light">
          Already have an account?
          <a style="text-decoration: none" href="login.php">Login</a>
        </div>
      </form>
    </div>
  </div>

</body>


</html>