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
                    <div class="budget">
                        <label for="budget">Project Budget</label>
                        <input type="radio" id="budget" name="budgetoption" value="budget" required>
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
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>

<script type="text/javascript">
    var budgetbtn = document.getElementById('budget');

    budgetbtn.addEventListener("click", function() {
        document.getElementById('budgetChecked').style.display = "block";
    });
</script>

</html>