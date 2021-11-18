<?php
session_start();
require_once('../classes/DB.php');


if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
}


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
        <link rel="icon" href="../logo/logo.svg">
        <link rel="stylesheet" href="../Styles/style.css">
    </head>
</head>

<body>

    <?php include '../navbar.php'; ?>

    <!--Post A Job More Details-->
    <div class="postJob-detail-title">
        <div class="detail-container">
            <div class="detail-progress-section">
                <div class="progressBar">
                    <progress id="jobPostProgress" value="0" max="100"></progress>
                    <ul>
                        <li id="current">Title</li>
                        <li>Skills</li>
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
                <form action="postSkill.php" method="post" style="width: 100%;">
                    <h3>Write a title for your job post</h3>
                    <div class="titleContainer">
                        <input name="title" id="title" type="text" placeholder="Enter Title Here..." value=""><br />
                    </div>

                    <h4>Example titles</h4>
                    <?php if (isset($_POST['typeOfJob']) && $_POST['typeOfJob'] == 'offer') { ?>
                        <ul>
                            <li>I can design a website for your company.</li>
                            <li>I can install car parts for you.</li>
                            <li>I can build custom gaming PC's for your gaming needs.</li>
                        </ul>

                    <?php } else { ?>
                        <ul>
                            <li>Build a website for my local coffee shop business</li>
                            <li>Logo Designer needed to design a modern company logo.</li>
                            <li>Computer Technician needed to build my custom gaming pc.</li>
                        </ul>
                    <?php } ?>
                    <h3>Enter a job description</h3>
                    <div class="descriptionContainer">
                        <input name="description" id="description" type="text" placeholder="Let people know more about your project..." value="">
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

    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills"></datalist>

</body>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>

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