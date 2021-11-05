<?php
session_start();
require_once('../../classes/DB.php');
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['length'])) {
    if (empty($_POST['length'])) {
        // Setting error message
        $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
        header("location: length.php"); // Redirecting to first page 
    } else {
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page2'])) {
        header("location: length.php"); //redirecting to first page
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
        <link rel="icon" href="../..//logo/logo.svg">
        <link rel="stylesheet" href="../../Styles/style.css">
    </head>
</head>

<body>

    <?php include '../../navbar.php'; ?>

    <!--Post A Job More Details-->
    <div class="postJob-detail-title">
        <div class="detail-container">
            <div class="detail-progress-section">
                <div class="progressBar">
                    <progress id="jobPostProgress" value="25" max="100"></progress>
                    <ul>
                        <li id="current">Length</li>
                        <li id="current">Title</li>
                        <li>Scope</li>
                        <li>Location</li>
                        <li>Budget</li>
                    </ul>
                </div>
                <div class="title-card-intro">
                    <h2>Let's add a strong title and description.</h2>
                    <p>A strong, detailed title would stand out to the right freelancers. It's the first thing they would see. Be very descriptive</p>
                </div>
            </div>
            <div class="detail-input-section">
                <span id="error" style="color: red;padding: 0;">
                    <?php
                    // To show error of page 2.
                    if (!empty($_SESSION['error_page2'])) {
                        echo $_SESSION['error_page2'];
                        unset($_SESSION['error_page2']);
                    }
                    ?>
                </span>
                <form action="scope.php" method="post" style="width: 100%;">
                    <h3>Write a title for your job post</h3>
                    <div class="titleContainer">
                        <input name="title" id="title" type="text" placeholder="I need my garage door installed..." value=""><br />
                    </div>
                    <h4>Example titles</h4>
                    <ul>
                        <li>Build a website for my local coffee shop business</li>
                        <li>Logo Designer needed to design a modern company logo.</li>
                        <li>Computer Technician needed to build my custom gaming pc.</li>
                    </ul>
                    <h3>Enter a job description</h3>
                    <div class="descriptionContainer">
                        <input name="description" id="description" type="text" placeholder="My son drove into my garage door and completely ruined my beautiful door..." value="">
                    </div>
                    <div class="CancelOrNext">
                        <input type="reset" value="Reset" id="reset" />

                        <input type="submit" value="Next" id="nextScope" />
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
</script>
<!--Toggle the nav burger button-->
<script>
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
</script>

</html>
<?php
/* We can use this for the registration to improve input validation


$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
 if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
 // Validating Contact Field using regex.
 if (!preg_match("/^[0-9]{10}$/", $_POST['contact'])){ 
 $_SESSION['error'] = "10 digit contact number is required.";
 header("location: page1_form.php");
 } else {
 if (($_POST['password']) === ($_POST['confirm'])) {
 
 } else {
 $_SESSION['error'] = "Password does not match with Confirm Password.";
 header("location: page1_form.php"); //redirecting to first page
 }
 }
 } else {
 $_SESSION['error'] = "Invalid Email Address";
 header("location: page1_form.php");//redirecting to first page
 }
 */
?>