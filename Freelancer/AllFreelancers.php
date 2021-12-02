<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$username = $_SESSION['userid'];
//$getUserID = "SELECT id FROM clients WHERE username = '$username'";
// $getResult = mysqli_query($conn, $getUserID);
// $userrow = mysqli_fetch_assoc($getResult);
$userID = $_SESSION['user_id'];
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
            <title>EZWork | My Postings</title>
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

    <div class="AllFreelancers">

        <div class="AllFreelancersHeader">
            <h2>All <span>EZWork</span> Freelancers</h2>
            <ul>
                <li><a href="../ClientProfile/index.html">My Profile</a></li>
                <li>/</li>
                <li>All Freelancers</li>
            </ul>
        </div>
        <div class="AllFreelancersContainer">
            <div class="freelancerCard">
                <div class="freelancerImg">
                    <img src="../Users/leo.JPG" alt="">
                </div>
                <div class="freelancerInfo">
                    <h2>Leonel Barrientos</h2>
                    <h3>Web Developer</h3>
                    <h4>$ <span>500</span> per hour</h4>
                    <h5>United States</h5>
                    <p>5 jobs completed</p>
                </div>
            </div>
            <div class="freelancerCard">
                <div class="freelancerImg">
                    <img src="../Users/leo.JPG" alt="">
                </div>
                <div class="freelancerInfo">
                    <h2>Leonel Barrientos</h2>
                    <h3>Web Developer</h3>
                    <h4>$ <span>500</span> per hour</h4>
                    <h5>United States</h5>
                    <p>5 jobs completed</p>
                </div>
            </div>
            <div class="freelancerCard">
                <div class="freelancerImg">
                    <img src="../Users/leo.JPG" alt="">
                </div>
                <div class="freelancerInfo">
                    <h2>Leonel Barrientos</h2>
                    <h3>Web Developer</h3>
                    <h4>$ <span>500</span> per hour</h4>
                    <h5>United States</h5>
                    <p>5 jobs completed</p>
                </div>
            </div>
            <div class="freelancerCard">
                <div class="freelancerImg">
                    <img src="../Users/leo.JPG" alt="">
                </div>
                <div class="freelancerInfo">
                    <h2>Leonel Barrientos</h2>
                    <h3>Web Developer</h3>
                    <h4>$ <span>500</span> per hour</h4>
                    <h5>United States</h5>
                    <p>5 jobs completed</p>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->

        <!--DataList-->
        <datalist id="allskills">
        
        </datalist>
</body>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
</html>