<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

// Check if user is logged in. If not send them to the log in.
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

$jobsSQL = "SELECT * FROM jobs ORDER BY id DESC";
$jobsQuery = mysqli_query($conn, $jobsSQL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css" />

    <style type="text/css">
        green {
            color: #2ecc71;
        }

        red {
            color: #d63031;
        }
    </style>

    <title>All Postings</title>
</head>

<body>

    <?php include '../navbar.php'; ?>

    <div class="profile">
        <div class="user-profile-body">
            <div class="user-postings">
                <div class="card title">
                    <h3>All Postings</h3>
                </div>
                <?php
                if (mysqli_num_rows($jobsQuery) > 0) {
                    while ($r = mysqli_fetch_assoc($jobsQuery)) {
                        $uid = $r['user_id'];
                        $unameSQL = "SELECT username, avatar FROM clients WHERE id='$uid'";
                        $unameResult = mysqli_query($conn, $unameSQL);
                        $unameFetched = mysqli_fetch_assoc($unameResult);
                ?>
                        <div class="postedJob">
                            <div class="jobTitle">
                                <h4 id="jobTitle"><a href="job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a></h4>
                                <i class="fa fa-ellipsis-v" id="jobGodMode" aria-hidden="true"></i>
                                <div class="jobEdit">
                                    <div class="exit">
                                        <i class="fa fa-times" id="exitJobEdit"></i>
                                    </div>
                                    <button onclick="location.href='../PostAJob/reviewJobPost.php'">Edit</button>
                                    <button style="color: red;" id="deleteJob">Delete</button>
                                </div>
                            </div>
                            <p>Status: <span id="status"><?php if ($r['status'] == 0) { ?>
                                        <green><?php echo "Open"; ?></green>
                                    <?php } else { ?>
                                        <red><?php echo "Closed"; ?></red>
                                    <?php } ?>
                                </span></p>
                            <p>Job Posted on <span id="date"><?php echo $r['datePosted']; ?></span> by <img style="width: 16px; border-radius:50%;" src="<?php echo $unameFetched['avatar']; ?>" alt="Avatar"><span id="postedBy">
                                    <?php if ($unameFetched['username'] != $_SESSION['userid']) {
                                        echo "<a href='../Profile/userprofile.php?name=" . $unameFetched['username'] . "'>" . $unameFetched['username'] . "</a>";
                                    } else {
                                        echo $unameFetched['username'];
                                    }  ?>
                                </span></p>
                        </div>

                    <?php
                    }
                } else { ?>
                    <div class="postedJob">
                        <div class="jobTitle">
                            <h4 id="jobTitle">There are no jobs. :(</h4>
                            <i class="fa fa-ellipsis-v" id="jobGodMode" aria-hidden="true"></i>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>


    <?php include '../footer.php'; ?>
</body>

</html>