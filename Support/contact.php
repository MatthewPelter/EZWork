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
    <title>EZWork | Contact</title>
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
    
    <div class="contact">
        <div class="contactHeader">
            <h2>Contact Us</h2>
        </div>

        <div class="contactContainer">
            <div class="email">
                <div class="image">
                    <img src="../Image/email.jpg" alt="emailUs">
                </div>
                <div class="emailCard">
                    <h3>Contact EZWork Email</h3>
                    <span>ezworkcompany@gmail.com</span>
                    <a href="mailto:ezworkcompany@gmail.com?subject=EZWork%20Contact">Email Us</a>
                </div>
            </div>
            <div class="phone">
                <h3>Call EZWork Support Team</h3>
                <p>(516)-960-8086</p>
                <span>Tuesday & Thursday</span>
                <span>9:25am to 10:45am</span>
                <span>Business Hours</span>
            </div>

            <div class="location">
                <div class="locationCard">
                    <p>The EZWork Headquarters is located in,</p>
                    <span style="font-weight: bolder;">Farmingdale State College</span>
                    <span>2350 NY-110, Farmingdale, NY 11735</span>
                    <span>United States</span>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.4138865725595!2d-73.42888748540187!3d40.7529207430495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e82afe99b445e9%3A0x6c53280083cbf6be!2sFarmingdale%20State%20College!5e0!3m2!1sen!2sus!4v1639216553053!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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