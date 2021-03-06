<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
}

// Checking second page values for empty, If it finds any blank field then redirected to second page.
if (isset($_POST['title'])) {
    if (empty($_POST['title']) || empty($_POST['description'])) {
        $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
        header("location: postTitle.php"); // Redirecting to second page. 
    } else {
        // Fetching all values posted from second page and storing it in variable.
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page3'])) {
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
    <div class="postJob-detail-skills">
        <div class="detail-skills-container">
            <div class="detail-progress-section">
                <div class="progressBar">
                    <progress id="jobPostProgress" value="25" max="100"></progress>
                    <ul>
                        <li id="current">Title</li>
                        <li id="current">Skills</li>
                        <li>Scope</li>
                        <li>Location</li>
                        <li>Budget</li>
                    </ul>
                </div>
                <div class="title-card-intro">
                    <h2>What skills does your work require?</h2>
                    <h3>Upload An Image</h3>
                    <p>Uploading an Image can help our freelancers better understand the job, &quot;A picture speaks 1000 words &quot;.</p>
                </div>
            </div>
            <div class="detail-input-section">
                <form action="scope.php" enctype="multipart/form-data" method="post" style="width: 100%;">
                    <span id="error" style="color: red;padding: 0;">
                        <?php
                        // To show error of page 2.
                        if (!empty($_SESSION['error_page3'])) {
                            echo $_SESSION['error_page3'];
                            unset($_SESSION['error_page3']);
                        }
                        ?>
                    </span>

                    <div class="skill">
                        <h4>Enter needed skill or expertise</h4>
                        <input type="text" list="allskills" autocomplete="off" name="skills" placeholder="Skills or Expertise">
                    </div>
                    <div class="image">
                        <h4>Upload An Image <span></span></h4>
                        <img id="output" alt="">
                        <input type="file" onchange="loadFile(event)" name="image" id="file" accept="image/gif, image/jpeg, image/png">
                    </div>
                    <div class="CancelOrNext">
                        <input type="submit" value="Next: Scope" id="nextScope" />
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--Post A Job End-->

    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>

</body>

<script>
    //    !--Script to load file-- >
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>

</html>