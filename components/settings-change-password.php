<?php
session_start();
require_once("../classes/DB.php");
include('../classes/Mail.php');


function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['currentPassword']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $username = $_SESSION['userid'];
    $password = securityscan($_POST['currentPassword']);
    $passwordNew = securityscan($_POST['password']);
    $passwordNew2 = securityscan($_POST['password2']);

    if (empty($password) || empty($passwordNew) || empty($passwordNew2)) {
        echo "Required Fields are Empty...";
    } else {
        $query = "SELECT * FROM clients WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            if ($passwordNew == $passwordNew2) {
                $passwordNew = password_hash($passwordNew, PASSWORD_BCRYPT);
                $userid = $row['id'];
                mysqli_query($conn, "UPDATE clients SET password = '$passwordNew' WHERE id='$userid'");
                echo "Password has been reset successfully!";

                $subject = 'Password was Reset!';
                ob_start();
                include '../changedPassEmail.phtml';
                $body = ob_get_clean();
                Mail::sendMail($subject, $body, $row['email']);
                echo "Successfully Changed Password!";
            } else {
                echo "Passwords do not match! Try again";
            }
        } else {
            echo "Password is incorrect!";
        }
    }
} else {
    echo "Error: Post variables not set...";
}
