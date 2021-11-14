<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

// Check if user is logged in. If not send them to the log in.
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
    die();
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' limit 1";
    $result = mysqli_query($conn, $sql);
    $userfetch = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
        die();
    }
}

$jobsSQL = "SELECT * FROM jobs ORDER BY id DESC";
$jobsQuery = mysqli_query($conn, $jobsSQL);

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
        <title>EZWork | MarketPlace</title>
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

    <div class="all-jobs-container">
        <div class="all-jobs-container-header">
            <h4>Find Work</h4>
            <div class="searchBar2">
                <form id="searchContainer2">
                    <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search" id="search2">
                    <input type="submit" value="Search" id="find2">
                </form>
            </div>
        </div>

        <div class="jobs-container">
            <div class="sortMenu">
                <h3>Filter</h3>

            </div>

            <div class="allJobs">

                <div class="allJobsContainer">
                    <div class="JobsHeader">
                        <h3>All Jobs</h3>
                    </div>
                    <?php
                    if (mysqli_num_rows($jobsQuery) > 0) {
                        while ($r = mysqli_fetch_assoc($jobsQuery)) {
                            $uid = $r['user_id'];
                            $unameSQL = "SELECT username, avatar FROM clients WHERE id='$uid'";
                            $unameResult = mysqli_query($conn, $unameSQL);
                            $unameFetched = mysqli_fetch_assoc($unameResult);
                    ?>

                            <div class="jobPost" onclick="location.href=`job.php?id=<?php echo $r['id']; ?>`">
                                <div class="job-title">
                                    <a href="job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a>
                                </div>
                                <div class="status">
                                    <p>Status:</p>
                                    <span>
                                        <?php if ($r['status'] == 0) { ?>
                                            <green><?php echo "Open"; ?></green>
                                        <?php } else { ?>
                                            <red><?php echo "Closed"; ?></red>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="card1">
                                    <div class="postedOn">
                                        <p>Posted on:</p>
                                        <span>
                                            <?php echo $r['datePosted']; ?>
                                        </span>
                                    </div>
                                    <div class="postedBy">
                                        <p>Posted By:</p>
                                        <img style="width: 16px; border-radius:50%; margin-right: 0.5rem;" src="<?php echo $unameFetched['avatar']; ?>" alt="Avatar">
                                        <span>
                                            <?php if ($unameFetched['username'] != $_SESSION['userid']) {
                                                echo "<a href='../Profile/userprofile.php?name=" . $unameFetched['username'] . "'>" . $unameFetched['username'] . "</a>";
                                            } else {
                                                echo $unameFetched['username'];
                                            }  ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="card2">
                                    <div class="location">
                                        <p>Location: </p>
                                        <span> <?php echo $r['location']; ?></span>
                                    </div>

                                    <div class="price">
                                        <p>Pay: </p>
                                        <?php if ($r['rate'] > 0) { ?>
                                            <span>$<?php echo $r['rate']; ?> / hr - </span>
                                            <span><?php echo "Hourly Rate" ?></span>
                                        <?php } else if ($r['budget'] > 0) { ?>
                                            <span>$ <?php echo $r['budget']; ?> - </span>
                                            <span><?php echo "Project Budget" ?></span>
                                        <?php } else { ?>
                                            <p></p>
                                            <span> <?php echo "No budget or pay rate set yet..."; ?></span>
                                        <?php } ?>
                                    </div>
                                </div>

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

                    <div class="JobsFooter">
                        <p>SPACER</p>
                    </div>
                </div>

            </div>

            <div class="myProfile">

                <div class="header">
                    <img src="<?php echo $userfetch['avatar']; ?>" alt="Avatar">
                    <h4>My Profile</h4>
                </div>

                <div class="view">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <a href="https://ez-work.herokuapp.com/ClientProfile/index">View my Profile</a>
                </div>

            </div>
        </div>
    </div>


    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>
<script>
    const search2 = document.getElementById('search2');
    const profileMobileNav2 = document.querySelector(".profile-mobile-nav");
    if(getComputedStyle(profileMobileNav2).display === "inline-block"){
        search2.style.display === "none";
    }
    else if(getComputedStyle(profileMobileNav2).display === "none"){
        search2.style.display === "inline-block";
    }
</script>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
</html>