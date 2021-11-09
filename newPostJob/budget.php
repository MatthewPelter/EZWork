<?php
session_start();
require_once('../classes/DB.php');
// Checking second page values for empty, If it finds any blank field then redirected to second page.
if (isset($_POST['location'])) {
    if (empty($_POST['location'])) {
        $_SESSION['error_page5'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
        header("location: location.php"); // Redirecting to second page. 
    } else {
        // Fetching all values posted from second page and storing it in variable.
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page6'])) {
        header("location: length.php"); // Redirecting to first page.
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

    <!--Post A Job More Details-->
    <div class="postJob-detail-budget">
        <div class="detail-budget-container">
            <div class="detail-progress-section">
                <div class="progressBar">
                    <progress id="jobPostProgress" value="100" max="100"></progress>
                    <ul>
                        <li id="current">Title</li>
                        <li id="current">Skills</li>
                        <li id="current">Scope</li>
                        <li id="current">Location</li>
                        <li id="current">Budget</li>
                    </ul>
                </div>
                <div class="title-card-intro">
                    <h2>Tell us about your budget.</h2>
                    <p>This will help us match you to talent within your range.</p>
                </div>
            </div>
            <div class="detail-input-section">
                <span id="error">
                    <?php
                    if (!empty($_SESSION['error_page6'])) {
                        echo $_SESSION['error_page6'];
                        unset($_SESSION['error_page6']);
                    }
                    ?>
                </span>
                <form action="postJob.php" method="post">
                    <div class="hourly">
                        <label for="rate">Hourly Rate</label>
                        <input type="radio" id="rate" name="budgetoption" value="rate" required>
                    </div>
                    <div id="rateChecked">
                        <span>Optional*</span>
                        <div class="rateChecked-container">
                            <label>Hourly Rate ($ / hour): </label>
                            <input name="hourrate" id="hourrate" type="number" placeholder="Enter $ Amount" value="">
                        </div>

                    </div>
                    <div class="budget">
                        <label for="budget">Project Budget</label>
                        <input type="radio" id="budget" name="budgetoption" value="budget">
                    </div>
                    <div id="budgetChecked">
                        <span>Optional*</span>
                        <div class="budgetChecked-container">
                            <label>Maximum Budget ($):</label>
                            <input name="maxbudget" id="maxbudget" type="number" placeholder="Enter $ Amount" value="">
                        </div>
                    </div>

                    <div class="CancelOrNext">
                        <input type="submit" value="Post Job" id="JobPost" />
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!--Post A Job End-->

    <?php include '../footer.php'; ?>

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

<script type="text/javascript">
    var ratebtn = document.getElementById('rate');
    var budgetbtn = document.getElementById('budget');

    ratebtn.addEventListener("click", function() {
        document.getElementById('budgetChecked').style.display = "none";
        document.getElementById('rateChecked').style.display = "block";
    });
    budgetbtn.addEventListener("click", function() {
        document.getElementById('rateChecked').style.display = "none";
        document.getElementById('budgetChecked').style.display = "block";
    });
</script>

</html>