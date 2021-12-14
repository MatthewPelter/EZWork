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
    }
}

$job_id = $_GET['id'];
$job_id = mysqli_real_escape_string($conn, $job_id);
$job_id = htmlspecialchars($job_id);

$jobSQL = "SELECT * FROM jobs WHERE jobs.id='$job_id' LIMIT 1";
$jobResult = mysqli_query($conn, $jobSQL);

if (mysqli_num_rows($jobResult) > 0) {
    $r = mysqli_fetch_assoc($jobResult);
    $uid = $r['user_id'];
    if ($user_id != $uid) {
        die("You cannot edit someone else's post...");
    }
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

    <div class="edit-jobs">
        <div class="edit-jobs-container-header">
            <h4>Edit Job Post</h4>
        </div>

        <div class="edit-job-container">
            <form class="form" action="../components/edit-post?id=<?php echo $job_id; ?>" method="post" name="edit-post" id="myForm">
                <div class="edit-jobCard">
                    <div class="jobTitle">
                        <h3>Job Title</h3>
                        <input type="text" name="title" id="title" value="<?php echo $r['title']; ?>" required>
                    </div>
                    <div class="scope">
                        <h3>Needed Skill: <span><?php echo $r['skills']; ?></span></h3>
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
                        <textarea name="description" id="description" type="text"><?php echo $r['description']; ?></textarea>
                    </div>

                    <div class="budgetAndExperience">
                        <div class="budget">
                            <?php if ($r['rate'] > 0) { ?>
                                <span><?php echo "Hourly Rate" ?></span>
                                <p><input type="number" id="rate" name="rate" value="<?php echo $r['rate']; ?>"> / hr</p>
                                
                            <?php } else if ($r['budget'] > 0) { ?>
                                <span><?php echo "Project Budget" ?></span>
                                <p><input type="number" id="budget" name="budget" value="<?php echo $r['budget']; ?>"></p>
                                
                            <?php } else { ?>
                                <p></p>
                                <span> <?php echo "No budget or pay rate set yet... Contact client for pricing."; ?></span>
                            <?php } ?>

                        </div>
                        <div class="experience">
                            <h4>Experience Level</h4>
                            <select id="experience" name="experience">
                                <option <?php if ($r['experience'] == 'entry') {
                                            echo "selected";
                                        } ?> value="entry">Entry</option>
                                <option <?php if ($r['experience'] == 'intermediate') {
                                            echo "selected";
                                        } ?> value="intermediate">Intermediate</option>
                                <option <?php if ($r['experience'] == 'expert') {
                                            echo "selected";
                                        } ?> value="expert">Expert</option>
                            </select>
                        </div>
                    </div>

                    <div class="jobType">
                        <div class="type">
                            <h4>Job Type:</h4>
                            <select id="length" name="length">
                                <option <?php if ($r['length'] == 's') {
                                            echo "selected";
                                        } ?> value="s">Short term or part time work</option>
                                <option <?php if ($r['length'] == 'l') {
                                            echo "selected";
                                        } ?> value="l">Designated, longer term work"</option>
                            </select>
                        </div>
                        <div class="size">
                            <h4>Project Size:</h4>

                            <select id="size" name="size">
                                <option <?php if ($r['size'] == 'small') {
                                            echo "selected";
                                        } ?> value="small">Small</option>
                                <option <?php if ($r['size'] == 'medium') {
                                            echo "selected";
                                        } ?> value="medium">Medium</option>
                                <option <?php if ($r['size'] == 'large') {
                                            echo "selected";
                                        } ?> value="large">Large</option>
                            </select>
                        </div>

                        <div class="options">
                            <input type="submit" value="Submit" name="submit">
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>
<script src="./app.js"></script>

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

    // Status color
    const status = document.getElementById('status');

    var statusText = status.innerText;

    if (statusText == "Open") {
        status.style.color = "lightgreen";
    } else {
        status.style.color = "red";
    }

</html>