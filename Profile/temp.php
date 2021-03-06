<div class="profile2" style="display: none;">
        <?php
        if ($dataFound) {
        ?>
            <div class="wrapper">
                <div class="profile-card js-profile-card">
                    <div class="profile-card__img">
                        <img src="<?php echo $row['avatar']; ?>" alt="profile card">
                    </div>

                    <div class="profile-card__cnt js-profile-cnt">
                        <div class="profile-card__name"><?php echo $row['firstname'] . " " . $row['lastname']; ?></div>
                        <div class="profile-card__txt"><strong><?php if ($row['freelancer_id'] != NULL) {
                                                                    echo "Freelancer";
                                                                } else {
                                                                    echo "Client";
                                                                } ?></strong></div>
                        <div class="profile-card-loc">
                            <span class="profile-card-loc__icon">
                                <svg class="icon">
                                    <use xlink:href="#icon-location"></use>
                                </svg>
                            </span>
                            <!--                                         
                                        <span class="profile-card-loc__txt">
                                            Istanbul, Turkey
                                        </span> -->
                        </div>

                        <div class="profile-card-inf">

                            <!-- if freelancer -->

                            <?php if ($row['freelancer_id'] != NULL) {
                                $freeID = $row['freelancer_id'];
                                $pullJobs = mysqli_query($conn, "SELECT COUNT(*) AS completedJobs FROM jobs WHERE freelancer_id = '$freeID' AND status=1");
                                $pullJobCount = mysqli_fetch_assoc($pullJobs);
                            ?>
                                <div class="profile-card-inf__item">
                                    <div class="profile-card-inf__title"><?php echo $pullJobCount['completedJobs']; ?></div>
                                    <div class="profile-card-inf__txt">Completed Freelance Jobs</div>
                                </div>
                            <?php } ?>

                            <?php
                            $userid = $row['id'];
                            $getJobs = mysqli_query($conn, "SELECT COUNT(*) AS jobCount FROM jobs WHERE user_id = '$userid'");
                            $fetchJobCount = mysqli_fetch_assoc($getJobs);
                            ?>
                            <div class="profile-card-inf__item">
                                <div class="profile-card-inf__title"><?php echo $fetchJobCount['jobCount']; ?></div>
                                <div class="profile-card-inf__txt">Job(s) Posted</div>
                            </div>

                            <div class="profile-card-inf__item">
                                <div class="profile-card-inf__title">not configured yet</div>
                                <div class="profile-card-inf__txt">Rating</div>
                            </div>
                        </div>

                        <div class="profile-card-social">

                            <?php if ($row['freelancer_id'] != NULL && $freelancer_array['linkedin'] != "") { ?>
                                <a href="<?php echo $freelancer_array['linkedin']; ?>" class="profile-card-social__item" style="background-color: white !important;" target="_blank">
                                    <span class="icon-font">
                                        <svg class="icon">
                                            <use xlink:href="#icon-linkedin"></use>
                                        </svg>
                                    </span>
                                </a>
                            <?php } ?>
                            <a href="../404Page/index.html" class="profile-card-social__item link" target="_blank">
                                <span class="icon-font">
                                    <svg class="icon">
                                        <use xlink:href="#icon-link"></use>
                                    </svg>
                                </span>
                            </a>

                        </div>

                        <div class="profile-card-ctr">
                            <!--<button class="profile-card__button button--blue js-message-btn">Message</button>-->

                        </div>
                        <span id="status"></span>
                    </div>
                    <!--
                    <div class="profile-card-message js-message">
                        <form class="profile-card-form">
                            <div class="profile-card-form__container">
                                <textarea id="messagecontent" placeholder="Say something..." required></textarea>
                            </div>

                            <div class="profile-card-form__bottom">
                                <button name="send-message" id="sendmessage" class="profile-card__button button--blue js-message-close">
                                    Send
                                </button>

                                <button class="profile-card__button button--gray js-message-close">
                                    Cancel
                                </button>
                            </div>
                        </form>

                        <div class="profile-card__overlay js-message-close"></div>
                    </div>

                </div>

            </div>
        -->

            <svg hidden="hidden">
                <defs>
                    <symbol id="icon-linkedin" viewBox="0 0 64 64">
                        <title>github</title>
                        <path data-name="layer1" fill="#0077b7" d="M1.15 21.7h13V61h-13zm46.55-1.3c-5.7 0-9.1 2.1-12.7 6.7v-5.4H22V61h13.1V39.7c0-4.5 2.3-8.9 7.5-8.9s8.3 4.4 8.3 8.8V61H64V38.7c0-15.5-10.5-18.3-16.3-18.3zM7.7 2.6C3.4 2.6 0 5.7 0 9.5s3.4 6.9 7.7 6.9 7.7-3.1 7.7-6.9S12 2.6 7.7 2.6z"></path>
                    </symbol>
                    <symbol id="icon-link" viewBox="0 0 32 32">
                        <title>link</title>
                        <path d="M17.984 11.456c-0.704 0.704-0.704 1.856 0 2.56 2.112 2.112 2.112 5.568 0 7.68l-5.12 5.12c-2.048 2.048-5.632 2.048-7.68 0-1.024-1.024-1.6-2.4-1.6-3.84s0.576-2.816 1.6-3.84c0.704-0.704 0.704-1.856 0-2.56s-1.856-0.704-2.56 0c-1.696 1.696-2.624 3.968-2.624 6.368 0 2.432 0.928 4.672 2.656 6.4 1.696 1.696 3.968 2.656 6.4 2.656s4.672-0.928 6.4-2.656l5.12-5.12c3.52-3.52 3.52-9.248 0-12.8-0.736-0.672-1.888-0.672-2.592 0.032z"></path>
                        <path d="M29.344 2.656c-1.696-1.728-3.968-2.656-6.4-2.656s-4.672 0.928-6.4 2.656l-5.12 5.12c-3.52 3.52-3.52 9.248 0 12.8 0.352 0.352 0.8 0.544 1.28 0.544s0.928-0.192 1.28-0.544c0.704-0.704 0.704-1.856 0-2.56-2.112-2.112-2.112-5.568 0-7.68l5.12-5.12c2.048-2.048 5.632-2.048 7.68 0 1.024 1.024 1.6 2.4 1.6 3.84s-0.576 2.816-1.6 3.84c-0.704 0.704-0.704 1.856 0 2.56s1.856 0.704 2.56 0c1.696-1.696 2.656-3.968 2.656-6.4s-0.928-4.704-2.656-6.4z"></path>
                    </symbol>
                </defs>
            </svg>

        <?php
        } else {
        ?>
            <span>User does not Exists</span>
        <?php
        }
        ?>
    </div>
