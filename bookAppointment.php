<?php
include './config/db.php';
$select = "SELECT name from doctors";
$res = mysqli_query($connect, $select);
?>
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
  <title>Hospital Management System - Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="">
  <nav class="navbar bg-dark text-light py-4">
    <div class="container">
      <a href="" class="navbar-brand text-light">HMS</a>
      <ul class="navbar-nav">
        <div class="d-flex">
          <li class="nav-item">
            <a href="index.php" class="nav-link active text-light">Home</a>
          </li>
          <div class="dropdown px-3">
            <button class="btn text-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Appointment
            </button>
            <ul class="dropdown-menu position-absolute" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="bookAppointment.php">Book Appointment</a></li>
              <li><a class="dropdown-item" href="listAppointmment.php">Appointment List</a></li>
            </ul>
          </div>
          <div class="dropdown pr-3">
            <button class="btn text-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Doctors
            </button>
            <ul class="dropdown-menu position-absolute" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="addDoctor.php">Add Doctors</a></li>
              <li><a class="dropdown-item" href="listDoctors.php">Doctors List</a></li>
            </ul>
          </div>
          <li class="nav-item"><a href="./roomStatus.php" class="nav-link text-light mx-2">Room</a></li>
          <?php session_start(); ?>
          <?php if (isset($_SESSION['email'])) : ?>
            <li class="nav-item">
              <a href="./process/logout.php" class="nav-link active text-light mx-4">Logout</a>
            </li>
          <?php else : ?>
            <div class="dropdown pr-3 mx-2">
              <button class="btn text-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i>
              </button>
              <ul class="dropdown-menu position-absolute" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="./login.php">Login</a></li>
                <li><a class="dropdown-item" href="./registration.php">Register</a></li>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </ul>
    </div>
  </nav>
  <div class="container d-flex justify-content-center align-items-center">
    <div class="container w-50">
      <form action="./process/processBookAppointment.php" enctype="multipart/form-data" method="post" class="my-3">
        <h3 class="text-center my-2">Book Appointment</h3>
        <div class="form-floating my-3">
          <input type="text" class="form-control" name="pname" id="userName" autocomplete="off" required placeholder="" />
          <label for="userName">Full Name</label>
        </div>
        <div class="form-floating my-3">
          <input type="date" class="form-control" name="pdate" id="userName" autocomplete="off" required placeholder="" />
          <label for="userName">Date of Appointment</label>
        </div>

        <div class="form-floating my-3">
          <input type="number" class="form-control" name="pmobile" id="userNo" autocomplete="off" required placeholder="" />
          <label for="userNo">Patient Phone Number</label>
        </div>
        <div class="form-floating my-3">
          <input type="email" class="form-control" name="pemail" id="userNo" autocomplete="off" required placeholder="" />
          <label for="userNo">Patient Email</label>
        </div>

        <select class="form-select py-3" name="doctor" id="doctor">
          <option selected>Select the doctor</option>
          <?php while ($row = mysqli_fetch_assoc($res)) : ?>
            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
          <?php endwhile; ?>

        </select>
        <select class="form-select mt-3 py-3" name="pgender" id="doctor">
          <option value="doctor" selected>Select the Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="others">Others</option>
        </select>

        <input type="file" class="form-control mt-3" name="pphoto" id="userNo" placeholder="" />
        <label for="userNo">Patient's Photo</label>

        <input type="submit" value="Book Now" class="form-control text-light bg-primary my-3 py-3 w-100" />
      </form>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>