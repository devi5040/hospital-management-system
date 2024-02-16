<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:../login.php?error=Please%20Login%20First");
} else {
    if (!empty($_POST['dname']) && !empty($_POST['demail']) && !empty($_POST['did']) && !empty($_POST['dhospital'])) {
        $name = mysqli_real_escape_string($connect, $_POST['dname']);
        $email = mysqli_real_escape_string($connect, $_POST['demail']);
        $doctor_ID = mysqli_real_escape_string($connect, $_POST['did']);
        $hospital = mysqli_real_escape_string($connect, $_POST['dhospital']);
        //Image processing
        $img_name =  $_FILES['dphoto']['name'];
        $img_size =  $_FILES['dphoto']['size'];
        $tmp_name =  $_FILES['dphoto']['tmp_name'];
        $error = $_FILES['dphoto']['error'];
        if ($error === 0) {
            if ($img_size > 125000) {
                header("Location:../addDoctor.php?error=size%20is%20too%20large");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array('jpg', 'jpeg', 'png', 'jfif', 'webp');
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = '../assets/doctors/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $query = "INSERT INTO doctors(name,email,doctor_ID,hospital,img) VALUES('$name','$email','$doctor_ID','$hospital','$new_img_name')";
                    mysqli_query($connect, $query);
                    header("Location:../addDoctor.php?error=Doctor%20Added%20Successfully");
                } else {
                    header("Location:../addDoctor.php?error=Image%20Type%20is%20not%20Convinient");
                }
            }
        } else {
            //unknown error
            header("Location:../addDoctor.php?error=Unknown%20Error%20Occured");
        }
    }
}
