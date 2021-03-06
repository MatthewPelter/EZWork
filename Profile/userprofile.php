<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$uname = $_GET['name'];
$cleanuname = mysqli_real_escape_string($conn, $uname);

if ($cleanuname == $_SESSION['userid']) {
    header('Location: ../ClientProfile/index');
}

$sql = "SELECT * FROM clients WHERE username='$cleanuname'";
$result = mysqli_query($conn, $sql);
$dataFound = false;

if (mysqli_num_rows($result) > 0) {
    $dataFound = true;
    $pull = mysqli_fetch_assoc($result);

    $client_id = $pull['id'];
    if ($pull['freelancer_id'] !== NULL) {

        $freeResult = mysqli_query($conn, "SELECT * FROM freelancers WHERE user_id = '$client_id'");
        $freelancer_array = mysqli_fetch_assoc($freeResult);
    }
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
        <title>EZWork | Find Jobs or Freelancers</title>
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
    <div id="overlay">
        <span onclick="off()" class="closebtn">X</span>
        <div class="messageContainer">
            <form onsubmit="return false">
                <div class="form-container">
                    <textarea id="messagecontent" placeholder="Say something..."></textarea>
                </div>

                <div class="form-bottom">
                    <button onclick="off()" name="send-message" id="sendmessage" class="profile-card__button button--blue js-message-close">
                        Send
                    </button>

                    <button onclick="off()" class="profile-card__button button--gray js-message-close">
                        Cancel
                    </button>
                </div>

            </form>
        </div>
    </div>
    <?php include '../navbar.php'; ?>

    <div class="profile">

        <div class="profile-container js-profile-card">
            <?php
            if ($dataFound) {
            ?>

                <div class="profile-header">
                    <div class="user-image">
                        <img src="<?php echo $pull['avatar']; ?>" alt="profile card">
                    </div>
                    <div class="username">
                        <h2><?php echo $pull['firstname'] . " " . $pull['lastname']; ?></h2>
                        <span>
                            <?php if ($pull['freelancer_id'] != NULL) {
                                echo "Freelancer";
                            } else {
                                echo "Client";
                            } ?>
                        </span>
                        <div class="contact">
                            <div class="linkedIn">
                                <?php if ($pull['freelancer_id'] != NULL && $freelancer_array['linkedin'] != "") { ?>
                                    <a href="<?php echo $freelancer_array['linkedin']; ?>" target="_blank">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                <?php } else { ?>
                                    <a href="../404Page/index.html" style="display: none;"></a>
                                <?php } ?>
                            </div>
                            <div class="message">
                                <button id="messageUser" onclick="on()">Message</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="profile-body">

                    <div class="profile-job-info">
                        <h4>EZWork Information</h4>
                        <!-- if freelancer -->
                        <div class="rating" style="color: rgb(121, 121, 121);">
                            <?php
                            $rate = mysqli_query($conn, "SELECT AVG(rating) as average FROM ratings WHERE ratee='$client_id'");
                            $rate = mysqli_fetch_assoc($rate);
                            $rate = $rate['average'];
                            $rate = round($rate, 1);
                            if ($rate != 0) { ?>
                                <p><?php echo $rate; ?>/5 Rating</p>
                                <?php if( $rate == 1){ ?>
                                    <div class="stars" style="color: #32557f;display: flex;flex-direction: row;align-items: center;">
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                <?php
                                }else if ($rate == 2){
                                ?>
                                    <div class="stars" style="color: #32557f;display: flex;flex-direction: row;align-items: center;">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                <?php            
                                }else if( $rate == 3){
                                ?>
                                    <div class="stars" style="color: #32557f;display: flex;flex-direction: row;align-items: center;">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                <?php                                        
                                }else if($rate == 4){
                                ?>
                                    <div class="stars" style="color: #32557f;display: flex;flex-direction: row;align-items: center;">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                <?php                                    
                                }else if($rate == 5){
                                ?>
                                    <div class="stars" style="color: #32557f;display: flex;flex-direction: row;align-items: center;">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>                                    
                                <?php
                                }else{
                                    echo "Stars";
                                } 
                                ?>
                            <?php } else { ?>
                                <p>Not Rated Yet</p>
                            <?php } ?>
                        </div>
                        <?php if ($pull['freelancer_id'] != NULL) {
                            $freeID = $pull['freelancer_id'];
                            $pullJobs = mysqli_query($conn, "SELECT COUNT(*) AS completedJobs FROM jobs WHERE freelancer_id = '$freeID' AND status=1");
                            $pullJobCount = mysqli_fetch_assoc($pullJobs);
                            $pullJobCount = $pullJobCount['completedJobs'];

                            $pullOfferCount = mysqli_query($conn, "SELECT COUNT(*) AS completedJobs FROM offerjobs WHERE freelancer_id = '$client_id' AND status=1");
                            $pullOfferCount = mysqli_fetch_assoc($pullOfferCount);
                            $pullOfferCount = $pullOfferCount['completedJobs'];

                            $total = (int)$pullJobCount + (int)$pullOfferCount;
                        ?>

                            <div class="jobCompleted">
                                <p><?php echo $total; ?> completed Jobs</p>
                            </div>
                        <?php } ?>

                        <?php
                        $userid = $pull['id'];
                        $getJobs = mysqli_query($conn, "SELECT COUNT(*) AS jobCount FROM jobs WHERE user_id = '$userid'");
                        $fetchJobCount = mysqli_fetch_assoc($getJobs);
                        ?>
                        <div class="jobPosted">
                            <p><?php echo $fetchJobCount['jobCount']; ?> Job(s) Posted</p>
                        </div>
                        <?php
                        if ($pull['freelancer_id'] != NULL) {
                        ?>
                            <div class="freelancerQoute">
                                <p>**Freelancers also have the option to post jobs to the <span>EZWORK</span> marketplace.</p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php if ($pull['freelancer_id'] != NULL) { ?>
                        <div class="profile-info">
                            <h4>Personal Information</h4>
                            <div class="profile-expertise">
                                <div class="expertise">
                                    <h3>Expertise</h3>
                                    <p>
                                        <?php
                                        if ($freelancer_array['expertise'] != NULL) {
                                            echo $freelancer_array['expertise'];
                                        } else {
                                            echo "No Expertise";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="experienceLevel">
                                    <h3>Experience Level</h3>
                                    <p><?php echo $freelancer_array['experience']; ?></p>
                                </div>

                            </div>
                            <div class="profile-description">
                                <h3>Biography</h3>
                                <div class="bio-container">
                                    <p>
                                        <?php
                                        if ($freelancer_array['description'] != NULL) {
                                            echo $freelancer_array['description'];
                                        } else {
                                            echo "No Biography";
                                        }

                                        ?>
                                    </p>
                                </div>

                            </div>
                            <div class="educationJob">
                                <div class="profile-education">
                                    <h3>Education</h3>
                                    <h4>
                                        <?php
                                        if ($freelancer_array['school'] != NULL) {
                                            echo $freelancer_array['school'];
                                        } else {
                                            echo "None";
                                        }

                                        ?>
                                    </h4>

                                    <p id="degree">
                                        <?php
                                        if ($freelancer_array['degree'] != NULL) {
                                        ?>
                                            <?php echo $freelancer_array['degree']; ?> Degree in <?php echo $freelancer_array['fos']; ?>
                                        <?php
                                        } else {
                                            echo "None";
                                        }
                                        ?>
                                    </p>
                                    <p id="date">
                                        <?php
                                        if ($freelancer_array['schoolStart'] != 0000) {
                                        ?>
                                            Dates Attended: <?php echo $freelancer_array['schoolStart']; ?> - <?php echo $freelancer_array['schoolEnd']; ?>
                                        <?php
                                        } else {
                                            echo "None";
                                        }
                                        ?>

                                    </p>
                                </div>
                                <div class="profile-job">
                                    <h3>Job Experience</h3>
                                    <h4>
                                        <?php
                                        if ($freelancer_array['jobTitle'] != NULL) {
                                            echo $freelancer_array['jobTitle'];
                                        } else {
                                            echo "None";
                                        }
                                        ?>
                                    </h4>
                                    <p id="company">
                                        Company:
                                        <?php
                                        if ($freelancer_array['company'] != NULL) {
                                            echo $freelancer_array['company'];
                                        } else {
                                            echo "None";
                                        }
                                        ?>
                                    </p>
                                    <p id="location">
                                        Job Location:
                                        <?php
                                        if ($freelancer_array['jobLocation'] != NULL) {
                                            echo $freelancer_array['jobLocation'];
                                        } else {
                                            echo "None";
                                        }
                                        ?>
                                    </p>
                                    <p id="date">
                                        Dates Worked:
                                        <?php
                                        if ($freelancer_array['jobStart'] != 0000) {
                                            echo $freelancer_array['jobStart']; ?> - <?php echo $freelancer_array['jobEnd'];
                                                                                    } else {
                                                                                        echo "None";
                                                                                    }

                                                                                        ?>
                                    </p>
                                </div>

                            </div>
                            <div class="profile-location">
                                <h3>Location</h3>
                                <p><?php echo $freelancer_array['country']; ?></p>
                            </div>
                            <!--                                                        
                            <div class="ratings">
                                <h4>Reviews</h4>
                            </div>
                            -->
                            <div class="userJobsFreelancer">

                                <?php
                                if ($fetchJobCount['jobCount'] > 0) {
                                ?>
                                    <h3>All Jobs Post(s)</h3>
                                    <?php
                                    $userID = $pull['id'];
                                    $jobSQL = "SELECT * FROM jobs WHERE user_id='$userID' ORDER BY id DESC";
                                    $jobResult = mysqli_query($conn, $jobSQL) or die(mysqli_errno($conn));

                                    if (mysqli_num_rows($jobResult) > 0) {
                                        while ($r = mysqli_fetch_assoc($jobResult)) {
                                    ?>
                                            <div class="jobPost" onclick="location.href=`../newPostJob/job.php?id=<?php echo $r['id']; ?>`">
                                                <div class="job-title">
                                                    <a href="../newPostJob/job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a>
                                                </div>

                                                <!-- ----------------------------------------- -->
                                                <!-- JOB STATUS -->
                                                <!-- 0 : OPEN -->
                                                <!-- 1 : CLOSED -->
                                                <!-- -1 : IN PROGRESS -->
                                                <!-- ----------------------------------------- -->

                                                <div class="card1">
                                                    <div class="status">
                                                        <p>Status:</p>
                                                        <span>
                                                            <?php if ($r['status'] == 0) { ?>
                                                                <span style="color: lightgreen;font-weight: bolder;"><?php echo "Open"; ?></span>
                                                            <?php } else if ($r['status'] == 1) { ?>
                                                                <span style="color: red;font-weight: bolder;"><?php echo "Closed"; ?></span>
                                                            <?php } else if ($r['status'] == -1) { ?>
                                                                <span style="color: royalblue;font-weight: bolder;"><?php echo "In-Progress"; ?></span>
                                                            <?php } ?>
                                                        </span>
                                                    </div>
                                                    <div class="postedOn">
                                                        <p>Posted on:</p>
                                                        <span>
                                                            <?php echo $r['datePosted']; ?>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="card2">
                                                    <div class="location">
                                                        <p>Location: </p>
                                                        <span> <?php echo ucfirst($r['location']); ?></span>
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
                                    }
                                    ?>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="profile-info">
                            <div class="client-info">
                                <h3>Username:</h3>
                                <span><?php echo $pull['username'] ?></span>
                            </div>
                            <div class="userJobs">

                                <?php
                                if ($fetchJobCount['jobCount'] < 1) {
                                ?>
                                    <p>
                                        <?php echo "Seems like " . $pull['username'] . " is inactive."; ?>
                                    </p>
                                    <img src="../Image/sad-cartoon.gif" alt="no-activity">
                                <?php
                                } else {
                                ?>
                                    <h3>All Jobs Post(s)</h3>
                                    <?php
                                    $username = $pull['username'];
                                    $getUserID = "SELECT id FROM clients WHERE username = '$username'";
                                    $getResult = mysqli_query($conn, $getUserID);
                                    $userrow = mysqli_fetch_assoc($getResult);
                                    $userID = $userrow['id'];
                                    $jobSQL = "SELECT * FROM jobs WHERE user_id='$userID' ORDER BY id DESC";
                                    $jobResult = mysqli_query($conn, $jobSQL) or die(mysqli_errno($conn));

                                    if (mysqli_num_rows($jobResult) > 0) {
                                        while ($r = mysqli_fetch_assoc($jobResult)) {
                                    ?>
                                            <div class="jobPost" onclick="location.href=`../newPostJob/job.php?id=<?php echo $r['id']; ?>`">
                                                <div class="job-title">
                                                    <a href="../newPostJob/job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a>
                                                </div>

                                                <!-- ----------------------------------------- -->
                                                <!-- JOB STATUS -->
                                                <!-- 0 : OPEN -->
                                                <!-- 1 : CLOSED -->
                                                <!-- -1 : IN PROGRESS -->
                                                <!-- ----------------------------------------- -->

                                                <div class="card1">
                                                    <div class="status">
                                                        <p>Status:</p>
                                                        <span>
                                                            <?php if ($r['status'] == 0) { ?>
                                                                <span style="color: lightgreen;font-weight: bolder;"><?php echo "Open"; ?></span>
                                                            <?php } else if ($r['status'] == 1) { ?>
                                                                <span style="color: red;font-weight: bolder;"><?php echo "Closed"; ?></span>
                                                            <?php } else if ($r['status'] == -1) { ?>
                                                                <span style="color: royalblue;font-weight: bolder;"><?php echo "In-Progress"; ?></span>
                                                            <?php } ?>
                                                        </span>
                                                    </div>
                                                    <div class="postedOn">
                                                        <p>Posted on:</p>
                                                        <span>
                                                            <?php echo $r['datePosted']; ?>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="card2">
                                                    <div class="location">
                                                        <p>Location: </p>
                                                        <span> <?php echo ucfirst($r['location']); ?></span>
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
                                    }
                                    ?>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
            ?>
                <span>User does not Exists</span>
            <?php
            }
            ?>
        </div>


    </div>
    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills"></datalist>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script src="./app.js"></script>-->
<script>
    const profile = document.querySelector('.profile');

    function on() {
        document.getElementById("overlay").style.display = "block";
        profile.classList.add('blur');
    }

    function off() {
        document.getElementById("overlay").style.display = "none";
        profile.classList.remove('blur');
    }
</script>
<script>
    $(document).ready(function() {

        /*var messageBox = document.querySelector('.js-message');
        var messageBtn = document.querySelector('.js-message-btn');
        var card = document.querySelector('.js-profile-card');
        var closeBtn = document.querySelectorAll('.js-message-close');

        messageBtn.addEventListener('click', function(e) {
            e.preventDefault();
            messageBox.classList.add('active');
        });

        closeBtn.forEach(function(element, index) {
            console.log(element);
            element.addEventListener('click', function(e) {
                e.preventDefault();
                messageBox.classList.remove('active');
            });
        });
        */
        <?php
        if (isset($_GET['name'])) {
            $receiver = $_GET['name'];
        }

        ?>

        $('#sendmessage').click(function() {
            $.ajax({
                type: "POST",
                url: "../api/message.php",
                processData: false,
                contentType: "application/json",
                data: '{ "body": "' + $("#messagecontent").val() + '", "receiver": "<?php echo $receiver; ?>" }',
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    $("#messagecontent").val('');
                    if (obj.Success.length > 0) {
                        $('#status').html(obj.Success);
                    } else if (obj.Error.length > 0) {
                        $('#status').html(obj.Error);
                    }

                },
                error: function(r) {
                    console.log(r);
                }
            });
        });
    });
</script>

<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>

</html>