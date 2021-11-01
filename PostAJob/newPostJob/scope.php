<?php
session_start();
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
<?php
session_start(); // Session starts here.
require_once('../../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../../login/index');
    echo "NOT LOGGED IN";
} else {
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM clients WHERE username = '$username' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../../login/index');
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
            <link rel="stylesheet" href="../../Styles/style.css">
        </head>
    </head>

<body>
    <?php include '../../navbar.php'; ?>


        <!--Post A Job More Details-->
        <div class="postJob-detail-Scope">
        <div class="detail-container">
            <div class="detail-progress-section">
                <div class="progressBar">
                    <progress id="jobPostProgress" value="50" max="100"></progress>
                    <ul>
                        <li id="current">Length</li>
                        <li id="current">Title</li>
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
                <span id="error">
                    <?php
                    if (!empty($_SESSION['error_page3'])) {
                        echo $_SESSION['error_page3'];
                        unset($_SESSION['error_page3']);
                    }
                    ?>
                </span>
                <form action="location.php" method="post" style="width: 100%;">

                    <label>Project Size :<span>*</span></label>
                    <select name="size">
                        <option value="">----Select----</options>
                        <option value="large" value="">Large </options>
                        <option value="medium" value="">Medium </options>
                        <option value="small" value="">Small </options>
                    </select>
    
    
                    <label>How long will your work take? :<span>*</span></label>
                    <select name="months">
                        <option value="">----Select----</options>
                        <option value="3to6" value="">3-6 Months </options>
                        <option value="1to3" value="">1-3 Months </options>
                        <option value="less1" value="">Less than 1 Month</options>
                    </select>
    
                    <label>What level of experience will you need? :<span>*</span></label>
                    <select name="experience">
                        <option value="">----Select----</options>
                        <option value="entry" value="">Entry </options>
                        <option value="intermediate" value="">Intermediate </options>
                        <option value="expert" value="">Expert</options>
                    </select>
    

                <div class="CancelOrNext">
                    <input type="reset" value="Reset" id="reset" />
                    <input type="submit" value="Next"  id="nextLocation"/>
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
</html>