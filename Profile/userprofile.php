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

                        if (preg_match('/^\+\d(\d{3})(\d{3})(\d{4})$/', $row['phone'],  $matches)) {
                            $phoneFormatted = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
                        }
                    ?>
                        <span><?php echo $row['firstname']; ?></span>
                        <span><?php echo $row['lastname']; ?></span>
                        <span><?php echo $row['email']; ?></span>
                        <span><?php echo $phoneFormatted; ?></span>
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

        <div class="profile-portfolio">
            <div class="categories-title">
                <h3>Projects Portfolio</h3>
            </div>
            <div class="categoryCard" style="border: none;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M2.178 11h-1.178v-2.209c.468 0 .774-.474.944-.997.587-1.803 1.59-4.513 4.056-6.212v3.418c0 .552.448 1 1 1s1-.448 1-1v-4.437c.868-.309 1.861-.516 3-.585v3.022c0 .552.448 1 1 1s1-.448 1-1v-3c1.134.094 2.128.327 3 .661v4.339c0 .552.448 1 1 1s1-.448 1-1v-3.269c2.391 1.7 3.463 4.304 4.057 6.063.175.52.475.997.943.997v2.209h-1.179c.575.459 1.179 1.36 1.179 3.131 0 1.63-.904 3.686-2.877 4.531-2.153 3.445-5.027 5.338-8.123 5.338-3.096 0-5.97-1.893-8.124-5.338-1.973-.845-2.876-2.901-2.876-4.531 0-1.771.603-2.672 1.178-3.131zm12.022 7.459h-4.4c.004.012.626 1.74 2.2 1.74 1.634 0 2.196-1.728 2.2-1.74zm4.517-7.459h-13.435l-.013.515c0 .668-.682 1.114-1.288.844-.169-.075-.43-.073-.617.049-.917.601-.819 3.864 1.425 4.629.916.313 2.364 3.103 3.93.398.542-.934 2.251-1.039 3.281-.297 1.029-.742 2.739-.637 3.28.297 1.566 2.705 3.014-.085 3.93-.398 2.244-.765 2.342-4.028 1.425-4.629-.215-.14-.487-.106-.616-.049-.606.271-1.289-.176-1.289-.844l-.013-.515zm-9.696.996c-.634 0-1.146.62-1.146 1.385s.512 1.385 1.146 1.385c.632 0 1.146-.62 1.146-1.385s-.514-1.385-1.146-1.385zm7.104 1.385c0 .765-.513 1.385-1.146 1.385-.633 0-1.146-.62-1.146-1.385s.513-1.385 1.146-1.385c.633 0 1.146.62 1.146 1.385z" />
                </svg>
                <p>Engineering & Architecture</p>
                <i class="fa fa-angle-right"></i>
            </div>
        </div>

    </div>
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