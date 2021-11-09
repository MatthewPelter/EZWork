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

$jobSQL = "SELECT jobs.*, clients.avatar FROM jobs INNER JOIN clients ON jobs.user_id = clients.id WHERE jobs.id='$job_id' LIMIT 1";
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
                    <p>Status:
                        <span id="status">
                            <?php if ($r['status'] == 0) {
                                echo "Open";
                            } else {
                                echo "Close";
                            } ?>
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
                            <span> <?php echo "No budget or pay rate set yet..."; ?></span>
                        <?php } ?>

                    </div>
                    <div class="experience">
                        <h4>Entry Level</h4>
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
                <button>Submit A Proposal</button>

                <div class="flag">
                    <i class="fa fa-flag" aria-hidden="true"></i>
                    <span>Flag as Inappropiate</span>
                </div>
                <?php if ($unameFetched['username'] == $_SESSION['userid']) {
                ?>
                    <input type="button" onclick="deleteMenu()" id="deleteBtn" value="Delete Post">


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

    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>
<script src="../SkillsContainer/searchProfile.js"></script>
<script src="./app.js"></script>
<script>
    var job = document.querySelector('.jobCard');
    var talent = document.querySelector('.talentCard');
    var project = document.querySelector('.projectCard');
    var help = document.querySelector('.helpCard');
    var session = document.querySelector('.sessionCard');

    function toggleJob() {
        var job = document.querySelector('.jobCard');
        if (job.style.display === 'none') {
            job.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        } else {
            job.style.display = 'none';

        }
    }

    function toggleTalent() {
        var talent = document.querySelector('.talentCard');
        if (talent.style.display === 'none') {
            talent.style.display = 'inline-block';
            job.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        } else {
            talent.style.display = 'none';
        }
    }

    function toggleProject() {
        var project = document.querySelector('.projectCard');
        if (project.style.display === 'none') {
            project.style.display = 'inline-block';
            talent.style.display = 'none';
            job.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        } else {
            project.style.display = 'none';
        }
    }

    function toggleHelp() {
        var help = document.querySelector('.helpCard');
        if (help.style.display === 'none') {
            help.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            job.style.display = 'none';
            session.style.display = 'none';
        } else {
            help.style.display = 'none';
        }
    }

    function toggleSession() {

        if (session.style.display === 'none') {
            session.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            job.style.display = 'none';
        } else {
            session.style.display = 'none';
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function deleteMenu() {
        $('#deleteMenu').css('display', 'block');
    }
    $('#yesBtn').click(function() {
        $.ajax({
            type: "POST",
            url: "../api/delete-post.php",
            data: 'postID=' + <?php echo $job_id; ?>,
            success: function(data) {
                $('#deleteMenu').css('display', 'none');
                $('#result').html(data);
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

<!--Toggle the nav burger button-->
<script>
    const navIcon = document.getElementById("nav-burger");
    const profileMobileNav = document.querySelector(".profile-mobile-nav");

    function myFunction(x) {
        x.classList.toggle("change");
        if (x.classList.contains('change')) {
            profileMobileNav.style.display = "inline-block";
            searchIcon.style.opacity = '0';
        } else {
            profileMobileNav.style.display = 'none';
            searchIcon.style.opacity = '1';
        }
    }
</script>
<script>
    const sortDownBtn = document.getElementById('jobArrow');

    function toggleJobCard() {
        var mobileJobCard = document.querySelector(".mobileJobCard");
        if (mobileJobCard.style.display === "none") {
            sortDownBtn.style.transform = "rotate(180deg)";
            mobileJobCard.style.display = "inline-block";
        } else {
            mobileJobCard.style.display = "none";
            sortDownBtn.style.transform = "rotate(360deg)";
        }
    }
</script>

<script>
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
    } else {
        status.style.color = "red";
    }
</script>

</html>