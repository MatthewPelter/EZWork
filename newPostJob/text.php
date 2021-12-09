<div class="job progress">
    <h2>Job Progress</h2>
    <div class="job-container">
        <div class="jobCard">
            <div class="scope">
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