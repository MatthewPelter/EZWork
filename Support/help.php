<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <title>EZWork | Help & Support</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="icon" href="../logo/logo.svg">
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>

    <?php include '../navbar.php'; ?>
    
    <div class="help">
        <div class="helpHeader">
            <h2>Help & Support</h2>
        </div>

        <div class="helpContainer">
        <div class="helpCard">
                    <h2>Login & Register</h2>
                </div>
                <div class="helpCard">
                    <h2>Post A Job</h2>
                </div>
                <div class="helpCard">
                    <h2>Find Freelancers</h2>
                </div>
                <div class="helpCard">
                    <h2>Find Work</h2>
                </div>

                <div class="helpCard">
                    <h2>Messaging</h2>
                </div>

                <div class="helpCard">
                    <h2>Change Password</h2>
                </div>

                <div class="helpCard">
                    <h2>Change Avatar</h2>
                </div>

                <div class="helpCard">
                    <h2>Credit Card Help</h2>
                </div>

                <div class="helpCard">
                    <h2>Job Help</h2>
                </div>

                <div class="helpCard">
                    <h2>EZWork Marketplace</h2>
                    <i class="fas fa-chevron-up"></i>
                </div>
        </div>
    </div>
    
    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>

<!--Script for the search bar and datalist-->
<scrip src="../SkillsContainer/allJobsSkills.js"></script>

</html>