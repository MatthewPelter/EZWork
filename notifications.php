<?php
session_start();
require_once("./classes/DB.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    die("NOT LOGGED IN");
} else {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
        die();
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
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <title>EZWork | Notifications</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="icon" href="../logo/logo.svg">
    <link rel="stylesheet" href="./Styles/style.css">

</head>

<body>
    <?php include 'navbar.php'; ?>
    <div id="main-page">
        <div id="header">
            <h1 id="title">Notifications</h1>
            <button onclick="readNotification(0);closeAll();" id="markAsRead">Mark as Read</button>
        </div>
        <div id="notifications-section">
            <?php
            $notifications = mysqli_query($conn, "SELECT * FROM notifications WHERE receiver='$user_id' ORDER BY id DESC");
            if (mysqli_num_rows($notifications) > 0) {
                while ($r = mysqli_fetch_assoc($notifications)) {
                    $senderID = $r['sender'];
                    $senderName = mysqli_query($conn, "SELECT username FROM clients WHERE id=$senderID");
                    $senderName = mysqli_fetch_assoc($senderName);
                    $senderName = $senderName['username'];
                    if ($r['type'] == 'm') {
            ?>
                        <div class="Message <?php if ($r['isRead'] == 1) {
                                                echo "dimmed";
                                            } ?>">
                            <div class="Message-icon">
                                <i class="fa fa-bell-o"></i>
                            </div>
                            <div class="Message-body">
                                
                                <p>You got a message from <?php echo $senderName; ?></p>
                                <p class="tint">at <?php echo $r['sentAt']; ?></p>
                                <button class="Message-button" onclick="readNotification(<?php echo $r['id']; ?>); location.href='./message/messages?mid=<?php echo $r['sender']; ?>';" id="js-showMe">Show me</button>
                            </div>
                            <!-- <button onclick="readNotification(<?php //echo $r['id']; 
                                                                    ?>)" class="Message-close js-messageClose"><i class="fa fa-times"></i></button> -->
                        </div>
                    <?php } else if ($r['type'] == 'a') { ?>


                        <div class="Message Message--green <?php if ($r['isRead'] == 1) {
                                                                echo "dimmed";
                                                            } ?>">
                            <div class="Message-icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="Message-body">
                                <p><?php echo $senderName; ?> has accepted your proposal!</p>
                                <p>View your messages to gain more information regarding the job.</p>
                                <p class="tint">at <?php echo $r['sentAt']; ?></p>
                            </div>
                            <!-- <button onclick="readNotification(<?php //echo $r['id']; 
                                                                    ?>)" class="Message-close js-messageClose"><i class="fa fa-times"></i></button> -->
                        </div>

                    <?php } else if ($r['type'] == 'd') { ?>

                        <div class="Message Message--red <?php if ($r['isRead'] == 1) {
                                                                echo "dimmed";
                                                            } ?>">
                            <div class="Message-icon">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="Message-body">
                                <p><?php echo $senderName; ?> denied your proposal.</p>
                                <p class="tint">at <?php echo $r['sentAt']; ?></p>
                            </div>
                            <!-- <button onclick="readNotification(<?php //echo $r['id']; 
                                                                    ?>)" class="Message-close js-messageClose"><i class="fa fa-times"></i></button> -->
                        </div>

                    <?php } else if ($r['type'] == 'r') {
                    ?>
                        <div class="Message <?php if ($r['isRead'] == 1) {
                                                echo "dimmed";
                                            } ?>">
                            <div class="Message-icon">
                                <i class="fa fa-bell-o"></i>
                            </div>
                            <div class="Message-body">
                                <p><?php echo $senderName; ?> has submitted a proprosal to your job.</p>
                                <p>View your messages for more details.</p>
                                <p class="tint">at <?php echo $r['sentAt']; ?></p>
                                <button onclick="readNotification(<?php echo $r['id']; ?>); location.href='./message/messages?mid=<?php echo $r['sender']; ?>';" class="Message-button" id="js-showMe">Show me</button>
                            </div>
                            <!-- <button onclick="readNotification(<?php //echo $r['id']; 
                                                                    ?>)" class="Message-close js-messageClose"><i class="fa fa-times"></i></button> -->
                        </div>

                    <?php } else if ($r['type'] == 'p') {
                    ?>
                        <div class="Message <?php if ($r['isRead'] == 1) {
                                                echo "dimmed";
                                            } ?>">
                            <div class="Message-icon">
                                <i class="fa fa-bell-o"></i>
                            </div>
                            <div class="Message-body">
                                <p><?php echo $senderName; ?> has submitted a their payment.</p>
                                <p>You may now begin working on their job.</p>
                                <p class="tint">at <?php echo $r['sentAt']; ?></p>
                            </div>
                        </div>


                    <?php
                    } else if ($r['type'] == 'pr') {
                    ?>
                        <div class="Message <?php if ($r['isRead'] == 1) {
                                                echo "dimmed";
                                            } ?>">
                            <div class="Message-icon">
                                <i class="fa fa-bell-o"></i>
                            </div>
                            <div class="Message-body">
                                <p>Your payment has been released.</p>
                                <p>Your balance is now updated to reflect that.</p>
                                <p class="tint">at <?php echo $r['sentAt']; ?></p>
                            </div>
                        </div>

                    <?php
                    } else if ($r['type'] == 'fc') {
                    ?>
                        <div class="Message <?php if ($r['isRead'] == 1) {
                                                echo "dimmed";
                                            } ?>">
                            <div class="Message-icon">
                                <i class="fa fa-bell-o"></i>
                            </div>
                            <div class="Message-body">
                                <p><?php echo $senderName; ?> has completed their work.</p>
                                <p>View the progress page to ensure they completed.</p>
                                <p class="tint">at <?php echo $r['sentAt']; ?></p>
                            </div>
                        </div>

            <?php
                    }
                }
            } else {
                echo "No Notifications :(";
            } ?>
        </div>

        <div id="status"></div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function closeMessage(el) {
            el.addClass('is-hidden');
        }

        /*function closeAll() {
            $('#notifications').children('.Message').each(function() {
                closeMessage($(this));
            });
        }*/

        /*$('.js-messageClose').on('click', function(e) {
            closeMessage($(this).closest('.Message'));
        });*/

        function readNotification(id, type) {
            $.ajax({
                type: "POST",
                url: "./api/readNotification.php",
                processData: false,
                contentType: "application/json",
                data: '{ "notificationID": "' + id + '" }',
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    if (obj.Success.length > 0) {
                        $('#status').html(obj.Success);
                    } else if (obj.Error.length > 0) {
                        $('#status').html(obj.Error);
                    }

                },
                error: function(r) {
                    console.log(r);
                }
            });
        }
    </script>

</body>

</html>