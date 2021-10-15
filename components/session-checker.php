<?php
require_once('../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index.php');
    echo "NOT LOGGED IN";
} else {
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM clients WHERE username = '$username' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../ClientProfile/index.php');
    }    
}
?>