<?php
include '../config/db.php';

if (!empty($_POST['uname']) && !empty($_POST['upassword'])) {
    $username = mysqli_real_escape_string($connect, $_POST['uname']);
    $password = mysqli_real_escape_string($connect, $_POST['upassword']);
    $query = "SELECT password from users where email='$username'";
    $res = mysqli_query($connect, $query);
    if ($row = mysqli_fetch_assoc($res)) {
        if ($password === $row['password']) {
            session_start();
            $_SESSION['email'] = $username;
            header("Location:../index.php");
        } else {
            header("Location:../login.php?error=Password%20is%20not%20Correct");
        }
    } else {
        header("Location:../login.php?error=Email%20Does%20not%20Exist");
    }
}
