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
    <title>EZWork | Help & Support</title>
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
    
    <div class="helpSupport">
        <div class="helpSupportHeader">
            <h2>Help & Support</h2>
        </div>

        <div class="helpSupportContainer">
            <div class="helpSupportCard">
                <h2>Log-In/Out Guide</h2>
                <i id="logUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="loginOutWrapper">
                <div class="loginOutCard">
                    <h2>How to log in to your account?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/login.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows how you log into the system. You can press on "Show Password" to see the text you write.</p>
                    
                    <h2>How to log out of your account?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/logout.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows how to log out the system.</p>
                
                </div>
            </div>
            <div class="helpSupportCard">
                <h2>Post A Job Guide</h2>
                <i id="postUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="postWrapper">
                <div class="postCard">
                    <h2>How post a job?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/postJob.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows the step by step process of posting a job to the EZWork Marketplace.</p>
                    <span>Please do your best to provide the most information possible for our freelancers.</span>
                </div>
            </div>

            <div class="helpSupportCard">
                <h2>Job Edit/Delete Guide</h2>
                <i class="fas fa-chevron-up"></i>
            </div>

            <div class="helpSupportCard">
                <h2>Find Freelancers Guide</h2>
                <i class="fas fa-chevron-up"></i>
            </div>
            <div class="helpSupportCard">
                <h2>Find Work Guide</h2>
                <i class="fas fa-chevron-up"></i>
            </div>

            <div class="helpSupportCard">
                <h2>Messaging Guide</h2>
                <i class="fas fa-chevron-up"></i>
            </div>

            <div class="helpSupportCard">
                <h2>Change Password Guide</h2>
                <i class="fas fa-chevron-up"></i>
            </div>

            <div class="helpSupportCard">
                <h2>Change Avatar Guide</h2>
                <i class="fas fa-chevron-up"></i>
            </div>

            <div class="helpSupportCard">
                <h2>Credit Card Help</h2>
                <i class="fas fa-chevron-up"></i>
            </div>

            <div class="helpSupportCard">
                <h2>EZWork Marketplace Guide</h2>
                <i class="fas fa-chevron-up"></i>
            </div>
        </div>
    </div>
    
    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>

<script>
    const logArrow = document.getElementById('logUp');

    logArrow.addEventListener('click',()=>{
        var logWrapper = document.querySelector('.loginOutWrapper');

        if(getComputedStyle(logWrapper).display === 'block'){
            logWrapper.style.display = 'none';
            logArrow.style.transform = "rotate(180deg)";
        }else{
            logWrapper.style.display = 'block';
            logArrow.style.transform = "rotate(360deg)";
        }

    });    

    const postArrow = document.getElementById('postUp');

    postArrow.addEventListener('click',()=>{
        var postWrapper = document.querySelector('.postWrapper');

        if(getComputedStyle(postWrapper).display === 'block'){
            postWrapper.style.display = 'none';
            postArrow.style.transform = "rotate(180deg)";
        }else{
            postWrapper.style.display = 'block';
            postArrow.style.transform = "rotate(360deg)";
        }

    });        
</script>

</html>