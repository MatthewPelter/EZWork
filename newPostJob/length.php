<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
} else {
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM clients WHERE username = '$username' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
    }
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

    <div class="PostAJob">
        <div class="PostAJobContainer">
            <div class="PostAJobTitle">
                <h3>Getting Started</h3>
            </div>
            <div class="PostAJobQuestion">
                <h4>Choose a Job Length<span>*Mandatory</span></h4>

                <div class="options">
                    <span id="error" style="color: red;">
                        <!---- Initializing Session for errors --->
                        <?php
                        if (!empty($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                    <form action="postTitle.php" method="post" style="width: 100%;">
                        <div class="lengthContainers">
                            <div class="short">
                                <div class="header">
                                    <div class="card1">
                                        <i class="fa fa-clock" aria-hidden="true"></i>
                                    </div>
                                    <div class="card2">
                                        <input type="radio" id="short" name="length" value="s" required>
                                    </div>
                                    
                                </div>
                                <span class="checkmark"></span>
                                <label for="short">Short term or part time work</label>
                                <div class="description">
                                    <p>Less than 30hrs/week</p>
                                    <p>Less than 3 months</p>
                                </div>
                            </div>
                            <div class="long">
                                <div class="header">
                                    <div class="card1">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                    <div class="card2">
                                        <input type="radio" id="long" name="length" value="l">
                                    </div>
                                </div>
                                <label for="long">Designated, longer term work</label>   
                                <div class="description">
                                    <p>More than 30hrs/week</p>
                                    <p>3+ months</p>
                                </div>
                            </div>
                        </div>
        
                        <div class="PostAJobCancel0rContinue">
                
                            <input type="submit" value="Next: Title" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills"></datalist>

</body>

<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
<!--nav bar script -->
<script type="text/javascript">

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

    //Toggle the nav burger button and mobile nav bar js

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


    const sortDownBtn2 = document.getElementById('freelanceArrow');
    async function toggleFreelanceCard() {
        var mobileFreelanceCard = document.querySelector(".mobileFreelanceCard");
        if (mobileFreelanceCard.style.display === "none") {
            sortDownBtn2.style.transform = "rotate(180deg)";
            mobileFreelanceCard.style.display = "inline-block";
        } else {
            mobileFreelanceCard.style.display = "none";
            sortDownBtn2.style.transform = "rotate(360deg)";
        }
    }

    const sortDownBtn3 = document.getElementById('projectsArrow');
    async function toggleProjectsCard() {
        var mobileProjectsCard = document.querySelector(".mobileProjectsCard");
        if (mobileProjectsCard.style.display === "none") {
            sortDownBtn3.style.transform = "rotate(180deg)";
            mobileProjectsCard.style.display = "inline-block";
        } else {
            mobileProjectsCard.style.display = "none";
            sortDownBtn3.style.transform = "rotate(360deg)";
        }
    }
</script>
</html>
