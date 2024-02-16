<?php
include './config/db.php';
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = NULL;
}
if (isset($_GET['success'])) {
    echo "<script>alert('" . $_GET['success'] . "')</script>";
}
$query  = "SELECT * FROM roomstatus";
$res = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital Management System - Room</title>
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
        <!-- Button trigger modal -->
        <?php
        if ($email == 'dpraidola@gmail.com') : ?>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                    Add Room
                </button>
            </div>
        <?php endif; ?>
        <div class="row">

            <?php while ($row = mysqli_fetch_assoc($res)) : ?>
                <?php $roomNo = $row['roomNumber']; ?>
                <div class="col my-4">
                    <div class="card" style="width: 18rem">
                        <img src="./assets/hero.jpg" class="card-img-top" alt="" />
                        <div class="card-body text-center">
                            <h5 class="card-title">Room Number : <?php echo $row['roomNumber']; ?></h5>
                            <p class="card-text">Status : <?php echo $row['Status']; ?></p>


                            <!--Modal-->
                            <!-- Button trigger modal -->
                            <?php if ($row['Status'] != 'free') : ?>
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#showRoomModal<?php echo $row['roomNumber']; ?>">
                                    See Details
                                </button>
                            <?php else : ?>
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addPatientModal<?php echo $row['roomNumber']; ?>">
                                    Add Patient
                                </button>
                            <?php endif; ?>
                            <?php
                            if ($email == 'dpraidola@gmail.com') : ?>
                                <button class="btn btn-primary" <?php if ($row['Status'] == 'free') echo 'disabled'; ?>>
                                    <a class="text-light" style="text-decoration: none;" href="./process/processRoomStatus.php?name=delete&roomNumber=<?php echo $roomNo; ?>">Empty Room</a></button>


                            <?php endif; ?>

                            <?php

                            $qquery = "SELECT * FROM roompatient WHERE roomNumber='$roomNo'";
                            $result = mysqli_query($connect, $qquery);
                            $row1 = mysqli_fetch_assoc($result);

                            ?>

                            <!-- Modal -->
                            <div class="modal fade" id="showRoomModal<?php echo $row['roomNumber']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Patient Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Patient Name : <?php echo $row1['patientName']; ?></h5>
                                            <h5>Patient Admitted Date : <?php echo $row1['admitDate']; ?></h5>
                                            <h5>Room Number : <?php echo $row1['roomNumber']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--________________________________________--->
                            <!-- Modal for FORM -->
                            <div class="modal fade" id="addPatientModal<?php echo $row['roomNumber']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> Add Patient</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="./process/processRoomStatus.php?roomNo=<?php echo $roomNo; ?>" method="post" class="w-50">
                                                <h4 class="text-center text-light">Add Patient</h4>
                                                <div class="form-floating my-3">
                                                    <input type="text" class="form-control" name="pname" id="Password" autocomplete="off" required placeholder="" />
                                                    <label for="Password">Patient Name</label>
                                                </div>
                                                <input type="submit" name="patient" class="btn btn-primary my-3" value="Add Now">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--________________________________________--->
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

            <!-- Add Room -->
            <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./process/processRoomStatus.php" method="post">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="roomNumber" id="Password" autocomplete="off" required placeholder="" />
                                    <label for="Password">Room Number</label>
                                </div>
                                <select name="status" id="" class="form-control">
                                    <option value="free" selected>Free</option>
                                    <option value="occupied">Occupied</option>
                                </select>
                                <input type="submit" class="btn btn-primary my-3" value="Add Now" name="room">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--______________________-->

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>