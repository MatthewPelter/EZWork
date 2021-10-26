<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$uname = $_GET['name'];
$cleanuname = mysqli_real_escape_string($conn, $uname);

if ($cleanuname == $_SESSION['userid']) {
    header('Location: ../ClientProfile/index');
}

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

    <?php include '../navbar.php'; ?>


    <div class="profile">
        <div class="user-profile-header">
            <h2 id="username"><?php echo $row['username']; ?></h2>
            <div class="quick-links">
                <?php if ($dataFound) { ?>
                    <button id="quick-link-job" onclick="location.href='../message/messages?mid=<?php echo $row['id']; ?>'">Message User</button>
                <?php } ?>
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
                        <span>This is just temporary. We will not expose this information.</span>
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

    <!-- ENTER PORTFOLIO SECTION HERE -->


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