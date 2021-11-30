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
    </head>
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
                        <span id="status">
                            <?php if ($r['status'] == 0) {
                                echo "Open";
                            } else if ($r['status'] == 1) {
                                echo "Closed";
                            } else if ($r['status'] == -1) {
                                echo "In-Progress";
                            }
                            ?>
                        </span>
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
                            <!-- <a href="./proposal.php?id=<?php echo $job_id; ?>">--><button id="proposalBtn">Submit A Proposal</button>
                            <!--</a> -->
                        <?php } ?>
                    <?php }
                } else {

                    if ($unameFetched['username'] != $_SESSION['userid'] && $r['status'] == 0) { ?>
                        <button id="payBtn">Pay for Service</button>
                <?php }
                } ?>





                <?php if ($unameFetched['username'] != $_SESSION['userid']) { ?>
                    <div class="flag">
                        <i class="fa fa-flag" aria-hidden="true"></i>
                        <span>Flag as Inappropiate</span>
                    </div>
                <?php } ?>
                <?php if ($unameFetched['username'] == $_SESSION['userid']) {
                ?>
                    <input type="button" onclick="location.href = 'edit?id=<?php echo $r['id']; ?>';" id="editBtn" value="Edit Post">
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

    <?php
    $getFreelancerID = mysqli_query($conn, "SELECT freelancer_id FROM clients WHERE id='$user_id'");
    $getFreelancerID = mysqli_fetch_assoc($getFreelancerID);
    $getFreelancerID = $getFreelancerID['freelancer_id'];
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
                                <?php if ($r['status'] == 0) {
                                    echo "Open";
                                } else if ($r['status'] == 1) {
                                    echo "Closed";
                                } else if ($r['status'] == -1) {
                                    echo "In-Progress";
                                }
                                ?>
                            </span>
                        </p>
                    </div>
                </div>

                <div class="options">
                    <?php

                    ?>

                    <?php if ($unameFetched['username'] != $_SESSION['userid']) { ?>
                        <div class="flag">
                            <i class="fa fa-flag" aria-hidden="true"></i>
                            <span>Mark Job as Complete</span>
                        </div>
                    <?php } ?>
                    <?php if ($unameFetched['username'] == $_SESSION['userid']) {
                    ?>
                        <input type="button" onclick="location.href = 'edit?id=<?php echo $r['id']; ?>';" id="editBtn" value="Edit Post">
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
                    <h3>About the Freelancer</h3>
                    <div class="username">
                        <p>Work By: </p>
                        <?php
                        $workFreelancer = $r['freelancer_id'];
                        $getFreelancerName = mysqli_query($conn, "SELECT username, avatar FROM clients WHERE freelancer_id='$workFreelancer'");
                        $getFreelancerName = mysqli_fetch_assoc($getFreelancerName);
                        ?>
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
<script src="./app.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

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
                            // $("#chat").val('');
                            if (obj.Success.length > 0) {
                                // $('#result').html(obj.Success);
                                // $('#proposal').hide();
                                Swal.fire(
                                    'Proposal Sent!',
                                    'Your proposal has been sent to the client.',
                                    'success'
                                ).then(function() {
                                    window.location.reload(1);
                                });
                            } else if (obj.Error.length > 0) {
                                // $('#result').html(obj.Error);
                            }

                        },
                        error: function(r) {
                            console.log(r);
                        }
                    });

                }
            })();

        });

        $("#deleteBtn").click(function() {
            // $('#deleteMenu').css('display', 'block');
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
                            //$('#deleteMenu').css('display', 'none');
                            //$('#result').html(data);
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
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
        });

        /*$('#yesBtn').click(function() {
            $.ajax({
                type: "POST",
                url: "../api/delete-post.php",
                data: 'postID=' + <?php echo $job_id; ?>,
                success: function(data) {
                    $('#deleteMenu').css('display', 'none');
                    $('#result').html(data);

                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);
                },
                error: function(r) {
                    console.log(r);
                }
            });
        });

        $('#noBtn').click(function() {
            $('#deleteMenu').css('display', 'none');
        });*/

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
        })

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
    });
</script>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>

</html>