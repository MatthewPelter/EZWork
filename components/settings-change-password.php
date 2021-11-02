<?php
session_start();
require_once("../classes/DB.php");
include '../classes/Mail.php';

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['currentPassword']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $user_id = $_SESSION['user_id'];
    $password = securityscan($_POST['currentPassword']);
    $passwordNew = securityscan($_POST['password']);
    $passwordNew2 = securityscan($_POST['password2']);

    if (empty($password) || empty($passwordNew) || empty($passwordNew2)) {
        echo "Required Fields are Empty...";
    } else {
        $query = "SELECT email, password FROM clients WHERE id='$user_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            if ($passwordNew == $passwordNew2) {
                $passwordNewHash = password_hash($passwordNew, PASSWORD_BCRYPT);

                $changePass = mysqli_query($conn, "UPDATE clients SET password='$passwordNewHash' WHERE id='$user_id'") or die(mysqli_errno($conn));
                if ($changePass) {
                    $subject = 'Password was Reset!';
                    ob_start();
                    include '../changedPassEmail.phtml';
                    $body = ob_get_clean();
                    $email = $row['email'];
                    Mail::sendMail($subject, $body, $email);
                    echo "Password has been reset successfully!";
                } else {
                    echo "Query Broke...";
                }
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
