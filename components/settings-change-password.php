<?php
require_once("../classes/DB.php");


if (!empty($_POST['username']) && !empty($_POST['currentPassword']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
    $username = $_POST['username'];
    $password = $_POST['currentPassword'];
    $passwordNew = $_POST['password'];
    $passwordNew2 = $_POST['password2'];
    $query = "SELECT * FROM clients WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        if ($passwordNew == $passwordNew2) {
            $passwordNew = password_hash($passwordNew, PASSWORD_BCRYPT);
            mysqli_query($conn, "UPDATE clients SET password = '$passwordNew'");
            echo "Password has been reset successfully!";
        } else {
            echo "Passwords do not match! Try again";
        }
    } else {
        echo "Password is incorrect!";
    }
}
