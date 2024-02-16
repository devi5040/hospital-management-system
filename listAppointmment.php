<?php
include './config/db.php';
$query = "SELECT * FROM appointments";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hospital Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
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

  <!--Patient List-->
  <div class="container my-5">
    <div class="row">

      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col my-4">
          <div class="card" style="width: 18rem">
            <img src="./assets/patients/<?php echo $row['img']; ?>" class="card-img-top" alt="" />
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $row['name']; ?></h5>
              <p class="card-text"><?php echo $row['email']; ?></p>
              <p class="card-text"><?php echo $row['mobile']; ?></p>
              <p class="card-text"><?php echo $row['dob']; ?></p>
              <p class="card-text">Doctor : <?php echo $row['doctor']; ?></p>
              <p class="card-text">Gender : <?php echo $row['gender']; ?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>


    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>