<?php
session_start();

if (isset($_POST['submit'])) {
    if (!empty($_POST['msg'])) {
        require_once("../classes/DB.php");
        echo "Were in";
        $uname = $_GET['user'];
        $cleanuname = mysqli_real_escape_string($conn, $uname);

        $sql = "SELECT id FROM clients WHERE username='$cleanuname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            header('Location: ../ClientProfile/index');
        }

        $sendername = $_SESSION['userid'];
        $senderSQL = "SELECT id FROM clients WHERE username='$sendername'";
        $senderres = mysqli_query($conn, $senderSQL);
        $senderrow = mysqli_fetch_assoc($senderres);
        $senderID = $senderrow['id'];

        $receiverID = $row['id'];
        $message_body = $_POST['msg'];
        $cleanmessage = mysqli_real_escape_string($conn, $message_body);

        $insertSQL = "INSERT INTO messages(body, sender, receiver, isread) VALUES('$cleanmessage', '$senderID', '$receiverID', 0)";
        $insertresult = mysqli_query($conn, $insertSQL) or die(mysqli_errno($conn));

        if ($insertresult) {
            header("Location: ../ClientProfile/index?messagestatus=1");
        } else {
            echo "Error Sending Message...";
        }
    } else {
        echo "Please fill in the data";
    }
}
