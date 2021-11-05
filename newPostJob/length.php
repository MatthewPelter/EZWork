<?php
session_start(); // Session starts here.
require_once('../../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../../login/index');
    echo "NOT LOGGED IN";
} else {
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM clients WHERE username = '$username' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../../login/index');
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
            <link rel="stylesheet" href="../../Styles/style.css">
        </head>
    </head>

<body>
    <?php include '../../navbar.php'; ?>


        <!--Post A Job More Details-->
        <div class="postJob-detail">
        <div class="detail-container">
            <div class="detail-progress-section">
                <div class="progressBar">
                    <progress id="jobPostProgress" value="0" max="100"></progress>
                    <ul>
                        <li id="current">Length</li>
                        <li>Title</li>
                        <li>Scope</li>
                        <li>Location</li>
                        <li>Budget</li>
                    </ul>
                </div>
                <div class="title-card-intro">
                    <h2>Let's start with the job length.</h2>
                    <p>Deciding on the job length, helps us find the best freelancers for you job, whether the job being short or long.</p>
                </div>
            </div>
            <div class="detail-input-section">
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
                <h3>Choose a Job Length<span>*Mandatory</span></h3>
                <div class="lengthContainers">
                    <div class="short">
                        <input type="radio" id="short" name="length" value="s" required>
                        <span class="checkmark"></span>
                        <label for="short">Short term or part time work</label><br>
                    </div>
                    <div class="long">
                        <input type="radio" id="long" name="length" value="l">
                        <label for="long">Designated, longer term work</label><br>    
                    </div>
                </div>

                <div class="CancelOrNext">
                    <button id="cancel"  onclick="location.href='../../ClientProfile/index.php'">Cancel</button>
                    <input type="submit" value="Next: Title" />
                </div>
            </form>

            </div>
        </div>
    </div>
    <!--Post A Job End-->

    <?php include '../../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills"></datalist>

</body>
<!--Nav bar script-->
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
<!--Toggle the nav burger button-->
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