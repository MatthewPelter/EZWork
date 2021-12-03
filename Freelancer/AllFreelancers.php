<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$username = $_SESSION['userid'];
$userID = $_SESSION['user_id'];
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
            <title>EZWork | My Postings</title>
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

    <div class="AllFreelancers">

        <div class="AllFreelancersHeader">
            <h2>All <span>EZWork</span> Freelancers</h2>
            <ul>
                <li><a href="../ClientProfile/index.html">My Profile</a></li>
                <li>/</li>
                <li>All Freelancers</li>
            </ul>
        </div>
        <div class="AllFreelancersContainer">
        <?php
                    $sql = "SELECT username, avatar, freelancer_id FROM clients";
                    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['username'] != $_SESSION['userid']) {

                                if ($row['freelancer_id'] != NULL) {
                    ?>
                     
                    <a href="../Profile/userprofile.php?name=<?php echo $row['username']; ?>">
                        <div class="freelancerCard" onclick="location.href=`" >
                            <div class="freelancerImg">
                                <img src="<?php echo $row['avatar']; ?>" alt=`<?php echo $row['username']; ?>`>
                            </div>
                            <div class="freelancerInfo">
                                <h2><?php echo $row['username']; ?></h2>
                            
                                <h3>
                                    Web Developer                                
                                </h3>
                                <h4>$ <span>10</span> per hour</h4>
                                <h5>China</h5>

                                <?php
                                $freeID = $row['freelancer_id'];
                                $pullJobs = mysqli_query($conn, "SELECT COUNT(*) AS completedJobs FROM jobs WHERE freelancer_id = '$freeID' AND status=1");
                                $pullJobCount = mysqli_fetch_assoc($pullJobs);                            
                                ?>
                                <p><?php echo $pullJobCount['completedJobs']; ?> jobs completed</p>
                            </div>
                        </div>
                    </a>




                        <?php
                                }
                            }
                        }
                    }
                    ?>             
        </div>
    </div>
  
    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->

        <!--DataList-->
        <datalist id="allskills">
        
        </datalist>
</body>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>

</html>