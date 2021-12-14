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
                <i id="editUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="editWrapper">
                <div class="editCard">
        
                    <h2>How to edit your job?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/editJob.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows how to edit a job, you can edit most of the details posted.</p>
                    
                    <h2>How to delete your job?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/deleteJob.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows how to delete your job from the EZWork marketplace.</p>
                    
                </div>
            </div>

            <div class="helpSupportCard">
                <h2>Find Freelancers Guide</h2>
                <i id="findFUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="findFWrapper">
                <div class="findFCard">
                    <h2>How to find an EZWork Freelancer?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/findFreelancer.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows all ways you can find a freelancer in our EZWork System.</p>
                    
                    <h2>How to hire an EZWork Freelancer?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/hireFreelancer.mp4" type="video/mp4">
                    </video>
                    <p>Unless a freelancer send you a proposal, the only way you can hire a freelancer is by viewing the Services Page.</p>
                    
                </div>
            </div>

            <div class="helpSupportCard">
                <h2>Find Work Guide</h2>
                <i id="findWUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="findWWrapper">
                <div class="findWCard">
                    <h2>How to find Work as a Freelancer?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/findWork.mp4" type="video/mp4">
                    </video>
                    <p>If you are a freelancer, the EZWork system provides many job oppurtunities, the video above demonstrates how you can find work using the EZWork system.</p>
                </div>
            </div>

            <div class="helpSupportCard">
                <h2>Messaging Guide</h2>
                <i id="messageUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="messageWrapper">
                <div class="messageCard">
                    <h2>How to use the message system and send direct messages to other users?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/messageSystem.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows how to message someone on the system, send messages, and read messages.</p>
                    <span>Please try to not offend any one.</span>
                </div>
            </div>

            <div class="helpSupportCard">
                <h2>Change Password Guide</h2>
                <i id="cPasswordUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="cPasswordWrapper">
                <div class="cPasswordCard">
                    <h2>How to change your password?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/cPassword.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows how you can change your current password. You must enter the correct current password, the new password must by at least 8 characters, and you must match your new password.</p>
                    <span>If you done remember your password, please visit the login page and press on "Forgot Password".</span>
                </div>
            </div>

            <div class="helpSupportCard">
                <h2>Change Avatar Guide</h2>
                <i id="cAvatarUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="cAvatarWrapper">
                <div class="cAvatarCard">
                    <h2>How to change your avatar or profile picture?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/avatar.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows how you can change your avatar or your profile picture through the settings page. If you plan on changing your avatar, you must press on browse and select an image. You will see the file name on the bottom of the browse button. If file name is visible, then you must remember to press on upload photo. Once done, you have succesfully changed your avatar.</p>
                    <span>Please try to upload a clear image for everyone.</span>
                </div>
            </div>

            <div class="helpSupportCard">
                <h2>Credit Card Help</h2>
                <i id="creditUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="creditWrapper">
                <div class="creditCard">
                    <h2>How to add a credit card and add funds?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/credit.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows how to add a credit card and add funds. This can be done by going to the settings page and clicked on the "Billing Methods" tab. Here you can add your credit card and once done, you can begin to add funds.</p>
                    <span>Please try to not share your private information to other.</span>
                </div>
            </div>

            <div class="helpSupportCard">
                <h2>EZWork Marketplace Guide</h2>
                <i id="ezMarketUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="ezMarketWrapper">
                <div class="ezMarketCard">
                    <h2>How to use the EZWork Marketplace to find what you are looking for?</h2>
                    <video muted width="70%" height="50%" controls>
                        <source src="../vid/ezMarket.mp4" type="video/mp4">
                    </video>
                    <p>The video above shows the EZWork Martplace. Here is where you can find all jobs posted and all freelancers in the EZWork System. You can click on the freelancers card to go straight to their profile. In addition, you can filter and sort through all the jobs posted in the system, to find exactly what you need or want.</p>
                </div>
            </div>


            <div class="helpSupportCard">
                <h2>Still need Help?</h2>
                <i id="stillUp" class="fas fa-chevron-up"></i>
            </div>

            <div class="stillWrapper">
                <div class="stillCard">
                    <h2>Can't find what you are looking for?</h2>
                    <a href="./contact.php">Contact Us</a>
                </div>
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
    
    const editArrow = document.getElementById('editUp');

    editArrow.addEventListener('click',()=>{
        var editWrapper = document.querySelector('.editWrapper');

        if(getComputedStyle(editWrapper).display === 'block'){
            editWrapper.style.display = 'none';
            editArrow.style.transform = "rotate(180deg)";
        }else{
            editWrapper.style.display = 'block';
            editArrow.style.transform = "rotate(360deg)";
        }

    });
    
    const findFArrow = document.getElementById('findFUp');

    findFArrow.addEventListener('click',()=>{
        var findFWrapper = document.querySelector('.findFWrapper');

        if(getComputedStyle(findFWrapper).display === 'block'){
            findFWrapper.style.display = 'none';
            findFArrow.style.transform = "rotate(180deg)";
        }else{
            findFWrapper.style.display = 'block';
            findFArrow.style.transform = "rotate(360deg)";
        }

    });
    
    const findWArrow = document.getElementById('findWUp');

    findWArrow.addEventListener('click',()=>{
        var findWWrapper = document.querySelector('.findWWrapper');

        if(getComputedStyle(findWWrapper).display === 'block'){
            findWWrapper.style.display = 'none';
            findWArrow.style.transform = "rotate(180deg)";
        }else{
            findWWrapper.style.display = 'block';
            findWArrow.style.transform = "rotate(360deg)";
        }

    });
    const messageArrow = document.getElementById('messageUp');

    messageArrow.addEventListener('click',()=>{
        var messageWrapper = document.querySelector('.messageWrapper');

        if(getComputedStyle(messageWrapper).display === 'block'){
            messageWrapper.style.display = 'none';
            messageArrow.style.transform = "rotate(180deg)";
        }else{
            messageWrapper.style.display = 'block';
            messageArrow.style.transform = "rotate(360deg)";
        }

    });

    const cAvatarArrow = document.getElementById('cAvatarUp');

    cAvatarArrow.addEventListener('click',()=>{
        var cAvatarWrapper = document.querySelector('.cAvatarWrapper');

        if(getComputedStyle(cAvatarWrapper).display === 'block'){
            cAvatarWrapper.style.display = 'none';
            cAvatarArrow.style.transform = "rotate(180deg)";
        }else{
            cAvatarWrapper.style.display = 'block';
            cAvatarArrow.style.transform = "rotate(360deg)";
        }

    });

    const creditArrow = document.getElementById('creditUp');

    creditArrow.addEventListener('click',()=>{
        var creditWrapper = document.querySelector('.creditWrapper');

        if(getComputedStyle(creditWrapper).display === 'block'){
            creditWrapper.style.display = 'none';
            creditArrow.style.transform = "rotate(180deg)";
        }else{
            creditWrapper.style.display = 'block';
            creditArrow.style.transform = "rotate(360deg)";
        }

    });

    const ezMarketArrow = document.getElementById('ezMarketUp');

    ezMarketArrow.addEventListener('click',()=>{
        var ezMarketWrapper = document.querySelector('.ezMarketWrapper');

        if(getComputedStyle(ezMarketWrapper).display === 'block'){
            ezMarketWrapper.style.display = 'none';
            ezMarketArrow.style.transform = "rotate(180deg)";
        }else{
            ezMarketWrapper.style.display = 'block';
            ezMarketArrow.style.transform = "rotate(360deg)";
        }

    });
    const cPasswordArrow = document.getElementById('cPasswordUp');

    cPasswordArrow.addEventListener('click',()=>{
        var cPasswordWrapper = document.querySelector('.cPasswordWrapper');

        if(getComputedStyle(cPasswordWrapper).display === 'block'){
            cPasswordWrapper.style.display = 'none';
            cPasswordArrow.style.transform = "rotate(180deg)";
        }else{
            cPasswordWrapper.style.display = 'block';
            cPasswordArrow.style.transform = "rotate(360deg)";
        }

    });
    const stillArrow = document.getElementById('stillUp');

    stillArrow.addEventListener('click',()=>{
        var stillWrapper = document.querySelector('.stillWrapper');

        if(getComputedStyle(stillWrapper).display === 'block'){
            stillWrapper.style.display = 'none';
            stillArrow.style.transform = "rotate(180deg)";
        }else{
            stillWrapper.style.display = 'block';
            stillArrow.style.transform = "rotate(360deg)";
        }

    });

</script>

</html>