<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


// Converting the username to a userid from the user that is logged in
$username = $_SESSION['userid'];
$getUserID = "SELECT id FROM clients WHERE username = '$username'";
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
<?php 
// Get messages between you and the user
if (isset($_GET['mid'])) {
	$id = htmlspecialchars($_GET['mid']);
	$sql = "SELECT messages.id, messages.body, s.username AS Sender, r.username AS Receiver FROM messages LEFT JOIN clients s ON messages.sender = s.id LEFT JOIN clients r ON messages.receiver = r.id WHERE (r.id='$userID' AND s.id = '$id') OR r.id = $id AND s.id = '$userID'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)) {
		echo $row['id'] . ": " . $row['body'] . "<br />";
	}
	?>
	
	<form class="form" action="../components/send-message.php?user=<?php echo $id; ?>" method="post" name="message">
						<label>Message</label><br />
						<textarea name="msg" id="msg" required></textarea>
                        <input type="submit" value="Reply" name="submit" class="btn-lrg submit-btn">
                </form>
	<?php
	
} else {
?>
    <h1>Messages</h1>
    <h3>WORK IN PROGRESS</h3>
    <?php

    $sql = "SELECT DISTINCT s.username AS Sender, r.username AS Receiver, s.id AS SenderID, r.id as ReceiverID FROM messages LEFT JOIN clients s ON s.id = messages.sender LEFT JOIN clients r ON r.id = messages.receiver WHERE (s.id = '$userID' OR r.id = '$userID')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $u = array();
    if (mysqli_num_rows($result) > 0) {
        while ($r = mysqli_fetch_assoc($result)) {
            if (!in_array(array('username'=>$r['Receiver'], 'id'=>$r['ReceiverID']), $u) && $r['Receiver'] != $username) {
                array_push($u, array('username'=>$r['Receiver'], 'id'=>$r['ReceiverID']));
            }
            if (!in_array(array('username'=>$r['Sender'], 'id'=>$r['SenderID']), $u) && $r['Sender'] != $username) {
                array_push($u, array('username'=>$r['Sender'], 'id'=>$r['SenderID']));
            }
        }
        
        foreach ($u as $user) {
            echo "<a href='retrieve-messages.php?mid=" . $user['id'] . "'>" . $user['username'] . "</a><br />";
        }
    } else {
        echo "no messages";
    }

    ?>

</body>

</html>