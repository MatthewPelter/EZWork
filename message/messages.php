<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


?>

<!DOCTYPE html>
<html lang="en">

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

<body>

    <div class="profile-header-container">
        <div class="profileHeader">
            <div class="burger" id="nav-burger" onclick='myFunction(this)'>
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <div class="logo">
                <a href="../ClientProfile/index">
                    <h2>E<span>z</span>Work</h2>
                </a>
            </div>
            <div class="searchBar">
                <form id="searchContainer">
                    <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search">
                    <input type="submit" value="Find">
                </form>
            </div>
            <ul>
                <li onclick="toggleJob()" id="jobs">Jobs</li>
                <div class="jobCardContainer">
                    <div class="jobCard">
                        <div class="card card1">
                            <h4>My Jobs</h4>
                        </div>
                        <div class="card card2">
                            <h4>All Job Posts</h4>
                        </div>
                        <div class="card card3">
                            <h4>All Contracts</h4>
                        </div>
                        <div class="card card4" onclick="location.href='../PostAJob/PostAJob.html'">
                            <h4>Post A Job</h4>
                        </div>
                    </div>
                </div>
                <li onclick="toggleTalent()" id="talents">Talents</li>
                <div class="talentCardContainer">
                    <div class="talentCard">
                        <div class="card card1">
                            <h4>Discover</h4>
                        </div>
                        <div class="card card2">
                            <h4>Your Hires</h4>
                        </div>
                        <div class="card card4">
                            <h4>Talent History</h4>
                        </div>
                    </div>
                </div>
                <li onclick="toggleProject()" id="projects">Projects</li>
                <div class="projectCardContainer">
                    <div class="projectCard">
                        <div class="card card1">
                            <h4>Current Projects</h4>
                        </div>
                        <div class="card card2">
                            <h4>Project History</h4>
                        </div>
                        <div class="card card3">
                            <h4>Browse by Projects</h4>
                        </div>
                    </div>
                </div>
                <!-- Style tags are temporary -->
                <li><a style="color: white; text-decoration: none;" href="../message/messages">Messages</a></li>
            </ul>
            <div class="guide">
                <i class="fa fa-bell" title="Notification"></i>
                <i class="fa fa-question" onclick="toggleHelp()" id="question"></i>
                <div class="helpContainer">
                    <div class="helpCard">
                        <div class="card card1">
                            <h4>Help & Support</h4>
                        </div>
                        <div class="card card2">
                            <h4>Guides</h4>
                        </div>
                        <div class="card card3">
                            <h4>Contact Us</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="profileImage" onclick="toggleSession()">
                <img src="../Users/user.svg" id="profileImage1" alt="">
                <div class="sessionCardContainer">
                    <div class="sessionCard">
                        <div class="card card1">
                            <div class="image">
                                <img src="../Users/user.svg" id="profileImage3" alt="">
                            </div>
                            <div class="name">
                                <span id="name"><?php echo $_SESSION['userid']; ?></span>
                                <span id="type">Client</span>
                            </div>
                        </div>
                        <div class="card card2" onclick="location.href='../Settings/settings.html'">
                            <p>
                                <i class="fa fa-cog" aria-hidden="true"></i> Settings
                            </p>
                        </div>
                        <div class="card card3" onclick="location.href='../components/logout.php'">
                            <p>
                                <i class="fa fa-sign-out-alt"></i> Sign Out
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <i class="fa fa-search" id="mobileSearch"></i>
            <i class="fa fa-times" id="ExitmobileSearch"></i>
        </div>
    </div>

</body>

</html>