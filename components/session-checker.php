<?php
require_once('../classes/DB.php');
$db_handle = new DBController();

if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index.php');
    echo "NOT LOGGED IN";
} else {
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM client WHERE username = '$username' limit 1";
    $result = mysqli_query($db_handle->conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../index.php');
    }    
}
?>