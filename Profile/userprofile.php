<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$uname = $_GET['name'];
$cleanuname = mysqli_real_escape_string($conn, $uname);
$sql = "SELECT * FROM clients WHERE username='$cleanuname'";
$result = mysqli_query($conn, $sql);
$dataFound = false;

if (mysqli_num_rows($result) > 0) {
    $dataFound = true;
    $row = mysqli_fetch_assoc($result);
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
    <div class="profile-mobile-nav">
        <div class="profile-nav-search">
            <form id="searchContainer">
                <input type="text" list="allskills" autocomplete="off" name="searchNAV" placeholder="Search">
                <input type="submit" value="Find">
            </form>
        </div>
        <div class="mobileNavCard" id="navProfile">
            <img src="../Users/user.svg" alt="">
            <span id="user"><?php echo $_SESSION['userid']; ?></span>
            <i class="fa fa-sort-down"></i>
        </div>
        <div class="mobileNavCard" id="mobile-job-card" onclick="toggleJobCard(this)">
            <p>Jobs</p>
            <i class="fa fa-sort-down" id="jobArrow"></i>
        </div>
        <div class="mobileJobCard">
            <ul>
                <a href="./index">
                    <li>My Jobs</li>
                </a>
                <a href="#/">
                    <li>All Job Posts</li>
                </a>
                <a href="#/">
                    <li>All Contracts</li>
                </a>
                <a href="../PostAJob/PostAJob.html">
                    <li>Post A Job</li>
                </a>
            </ul>
        </div>
        <div class="mobileNavCard">
            <p>Talent</p>
            <i class="fa fa-sort-down"></i>
        </div>
        <div class="mobileNavCard">
            <p>Projects</p>
            <i class="fa fa-sort-down"></i>
        </div>
        <div class="mobileNavCard">
            <p>Messages</p>
        </div>
        <div class="mobileNavCard">
            <p>Help</p>
            <i class="fa fa-question" title="Help"></i>
        </div>
        <div class="mobileNavCard">
            <p>Notifications</p>
            <i class="fa fa-bell" title="Notification"></i>
        </div>
        <div class="mobileNavCard mobileNavSettings" onclick="location.href='../Settings/settings.html'">
            <p>
                <i class="fa fa-cog" aria-hidden="true"></i> Settings
            </p>
        </div>
        <div class="mobileNavCard mobileNavLogOut" onclick="location.href='../components/logout'">
            <p>
                <i class="fa fa-sign-out-alt"></i> Sign Out
            </p>
        </div>
    </div>
    <div class="mobileSearchCard">
        <div class="profile-nav-search">
            <form id="searchContainer">
                <input type="text" list="allskills" autocomplete="off" placeholder="Search" id="searchMain">
                <input type="submit" value="Find">
            </form>
        </div>
    </div>
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
                <li>Messages</li>
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

    <div class="profile">
        <div class="user-profile-header">
            <h2 id="username"><?php echo $row['username']; ?></h2>
            <div class="quick-links">
                <button id="quick-link-job" onclick="location.href='../message/sendmessage.php?user=<?php echo $row['username']; ?>'">Message User</button>
            </div>
        </div>

        <div class="user-profile-body">
            <div class="user-postings user-info">
                <div class="card title">
                    <h3>User Information</h3>
                </div>
                <div class="card result">
                    <?php
                    if ($dataFound) {
                    ?>
                        <span><?php echo $row['firstname']; ?></span>
                        <span><?php echo $row['lastname']; ?></span>
                        <span><?php echo $row['email']; ?></span>
                        <span><?php echo $row['phone']; ?></span>
                    <?php
                    } else {
                    ?>
                        <span>User does not Exists</span>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php
    if ($dataFound) {
    ?>
        <div class="user-profile-body portfolio-section">
            <div class="user-postings user-info">
                <div class="card title">
                    <h3><?php echo $row['username']; ?>'s Portfolio</h3>
                </div>
                <div class="card result">


                </div>
            </div>
        </div>
    <?php } ?>


    <div class="profileFooter">
        <div class="profile-links">
            <div class="links">
                <ul>
                    <a href="../PostAJob/PostAJob.html">Post a Job</a>
                    <a href="#/">Find Talent</a>
                    <a href="#/">Browse Projects</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">About Us</a>
                    <a href="#/">Developers</a>
                    <a href="#/">Contact Us</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">Help & Support</a>
                    <a href="#/">EZWork Reviews</a>
                    <a href="#/">Trust & Security</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">Terms of Service</a>
                    <a href="#/">Privacy Policy</a>
                    <a href="#/">Accessibility</a>
                </ul>
            </div>
        </div>
        <div class="profile-social-links">
            <p>Follow Us</p>
            <a href="https://github.com/leobarrientos02/" target="_blank" rel="noopener noreferrer"><i class="fa fa-github" aria-hidden="true"></i></a>
            <a href="https://twitter.com/L3O_BARRI3nT0S" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/in/leonel-barrientos-519b5a152/" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/channel/UCnLwo3-caCdv6eOjGzJ0eEg" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/leo_barrientos182/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <div class="copyright">
            <p>
                &copy Copyright. 2021-
                <script>
                    document.write(new Date().getFullYear())
                </script>
                EzWork&trade; Global Inc.
            </p>
        </div>
    </div>

</body>
<script src="../SkillsContainer/searchProfile.js"></script>
<script src="./app.js"></script>
<script>
    var job = document.querySelector('.jobCard');
    var talent = document.querySelector('.talentCard');
    var project = document.querySelector('.projectCard');
    var help = document.querySelector('.helpCard');
    var session = document.querySelector('.sessionCard');

    function toggleJob() {
        var job = document.querySelector('.jobCard');
        if (job.style.display === 'none') {
            job.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        } else {
            job.style.display = 'none';

        }
    }

    function toggleTalent() {
        var talent = document.querySelector('.talentCard');
        if (talent.style.display === 'none') {
            talent.style.display = 'inline-block';
            job.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        } else {
            talent.style.display = 'none';
        }
    }

    function toggleProject() {
        var project = document.querySelector('.projectCard');
        if (project.style.display === 'none') {
            project.style.display = 'inline-block';
            talent.style.display = 'none';
            job.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        } else {
            project.style.display = 'none';
        }
    }

    function toggleHelp() {
        var help = document.querySelector('.helpCard');
        if (help.style.display === 'none') {
            help.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            job.style.display = 'none';
            session.style.display = 'none';
        } else {
            help.style.display = 'none';
        }
    }

    function toggleSession() {

        if (session.style.display === 'none') {
            session.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            job.style.display = 'none';
        } else {
            session.style.display = 'none';
        }
    }

    const navIcon = document.getElementById("nav-burger");
    const profileMobileNav = document.querySelector(".profile-mobile-nav");

    function myFunction(x) {
        x.classList.toggle("change");
        if (x.classList.contains('change')) {
            profileMobileNav.style.display = "inline-block";
            searchIcon.style.opacity = '0';
        } else {
            profileMobileNav.style.display = 'none';
            searchIcon.style.opacity = '1';
        }
    }

    const sortDownBtn = document.getElementById('jobArrow');
    async function toggleJobCard() {
        var mobileJobCard = document.querySelector(".mobileJobCard");
        if (mobileJobCard.style.display === "none") {
            sortDownBtn.style.transform = "rotate(180deg)";
            mobileJobCard.style.display = "inline-block";
        } else {
            mobileJobCard.style.display = "none";
            sortDownBtn.style.transform = "rotate(360deg)";
        }
    }
</script>

</html>