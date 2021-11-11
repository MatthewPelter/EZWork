<?php
session_start();
require_once('../classes/DB.php');
// Checking second page values for empty, If it finds any blank field then redirected to second page.

if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
}


if (isset($_POST['size'])) {
    if (empty($_POST['size']) || empty($_POST['months']) || empty($_POST['experience'])) {
        $_SESSION['error_page4'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
        header("location: scope.php"); // Redirecting to second page. 
    } else {
        // Fetching all values posted from second page and storing it in variable.
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page5'])) {
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
    <div class="postJob-detail-location">
        <div class="detail-location-container">
            <div class="detail-progress-section">
                <div class="progressBar">
                    <progress id="jobPostProgress" value="75" max="100"></progress>
                    <ul>
                        <li id="current">Title</li>
                        <li id="current">Skills</li>
                        <li id="current">Scope</li>
                        <li id="current">Location</li>
                        <li>Budget</li>
                    </ul>
                </div>
                <div class="title-card-intro">
                    <h2>Select your preferred freelance location.</h2>
                    <p>This increases proposals from talent in a specific region, but still opens your job post to all candidates.</p>
                </div>
            </div>
            <div class="detail-input-section">
                <span id="error">
                    <?php
                    if (!empty($_SESSION['error_page5'])) {
                        echo $_SESSION['error_page5'];
                        unset($_SESSION['error_page5']);
                    }
                    ?>
                </span>
                <form action="budget.php" method="post">

                    <div class="unitedStates">
                        <label for="us">U.S. only</label>
                        <input type="radio" id="us" name="location" value="us" required>
                    </div>
                    <p>Only talent in the United States can submit proposals</p>
                    <div class="worldwide">
                        <label for="world">Worldwide</label>
                        <input type="radio" id="world" name="location" value="world">
                    </div>
                    <p>Freelancers in any location can submit proposals</p>
                    <div class="CancelOrNext">
                        <input type="submit" value="Next: Budget" id="nextBudget" />
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
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
</html>