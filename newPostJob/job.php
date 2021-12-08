<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    die("NOT LOGGED IN");
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
        die();
    }
    $myData = mysqli_fetch_assoc($result);
}

$job_id = $_GET['id'];
$job_id = mysqli_real_escape_string($conn, $job_id);
$job_id = htmlspecialchars($job_id);

$jobSQL = "SELECT jobs.*, clients.avatar FROM jobs INNER JOIN clients ON jobs.user_id = clients.id WHERE jobs.id='$job_id' LIMIT 1";
$jobResult = mysqli_query($conn, $jobSQL);

if (mysqli_num_rows($jobResult) > 0) {
    $r = mysqli_fetch_assoc($jobResult);

    $uid = $r['user_id'];
    $unameSQL = "SELECT username FROM clients WHERE id='$uid'";
    $unameResult = mysqli_query($conn, $unameSQL);
    $unameFetched = mysqli_fetch_assoc($unameResult);
    $receiverUsername = $unameFetched['username'];
} else {
    header("location: ./jobs.php");
}

$getFreelancerID = mysqli_query($conn, "SELECT freelancer_id FROM clients WHERE id='$user_id'");
$getFreelancerID = mysqli_fetch_assoc($getFreelancerID);
$getFreelancerID = $getFreelancerID['freelancer_id'];
?>

<!-- ----------------------------------------- -->
<!-- JOB STATUS -->
<!-- 0 : OPEN -->
<!-- 1 : CLOSED -->
<!-- -1 : IN PROGRESS -->
<!-- ----------------------------------------- -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <title>EZWork | <?php echo $r['title']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="icon" href="../logo/logo.svg">
    <link rel="stylesheet" href="../Styles/style.css">
    <style>
        .ProgressBar {
            margin: 0 auto;
            padding: 2em 0 3em;
            list-style: none;
            position: relative;
            display: flex;
            justify-content: space-between;
        }

        .ProgressBar-step {
            text-align: center;
            position: relative;
            width: 100%;
        }

        .ProgressBar-step:before,
        .ProgressBar-step:after {
            content: "";
            height: 0.5em;
            background-color: #9F9FA3;
            position: absolute;
            z-index: 1;
            width: 100%;
            left: -50%;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.25s ease-out;
        }

        .ProgressBar-step:first-child:before,
        .ProgressBar-step:first-child:after {
            display: none;
        }

        .ProgressBar-step:after {
            background-color: #00637C;
            width: 0%;
        }

        .ProgressBar-step.is-complete+.ProgressBar-step.is-current:after,
        .ProgressBar-step.is-complete+.ProgressBar-step.is-complete:after {
            width: 100%;
        }

        .ProgressBar-icon {
            width: 1.5em;
            height: 1.5em;
            background-color: #F2E7BF;
            fill: #9F9FA3;
            border-radius: 50%;
            padding: 0.5em;
            max-width: 100%;
            z-index: 10;
            position: relative;
            transition: all 0.25s ease-out;
        }

        .is-current .ProgressBar-icon {
            fill: #00637C;
            background-color: #00637C;
        }

        .is-complete .ProgressBar-icon {
            fill: #DBF1FF;
            background-color: #00637C;
        }

        .ProgressBar-stepLabel {
            display: block;
            text-transform: uppercase;
            color: #9F9FA3;
            position: absolute;
            padding-top: 0.5em;
            width: 100%;
            transition: all 0.25s ease-out;
        }

        .is-current>.ProgressBar-stepLabel,
        .is-complete>.ProgressBar-stepLabel {
            color: #00637C;
        }

        .wrapper {
            max-width: 1000px;
            margin: 4em auto;
            font-size: 16px;
        }

        .chat {
            width: 100%;
        }

        .people-list {
            display: none;
        }
    </style>
</head>

