<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

$username = $_SESSION['userid'];
$user_id = $_SESSION['user_id'];

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
        <title>EZWork | Contracts</title>
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


    <div class="myJobs">
        <div class="myJobs-header">
            <ul>
                <li><a href="../ClientProfile/index.php">My Profile</a></li>
                <li>/</li>
                <li>Contracts</li>
            </ul>
            <button onclick="location.href='../newPostJob/length.php'">Post a New Job</button>
        </div>
        <div class="myJobs-container">
            <div class="myJobs-container-header">
                <div class="searchBar">
                    <h3>My Services</h3>
                </div>
            </div>

            <div class="postedJob">

                <?php
                $fetchContracts = mysqli_query($conn, "SELECT offerjobs.*, clients.username as uname FROM offerjobs INNER JOIN clients on offerjobs.client_id=clients.id WHERE client_id = '$user_id' OR freelancer_id='$user_id' ORDER BY id DESC") or die(mysqli_error($conn));

                if (mysqli_num_rows($fetchContracts) > 0) {
                    while ($row = mysqli_fetch_assoc($fetchContracts)) {
                ?>

                        <div class="allJobsCard" style="overflow-y: scroll;">
                            <div class="postedJob" data-postid="<?php echo $row['id']; ?>">
                                <div class="jobTitle">
                                    <h4 id="jobTitle"><a href="./offerjob.php?id=<?php echo $row['id']; ?>"><?php echo $row['uname']; ?></a></h4>

                                </div>
                                <p>Status:
                                    <?php if ($row['status'] == 0) { ?>
                                        <span style="color: lightgreen;font-weight: bolder;"><?php echo "Open"; ?></span>
                                    <?php } else if ($row['status'] == 1) { ?>
                                        <span style="color: red;font-weight: bolder;"><?php echo "Closed"; ?></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>




                    <?php
                    }
                } else { ?>
                    <h1>No current services</h1>

                <?php
                }
                ?>
            </div>


            <div class="spacer">
                <h3>SPACER</h3>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->
</body>

</html>