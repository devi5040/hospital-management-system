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
      <a href="registration.php" class="navbar-brand text-light">HMS</a>
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
          <!--login/logout-->
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
  <!--Hero Section-->
  <div class="container">
    <div class="row">
      <div class="col m-5">
        <div class="w-50 h-100 text-center d-flex flex-column justify-content-center align-items-center">
          <h4>Hospital Management System</h4>
          <p>
            You can see all appointment, book appointment, add doctors and see
            the list of doctors
          </p>
        </div>
      </div>
      <div class="col m-5">
        <img src="./assets/hero.jpg" width="600" alt="" />
      </div>
    </div>
  </div>
  <!--Card Section-->
  <div class="bg-dark">
    <div class="container my-5">
      <div class="row py-5">
        <div class="col my-5 mx-5 d-flex justify-content-center align-items-center">
          <div class="py-5 rounded px-2 mx-5 border text-center bg-light">
            <h4 class="mb-4 mt-2">List Appointment</h4>
            <p class="my-1">
              Do you want to see all the appointments? Welcome to you...!
            </p>
            <a href="#" class="btn mt-3 mb-2 btn-primary">Visit Now</a>
          </div>
        </div>
        <div class="col my-5 mx-5 d-flex justify-content-center align-items-center">
          <div class="py-5 rounded px-2 mx-5 border text-center bg-light">
            <h4 class="mb-4 mt-2">Add Appointment</h4>
            <p class="my-1">
              Do you want to visit a doctor? We made it Easy for you!!!
            </p>
            <a href="#" class="btn mt-3 mb-2 btn-primary">Book Now</a>
          </div>
        </div>
        <div class="col my-5 mx-5 d-flex justify-content-center align-items-center">
          <div class="py-5 shadow-lg shadow-light rounded px-2 mx-5 border text-center bg-light">
            <h4 class="mb-4 mt-2">List Doctors</h4>
            <p class="my-1">
              Do you want to see the doctors present in our platform?
            </p>
            <a href="#" class="btn mt-3 mb-2 btn-primary">Visit Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>