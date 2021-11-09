<?php
session_start();
require_once('../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
}

// Checking second page values for empty, If it finds any blank field then redirected to second page.
if (isset($_POST['skills'])) {
    if (empty($_POST['skills']) || empty($_POST['image'])) {
        $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
        header("location: postSkill.php"); // Redirecting to second page. 
    } else {
        // Fetching all values posted from second page and storing it in variable.

        $img = $_FILES['image'];
        $filename = $img['tmp_name'];
        $client_id = "9f482e3edae002b";
        $handle = fopen($filename, "r");
        $data = fread($handle, filesize($filename));
        $pvars   = array('image' => base64_encode($data));
        $timeout = 30;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image/');
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        $out = curl_exec($curl);
        curl_close($curl);
        $pms = json_decode($out, true);
        $url = $pms['data']['link'];
        if ($url != "") {
            // echo "<h2>Uploaded Without Any Problem</h2>";
            // echo "<img src='$url'/>";
            $_POST['image'] = $url;
        } else {
            echo "<h2>There's a Problem</h2>";
            die($pms['data']['error']);
        }

        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page4'])) {
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
    <div class="postJob-detail-scope">
        <div class="detail-scope-container">
            <div class="detail-progress-section">
                <div class="progressBar">
                    <progress id="jobPostProgress" value="50" max="100"></progress>
                    <ul>
                        <li id="current">Title</li>
                        <li id="current">Skills</li>
                        <li id="current">Scope</li>
                        <li>Location</li>
                        <li>Budget</li>
                    </ul>
                </div>
                <div class="title-card-intro">
                    <h2>Next, estimate the scope of your work.</h2>
                    <p>These aren’t final answers, but this information helps us recommend the right talent for what you need.</p>
                </div>
            </div>
            <div class="detail-input-section">
                <span id="error" style="color: red;">
                    <?php
                    if (!empty($_SESSION['error_page4'])) {
                        echo $_SESSION['error_page4'];
                        unset($_SESSION['error_page4']);
                    }
                    ?>
                </span>
                <form action="location.php" method="post" style="width: 100%;">
                    <div class="scopeOptions">
                        <div class="projectSize">
                            <label>Project Size :<span>*</span></label>
                            <select name="size">
                                <option value="">----Select----</options>
                                <option value="large" value="">Large </options>
                                <option value="medium" value="">Medium </options>
                                <option value="small" value="">Small </options>
                            </select>
                        </div>

                        <div class="projectLength">
                            <label>How long will your work take? :<span>*</span></label>
                            <select name="months">
                                <option value="">----Select----</options>
                                <option value="3to6" value="">3-6 Months </options>
                                <option value="1to3" value="">1-3 Months </options>
                                <option value="less1" value="">Less than 1 Month</options>
                            </select>
                        </div>

                        <div class="projectExperience">
                            <label>What level of experience will you need? :<span>*</span></label>
                            <select name="experience">
                                <option value="">----Select----</options>
                                <option value="entry" value="">Entry </options>
                                <option value="intermediate" value="">Intermediate </options>
                                <option value="expert" value="">Expert</options>
                            </select>
                        </div>
                    </div>


                    <div class="CancelOrNext">
                        <input type="reset" value="Reset" id="reset" />
                        <input type="submit" value="Next: Location" id="nextLocation" />
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

</html>