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

echo "Here are your notifications:";


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

    <style type="text/css">
        @import url(https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

        * {
            box-sizing: border-box
        }

        body {
            background-color: #ddd;
            font-family: "Source Sans Pro";
            font-weight: 300
        }

        .Message {
            display: table;
            position: relative;
            margin: 40px auto 0;
            width: 500px;
            background-color: #0074d9;
            color: #fff;
            transition: all .2s ease
        }

        .Message.is-hidden {
            opacity: 0;
            height: 0;
            font-size: 0;
            padding: 0;
            margin: 0 auto;
            display: block
        }

        .Message--orange {
            background-color: #f39c12
        }

        .Message--red {
            background-color: #ff4136
        }

        .Message--green {
            background-color: #2ecc40
        }

        .Message-icon {
            display: table-cell;
            vertical-align: middle;
            width: 60px;
            padding: 30px;
            text-align: center;
            background-color: rgba(0, 0, 0, .25)
        }

        .Message-icon>i {
            width: 20px;
            font-size: 20px
        }

        .Message-body {
            display: table-cell;
            vertical-align: middle;
            padding: 30px 20px 30px 10px
        }

        .Message-body>p {
            line-height: 1.2;
            margin-top: 6px
        }

        .Message-button {
            position: relative;
            margin: 15px 5px -10px;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: 0 3px rgba(0, 0, 0, .4);
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            font-family: "Source Sans Pro";
            color: #fff;
            outline: 0;
            cursor: pointer
        }

        .Message-button:hover {
            background: rgba(0, 0, 0, .3)
        }

        .Message-button:active {
            background: rgba(0, 0, 0, .3);
            box-shadow: 0 0 rgba(0, 0, 0, .4);
            top: 3px
        }

        .Message-close {
            position: absolute;
            background-color: rgba(0, 0, 0, .3);
            color: #fff;
            border: none;
            outline: 0;
            font-size: 20px;
            right: 5px;
            top: 5px;
            opacity: 0;
            cursor: pointer
        }

        .Message:hover .Message-close {
            opacity: 1
        }

        .Message-close:hover {
            background-color: rgba(0, 0, 0, .5)
        }

        .u-italic {
            font-style: italic
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>


    <div class="Message" id="js-timer">
        <div class="Message-icon">
            <i class="fa fa-bell-o"></i>
        </div>
        <div class="Message-body">
            <p>This is a simple, but friendly, notification.</p>
            <p class="u-italic">It will disappear within a few seconds.</p>
        </div>
        <button class="Message-close js-messageClose"><i class="fa fa-times"></i></button>
    </div>

    <div class="Message Message--orange">
        <div class="Message-icon">
            <i class="fa fa-exclamation"></i>
        </div>
        <div class="Message-body">
            <p>This is a simple notification with a brighter color...</p>
            <p>If you bring you mouse here you can close it manually.</p>
        </div>
        <button class="Message-close js-messageClose"><i class="fa fa-times"></i></button>
    </div>


    <div class="Message Message--green">
        <div class="Message-icon">
            <i class="fa fa-check"></i>
        </div>
        <div class="Message-body">
            <p>This is a message telling you that everything is a-okay!</p>
            <p>Good job, and good riddance.</p>
        </div>
        <button class="Message-close js-messageClose"><i class="fa fa-times"></i></button>
    </div>

    <div class="Message Message--red">
        <div class="Message-icon">
            <i class="fa fa-times"></i>
        </div>
        <div class="Message-body">
            <p>This is a notification that something went wrong...</p>
            <button class="Message-button" id="js-helpMe">Yikes, help me please!</button>
            <button class="Message-button js-messageClose">Don't care.</button>
        </div>
        <button class="Message-close js-messageClose"><i class="fa fa-times"></i></button>
    </div>

    <div class="Message">
        <div class="Message-icon">
            <i class="fa fa-bell-o"></i>
        </div>
        <div class="Message-body">
            <p>Do you know that you can assign status and relation to a company right in the visit list?</p>
            <button class="Message-button" id="js-showMe">Show me how</button>
            <button class="Message-button js-messageClose">Nah, not interested</button>
        </div>
        <button class="Message-close js-messageClose"><i class="fa fa-times"></i></button>
    </div>

    <div class="Message Message--orange">
        <div class="Message-icon">
            <i class="fa fa-exclamation"></i>
        </div>
        <div class="Message-body">
            <p>You haven't authorized your LinkedIn account. Would you like some help with that?</p>
            <p class="u-italic">With your account connected we can show you what connections you have at a company that visited your site!</p>
            <button class="Message-button" id="js-authMe">Authorize!</button>
            <button class="Message-button js-messageClose">I'll just keep using carrier pigeons</button>
        </div>
        <button class="Message-close js-messageClose"><i class="fa fa-times"></i></button>
    </div>



    <?php include 'footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function closeMessage(el) {
            el.addClass('is-hidden');
        }

        $('.js-messageClose').on('click', function(e) {
            closeMessage($(this).closest('.Message'));
        });

        $('#js-helpMe').on('click', function(e) {
            alert('Help you we will, young padawan');
            closeMessage($(this).closest('.Message'));
        });

        $('#js-authMe').on('click', function(e) {
            alert('Okelidokeli, requesting data transfer.');
            closeMessage($(this).closest('.Message'));
        });

        $('#js-showMe').on('click', function(e) {
            alert("You're off to our help section. See you later!");
            closeMessage($(this).closest('.Message'));
        });

        $(document).ready(function() {
            setTimeout(function() {
                closeMessage($('#js-timer'));
            }, 5000);
        });
    </script>

</body>

</html>