<body>

    <?php
    include '../navbar.php';
    ?>

    <div class="job">
        <h2>Job Details</h2>
        <h3><?php if ($r['typeOfJob'] == "require") {
                echo "Needs a service";
            } else {
                echo "Offering a service";
            } ?></h3>
        <div class="job-container">

            <div class="jobCard">
                <div class="jobTitle">
                    <p><?php echo $r['title']; ?></p>
                </div>
                <div class="scope">
                    <h3><?php echo $r['skills']; ?></h3>
                    <p>Posted On: <span><?php echo $r['datePosted']; ?></span></p>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>
                            <?php if ($r['location'] == 'us') {
                                echo "United States ONLY";
                            } else {
                                echo "Worldwide";
                            } ?>
                        </span>
                    </p>
                    <!-- ----------------------------------------- -->
                    <!-- JOB STATUS -->
                    <!-- 0 : OPEN -->
                    <!-- 1 : CLOSED -->
                    <!-- -1 : IN PROGRESS -->
                    <!-- ----------------------------------------- -->
                    <p>Status:
                        <?php if ($r['status'] == 0) { ?>
                            <span style="color: lightgreen;font-weight: bolder;"><?php echo "Open"; ?></span>
                        <?php } else if ($r['status'] == 1) { ?>
                            <span style="color: red;font-weight: bolder;"><?php echo "Closed"; ?></span>
                        <?php } else { ?>
                            <span style="color: royalblue;font-weight: bolder;"><?php echo "In-Progress"; ?></span>
                        <?php } ?>
                    </p>
                </div>

                <div class="jobDescription">
                    <h3>Description</h3>
                    <p><?php echo $r['description']; ?></p>
                </div>

                <div class="budgetAndExperience">
                    <div class="budget">
                        <?php if ($r['rate'] > 0) { ?>
                            <p>$<?php echo $r['rate']; ?> / hr</p>
                            <span><?php echo "Hourly Rate" ?></span>
                        <?php } else if ($r['budget'] > 0) { ?>
                            <p>$ <?php echo $r['budget']; ?></p>
                            <span><?php echo "Project Budget" ?></span>
                        <?php } else { ?>
                            <p></p>
                            <span> <?php echo "No budget or pay rate set yet... Contact client for pricing."; ?></span>
                        <?php } ?>

                    </div>
                    <div class="experience">
                        <h4>Experience Level</h4>
                        <span><?php echo ucfirst($r['experience']); ?></span>
                    </div>
                </div>

                <div class="jobType">
                    <div class="type">
                        <h4>Job Type:</h4>
                        <p>
                            <?php if ($r['length'] == 'l') {
                                echo "Designated, longer term work";
                            } else {
                                echo "Short term or part time work";
                            } ?>
                        </p>
                    </div>
                    <div class="size">
                        <h4>Project Size:</h4>
                        <p><?php echo ucfirst($r['size']); ?></p>
                    </div>

                </div>

                <div class="imageCard">
                    <h3><i class="fa fa-paperclip" aria-hidden="true"></i>Attached Image</h3>
                    <div class="image">
                        <?php if ($r['image'] != NULL) { ?>
                            <img src="<?php echo $r['image']; ?>" alt="">
                        <?php } else { ?>
                            <span>None Uploaded</span>
                        <?php } ?>
                    </div>

                </div>
            </div>

            <div class="options">

                <?php
                if ($r['typeOfJob'] == 'require' && $r['status'] == 0) {
                    if ($myData['freelancer_id'] != NULL && $unameFetched['username'] != $_SESSION['userid']) {

                        $checkProposal = mysqli_query($conn, "SELECT * FROM messages WHERE jobID='$job_id' AND sender='$user_id'") or die(mysqli_error($conn));
                        if (mysqli_num_rows($checkProposal) > 0) { ?>
                            <button id="proposalBtn" disabled>Proposal Submitted</button>
                        <?php } else { ?>
                            <button id="proposalBtn">Submit A Proposal</button>
                        <?php } ?>
                        <?php }
                } else {

                    if ($unameFetched['username'] != $_SESSION['userid'] && $r['status'] == 0) {

                        $checkOffers = mysqli_query($conn, "SELECT * FROM offerjobs WHERE job_id ='$job_id' AND client_id='$user_id'");
                        if (mysqli_num_rows($checkOffers) == 0) { ?>
                            <button class="pay">Pay for Service</button>
                <?php }
                    }
                } ?>


                <?php
                if ($r['status'] == 1 && $r['freelancer_id'] == $getFreelancerID) {
                    $checkRating = mysqli_query($conn, "SELECT * FROM ratings WHERE job_id='$job_id' AND rater='$user_id'");
                    if (mysqli_num_rows($checkRating) == 0) {
                ?>
                        <button class="rate">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span>Rate Client</span>
                        </button>
                <?php }
                }
                ?>


                <?php if ($unameFetched['username'] != $_SESSION['userid']) { ?>
                    <div class="flag" onclick="report()">
                        <i class="fa fa-flag" aria-hidden="true"></i>
                        <span>Flag as Inappropiate</span>
                    </div>
                    <div class="reportMessage">
                        <div class="reportMessageCard">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            <p>Our staff are going to take a closer look into the report on this job.</p>
                            <p>Thank you, for helping us keep the system safe.</p>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($unameFetched['username'] == $_SESSION['userid'] && $r['status'] != -1) {
                ?>

                    <?php
                    if ($r['status'] != 1) {
                    ?>
                        <input type="button" onclick="location.href = 'edit?id=<?php echo $r['id']; ?>';" id="editBtn" value="Edit Post">
                    <?php
                    }
                    ?>

                    <input type="button" id="deleteBtn" style="color: red;" value="Delete Post">
                    <span id="result"></span>

                    <div id="deleteMenu" style="display: none;">
                        <div class="deleteMenuContainer">
                            <span>Are you sure you want to delete this post?</span>
                            <input type="button" id="yesBtn" value="Yes">
                            <input type="button" id="noBtn" value="No">
                        </div>
                    </div>

                <?php } ?>
            </div>
            <div class="clientInfo">
                <h3>About the Client</h3>
                <div class="username">
                    <p>Posted By: </p>
                    <?php if ($unameFetched['username'] != $_SESSION['userid']) { ?>
                        <a href="../Profile/userprofile.php?name=<?php echo $unameFetched['username']; ?>"><?php echo $unameFetched['username']; ?></a>

                    <?php } else {
                        echo $unameFetched['username'];
                    } ?>
                </div>
                <div class="img-card">
                    <img src="<?php echo $r['avatar']; ?>" alt="">
                </div>
            </div>
            <div class="joblink">
                <h4>Job Link</h4>
                <div class="link">
                    <span id="link">https://ez-work.herokuapp.com/newPostJob/job.php?id=<?php echo $r['id']; ?></span>
                </div>

                <p id="copyLink">Copy Link</p>
            </div>
        </div>
    </div>

    <?php if ($r['typeOfJob'] == "offer" && $r['user_id'] == $user_id) {
        $selectCurrentJobs = mysqli_query($conn, "SELECT offerjobs.id, offerjobs.status, clients.username as uname FROM offerjobs INNER JOIN clients on offerjobs.client_id=clients.id WHERE job_id='$job_id'"); ?>
        <h1>Current Clients</h1>
        <?php if (mysqli_num_rows($selectCurrentJobs) > 0) {
            while ($pull = mysqli_fetch_assoc($selectCurrentJobs)) { ?>
                <div class="currentJob">
                    <div class="currentUser"><? echo $pull['uname']; ?></div>
                    <div class="currentStatus"><? echo ($pull['status'] == 0) ? "Open" : "Closed"; ?></div>
                    <button onclick="location.href='./offerJob.php?id=<?php echo $pull['id']; ?>'">View Job</button>
                </div>
            <?php
            }
        } else { ?>
            <h2>No active clients</h2>
        <?php
        }
        ?>



    <?php } ?>

    <!-- ---------------------------------------------------------- -->
    <!-- PROGRESS SECTION -->
    <!-- ---------------------------------------------------------- -->
    <?php

    if ($r['status'] == -1 && ($r['user_id'] == $user_id || $r['freelancer_id'] == $getFreelancerID)) { ?>
        <!-- style as you please. just temporary -->
        <div class="job progress">
            <h2>Job Progress</h2>
            <div class="job-container">
                <div class="jobCard">
                    <div class="scope">
                        <!-- ----------------------------------------- -->
                        <!-- JOB STATUS -->
                        <!-- 0 : OPEN -->
                        <!-- 1 : CLOSED -->
                        <!-- -1 : IN PROGRESS -->
                        <!-- ----------------------------------------- -->
                        <p>Status:
                            <span id="status">
                                <?php if ($r['status'] == 1) {
                                    echo "Closed";
                                } else if ($r['status'] == -1) {
                                    echo "In-Progress";
                                }
                                ?>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="messageChat" style="grid-area: 1/1/4/1;">
                    <!-- messages loaded from jquery -->
                </div>

                <div class="jobDescription">
                    <div class="wrapper">

                        <h1>Project Progress</h1>

                        <ol class="ProgressBar">
                            <li class="ProgressBar-step">
                                <svg class="ProgressBar-icon">
                                    <use xlink:href="#checkmark-bold" />
                                </svg>
                                <span class="ProgressBar-stepLabel">Accepted Job</span>
                            </li>
                            <li class="ProgressBar-step">
                                <svg class="ProgressBar-icon">
                                    <use xlink:href="#checkmark-bold" />
                                </svg>
                                <span class="ProgressBar-stepLabel">Started Work</span>
                            </li>
                            <li class="ProgressBar-step">
                                <svg class="ProgressBar-icon">
                                    <use xlink:href="#checkmark-bold" />
                                </svg>
                                <span class="ProgressBar-stepLabel">Finished</span>
                            </li>
                        </ol>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg">
                        <symbol id="checkmark-bold" viewBox="0 0 24 24">
                            <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" />
                        </symbol>
                    </svg>
                </div>

                <?php
                $workFreelancer = $r['freelancer_id'];
                $getFreelancerName = mysqli_query($conn, "SELECT id, username, avatar FROM clients WHERE freelancer_id='$workFreelancer'");
                $getFreelancerName = mysqli_fetch_assoc($getFreelancerName);

                $freelancerUserID = $getFreelancerName['id'];
                ?>

                <div class="options">
                    <?php if ($r['user_id'] == $_SESSION['user_id']) {
                        if ($r['paid'] == 0) { ?>
                            <button class="pay">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                Pay For Service
                            </button>
                        <?php } else if ($r['status'] != 1 && $r['freelancer_complete'] == 1) {
                        ?>

                            <h2>The freelancer has compelted your job.</h2>
                            <h3>If you think they completed it correctly, mark it as complete.</h3>
                            <button class="completeClient">
                                <i class="fa fa-flag" aria-hidden="true"></i>
                                Mark Job as Complete
                            </button>
                        <?php } else { ?>
                            <h2>Freelancer is working on your job now.</h2>
                    <?php
                        }
                    } ?>
                    <?php if ($r['freelancer_id'] == $getFreelancerID) {
                        if ($r['status'] != 1 && $r['freelancer_complete'] == 0) {
                            if ($r['paid'] == 0) { ?>
                                <h2>Wait until the client pays before you begin working.</h2>
                            <?php
                            } else {
                            ?>
                                <button class="completeFreelancer">
                                    <i class="fa fa-flag" aria-hidden="true"></i>
                                    Mark Job as Complete
                                </button>
                    <?php }
                        }
                    } ?>
                </div>
                <div class="clientInfo">
                    <h3>About the Freelancer</h3>
                    <div class="username">
                        <p>Work By: </p>

                        <a href="../Profile/userprofile.php?name=<?php echo $getFreelancerName['username']; ?>"><?php echo $getFreelancerName['username']; ?></a>
                    </div>
                    <div class="img-card">
                        <img src="<?php echo $getFreelancerName['avatar']; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>
<!--<script src="./app.js"></script>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>
<script>
    //Report fun
    function report() {
        const reportMsg = document.querySelector('.reportMessage');
        if (getComputedStyle(reportMsg).display === "none") {
            reportMsg.style.display = "inline-block";
        } else {
            reportMsg.style.display = "none";
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {

        // proposal btn click
        $("#proposalBtn").click(function() {
            (async () => {
                const {
                    value: text
                } = await Swal.fire({
                    title: "Are you willing to accept this job?",
                    html: "By submitting a proposal, you agree that you are fully capable of completing this task." +
                        "<br />By hitting agree, you will be sending a proposal to the client and they will decide if they will accept your request.",
                    input: "textarea",
                    inputLabel: "Optional Message:",
                    inputPlaceholder: "Type your message here...",
                    inputAttributes: {
                        "aria-label": "Type your message here"
                    },
                    showCancelButton: true
                });

                if (text) {
                    $.ajax({
                        type: "POST",
                        url: "../api/message.php",
                        processData: false,
                        contentType: "application/json",
                        data: '{ "body": "' + text + '", "receiver": "<?php echo $receiverUsername; ?>", "jobID": "<?php echo $job_id; ?>" }',
                        success: function(data) {
                            var obj = JSON.parse(data);
                            console.log(obj);
                            if (obj.Success.length > 0) {
                                Swal.fire(
                                    'Proposal Sent!',
                                    'Your proposal has been sent to the client.',
                                    'success'
                                ).then(function() {
                                    window.location.reload(1);
                                });
                            } else if (obj.Error.length > 0) {}

                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });

                }
            })();

        }); // end proposal btn click

        // pay for service btn click (Require)
        $(".pay").click(function() {
            Swal.fire({
                title: 'Pay For Service',
                text: "The payment will be released to the freelancer once the job is complete!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Pay'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "../api/payForService.php",
                        data: 'postID=' + <?php echo $job_id; ?>,
                        success: function(data) {
                            if (data != "insufficient") {
                                Swal.fire({
                                    title: 'You are all set!',
                                    text: 'Your payment has been accepted. The freelancer will now begin on your project.',
                                    icon: 'success',
                                }).then(function() {
                                    if (data == "offer") {
                                        <?php
                                        $selectOffer = mysqli_query($conn, "SELECT id FROM offerjobs WHERE job_id='$job_id' AND client_id='$user_id'");
                                        $selectOffer = mysqli_fetch_assoc($selectOffer);
                                        $selectOffer = $selectOffer['id'];
                                        ?>
                                        window.location.href = "https://ez-work.herokuapp.com/newPostJob/offerJob.php?id=<?php echo $selectOffer; ?>";
                                    } else {
                                        window.location.reload(1);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Insufficient Balance!',
                                    text: 'You do not have enough money to pay for this service. Please add funds.',
                                    icon: 'error',
                                    confirmButtonText: 'Add Funds',
                                    showCancelButton: true
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "https://ez-work.herokuapp.com/Settings/settings";
                                    }
                                });
                            }
                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });

                }
            });
        }); // end pay for service btn click

        function rate(id, job_id) {
            (async () => {
                /* inputOptions can be an object or Promise */
                const inputOptions = new Promise((resolve) => {
                    setTimeout(() => {
                        resolve({
                            1: "1",
                            2: "2",
                            3: "3",
                            4: "4",
                            5: "5"
                        });
                    }, 1000);
                });

                const {
                    value: rate
                } = await Swal.fire({
                    title: "Rate the user",
                    input: "radio",
                    showCancelButton: true,
                    cancelButtonText: "No Thanks",
                    inputOptions: inputOptions,
                    inputValidator: (value) => {
                        if (!value) {
                            return "You need to choose something!";
                        }
                    }
                });

                if (rate) {
                    $.ajax({
                        type: "POST",
                        url: "../api/set-rating.php",
                        processData: false,
                        contentType: "application/json",
                        data: '{ "rate": "' + rate + '", "ratee": "' + id + '", "job_id": "<?php echo $job_id; ?>" }',
                        success: function(data) {
                            var obj = JSON.parse(data);
                            console.log(obj);
                            if (obj.Success.length > 0) {
                                Swal.fire(
                                    'Thanks!',
                                    'Thanks for your rating. It helps a lot :)',
                                    'success'
                                ).then(function() {
                                    window.location.reload(1);
                                });
                            } else if (obj.Error.length > 0) {}

                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });
                }
            })();
        }


        $(".rate").click(() => {
            rate(<? echo $r['user_id']; ?>);
        });

        // complete btn click
        $(".completeClient").click(function() {
            Swal.fire({
                title: 'Mark Job as Complete',
                text: "If feel like the freelancer completed your job, you may mark it as complete and the payment will be released to the freelancer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Mark as Complete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "../api/mark-as-complete.php",
                        data: 'postID=' + <?php echo $job_id; ?>,
                        success: function(data) {
                            Swal.fire(
                                'Complete!',
                                'We are glad your job is complete.',
                                'success'
                            ).then(function() {
                                rate(<?php echo $freelancerUserID; ?>);
                            });
                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });

                }
            });
        }); // end complete btn click

        // complete btn click
        $(".completeFreelancer").click(function() {
            Swal.fire({
                title: 'Mark Job as Complete',
                text: "If feel like you have completed the clients required work, you may mark this job as complete.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Mark as Complete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "../api/mark-as-complete.php",
                        data: 'postID=' + <?php echo $job_id; ?>,
                        success: function(data) {
                            console.log(data);
                            Swal.fire(
                                'Complete!',
                                'Once the client reviews your work and marks as complete, your payment will be released.',
                                'success'
                            ).then(function() {
                                window.location.reload(1);
                            });
                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });

                }
            });
        }); // end complete btn click

        // delete btn click
        $("#deleteBtn").click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "../api/delete-post.php",
                        data: 'postID=' + <?php echo $job_id; ?>,
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your post has been deleted.',
                                'success'
                            ).then(function() {
                                window.location.reload(1);
                            });
                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });

                }
            });
        }); // end delete btn click

        function copyToClipboard(link) {
            const el = document.createElement("textarea");
            el.value = link.innerText;
            document.body.appendChild(el);
            el.select();
            document.execCommand("copy");
            document.body.removeChild(el);
        } // Ends copyToClipboard()

        const copyLinkBtn = document.getElementById('copyLink');

        copyLinkBtn.addEventListener('click', () => {
            var link = document.getElementById('link');
            copyToClipboard(link);
        });

        // Status color
        const status = document.getElementById('status');

        var statusText = status.innerText;

        if (statusText == "Open") {
            status.style.color = "lightgreen";
        } else if (statusText == "Closed") {
            status.style.color = "red";
        } else if (statusText == "In-Progress") {
            status.style.color = "#e1b12c";
        }

        var $bar = $(".ProgressBar");
        $bar.children().first().addClass("is-current");

        <?php if ($r['user_id'] == $_SESSION['user_id']) { ?>
            $(".messageChat").load("https://ez-work.herokuapp.com/message/messages?mid=<?php echo $freelancerUserID; ?> .messageMainContainer", loadMessageScripts);
        <?php } else if ($r['freelancer_id'] == $getFreelancerID) { ?>
            $(".messageChat").load("https://ez-work.herokuapp.com/message/messages?mid=<?php echo $r['user_id']; ?> .messageMainContainer", loadMessageScripts);
        <?php } ?>

        <?php
        if ($r['paid'] == 1) { ?>
            $bar.children(".is-current").removeClass("is-current").addClass("is-complete").next().addClass("is-current");
        <?php }
        ?>

        <?php
        if ($r['freelancer_complete'] == 1) { ?>
            $bar.children(".is-current").removeClass("is-current").addClass("is-complete").next().addClass("is-current");
        <?php }
        ?>

        <?php
        if ($r['status'] == 1) { ?>
            $bar.children(".is-current").removeClass("is-current").addClass("is-complete").next().addClass("is-current");
        <?php }
        ?>

        <?php if ($r['user_id'] == $_SESSION['user_id']) {
            $getName = $getFreelancerName['username'];
        } else {
            $getName = $unameFetched['username'];
        } ?>

        function loadMessageScripts() {
            var elem = document.querySelector('.chat-history');
            elem.scrollTop = elem.scrollHeight;

            $('#sendmessage').click(function() {
                $.ajax({
                    type: "POST",
                    url: "../api/message.php",
                    processData: false,
                    contentType: "application/json",
                    data: '{ "body": "' + $("#message-to-send").val() + '", "receiver": "<?php echo $getName; ?>" }',
                    success: function(data) {
                        var obj = JSON.parse(data);
                        console.log(obj);
                        $("#message-to-send").val('');
                        if (obj.Success.length > 0) {
                            location.reload();
                            //$('#result').html(obj.Success);
                        } else if (obj.Error.length > 0) {
                            $('#result').html(obj.Error);
                        }

                    },
                    error: function(r) {
                        console.log(r);
                    }
                });
            });

            function respondToJob(jobID, free_id, response) {
                if (response == "accept") {
                    $.ajax({
                        type: "POST",
                        url: "../api/accept.php",
                        processData: false,
                        contentType: "application/json",
                        data: '{ "jobID": "' + jobID + '", "id": "<?php echo $user_id; ?>", "freelancer_id": "' + free_id + '" }',
                        success: function(data) {
                            var obj = JSON.parse(data);
                            console.log(obj);
                            if (obj.Success.length > 0) {
                                $('#status').html(obj.Success);
                                $('.propose').hide();
                                location.reload();
                            } else if (obj.Error.length > 0) {
                                $('#status').html(obj.Error);
                            }

                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "../api/deny.php",
                        processData: false,
                        contentType: "application/json",
                        data: '{ "jobID": "' + jobID + '", "id": "<?php echo $user_id; ?>", "freelancer_id": "' + free_id + '" }',
                        success: function(data) {
                            var obj = JSON.parse(data);
                            console.log(obj);
                            if (obj.Success.length > 0) {
                                $('#status').html(obj.Success);
                                $('.propose').hide();
                                location.reload();
                            } else if (obj.Error.length > 0) {
                                $('#status').html(obj.Error);
                            }

                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });
                }
            }
        }
    });
</script>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>

</html>