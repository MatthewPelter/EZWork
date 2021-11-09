<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

// Check if user is logged in. If not send them to the log in.
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
    }
}

$jobsSQL = "SELECT * FROM jobs ORDER BY id DESC";
$jobsQuery = mysqli_query($conn, $jobsSQL);

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
    
    <div class="jobs2">
        <div class="jobs-header">
            <h4>Find Work</h4>
            <div class="searchBar">
                <form id="searchContainer">
                    <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search" id="search">
                    <input type="submit" value="Search" id="find" >
                </form>
            </div>
        </div>

        <div class="jobs-container">
            <div class="sortMenu">
                <h3>Filter</h3>
            </div>

            <div class="allJobs">

                <div class="allJobsContainer">
                    <div class="JobsHeader">
                        <h3>All Jobs</h3>
                    </div>

                    <div class="jobPost">
                        <div class="job-title">
                            <a href="#/">Ezwork</a>
                        </div>
                        <div class="status">
                            <p>Status:</p>
                            <span>Open</span>
                        </div>
                        <div class="card1">
                            <div class="postedOn">
                                <p>Posted on:</p>
                                <span>12/18/2021</span>
                            </div>
                            <div class="postedBy">
                                <p>Posted By:</p>
                                <span>Leo</span>
                            </div>
                        </div>

                        <div class="card2">
                            <div class="location">
                                <p>Location: </p>
                                <span>Worldwide</span>
                            </div>
                            
                            <div class="price">
                                <p>Pay: $</p>
                                <span>500,000</span>
                            </div>
                        </div>

                    </div>

                    <div class="JobsFooter">
                        <p>SPACER</p>
                    </div>
                </div>

            </div>
    
            <div class="myProfile">

                <div class="header">
                    <img src="../Users/leo.JPG" alt="">
                    <h4>My Profile</h4>
                </div>

                <div class="view">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <a href="#/">View my Profile</a>
                </div>

            </div>
        </div>
    </div>
  

    <?php include '../footer.php'; ?>

        <!--DataList-->
        <datalist id="allskills">
        
        </datalist>
</body>
<script src="../SkillsContainer/searchProfile.js"></script>
<script src="./app.js"></script>
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
<script>
const sortDownBtn = document.getElementById('jobArrow');
function toggleJobCard(){
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