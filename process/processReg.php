<?php
include '../config/db.php';
?>
<?php
if (!empty($_POST['fname']) && !empty($_POST['uname']) && !empty($_POST['uemail']) && !empty($_POST['umobile']) && !empty($_POST['upassword']) && !empty($_POST['cpassword'])) {
    $name = mysqli_real_escape_string($connect, $_POST['fname']);
    $username = mysqli_real_escape_string($connect, $_POST['uname']);
    $email = mysqli_real_escape_string($connect, $_POST['uemail']);
    $mobile = mysqli_real_escape_string($connect, $_POST['umobile']);
    $password = mysqli_real_escape_string($connect, $_POST['upassword']);
    $query = "INSERT INTO users(name,username,email,mobile,password) VALUES('$name','$username','$email','$mobile','$password')";
    mysqli_query($connect, $query);
    echo "<script>alert('Registration Successful');window.location.replace('../login.php');</script>";
    //header("Location:login.php?Successful%20%Login");
} else {
    echo "<script>alert('jijijjij Hello')</script>";
}
