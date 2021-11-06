<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
    }
}

$job_id = $_GET['id'];
$job_id = mysqli_real_escape_string($conn, $job_id);
$job_id = htmlspecialchars($job_id);

$jobSQL = "SELECT * FROM jobs WHERE id='$job_id' LIMIT 1";
$jobResult = mysqli_query($conn, $jobSQL);

if (mysqli_num_rows($jobResult) > 0) {
    $r = mysqli_fetch_assoc($jobResult);

    $uid = $r['user_id'];
    $unameSQL = "SELECT username FROM clients WHERE id='$uid'";
    $unameResult = mysqli_query($conn, $unameSQL);
    $unameFetched = mysqli_fetch_assoc($unameResult);
} else {
    header("location: ./jobs.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo/logo.svg">
    <link rel="stylesheet" href="../Styles/style.css" />

    <style type="text/css">
        hr.solid {
            border-top: 3px solid #222;
            width: 50%;
        }
    </style>

    <title><?php echo $r['title']; ?></title>
</head>

<body>

    <?php
    include '../navbar.php';
    ?>
    <div class="profile">
        <div class="user-postings" data-postid="<?php echo $r['id']; ?>">
            <div class="card title">
                <h3><?php echo $r['title']; ?></h3>
                <span><a href="jobs">All Postings</a></span>
            </div>
            <div class="card result">
                <h1>Posted By: <?php if ($unameFetched['username'] != $_SESSION['userid']) { ?>
                        <a href="../Profile/userprofile.php?name=<?php echo $unameFetched['username']; ?>"><?php echo $unameFetched['username']; ?></a>

                    <?php } else {
                                    echo $unameFetched['username'];
                                } ?>
                </h1>
                <h1>Description: <?php echo $r['description']; ?></h1>
                <h1>Job Type: <?php if ($r['length'] == 'l') {
                                    echo "Designated, longer term work";
                                } else {
                                    echo "Short term or part time work";
                                } ?></h1>
                <h1>Scope of Job</h1>

                <hr class="solid">

                <h1>Size: <?php echo ucfirst($r['size']); ?></h1>
                <h1>Freelance Location: <?php if ($r['location'] == 'us') {
                                            echo "United States ONLY";
                                        } else {
                                            echo "Worldwide";
                                        } ?></h1>
                <h1><?php if ($r['budget'] > 0) {
                        echo "Project Budget: " . $r['budget'];
                    } else if ($r['rate'] > 0) {
                        echo "Hourly Rate: " . $r['rate'];
                    } else {
                        echo "No budget or pay rate set yet...";
                    } ?></h1>

                <hr class="solid">

                <h1>Status: <?php if ($r['status'] == 0) {
                                echo "Open";
                            } else {
                                echo "Open";
                            } ?></h1>
                <h1>Posted on <?php echo $r['datePosted']; ?></h1>

                <?php if ($unameFetched['username'] == $_SESSION['userid']) {
                ?>
                    <input type="button" onclick="deleteMenu()" id="deleteBtn" value="Delete Post">


                    <div id="deleteMenu" style="display: none;">
                        <span>Are you sure you want to delete this post?</span>
                        <input type="button" id="yesBtn" value="Yes">
                        <input type="button" id="noBtn" value="No">
                    </div>

                <?php } ?>

                <span id="result"></span>
            </div>
        </div>
    </div>

    <?php include '../footer.php'; ?>

</body>
<script src="../ClientProfile/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function deleteMenu() {
        $('#deleteMenu').css('display', 'block');
    }
    $('#yesBtn').click(function() {
        $.ajax({
            type: "POST",
            url: "../api/delete-post.php",
            processData: false,
            contentType: "application/json",
            data: '{ "jobID": "' + $('.user-postings').data('postid') + '" }',
            success: function(data) {
                var obj = JSON.parse(data);
                console.log(obj);
                $('#deleteMenu').css('display', 'none');
                if (obj.Success.length > 0) {
                    $('#result').html(obj.Success);
                } else if (obj.Error.length > 0) {
                    $('#result').html(obj.Error);
                }
            },
            error: function(r) {
                console.log(r);
            }
        });
    });

    $('#noBtn').click(function() {
        $('#deleteMenu').css('display', 'none');
    });
</script>

</html>