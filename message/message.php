<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

$uname = $_GET['user'];
$cleanuname = mysqli_real_escape_string($conn, $uname);

$sql = "SELECT * FROM clients WHERE username='$cleanuname'";
$result = mysqli_query($conn, $sql);
$dataFound = false;

if (mysqli_num_rows($result) > 0) {
    $dataFound = true;
    $row = mysqli_fetch_assoc($result);
} else {
    header('Location: ../ClientProfile/index');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>

    <style type="text/css">
        body {
            background-color: #444442;
            padding-top: 85px;
        }

        h1 {
            font-family: 'Poppins', sans-serif, 'arial';
            font-weight: 600;
            font-size: 72px;
            color: white;
            text-align: center;
        }

        h4 {
            font-family: 'Roboto', sans-serif, 'arial';
            font-weight: 400;
            font-size: 20px;
            color: #9b9b9b;
            line-height: 1.5;
        }

        /* ///// inputs /////*/

        input:focus~label,
        textarea:focus~label,
        input:valid~label,
        textarea:valid~label {
            font-size: 0.75em;
            color: #999;
            top: -5px;
            -webkit-transition: all 0.225s ease;
            transition: all 0.225s ease;
        }

        .styled-input {
            float: left;
            width: 293px;
            margin: 1rem 0;
            position: relative;
            border-radius: 4px;
        }

        @media only screen and (max-width: 768px) {
            .styled-input {
                width: 100%;
            }
        }

        .styled-input label {
            color: #999;
            padding: 1.3rem 30px 1rem 30px;
            position: absolute;
            top: 10px;
            left: 0;
            -webkit-transition: all 0.25s ease;
            transition: all 0.25s ease;
            pointer-events: none;
        }

        .styled-input.wide {
            width: 650px;
            max-width: 100%;
        }

        input,
        textarea {
            padding: 30px;
            border: 0;
            width: 100%;
            font-size: 1rem;
            background-color: #2d2d2d;
            color: white;
            border-radius: 4px;
        }

        input:focus,
        textarea:focus {
            outline: 0;
        }

        input:focus~span,
        textarea:focus~span {
            width: 100%;
            -webkit-transition: all 0.075s ease;
            transition: all 0.075s ease;
        }

        textarea {
            width: 100%;
            min-height: 15em;
        }

        .input-container {
            width: 650px;
            max-width: 100%;
            margin: 20px auto 25px auto;
        }

        .submit-btn {
            padding: 7px 35px;
            border-radius: 60px;
            display: inline-block;
            background-color: #4b8cfb;
            color: white;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.06),
                0 2px 10px 0 rgba(0, 0, 0, 0.07);
            -webkit-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .submit-btn:hover {
            transform: translateY(1px);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.10),
                0 1px 1px 0 rgba(0, 0, 0, 0.09);
        }

        @media (max-width: 768px) {
            .submit-btn {
                width: 100%;
                float: none;
                text-align: center;
            }
        }

        input[type=checkbox]+label {
            color: #ccc;
            font-style: italic;
        }

        input[type=checkbox]:checked+label {
            color: #f00;
            font-style: normal;
        }
    </style>
</head>

<body>
    <?php
    if ($dataFound) {
    ?>
        <div class="container">
            <div class="row">
                <h1>Send Message</h1>
            </div>
            <div class="row">
                <h4 style="text-align:center">To <?php echo $row['username']; ?></h4>
            </div>
            <div class="row input-container">
                <form class="form" role="form" action="../components/send-message.php?user=<?php echo $cleanuname; ?>" method="post" name="message">
                    <div class="col-xs-12">
                        <div class="styled-input wide">
                            <textarea name="msg" id="msg" required></textarea>
                            <label>Message</label>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <input type="submit" value="Send Message" name="submit" class="btn-lrg submit-btn">
                    </div>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>