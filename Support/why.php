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
    <title>EZWork | Why EZWork</title>
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
    
    <div class="whyEZWork">
        <div class="whyEZWorkHeader">
            <h2>Why EZWork?</h2>
        </div>

        <div class="whyEZWorkContainer">
            <div class="mission">
                <h3>Our Mission</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
                      
            <div class="missionCard">
                <span>
                    Today, it is difficult finding business as a solo entrepreneur. It’s also just as challenging to find people to perform needed work. EZWork believes that this is because of oversaturation of job posting sites, as well as lack of opportunities. EZWork wants people to earn a steady income finding work through our site, and also wants the public to hire talented people for their own services. The site allows direct communication between both people needing services and those offering services, and allows for profile and job descriptions, as well as direct payment to the individual after the work has been completed.
                </span>
                
                <span>
                    EZWork has decided to work on this problem of matching those looking for work with those needing services. There’s so much undiscovered and unappreciated talent in the world. There are creators on websites like YouTube, Instagram, and Twitter that try to get recognized for their talents, but there’s too many of them. The site will serve to give these creators and innovators an opportunity. They’ll be able to be hired for their work. This won’t be limited to online things; skilled laborers will also find that our website is friendly towards them. Handymen can find a steady number of jobs that will keep them busy. This site have user profiles, and users can post their skills. Others looking to hire can also post what they are looking for.
                </span>
            </div>

            <div class="whatIsEZWork">
                <h3>What is EZWork?</h3>
                <i class="fas fa-chevron-down"></i>
                <div class="whatCard">
                
                </div>
            </div>

            <div class="community">
                <h3>EZWork Community</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="communityCard">

            </div>
            <div class="developers">
                <h3>EZWork Developers</h3>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="developersCard">

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