<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


// Converting the username to a userid
$username = $_SESSION['userid'];
$getUserID = "SELECT id FROM username = '$username'";
$getResult = mysqli_query($conn, $getUserID);
$row = mysqli_fetch_assoc($getResult);
$userID = $row['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <title>My Messages</title>

</head>

<body>
    <h3>Messages</h3>

    <?php
    $sql = "SELECT messages.*, c.username FROM messages LEFT JOIN clients c ON messages.sender = c.id WHERE receiver='$userID' OR sender='$userID'";
    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));

    while ($r = mysqli_fetch_assoc($result)) {
        echo $r['body'] . " from " . $r['username'] . '<hr />';
    }
    ?>

</body>

</html>