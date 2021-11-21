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

        Mail::sendMail($subject, $body, $email);
        echo 'If email is registered, you will receive a reset password email! (Might be in spam folder!!!!)';
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

    <title>EZWork | Forgot Password?</title>

    <link rel="stylesheet" href="./Styles/style.css">

</head>

<body>

    <div class="container">

        <div class="content">
            <h1>forgot your password?</h1>
            <h2>just enter your email..</h2>
            <form action="forgot-password.php" method="post">
                <input id="textbox" type="text" name="email" value="" placeholder="Email ..." required>
                <input id="reset" type="submit" name="resetpassword" value="Reset Password">
            </form>
            <a class="btn" href="https://ez-work.herokuapp.com/login/index">Go Back</a>
    
        </div>

        <div class="waves-Container">
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
        
    </div>
    <footer>
        <p>Team Apex | &copy Copyright.
            <script>document.write(new Date().getFullYear())</script>
            EzWork&trade; Global Inc. | BCS 430W
        </p> 
    </footer>

    <!--
    <div class="head">
                <h1>forgot your password?</h1>
                <h2>just enter your email..</h2>
                <form action="forgot-password.php" method="post">
                    <input id="textbox" type="text" name="email" value="" placeholder="Email ..." required>
                    <input id="reset" type="submit" name="resetpassword" value="Reset Password">
                </form>
                <a class="btn" href="https://ez-work.herokuapp.com/login/index">Go Back</a>
    </div> 
    <div class="waves-Container">
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
-->
</body>

</html>