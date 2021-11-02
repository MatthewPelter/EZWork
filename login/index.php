<!--
LOGIN INDEX
-->

<?php
session_start();
require_once("../classes/DB.php");
if (isset($_SESSION["userid"])) {
    header("Location: ../ClientProfile/index");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
        <title>EZWork | Find Jobs or Freelancers</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
        <link rel="icon" href="../logo/logo.svg">
        <link rel="stylesheet" href="../Styles/style.css">
    </head>
</head>

<body>
    <div class="login-header">
        <div class="login-header-container">
            <div class="logo">
                <a href="../index">
                    <h3><span>E</span>z<span>Work</span></h3>
                </a>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="login-container">
                <h3>Log In To EzWork</h3>
                <span style="color: green; text-align: center;">Check out the now working Reset Password page!</span>
                <form class="form" role="form" action="../components/login-process" method="post" name="login">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <span style="color: red;font-size: 0.9rem;" id="emailError"></span>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span style="color: red;font-size: 0.9rem;" id="passwordError"> <?php if (isset($_SESSION['error'])) {
                                                                                        echo $_SESSION['error'];
                                                                                        unset($_SESSION['error']);
                                                                                    }  ?></span>
                    <span style="color: green;font-size: 0.9rem;" id="passwordError"> <?php if (isset($_SESSION['success'])) {
                                                                                            echo $_SESSION['success'];
                                                                                            unset($_SESSION['success']);
                                                                                        }  ?></span>
                    <p id="show">Show Password</p>
                    <input type="submit" value="Log In" name="submit" id="submit">
                </form>
            </div>
            <div class="help-container">
                <h3><span>______________</span> Forgot Password? <span>______________</span></h3>
                <a href="../forgot-password"><button>*NEW* Reset Password</button></a>
            </div>
            <div class="register">
                <div class="register-container">
                    <h3>Don't have an account?</h3>
                    <button onclick="location.href='../register/index'">Sign Up</button>
                </div>
            </div>
        </div>
    </section>
    <div class="login-footer">
        <div class="login-footer-container">
            <p id="login-copyright">
                &copy Copyright. 2021-
                <script>
                    document.write(new Date().getFullYear())
                </script>
                EzWork&trade; Global Inc.
            </p>
            <a href="/404Page/index.html">Terms of Service</a>
            <a href="/404Page/index.html">Privacy Policy</a>
            <a href="/404Page/index.html">Accesibility</a>
        </div>
    </div>
    <script src="/login/loginPage.js"></script>
</body>

</html>