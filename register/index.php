<!-- REGISTER INDEX -->

<?php
    session_start();
    require_once("../classes/DB.php");
    if (isset($_SESSION["userid"])) {
        header("Location: ./index.php");
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
    <div class="register-header">
        <div class="register-header-container">
            <div class="logo">
                <a href="../index.php"><h3><span>E</span>z<span>Work</span></h3></a>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="register-container">
                <h3>Create your Free Account</h3>
                <form class="form" action="../components/register-process.php" method="post" name="register" id="myForm">
                    <div class="name">
                        <h4>Full Name</h4>
                        <p>
                            <input 
                                type="text" 
                                name="firstName" 
                                id="FirstName"
                                placeholder="First Name"
                                title="Enter your first name."
                                required
                            >
                        </p>
                        <p>
                            <input 
                                type="text" 
                                name="lastName" 
                                id="LastName"
                                placeholder="Last Name"
                                title="Enter your last name."
                                required
                            >
                        </p>
                    </div>
                    <div class="dateofBirth">
                        <h4>Date of Birth</h4>
                        <p>
                            <input 
                                type="date" 
                                name="birthday" 
                                id="BirthDate"
                                title="Please enter your date of birth."
                                required
                            >
                        </p>
                    </div>

                    <div class="contact">
                        <h4>Contact</h4>
                        <p>
                            <input 
                                type="tel" 
                                name="phone" 
                                id="Phone"
                                placeholder="Phone Number"
                                title="Enter valid phone number."
                                required
                                >
                        </p>
                    </div>

                    <div class="account">
                        <h4>Account Information</h4>
                        <p>
                            <input 
                                type="email" 
                                name="email" 
                                id="Email"
                                placeholder="Email"
                                required>
                        </p>
                        <p>
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                title="Please enter a strong password."
                                placeholder="Password"
                                required>
                        </p>
                        <span id="show">Show Password</span>
                        <p>
                            <input 
                                type="password" 
                                name="password2" 
                                id="password2"
                                title="Match Password"
                                placeholder="Match Password"
                                required>
                        </p>
                        <span id="error"></span>
                    </div>
                    <input type="submit" value="Continue" name="submit" id="continue">
                </form>
            <div class="login">
                <div class="login-container">
                    <h3>Already have an account?</h3>
                    <button onclick="location.href='../login/index.php'">Log In</button>
                </div>
            </div>
        </div>
    </section>
    <div class="register-footer">
        <div class="register-footer-container">
            <p id="register-copyright">
                &copy Copyright. 2021-
                <script>document.write(new Date().getFullYear())</script>
                EzWork&trade; Global Inc.
            </p>
            <a href="/404Page/index.html">Terms of Service</a>
            <a href="/404Page/index.html">Privacy Policy</a>
            <a href="/404Page/index.html">Accesibility</a>
        </div>
    </div>

</body>
<!--<script src="./register.js"></script>-->

</html>