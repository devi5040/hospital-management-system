<?php
if (isset($_GET['error'])) {
  echo "<script>alert('" . $_GET['error'] . "')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hospital Management System - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body class="bg-dark">
  <div class="container d-flex justify-content-center align-items-center">
    <div class="container w-50">
      <form action="./process/processLogin.php" method="post" class="my-5">
        <h3 class="text-center text-light my-2">Sign In</h3>
        <div class="form-floating my-3">
          <input type="text" class="form-control" name="uname" id="userName" autocomplete="off" required placeholder="" />
          <label for="userName">Username or Email</label>
        </div>

        <div class="form-floating my-3">
          <input type="password" class="form-control" name="upassword" id="Password" autocomplete="off" required placeholder="" />
          <label for="Password">Password</label>
        </div>

        <input type="submit" value="Sign In" class="form-control text-light bg-primary my-3 py-3 w-100" />
        <div class="text-center text-light">
          Don't have an account?
          <a style="text-decoration: none" href="registration.php">Register Now</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>