<?php
include '../config/db.php';
if (isset($_POST['room'])) {
    if (!empty($_POST['roomNumber']) && !empty($_POST['status'])) {
        $roomNumber = mysqli_real_escape_string($connect, $_POST['roomNumber']);
        $roomStatus = mysqli_real_escape_string($connect, $_POST['status']);

        $dupQuery = "SELECT * FROM roomstatus WHERE roomNumber='$roomNumber'";
        $result = mysqli_query($connect, $dupQuery);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows) {
            header("Location:../roomStatus.php?success=Room%20Already%20Added");
        } else {
            $query = "INSERT INTO roomstatus(roomNumber,Status) VALUES('$roomNumber','$roomStatus')";
            mysqli_query($connect, $query);
            header("Location:../roomStatus.php?success=Room%20Added%20Successfully");
        }
    }
}
if (isset($_POST['patient'])) {
    $roomNumber = $_GET['roomNo'];
    if (!empty($_POST['pname'])) {
        $patientName = mysqli_real_escape_string($connect, $_POST['pname']);
        $admitDate = date("Y-m-d");
        $query = "INSERT INTO roompatient(patientName,admitDate,roomNumber) VALUES('$patientName','$admitDate','$roomNumber')";
        mysqli_query($connect, $query);
        $query1 = "UPDATE roomstatus SET Status='occupied' where roomNumber='$roomNumber'";
        mysqli_query($connect, $query1);
        header("Location:../roomStatus.php?success=Patient%20Added%20Successfully");
    }
}
if (isset($_GET['name'])) {
    $roomNo = $_GET['roomNumber'];
    $query = "DELETE FROM roompatient WHERE roomNumber='$roomNo'";
    mysqli_query($connect, $query);
    $query1 = "UPDATE roomstatus SET Status='free' WHERE roomNumber='$roomNo'";
    mysqli_query($connect, $query1);
    header("Location:../roomStatus.php?success=Patient%20Deleted%20Successfully");
}
