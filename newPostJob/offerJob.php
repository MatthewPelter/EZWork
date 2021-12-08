<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    die("NOT LOGGED IN");
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' LIMIT 1";
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

$jobSQL = "SELECT * FROM offerjobs WHERE id='$job_id' LIMIT 1";
$jobResult = mysqli_query($conn, $jobSQL);

if (mysqli_num_rows($jobResult) > 0) {
    $r = mysqli_fetch_assoc($jobResult);

    if ($r['client_id'] != $user_id && $r['freelancer_id'] != $user_id) {
        die("Invalid Authorization");
    }
} else {
    header("location: ./jobs.php");
}
?>
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
    <style type="text/css">
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

        .people-list {
            display: none;
        }
    </style>
</head>

<body>

    <?php
    include '../navbar.php';
    ?>

    <h1>Active Job</h1>
    <?php
    $client = $r['client_id'];
    $freelancer = $r['freelancer_id'];
    $clientName = mysqli_query($conn, "SELECT username FROM clients WHERE id='$client'");
    $clientName = mysqli_fetch_assoc($clientName);
    $clientName = $clientName['username'];

    $freelancerName = mysqli_query($conn, "SELECT username FROM clients WHERE id='$freelancer'");
    $freelancerName = mysqli_fetch_assoc($freelancerName);
    $freelancerName = $freelancerName['username'];
    ?>

    <h2>Client: <?php echo $clientName; ?></h2>
    <h2>Freelancer: <?php echo $freelancerName; ?></h2>
    <p>Status: <?php echo ($r['status'] == 0) ? "Open" : "Closed"; ?></p>


    <?php
    if ($r['freelancer_id'] == $user_id && $r['freelancer_complete'] == 0) { ?>
        <button class="completeFreelancer">
            <i class="fa fa-flag" aria-hidden="true"></i>
            Mark Job as Complete
        </button>
    <?php
    }
    ?>
    <?php if ($r['client_id'] == $user_id && $r['freelancer_complete'] == 1) { ?>
        <button class="completeFreelancer">
            <i class="fa fa-flag" aria-hidden="true"></i>
            Mark Job as Complete
        </button>
    <?php } ?>



    <div class="wrapper">

        <h1>Project Progress</h1>

        <ol class="ProgressBar">
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
</body>

<div class="messageChat">
    <!-- insert message -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    var $bar = $(".ProgressBar");
    $bar.children().first().addClass("is-current");

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
                    url: "../api/mark-offer-as-complete.php",
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

    function loadMessageScripts() {
        var elem = document.querySelector('.chat-history');
        elem.scrollTop = elem.scrollHeight;

        <?php if ($r['client_id'] == $user_id) {
            $id = $r['freelancer_id'];
        } else {
            $id = $r['client_id'];
        }
        $getName = mysqli_query($conn, "SELECT username FROM clients WHERE id='$id'");
        $getName = mysqli_fetch_assoc($getName);
        $getName = $getName['username']; ?>

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

    <?php if ($r['client_id'] == $user_id) { ?>
        $(".messageChat").load("https://ez-work.herokuapp.com/message/messages?mid=<?php echo $r['freelancer_id']; ?> .messageMainContainer", loadMessageScripts);
    <?php } else if ($r['freelancer_id'] == $user_id) { ?>
        $(".messageChat").load("https://ez-work.herokuapp.com/message/messages?mid=<?php echo $r['client_id']; ?> .messageMainContainer", loadMessageScripts);
    <?php } ?>

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
</script>

</html>