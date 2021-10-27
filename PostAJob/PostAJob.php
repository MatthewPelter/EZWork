<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

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

        <!-- NAV BAR -->
        <?php include '../navbar.php'; ?>
        <!-- END NAVBAR -->

    <!--Post A Job Start-->
   
    <div class="PostAJob">
        <div class="PostAJobContainer">
            <div class="PostAJobTitle">
                <h3>Getting Started</h3>
            </div>
            <div class="PostAJobQuestion">
                <h4>Choose an Option</h4>
                <div class="options">
                    <div class="optionCard" id="option1">
                        <div class="choosen">
                            <i class="fa fa-circle" aria-hidden="true" id="option1Circle"></i>
                        </div>
                        <div class="option1">
                            <i class="fa fa-clock" aria-hidden="true"></i>
                            <h4>Short term or part time work</h4>
                            <p>Less than 30hrs/week</p>
                            <p>Less than 3 months</p>
                        </div>
                    </div>
                    <div class="optionCard" id="option2">
                        <div class="choosen">
                            <i class="fa fa-circle" aria-hidden="true" id="option2Circle"></i>
                        </div>
                        <div class="option2">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <h4>Designated, longer term work</h4>
                                <p>More than 30hrs/week</p>
                                <p>3+ months</p>
                         </div>
                    </div>
                </div>
            </div>
            <div class="PostAJobCancel0rContinue">
                <button id="cancel" onclick="location.href='../ClientProfile/index.php'">Cancel</button>
                <button id="continue">Continue</button>
            </div>
        </div>
    </div>
    <!--Post A Job End-->


    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->

    <!--DataList-->
    <datalist id="allskills">
    </datalist>
</body>

<script src="./PostAJob.js"></script>



<script src="../SkillsContainer/searchProfile.js"></script>

<!-- Nav bar script -->
<script>
    var job = document.querySelector('.jobCard');
    var talent = document.querySelector('.talentCard');
    var project = document.querySelector('.projectCard');
    var help = document.querySelector('.helpCard');
    var session = document.querySelector('.sessionCard');
    function toggleJob(){
        var job = document.querySelector('.jobCard');
        if(job.style.display === 'none'){
            job.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            job.style.display='none';
            
        }
    }
    function toggleTalent(){
        var talent = document.querySelector('.talentCard');
        if(talent.style.display==='none'){
            talent.style.display = 'inline-block';
            job.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            talent.style.display = 'none';
        }
    }
    function toggleProject(){
        var project = document.querySelector('.projectCard');
        if(project.style.display==='none'){
            project.style.display = 'inline-block';
            talent.style.display = 'none';
            job.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            project.style.display = 'none';
        }
    }
    function toggleHelp(){
        var help = document.querySelector('.helpCard');
        if(help.style.display==='none'){
            help.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            job.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            help.style.display = 'none';
        }
    }
    function toggleSession(){
       
        if(session.style.display==='none'){
            session.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            job.style.display = 'none';
        }
        else{
            session.style.display = 'none';
        }
    }

</script>
<!--Toggle the nav burger button for mobile-->
<script>
    const navIcon = document.getElementById("nav-burger");
    const profileMobileNav = document.querySelector(".profile-mobile-nav");

    function myFunction(x) {
        x.classList.toggle("change");
        if(x.classList.contains('change')){
            profileMobileNav.style.display = "inline-block";
            searchIcon.style.opacity='0';
        }
        else{
            profileMobileNav.style.display='none';
            searchIcon.style.opacity='1';
        }
    }
</script>
</html>