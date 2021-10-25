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

// Check if reply button was pressed
if (isset($_POST['submit'])) {
    if (!empty($_POST['msg'])) {
        $uname = $_GET['mid'];
        $cleanid = mysqli_real_escape_string($conn, $uname);

        $senderID = $userID;

        $receiverID = $cleanid;
        $message_body = $_POST['msg'];
        $cleanmessage = mysqli_real_escape_string($conn, $message_body);

        $insertSQL = "INSERT INTO messages(body, sender, receiver, isread) VALUES('$cleanmessage', '$senderID', '$receiverID', 0)";
        $insertresult = mysqli_query($conn, $insertSQL) or die(mysqli_error($conn));

        if ($insertresult) {
            echo "Sent!";
        } else {
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
    <link rel="stylesheet" href="../Styles/message-styles.css">
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <title>My Messages</title>

</head>

<body>

    <!-- NAV BAR -->
    <div class="profile-header-container">
        <div class="profileHeader">
            <div class="burger" id="nav-burger" onclick='myFunction(this)'>
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <div class="logo">
                <a href="../ClientProfile/index">
                    <h2>E<span>z</span>Work</h2>
                </a>
            </div>
            <div class="searchBar">
                <form id="searchContainer">
                    <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search">
                    <input type="submit" value="Find">
                </form>
            </div>
            <ul>
                <li onclick="toggleJob()" id="jobs">Jobs</li>
                <div class="jobCardContainer">
                    <div class="jobCard">
                        <div class="card card1">
                            <h4>My Jobs</h4>
                        </div>
                        <div class="card card2">
                            <h4>All Job Posts</h4>
                        </div>
                        <div class="card card3">
                            <h4>All Contracts</h4>
                        </div>
                        <div class="card card4" onclick="location.href='../PostAJob/PostAJob.html'">
                            <h4>Post A Job</h4>
                        </div>
                    </div>
                </div>
                <li onclick="toggleTalent()" id="talents">Talents</li>
                <div class="talentCardContainer">
                    <div class="talentCard">
                        <div class="card card1">
                            <h4>Discover</h4>
                        </div>
                        <div class="card card2">
                            <h4>Your Hires</h4>
                        </div>
                        <div class="card card4">
                            <h4>Talent History</h4>
                        </div>
                    </div>
                </div>
                <li onclick="toggleProject()" id="projects">Projects</li>
                <div class="projectCardContainer">
                    <div class="projectCard">
                        <div class="card card1">
                            <h4>Current Projects</h4>
                        </div>
                        <div class="card card2">
                            <h4>Project History</h4>
                        </div>
                        <div class="card card3">
                            <h4>Browse by Projects</h4>
                        </div>
                    </div>
                </div>
                <!-- Style tags are temporary -->
                <li><a style="color: white; text-decoration: none;" href="../message/messages">Messages</a></li>
            </ul>
            <div class="guide">
                <i class="fa fa-bell" title="Notification"></i>
                <i class="fa fa-question" onclick="toggleHelp()" id="question"></i>
                <div class="helpContainer">
                    <div class="helpCard">
                        <div class="card card1">
                            <h4>Help & Support</h4>
                        </div>
                        <div class="card card2">
                            <h4>Guides</h4>
                        </div>
                        <div class="card card3">
                            <h4>Contact Us</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="profileImage" onclick="toggleSession()">
                <img src="../Users/user.svg" id="profileImage1" alt="">
                <div class="sessionCardContainer">
                    <div class="sessionCard">
                        <div class="card card1">
                            <div class="image">
                                <img src="../Users/user.svg" id="profileImage3" alt="">
                            </div>
                            <div class="name">
                                <span id="name"><?php echo $_SESSION['userid']; ?></span>
                                <span id="type">Client</span>
                            </div>
                        </div>
                        <div class="card card2" onclick="location.href='../Settings/settings.html'">
                            <p>
                                <i class="fa fa-cog" aria-hidden="true"></i> Settings
                            </p>
                        </div>
                        <div class="card card3" onclick="location.href='../components/logout.php'">
                            <p>
                                <i class="fa fa-sign-out-alt"></i> Sign Out
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <i class="fa fa-search" id="mobileSearch"></i>
            <i class="fa fa-times" id="ExitmobileSearch"></i>
        </div>
    </div>
    <!-- END NAVBAR -->







    <?php
    // Selecting all the users you currently have a chat with.
    $sql = "SELECT DISTINCT s.username AS Sender, r.username AS Receiver, s.id AS SenderID, r.id as ReceiverID FROM messages LEFT JOIN clients s ON s.id = messages.sender LEFT JOIN clients r ON r.id = messages.receiver WHERE (s.id = '$userID' OR r.id = '$userID')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $u = array();
    if (mysqli_num_rows($result) > 0) {
        while ($r = mysqli_fetch_assoc($result)) {
            if (!in_array(array('username' => $r['Receiver'], 'id' => $r['ReceiverID']), $u) && $r['Receiver'] != $username) {
                array_push($u, array('username' => $r['Receiver'], 'id' => $r['ReceiverID']));
            }
            if (!in_array(array('username' => $r['Sender'], 'id' => $r['SenderID']), $u) && $r['Sender'] != $username) {
                array_push($u, array('username' => $r['Sender'], 'id' => $r['SenderID']));
            }
        }
    } else {
        echo "no messages";
    }
    ?>

    <div class="container clearfix">
        <div class="people-list" id="people-list">
            <div class="search">
                <input type="text" placeholder="search" />
                <i class="fa fa-search"></i>
            </div>
            <ul class="list">

                <?php
                foreach ($u as $user) {
                ?>
                    <a style="display: block; color: white; text-decoration: none;" href="messages?mid=<?php echo $user['id']; ?>">
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
                            ?>
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
                        ?>

                    </ul>

                </div> <!-- end chat-history -->

                <form class="form" action="messages.php?mid=<?php echo $id; ?>" method="post" name="message">
                    <div class="chat-message clearfix">
                        <textarea name="msg" id="message-to-send" placeholder="Type your message" rows="3" required></textarea>
                        <input type="submit" value="Reply" name="submit" class="button"></input>

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

</body>

</html>