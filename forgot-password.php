<?php
require_once("./classes/DB.php");
include('./classes/Mail.php');

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    return $data;
}

if (isset($_POST['resetpassword'])) {
    $cstrong = true;
    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $email = securityscan($_POST['email']);
    $result = mysqli_query($conn, "SELECT id FROM clients WHERE email='$email'");
    if (mysqli_num_rows($result) > 0) {
        $user_id = mysqli_fetch_assoc($result);
        $sql = "INSERT INTO password_tokens(token, user_id) VALUES ('" . sha1($token) . "', '" . $user_id['id'] . "')";
        $setToken = mysqli_query($conn, $sql);

        $subject = 'Forgot Password!';
        ob_start();
        include 'forgotEmail.phtml';
        $body = ob_get_clean();

        //Mail::sendMail($subject, $body, $email);
    } else {
        echo 'If email is registered, you will receive a reset password email! (Might be in spam folder!!!!)';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <title>Forgot Password?</title>

    <style type="text/css">
        body {
            margin: 0;
            font-family: "Montserrat", sans-serif;
        }

        h1 {
            font-weight: 300;
            letter-spacing: 2px;
            font-size: 48px;
        }

        h2 {
            font-weight: 300;
        }

        h3 {
            font-weight: 300;
        }

        p {
            letter-spacing: 1px;
            font-size: 14px;
            color: #333333;
        }

        .btn {
            background: linear-gradient(60deg,
                    rgba(0, 172, 193, 1) 0%,
                    rgba(84, 58, 183, 1) 100%);
            color: white;
            padding: 20px 60px;
            text-decoration: none;
            border-radius: 10%;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 14px;
        }

        .btn a {
            background: linear-gradient(60deg,
                    rgba(0, 172, 193, 1) 0%,
                    rgba(84, 58, 183, 1) 100%);
            color: white;
            padding: 20px 60px;
            text-decoration: none;
            border-radius: 10%;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 14px;
        }

        .header {
            position: relative;
            text-align: center;
            background: linear-gradient(60deg,
                    rgba(84, 58, 183, 1) 0%,
                    rgba(0, 172, 193, 1) 100%);
            color: white;
        }

        .logo {
            width: 50px;
            fill: white;
            padding-right: 15px;
            display: inline-block;
            vertical-align: middle;
        }

        .inner-header {
            height: 65vh;
            width: 100%;
            margin: 0;
            padding: 0;
            position: relative;
            line-height: 2rem;
        }

        .textBox {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .flex {
            /*Flexbox for containers*/
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .waves {
            position: relative;
            width: 100%;
            height: 15vh;
            margin-bottom: -7px;
            /*Fix for safari gap*/
            min-height: 100px;
            max-height: 150px;
        }

        .content {
            position: relative;
            height: 20vh;
            text-align: center;
            background-color: white;
        }

        /* Animation */

        .parallax>use {
            animation: move-forever 25s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;
        }

        .parallax>use:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
        }

        .parallax>use:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
        }

        .parallax>use:nth-child(3) {
            animation-delay: -4s;
            animation-duration: 13s;
        }

        .parallax>use:nth-child(4) {
            animation-delay: -5s;
            animation-duration: 20s;
        }

        @keyframes move-forever {
            0% {
                transform: translate3d(-90px, 0, 0);
            }

            100% {
                transform: translate3d(85px, 0, 0);
            }
        }

        /*Shrinking for mobile*/
        @media (max-width: 768px) {
            .waves {
                height: 40px;
                min-height: 40px;
            }

            .content {
                height: 30vh;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <!--Content before waves-->
        <div class="inner-header flex">
            <div class="textBox">
                <h1>forgot your password?</h1>
                <h2>just enter your email..</h2>
                <form action="forgot-password.php" method="post">
                    <input type="text" name="email" value="" placeholder="Email ..." required>
                    <input type="submit" name="resetpassword" value="Reset Password">
                </form>

                <a class="btn" href="https://ez-work.herokuapp.com/login/index">Go Back</a>
            </div>
        </div>
        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->
    </div>
    <!--Header ends-->

    <!--Content starts-->
    <div class="content flex">
        <p>Team Apex | 2021 | BCS 430W</p>
    </div>
    <!--Content ends-->
</body>

</html>