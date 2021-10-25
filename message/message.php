<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

$uname = $_GET['user'];
$cleanuname = mysqli_real_escape_string($conn, $uname);
?>


<form class="form" role="form" action="../components/send-message?user=<?php echo $cleanuname; ?>" method="post" name="message">
    <input type="text" name="msg" id="msg" placeholder="Enter your message..." required>
    <input type="submit" value="Send Message" name="submit" id="sendmsg">
</form>