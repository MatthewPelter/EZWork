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
        <title>EZWork | Find Jobs or Freelancers</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
        <link rel="icon" href="../logo/logo.svg">
        <link rel="stylesheet" href="../Styles/style.css">

        <style type="text/css">

        </style>
    </head>
</head>

<body>
    <!-- NAV BAR -->
    <?php include '../navbar.php'; ?>
    <!-- END NAVBAR -->
    <div class="profile">
        <div class="user-profile-header">
            <h2 id="username">Welcome, <?php echo $_SESSION['userid']; ?></h2>
            <div class="quick-links">
                <button id="quick-link-job" onclick="location.href='../newPostJob/start.php'">Post A Job</button>
                <button id="quick-link-market" onclick="location.href='../Market/market.php'">Browse EZWork Market</button>
            </div>
        </div>
        <div class="user-profile-body">
            <div class="user-postings">
                <div class="card title">
                    <h3>My Postings</h3>
                    <span><a href="../newPostJob/jobs">All Jobs</a></span>
                </div>
                <div class="card result" style="padding: 1rem;">
                    <button id="quick-link-job2" onclick="location.href='../newPostJob/start.php'">Post A Job</button>
                    <span>
                        <?php
                        $jobSQL = "SELECT * FROM jobs WHERE user_id='$userID' ORDER BY id DESC";
                        $jobResult = mysqli_query($conn, $jobSQL) or die(mysqli_errno($conn));
                        if (mysqli_num_rows($jobResult) == 0) {
                            echo "You currently have no job postings listed.";
                        }
                        ?>
                    </span>
                </div>

                <?php
                if (mysqli_num_rows($jobResult) > 0) {
                    while ($r = mysqli_fetch_assoc($jobResult)) {
                ?>
                        <div class="allJobsCard" style="overflow-y: scroll;">
                            <div class="postedJob" data-postid="<?php echo $r['id']; ?>">
                                <div class="jobTitle">
                                    <h4 id="jobTitle"><a href="../newPostJob/job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a></h4>
                                    <i class="fa fa-ellipsis-v" id="jobGodMode" aria-hidden="true"></i>
                                    <div class="jobEdit">
                                        <div class="exit">
                                            <i class="fa fa-times" id="exitJobEdit"></i>
                                        </div>
                                        <button onclick="location.href='../newPostJob/reviewJobPost.php'">Edit</button>
                                        <button style="color: red;" id="deleteJob">Delete</button>
                                    </div>
                                </div>
                                <p>Status: <span id="status"><?php if ($r['status'] == 0) {
                                                                    echo "Open";
                                                                } else if ($r['status'] == -1) {
                                                                    echo "In-Progress";
                                                                } else {
                                                                    echo "Closed";
                                                                } ?></span></p>
                                <p>Job Posted on <span id="date"><?php echo $r['datePosted']; ?></span> by <span id="postedBy">Me</span></p>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>

            <!-- CURRENT USERS IN THE SYSTEM -->

            <div class="activeUsers profile-categories-container">
                <div class="categories-title">
                    <h3 style="color: #0a345e;"><i class="fa fa-users" aria-hidden="true"></i> Current Users</h3>
                    <div class="usersType">
                        <span onclick="toggleUsers()" id="userSpan">View All Freelancers</span>
                        <span id="freelancerSpan" onclick="toggleUsers2()" style="display: none;">View All Clients</span>
                    </div>
                </div>

                <div class="activerUsersBody" style="overflow-y: scroll;max-height: 65vh;">

                    <?php
                    $sql = "SELECT username, avatar, freelancer_id FROM clients";
                    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['username'] != $_SESSION['userid']) {

                                if ($row['freelancer_id'] == NULL) {
                    ?>

                                    <a style="color: black; text-decoration: none;" href="../Profile/userprofile.php?name=<?php echo $row['username']; ?>">
                                        <div class="categoryCard">
                                            <img src="<?php echo $row['avatar']; ?>" style="border-radius: 50%; width: 2rem;height: 2rem;" id="current-user-img" alt=`<?php echo $row['username']; ?>`>
                                            <p><?php echo $row['username']; ?></p><br />
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </a>

                        <?php
                                }
                            }
                        }
                    } else {
                        ?>
                        <div class="categoryCard">
                            <p>That's sad.. There are no users on this site yet.</p>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="categoryCardEnd" style="border-bottom: none; padding: .5rem;">

                    </div>
                </div>
                <div class="activerUsersBody2" style="overflow-y: scroll;max-height: 65vh;display: none;">

                    <?php
                    $sql = "SELECT username, avatar, freelancer_id FROM clients";
                    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['username'] != $_SESSION['userid']) {

                                if ($row['freelancer_id'] != NULL) {
                    ?>

                                    <a style="color: black; text-decoration: none;" href="../Profile/userprofile.php?name=<?php echo $row['username']; ?>">
                                        <div class="categoryCard">
                                            <img src="<?php echo $row['avatar']; ?>" style="border-radius: 50%; width: 2rem;height: 2rem;" id="current-user-img" alt=`<?php echo $row['username']; ?>`>
                                            <p><?php echo $row['username']; ?></p><br />
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </a>

                        <?php
                                }
                            }
                        }
                    } else {
                        ?>
                        <div class="categoryCard">
                            <p>That's sad.. There are no users on this site yet.</p>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="categoryCardEnd" style="border-bottom: none; padding: .5rem;">

                    </div>
                </div>

            </div>

            <div class="how-to-work">
                <div class="htw-title">
                    <h3>How to work with Freelancers</h3>
                    <span>Connect with thousands of freelancers, fast and at low cost.</span>
                </div>
                <div class="step step1">
                    <div class="step-image">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    </div>
                    <div class="step-content">
                        <h4>1. Post a job to the marketplace</h4>
                        <span>What would like to get done? Provide as much details for freelancers to identify if they are right for the job.</span>
                    </div>
                </div>
                <div class="step step2">
                    <div class="step-image">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="step-content">
                        <h4>2. Freelancers sends you offers</h4>
                        <span>With a strong job post, you should recieve offers within hours. You can always edits to your post, or send a personal request to a freelancer.</span>
                    </div>
                </div>
                <div class="step step3">
                    <div class="step-image">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="step-content">
                        <h4>3. Review Offers</h4>
                        <span>Here is your chance to communicate with the freelancers, set expectations for the job, and discuss on agreements.</span>
                    </div>
                </div>
                <div class="step step4">
                    <div class="step-image">
                        <i class="far fa-handshake"></i>
                    </div>
                    <div class="step-content">
                        <h4>4. Accept Offer and Start Working</h4>
                        <span>Once both parties accept on terms, start working together by using the EZWork chat box. Strong communication ensures you get what you want.</span>
                    </div>
                </div>
                <div class="htw-questions">
                    <h3>Questions?</h3>
                    <p>Visit our <span>Help Center</span> for help.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
<!--nav bar script -->
<script type="text/javascript">
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });


    <?php
    if (isset($_SESSION['postSuccess'])) { ?>
        Swal.fire(
            'Yay!',
            'Your job has been posted successfully!',
            'success'
        );
    <?php
        unset($_SESSION['postSuccess']);
    } ?>

    <?php
    if (isset($_SESSION['loginSuccess'])) { ?>
        Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
        });
    <?php
        unset($_SESSION['loginSuccess']);
    } ?>

    <?php
    if (isset($_SESSION['registerSuccess'])) { ?>
        Toast.fire({
            icon: 'success',
            title: 'Successfully registered'
        });
    <?php
        unset($_SESSION['registerSuccess']);
    } ?>



    const freelancerSpan = document.getElementById('freelancerSpan');
    const userSpan = document.getElementById('userSpan');
    const activerUsersBody = document.querySelector('.activerUsersBody');
    const activerUsersBody2 = document.querySelector('.activerUsersBody2');

    function toggleUsers() {

        //console.log("Clients");
        if (getComputedStyle(freelancerSpan).display === 'none') {
            userSpan.style.display = "none";
            freelancerSpan.style.display = "inline-block";

            activerUsersBody2.style.display = "inline-block";
            activerUsersBody.style.display = "none";
        } else {
            freelancerSpan.style.display = "none";
            userSpan.style.display = "inline-block";

            activerUsersBody.style.display = "inline-block";
            activerUsersBody2.style.display = "none";
        }
    }

    function toggleUsers2() {

        //console.log("Clients");
        if (getComputedStyle(userSpan).display === 'none') {
            freelancerSpan.style.display = "none";
            userSpan.style.display = "inline-block";

            activerUsersBody.style.display = "inline-block";
            activerUsersBody2.style.display = "none";
        } else {
            userSpan.style.display = "none";
            freelancerSpan.style.display = "inline-block";


            activerUsersBody2.style.display = "inline-block";
            activerUsersBody.style.display = "none";
        }
    }
</script>

</html>