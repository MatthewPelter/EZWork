<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


// Converting the username to a userid from the user that is logged in
$username = $_SESSION['userid'];
//$getUserID = "SELECT id FROM clients WHERE username = '$username'";
//$getResult = mysqli_query($conn, $getUserID);
//$row = mysqli_fetch_assoc($getResult);
$userID = $_SESSION['user_id'];

// Check if reply button was pressed
if (isset($_POST['submit'])) {
    if (!empty($_POST['msg'])) {
        $uname = $_GET['mid'];
        $cleanid = mysqli_real_escape_string($conn, $uname);

        $senderID = $userID;

        $receiverID = $cleanid;
        // Clean up the input to prevent SQL injection
        $message_body = $_POST['msg'];
        $message_body = htmlspecialchars($message_body);
        $message_body = stripslashes($message_body);
        $cleanmessage = mysqli_real_escape_string($conn, $message_body);

        $insertSQL = "INSERT INTO messages(body, sender, receiver, isread) VALUES('$cleanmessage', '$senderID', '$receiverID', 0)";
        $insertresult = mysqli_query($conn, $insertSQL) or die(mysqli_error($conn));

        if (!$insertresult) {
            echo "Error Sending Message...";
        }
    } else {
        echo "Please fill in the data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo/logo.svg">
    <link rel="stylesheet" href="../Styles/style.css">
    <!-- <link rel="stylesheet" href="../Styles/message-styles.css"> -->
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <title>My Messages</title>

    <style type="text/css">
        html {
            -webkit-animation: none !important;
            animation: none !important;
        }
    </style>

</head>

<body>
    <div class="body-container">

        <!-- NAV BAR -->
        <?php include '../navbar.php'; ?>
        <!-- END NAVBAR -->

        <div class="messageMainContainer">
            <?php
            // Selecting all the users you currently have a chat with.
            $sql = "SELECT DISTINCT s.username AS Sender, r.username AS Receiver, s.id AS SenderID, r.id as ReceiverID FROM messages LEFT JOIN clients s ON s.id = messages.sender LEFT JOIN clients r ON r.id = messages.receiver WHERE (s.id = '$userID' OR r.id = '$userID')";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            $u = array();
            if (mysqli_num_rows($result) > 0) {
                while ($r = mysqli_fetch_assoc($result)) {
                    if (!in_array(array('username' => $r['Receiver'], 'id' => $r['ReceiverID']), $u) && $r['Receiver'] != $username) {
                        // instead of array_push
                        array_unshift($u, array('username' => $r['Receiver'], 'id' => $r['ReceiverID']));
                    }
                    if (!in_array(array('username' => $r['Sender'], 'id' => $r['SenderID']), $u) && $r['Sender'] != $username) {
                        // instead of array_push
                        array_unshift($u, array('username' => $r['Sender'], 'id' => $r['SenderID']));
                    }
                }
            } else {
                //echo "no messages";
            }
            ?>
            <!---->
            <div class="mobileSpacer">

            </div>

            <div class="message-container clearfix">
                <div class="people-list" id="people-list">
                    <div class="title">
                        <h4>Direct Message</h4>
                    </div>
                    <ul class="list">

                        <?php
                        foreach ($u as $user) {
                        ?>
                            <a style="display: block; color: white; text-decoration: none;" id="usernameCard" href="messages?mid=<?php echo $user['id']; ?>">
                                <li class="clearfix">
                                    <div class="about">
                                        <div class="name"><?php echo $user['username']; ?></div>
                                    </div>
                                </li>
                            </a>
                        <?php } ?>

                    </ul>
                </div>

                <?php
                // Get messages between you and the user
                if (isset($_GET['mid'])) {
                    $id = htmlspecialchars($_GET['mid']);
                    $sql = "SELECT messages.id, messages.body, s.username AS Sender, r.username AS Receiver FROM messages LEFT JOIN clients s ON messages.sender = s.id LEFT JOIN clients r ON messages.receiver = r.id WHERE (r.id='$userID' AND s.id = '$id') OR r.id = $id AND s.id = '$userID'";
                    $result = mysqli_query($conn, $sql);

                    $otherUsernameSQL = mysqli_query($conn, "SELECT username FROM clients WHERE id='$id'");
                    $otherResult = mysqli_fetch_assoc($otherUsernameSQL);
                    $otherUsername = $otherResult['username'];
                ?>

                    <div class="chat">
                        <div class="chat-header clearfix">

                            <div class="chat-about">
                                <div class="chat-with">Chat with <?php echo $otherUsername; ?></div>
                                <div class="chat-num-messages">Do not share any confidential information</div>
                            </div>
                            <i class="fa fa-star"></i>
                        </div> <!-- end chat-header -->

                        <div class="chat-history">
                            <ul>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    //echo $row['id'] . ": " . $row['body'] . "<br />";
                                    if ($row['Sender'] == $username) {
                                ?>
                                        <li class="clearfix">
                                            <div class="message-data align-right">
                                                <span class="message-data-name">Me</span> <i class="fa fa-circle me"></i>

                                            </div>
                                            <div class="message other-message float-right">
                                                <?php echo $row['body']; ?>
                                            </div>
                                        </li>

                                        <?php
                                    } else {
                                        if ($row['jobID'] != NULL) { ?>
                                            <li>
                                                <div class="message-data">
                                                    <span class="message-data-name"><i class="fa fa-circle online"></i><?php echo $row['Sender']; ?></span>
                                                </div>
                                                <div class="message my-message">
                                                    <?php echo $row['Sender']; ?> is interested in your project you posted.<br />
                                                    Make sure to view their profile and rating before you accept their proposal.<br />
                                                    <button>Agree</button>
                                                    <button>Deny</button>
                                                    <?php echo $row['body']; ?>
                                                </div>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <div class="message-data">
                                                    <span class="message-data-name"><i class="fa fa-circle online"></i><?php echo $row['Sender']; ?></span>
                                                </div>
                                                <div class="message my-message">
                                                    <?php echo $row['body']; ?>
                                                </div>
                                            </li>

                                <?php
                                        }
                                    }
                                }
                                ?>

                            </ul>

                        </div> <!-- end chat-history -->

                        <form class="form" action="messages.php?mid=<?php echo $id; ?>" method="post" name="message">
                            <div class="chat-message clearfix">
                                <textarea name="msg" id="message-to-send" placeholder="Type your message" rows="3" required></textarea>
                                <input type="submit" value="Send" name="submit" class="button"></input>

                            </div> <!-- end chat-message -->
                        </form>

                    </div> <!-- end chat -->

            </div> <!-- end container -->
        <?php
                } else {
                    // if the user does not select person to chat with, it will just show a blank page and tell them to click on a person.
        ?>
            <div class="chat">
                <div class="chat-header clearfix">

                    <div class="chat-about">
                        <div class="chat-with">Welcome to the chat! </div>
                        <div class="chat-num-messages">Click a user on the left to start chatting</div>
                    </div>
                    <i class="fa fa-star"></i>
                </div> <!-- end chat-header -->

            </div> <!-- end chat -->

        <?php
                }
        ?>


        <!--DataList-->
        <datalist id="allskills">
        </datalist>
        </div>


        <!--Can't understand why cant i add a margin so just adding padding to a div for space-->
        <div class="spacerDiv" style="padding: 2rem;width: 100%;background-color: #c7e3f3;">

        </div>
        <!-- Footer -->
        <?php include '../footer.php'; ?>
        <!-- Footer -->
    </div>

</body>

<script type="text/javascript">
    var elem = document.querySelector('.chat-history');
    elem.scrollTop = elem.scrollHeight;
</script>

<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
<!--Toggle the nav burger button and mobile nav bar js-->
<script>
    const navIcon2 = document.getElementById("nav-burger");
    const profileMobileNav2 = document.querySelector(".profile-mobile-nav");
    const messageMainContainer2 = document.querySelector('.messageMainContainer2');

    function myFunction(x) {
        x.classList.toggle("change");
        if (x.classList.contains('change')) {
            profileMobileNav2.style.display = "inline-block";
            messageMainContainer2.style.display = 'none';
            searchIcon2.style.opacity = '0';
        } else {
            profileMobileNav2.style.display = 'none';
            searchIcon2.style.opacity = '1';
            messageMainContainer2.style.display = "inline-block";
        }
    }
</script>

</html>