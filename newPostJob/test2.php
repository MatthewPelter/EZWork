<div class="job-progress-section">
    <h2>Job Progress</h2>
    <div class="job-progress-container">
        <div class="job-progress-header">
            <h2>
                <?php echo $r['title']; ?>
            </h2>
            <p>Status:
                <?php if ($r['status'] == 0) { ?>
                    <span style="color: lightgreen;font-weight: bolder;"><?php echo "Open"; ?></span>
                <?php } else if ($r['status'] == 1) { ?>
                    <span style="color: red;font-weight: bolder;"><?php echo "Closed"; ?></span>
                <?php } else { ?>
                    <span style="color: royalblue;font-weight: bolder;"><?php echo "In-Progress"; ?></span>
                <?php } ?>
            </p>
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

                    <h2>The freelancer has completed your job.</h2>
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

        <div class="messageChat" style="width: 100%;border-top: 3px solid lightgrey; height: 70vh;padding: 2rem; background: lightgreen;">
            <!-- messages loaded from jquery -->
        </div>
    </div>

</div>