<?php
session_start();
function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {
    require_once("../classes/DB.php");

    $firstname = securityscan($_POST['firstName']);
    $firstname = ucfirst($firstname);

    $lastname = securityscan($_POST['lastName']);
    $lastname = ucfirst($lastname);

    $username = securityscan($_POST['username']);

    $query = "SELECT * FROM clients WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    $user_count = mysqli_num_rows($result);
    if ($user_count > 0) {
        $_SESSION['regError'] = 'Username is taken already...';
        header("Location: ../register/index");
    }

    $birthday = securityscan($_POST['birthday']);
    $phone = securityscan($_POST['phone']);
    $email = securityscan($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['regError'] = 'Email is not valid, Try again';
        header("Location: ../register/index");
    }
    $password = securityscan($_POST['password']);
    $password2 = securityscan($_POST['password2']);

    if ($password != $password2) {
        echo "error passwords do not match!";
        die;
    }
    //$username = $firstname . "" . $lastname;
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO clients(username,firstname,lastname,email,password,phone) VALUES('$username', '$firstname', '$lastname', '$email', '$password_hash', '$phone')";

    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));

    if ($result) {
        $_SESSION['userid'] = $username;
        header("Location: ../ClientProfile/index");
    } else {
        echo "not working";
    }
}
