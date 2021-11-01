<?php
require_once("../classes/DB.php");


if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT * FROM clients WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    $user_count = mysqli_num_rows($result);
    if ($user_count > 0) {
        echo "<span class='status-not-available'> An account with email already exists.</span>";
    }
}
