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

    <!-- NAV BAR -->
    <?php include '../navbar.php'; ?>
    <!-- END NAVBAR -->


    <div class="settings">
        <div class="settings-nav">
            <ul>
                <li style="background: lightgrey;" id="myInfo"><div class="tab"></div><a href="#/"><i class="fa fa-user"></i> My Info</a></li>
                <li  id="passwordSecurity"><a href="#/"><i class="fa fa-lock"></i> Password & Security</a></li>
                <li  id="billingMethods"><a href="#/"><i class="fa fa-credit-card-alt"></i> Billing Methods</a></li>
                <li  id="notification"><a href="#/"><i class="fa fa-envelope"></i> Notification Settings</a></li>
                <li  id="connectedServices"><a href="#/"><i class="fa fa-link"></i> Connected Services</a></li>
            </ul>
        </div>
        <div class="settings-container">
            <div class="settings-container-title">
                <h2 id="settings-title">My Info</h2>
            </div>
            <div class="settings-account-container">
                <div class="settings-account-card">
                    <h3>Account</h3>
                    <i class="fa fa-pencil" onclick="openCard()" id="editAccountIcon" aria-hidden="true"></i>
                </div>
                <div class="settings-account-profile-image">
                    <img src="../Users/user.svg" alt="">
                </div>
                <div class="settings-account-profile-info">
                    <?php
                        if ($dataFound) {
                    ?>
                    <p>UserName: <span id="settingsName"><?php echo $_SESSION['userid']; ?></span></p>
                    <p>Account Type: <span>Client</span></p>
                    <p>Phone Number: <span id="settingsPhone"><?php echo $row['phone']; ?></span></p>
                    <p>Email: <span id="settingsEmail"><?php echo $row['email']; ?></span></p>
                    <?php
                    } else {
                    ?>
                        <span>Error retrieving data.</span>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="settings-account-godMode">
                <p>This is a <span id="accountType">Client</span> account.</p>
                <button id="becomeFreelancer">Become Freelancer</button>
                <button id="deleteAccount" onclick="openCard()">Delete Account</button>
            </div>
        </div>

        <!--Password section-->
        <div class="settings-password">
            <div class="settings-container-title">
                <h2 id="settings-title">Password & Security</h2>
            </div>
            <div class="settings-password-container">
                <div class="settings-password-card">
                    <h3>Password</h3>
                    <i class="fa fa-pencil" onclick="openCard()" id="changePasswordIcon" aria-hidden="true"></i>
                </div>
                <div class="settings-password-card2">
                    <p>Use this section to view and edit your current password.</p>
                </div>
            </div>
            <div class="settings-password-twoStep">
                <div class="settings-password-twoStep-card">
                    <h3>Two-step verification options</h3>
                    <p>Add an extra layer of security to prevent unauthorized access.</p>
                </div>
                <div class="settings-password-twoStep-option">
                    <div class="option-card">
                        <h3>Text Message</h3>
                        <p>Recieve a six digit code by text message to confirm it's you.</p>
                    </div>
                    <button onclick="guidGenerator()">Enable</button>
                </div>
                <div class="settings-password-twoStep-option">
                    <div class="option-card">
                        <h3>Email</h3>
                        <p>Recive a six digit code by email to confirm it's you.</p>
                    </div>
                    <button onclick="guidGenerator()">Enable</button>
                </div>
                <div class="settings-password-twoStep-option" style="border: none;">
                    <div class="option-card">
                        <h3>Security Question</h3>
                        <p>Answer a question you choose to confirm it's you.</p>
                    </div>
                    <button onclick="guidGenerator()">Enable</button>
                </div>
            </div>
        </div>
        <div class="settings-billing">
            <div class="settings-container-title">
                <h2 id="settings-title">Billing Methods & Payments</h2>
            </div>
            <div class="settings-balance-container">
                <div class="settings-balance-card">
                    <h3>Balance Due</h3>
                </div>
                <div class="settings-balance-card2">
                    <p>Your balance due is <span>$</span><span id="balance">0.00</span></p>
                    <button id="payBalance">Pay Now</button>
                </div>
            </div>
            <div class="settings-billing-container">
                <div class="settings-billing-card">
                    <h3>Billing Methods</h3>
                    <button>Add a New Billing Method</button>
                </div>
                <div class="settings-billing-option">
                    <p>You have not set up any billing methods yet.</p>
                    <span>Set up your billing methods so you'll be able to hire right away when you're ready.</span>
                </div>
            </div>
        </div>
        <div class="notification">
            <div class="settings-container-title">
                <h2 id="settings-title">Notification Settings</h2>
            </div>
        </div>
        <div class="connectedServices">
            <div class="settings-container-title">
                <h2 id="settings-title">Connected Services</h2>
            </div>
        </div>
        <div id="myOverlay" class="overlay">
            <span class="closebtn" onclick="closeCard()" title="Close Overlay">×</span>
            <form id="editForm" >
                <label for="password">Confirm Password</label>
                <input type="password" name="password" id="password" required placeholder="Confirm your password">
                <input type="button" id="continueBtn" value="Continue">
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END NAVBAR -->

                   
    <!--DataList-->
    <datalist id="allskills"></datalist>
</body>
<script src="./settings.js"></script>
<script src="../SkillsContainer/searchProfile.js"></script>
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
    function openCard() {
      document.getElementById("myOverlay").style.display = "block";
    }
    
    function closeCard() {
      document.getElementById("myOverlay").style.display = "none";
    }
</script>
<script>
    function guidGenerator() {
    var S4 = function() {
       return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
    };
    console.log((S4()+S4()+"-"+S4()+S4()));
}
</script>
</html>