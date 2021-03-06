<?php

use Dotenv\Validator;

session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

$username = $_SESSION['userid'];
$userID = $_SESSION['user_id'];

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET['mid'])) {
    $receiverID = $_GET['mid'];
    $receiverID = securityscan($receiverID);
    $getName = mysqli_query($conn, "SELECT username FROM clients WHERE id='$receiverID'");
    $getName = mysqli_fetch_assoc($getName);
    $getName = $getName['username'];
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

        .clicker:hover {
            cursor: pointer;
        }

        .chat .chat-message #message-to-send {
            width: 100%;
            border: none;
            padding: 10px 20px;
            font: 1rem "Montserrat", Arial, sans-serif;
            margin-bottom: 10px;
            border-radius: 5px;
            resize: none;
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
                        <h4 style="text-decoration:none;">Direct Message</h4>
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
                    $sql = "SELECT messages.id, messages.body, messages.jobID, messages.response, s.username AS Sender, r.username AS Receiver FROM messages LEFT JOIN clients s ON messages.sender = s.id LEFT JOIN clients r ON messages.receiver = r.id WHERE (r.id='$userID' AND s.id = '$id') OR r.id = $id AND s.id = '$userID'";
                    $result = mysqli_query($conn, $sql);

                    $otherUsernameSQL = mysqli_query($conn, "SELECT username FROM clients WHERE id='$id'");
                    $otherResult = mysqli_fetch_assoc($otherUsernameSQL);
                    $otherUsername = $otherResult['username'];
                ?>

                    <div class="chat">
                        <div class="chat-header clearfix">

                            <div class="chat-about">
                                <div class="chat-with">Chat with <a href="https://ez-work.herokuapp.com/Profile/userprofile.php?name=<?php echo $otherUsername; ?>"><?php echo $otherUsername; ?></a></div>
                                <div class="chat-num-messages">Do not share any confidential information</div>
                            </div>
                        </div> <!-- end chat-header -->

                        <div class="chat-history">
                            <ul>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['Sender'] == $username) {
                                        if ($row['jobID'] != NULL) {
                                            if ($row['response'] == NULL) {
                                ?>
                                                <li>

                                                    <div class="message other-message float-right">
                                                        Your request has been sent to the client.<br />
                                                        Give them time to view your portfolio and profile.<br />
                                                    </div>
                                                </li>
                                            <?php }
                                            if ($row['response'] == "accept") { ?>
                                                <li>

                                                    <div class="message other-message float-right">
                                                        Your request has been accepted.<br />
                                                        View the job post to see the progress of the contract.<br />
                                                    </div>
                                                </li>
                                            <?php  }
                                            if ($row['response'] == "denied") { ?>
                                                <li>

                                                    <div class="message other-message float-right">
                                                        Your request has been denied by the client.<br />
                                                    </div>
                                                </li>

                                            <?php }
                                        } else { ?>

                                            <li class="clearfix">
                                                <div class="message-data align-right">
                                                    <span class="message-data-name">Me</span> <i class="fa fa-circle me"></i>

                                                </div>
                                                <div class="message other-message float-right">
                                                    <?php echo $row['body']; ?>
                                                </div>
                                            </li>

                                            <?php
                                        }
                                    } else {
                                        if ($row['jobID'] != NULL) {
                                            $name = $row['Sender'];
                                            $nameToID = mysqli_query($conn, "SELECT freelancer_id FROM clients WHERE username = '$name'");
                                            $fetchID = mysqli_fetch_assoc($nameToID);
                                            $fetchID = $fetchID['freelancer_id'];

                                            if ($row['response'] == NULL) {
                                            ?>
                                                <li class="propose">

                                                    <div class="message my-message">
                                                        <?php echo $row['Sender']; ?> is interested in your project you posted.<br />
                                                        Make sure to view their profile and rating before you accept their proposal.<br />
                                                        <span onclick="respondToJob(<?php echo $row['jobID']; ?>, <?php echo $fetchID; ?>, 'accept')" style="cursor: pointer;font-size: 1.25rem;color:royalblue;">Agree</span>
                                                        <span onclick="respondToJob(<?php echo $row['jobID']; ?>, <?php echo $fetchID; ?>, 'deny')" style="cursor: pointer;font-size: 1.25rem;color:maroon;">Deny</span>
                                                        <?php echo $row['body']; ?>
                                                    </div>
                                                </li>
                                            <?php }

                                            if ($row['response'] == "accept") { ?>
                                                <li class="propose">

                                                    <div class="message my-message">
                                                        You accepted the job.<br />
                                                        View the job page to view the progress of the contract.<br />
                                                    </div>
                                                </li>

                                            <?php  }
                                            if ($row['response'] == "denied") { ?>
                                                <li class="propose">

                                                    <div class="message my-message">
                                                        You denied the job.<br />
                                                    </div>
                                                </li>
                                            <?php }
                                        } else { ?>
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

                        <form class="form" action="javascript:void(0);" method="post" name="message">
                            <div class="chat-message clearfix">
                                <input type="text" name="msg" id="message-to-send" placeholder="Type your message" required></input>
                                <div id="result"></div>
                                <input id="sendmessage" type="submit" value="Send" name="submit" class="button"></input>

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
        <div class="spacerDiv" style="padding: 2rem;width: 100%;background: rgb(0,147,233);
background: linear-gradient(90deg, rgba(0,147,233,1) 39%, rgba(128,208,199,1) 61%);">

        </div>
        <!-- Footer -->
        <?php include '../footer.php'; ?>
        <!-- Footer -->
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../SkillsContainer/searchProfile.js"></script>
<script type="text/javascript">
    var elem = document.querySelector('.chat-history');
    elem.scrollTop = elem.scrollHeight;

    $('#sendmessage').click(function() {
        var text = $("#message-to-send").val();
        $.ajax({
            type: "POST",
            url: "../api/message.php",
            processData: false,
            contentType: "application/json",
            data: '{ "body": "' + text + '", "receiver": "<?php echo $getName; ?>" }',
            success: function(data) {
                var obj = JSON.parse(data);
                console.log(obj);
                $("#message-to-send").val('');
                if (obj.Success.length > 0) {
                    location.reload();
                    //$('#result').html(obj.Success);
                } else if (obj.Error.length > 0) {
                    $('#result').html(obj.Error);
                }

            },
            error: function(r) {
                console.log(r);
            }
        });
    });

    function respondToJob(jobID, free_id, response) {
        if (response == "accept") {
            $.ajax({
                type: "POST",
                url: "../api/accept.php",
                processData: false,
                contentType: "application/json",
                data: '{ "jobID": "' + jobID + '", "id": "<?php echo $user_id; ?>", "freelancer_id": "' + free_id + '" }',
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    if (obj.Success.length > 0) {
                        $('#status').html(obj.Success);
                        $('.propose').hide();
                        location.reload();
                    } else if (obj.Error.length > 0) {
                        $('#status').html(obj.Error);
                    }

                },
                error: function(r) {
                    console.log(r);
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "../api/deny.php",
                processData: false,
                contentType: "application/json",
                data: '{ "jobID": "' + jobID + '", "id": "<?php echo $user_id; ?>", "freelancer_id": "' + free_id + '" }',
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    if (obj.Success.length > 0) {
                        $('#status').html(obj.Success);
                        $('.propose').hide();
                        location.reload();
                    } else if (obj.Error.length > 0) {
                        $('#status').html(obj.Error);
                    }

                },
                error: function(r) {
                    console.log(r);
                }
            });
        }
    }


    // Toggle the nav burger button and mobile nav bar js
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