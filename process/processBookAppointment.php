<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:../login.php?error=Please%20Login%20First");
} else {
    if (!empty($_POST['pname']) && !empty($_POST['pemail']) && !empty($_POST['pdate']) && !empty($_POST['pgender']) && !empty($_POST['pmobile']) && !empty($_POST['doctor'])) {
        $name = mysqli_real_escape_string($connect, $_POST['pname']);
        $email = mysqli_real_escape_string($connect, $_POST['pemail']);
        $mobile = mysqli_real_escape_string($connect, $_POST['pmobile']);
        $dob = mysqli_real_escape_string($connect, $_POST['pdate']);
        $gender = mysqli_real_escape_string($connect, $_POST['pgender']);
        $doctor = mysqli_real_escape_string($connect, $_POST['doctor']);

        $today = date("Y-m-d");
        if ($today > $dob) {
            header("Location:../bookAppointment.php?error=Date%20Of%20Appointment%20Should%20be%20later%20than%20today");
        } else {
            //Image processing
            $img_name =  $_FILES['pphoto']['name'];
            $img_size =  $_FILES['pphoto']['size'];
            $tmp_name =  $_FILES['pphoto']['tmp_name'];
            $error = $_FILES['pphoto']['error'];
            if ($error === 0) {
                if ($img_size > 125000) {
                    header("Location:../bookAppointment.php?error=size%20is%20too%20large");
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array('jpg', 'jpeg', 'png', 'jfif', 'webp');
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = '../assets/patients/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $query = "INSERT INTO appointments(name,email,mobile,dob,doctor,gender,img) VALUES('$name','$email','$mobile','$dob','$doctor','$gender','$new_img_name')";
                        mysqli_query($connect, $query);
                        header("Location:../bookAppointment.php?error=Patient%20Added%20Successfully");
                    } else {
                        header("Location:../bookAppointment.php?error=Image%20Type%20is%20not%20Convinient");
                    }
                }
            } else {
                //unknown error
                header("Location:../bookAppointment.php?error=Unknown%20Error%20Occured");
            }
        }
    } else {
        echo "Hello";
    }
}
