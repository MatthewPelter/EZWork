<?php
$user_id = $_SESSION['user_id'];
$avatarResult = mysqli_query($conn, "SELECT avatar, freelancer_id FROM clients WHERE id = '$user_id'");
$avatarFetch = mysqli_fetch_assoc($avatarResult);
?>


<!-- I didnt want to break the style.css file so I put this here temporarily 
to style the notification dropdown. it is still ugly and needs fixing. -->
<style type="text/css">
    .helpContainer .notificationCard {
        display: none;
        -webkit-box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        background: white;
        padding: 0.5rem 1rem;
        width: 100%;
        border-radius: 10px;
    }

    .helpContainer .notificationCard .card {
        padding: 0.3rem 0rem;
        cursor: pointer;
        width: 100%;
    }

    .helpContainer .notificationCard .card h4 {
        font-weight: lighter;
        font-size: 0.85rem;
        margin-left: 0.8rem;
    }

    .helpContainer .notificationCard .card:hover {
        background: lightgrey;
    }

    .helpContainer .notificationCard::after {
        content: "";
        position: absolute;
        top: -26%;
        left: 14%;
        border-width: 0.8rem;
        border-style: solid;
        margin-left: 0.8rem;
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
        border-color: white transparent transparent transparent;
    }

    .is-hidden {
        opacity: 0;
        height: 0;
        font-size: 0;
        padding: 0;
        margin: 0 auto;
        display: block;
        transition: 200ms all ease-in-out;
    }
</style>

<div class="profile-mobile-nav">
    <!--
    <div class="profile-nav-search">
        <form id="searchContainer">
            <input type="text" list="allskills" autocomplete="off" name="searchNAV" placeholder="Search">
            <input type="submit" value="Find">
        </form>
    </div>
    -->
    <div class="mobileNavCard" id="navProfile" onclick="location.href='../ClientProfile/index'">
        <img src="<?php echo $avatarFetch['avatar']; ?>" alt="Avatar">
        <span id="user"><?php echo $_SESSION['userid']; ?></span>
        <i class="fa fa-sort-down" style="opacity: 0;"></i>
    </div>
    <div class="mobileNavCard" id="mobile-job-card" onclick="toggleJobCard(this)">
        <p>Jobs</p>
        <i class="fa fa-sort-down" id="jobArrow"></i>
    </div>
    <div class="mobileJobCard">
        <ul>
            <a href="../ClientProfile/index.php">
                <li>My Profile</li>
            </a>
            <a href="../newPostJob/myJobs.php">
                <li>My Job Posts</li>
            </a>
            <?php if ($avatarFetch['freelancer_id'] == NULL) { ?>
                <a href="../newPostJob/clientContract.php">
                    <li>My Contracts</li>
                </a>
            <?php
            } else {
            ?>
                <a href="../newPostJob/contracts.php">
                    <li>My Contracts</li>
                </a>
            <?php
            }
            ?>
            <a href="../newPostJob/length.php">
                <li>Post A Job</li>
            </a>
        </ul>
    </div>
    <?php // if ($avatarFetch['freelancer_id'] != NULL) { 
    ?>
    <div class="mobileNavCard" onclick="toggleFreelanceCard(this)">
        <p>Freelancer</p>
        <i class="fa fa-sort-down" id="freelanceArrow"></i>
    </div>
    <div class="mobileFreelanceCard">
        <ul>
            <a href="../Freelancer/AllFreelancers">
                <li>Discover</li>
            </a>
            <a href="../Freelancer/myHires.php">
                <li>Your Hires</li>
            </a>
            <a href="../Profile/register.php">
                <li>Become Freelancer</li>
            </a>
        </ul>
    </div>
    <?php // } 
    ?>

    <!--<div class="mobileNavCard" onclick="toggleProjectsCard(this)">
        <p>Projects</p>
        <i class="fa fa-sort-down" id="projectsArrow"></i>
    </div>

    <div class="mobileProjectsCard">
        <ul>
            <a href="#/">
                <li>Current Projects</li>
            </a>
            <a href="#/">
                <li>Project History</li>
            </a>
            <a href="#/">
                <li>Browse by Projects</li>
            </a>
        </ul>
    </div>
    -->
    <div class="mobileNavCard" onclick="location.href='../Market/market.php'">
        <p>Marketplace</p>
    </div>

    <div class="mobileNavCard" onclick="location.href='../message/messages'">
        <p>Messages</p>
    </div>
    <div class="mobileNavCard" onclick="toggleHelpCard(this)">
        <p>Help</p>
        <i class="fa fa-question" title="Help"></i>
    </div>
    <div class="mobileHelpCard">
        <ul>
            <a href="../Support/help">
                <li>Help & Support\</li>
            </a>
            <a href="../Support/guides">
                <li>Why EZWork</li>
            </a>
            <a href="../Support/contact">
                <li>Contact</li>
            </a>
        </ul>
    </div>

    <div class="mobileNavCard" onclick="location.href='../notifications'">
        <p>Notifications</p>
        <i class="fa fa-bell" title="Notification"></i>
    </div>
    <div class="mobileNavCard mobileNavSettings" onclick="location.href='../Settings/settings.php'">
        <p>
            <i class="fa fa-cog" aria-hidden="true"></i> Settings
        </p>
    </div>
    <div class="mobileNavCard mobileNavLogOut" onclick="location.href='../components/logout'">
        <p>
            <i class="fa fa-sign-out-alt"></i> Sign Out
        </p>
    </div>
</div>
<div class="mobileSearchCard">
    <div class="profile-nav-search">
        <form id="searchContainer">
            <input type="text" list="allskills" autocomplete="off" placeholder="Search" id="searchMain">
            <input type="submit" value="Find">
        </form>
    </div>
</div>
<div class="profile-header-container">
    <div class="profileHeader">
        <div class="burger" id="nav-burger" onclick='myFunction(this)'>
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>

        <div class="logo">
            <a href="https://ez-work.herokuapp.com/ClientProfile/index">
                <h2>E<span>z</span>Work</h2>
            </a>
        </div>

        <div class="searchBar" style="opacity: 0;pointer-events: none;">
            <form id="searchContainer">
                <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search">
                <input type="submit" value="Find">
            </form>
        </div>

        <div class="jobsNav">
            <span onclick="toggleJob()" id="jobs">Jobs</span>
            <div class="jobCardContainer">
                <div class="jobCard">
                    <!--
                    <div class="card card1" onclick="location.href='../ClientProfile/index.php'">
                        <h4>My Profile</h4>
                    </div>
                    -->
                    <div class="card card2" onclick="location.href='../newPostJob/myJobs'">
                        <h4>My Jobs</h4>
                    </div>
                    <?php if ($avatarFetch['freelancer_id'] == NULL) { ?>
                        <div class="card card3" onclick="location.href='../newPostJob/clientContract.php'" style="margin: 0.25rem 0rem;">
                            <h4>My Contracts</h4>
                        </div>
                    <?php } else { ?>
                        <div class="card card3" onclick="location.href='../newPostJob/contracts.php'" style="margin: 0.25rem 0rem;">
                            <h4>My Contracts</h4>
                        </div>
                    <?php } ?>
                    <div class="card card4" onclick="location.href='../newPostJob/services.php'">
                        <h4>My Services</h4>
                    </div>
                    <div class="card card2" onclick="location.href='../newPostJob/jobs'" style="margin: 0.25rem 0rem;">
                        <h4>All Jobs</h4>
                    </div>
                    <div class="card card4" onclick="location.href='../newPostJob/length.php'">
                        <h4>Post A Job</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="freelancerNav">
            <span onclick="toggleTalent()" id="talents">Freelancers</span>
            <div class="talentCardContainer">
                <div class="talentCard">
                    <div class="card card1" onclick="location.href='../Freelancer/AllFreelancers.php'">
                        <h4>Discover</h4>
                    </div>
                    <div class="card card2" onclick="location.href='../Freelancer/myHires'" style="margin: .25rem 0rem;">
                        <h4>My Hires</h4>
                    </div>
                    <?php if ($avatarFetch['freelancer_id'] == NULL) { ?>
                        <div class="card card4" onclick="location.href='../Profile/register.php'">
                            <h4>Become Freelancer</h4>
                        </div>
                    <?php } else { ?>
                        <div class="card card4"" style=" pointer-events: none;">
                            <h4 style="opacity: 0;">Become Freelancer</h4>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="marketNav">
            <span onclick="location.href='../Market/market'">Marketplace</span>
        </div>

        <!--<div class="projectsNav">
            <span onclick="toggleProject()" id="projects">Projects</span>
            <div class="projectCardContainer">
                <div class="projectCard">
                    <div class="card card1">
                        <h4>Current Projects</h4>
                    </div>
                    <div class="card card2">
                        <h4>Project History</h4>
                    </div>
                    <div class="card card3">
                        <h4>Browse by Projects</h4>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="messagesNav">
            <a style="color: white; text-decoration: none;" href="https://ez-work.herokuapp.com/message/messages">Messages</a>
        </div>

        <div class="notificationNav">
            <?php
            $notiCount = mysqli_query($conn, "SELECT COUNT(*) AS notiCount FROM notifications WHERE receiver='$user_id' AND isRead=0");
            $notiCount = mysqli_fetch_assoc($notiCount);
            $notiCount = $notiCount['notiCount'];
            ?>
            <i onclick="toggleNotifications()" class="fa fa-bell" id="notifications"><?php if ($notiCount > 0) {
                                                                                            echo $notiCount;
                                                                                        } ?></i></a>
            <div class="notificationCardContainer">
                <div class="notificationCard">
                    <div class="card card1" onclick="location.href='../notifications'">
                        <h4>View All Notifications</h4>
                    </div>
                    <?php
                    $notifications = mysqli_query($conn, "SELECT * FROM notifications WHERE receiver='$user_id' AND isRead=0 ORDER BY id DESC");
                    if (mysqli_num_rows($notifications) > 0) { ?>
                        <div class="card card1">
                            <h4 onclick="readNotification(0);">Mark as Read</h4>
                        </div>
                        <div class="noti">
                            <?php
                            while ($row = mysqli_fetch_assoc($notifications)) {
                                $senderID = $row['sender'];
                                $senderName = mysqli_query($conn, "SELECT username FROM clients WHERE id=$senderID");
                                $senderName = mysqli_fetch_assoc($senderName);
                                $senderName = $senderName['username'];
                                if ($row['type'] == 'm') {
                            ?>
                                    <div onclick="readNotification(<?php echo $row['id']; ?>); location.href='../message/messages?mid=<?php echo $row['sender']; ?>';" class="card">
                                        <h4>You got a message from <?php echo $senderName; ?></h4>
                                    </div>

                                <?php } else if ($row['type'] == 'a') { ?>

                                    <div class="card">
                                        <h4><?php echo $senderName; ?> has accepted your proposal!</h4>

                                    </div>

                                <?php } else if ($row['type'] == 'd') { ?>
                                    <div class="card">
                                        <h4><?php echo $senderName; ?> denied your proposal.</h4>

                                    </div>

                                <?php } else if ($row['type'] == 'r') { ?>
                                    <div onclick="readNotification(<?php echo $row['id']; ?>); location.href='../message/messages?mid=<?php echo $row['sender']; ?>';" class="card">
                                        <h4><?php echo $senderName; ?> has submitted a proprosal to your job.</h4>
                                    </div>
                                <?php } else if ($row['type'] == 'p') { ?>
                                    <div class="card">
                                        <h4><?php echo $senderName; ?> sent their payment.</h4>

                                    </div>
                                <?php
                                } else if ($row['type'] == 'pr') { ?>
                                    <div class="card">
                                        <h4>Your payment has been released.</h4>

                                    </div>

                                <?php
                                } else if ($row['type'] == 'fc') { ?>
                                    <div class="card">
                                        <h4><?php echo $senderName; ?> has completed your job.</h4>

                                    </div>

                            <?php
                                }
                            } ?>
                        </div>
                    <?php } else { ?>
                        <div class="card card1" style="pointer-events: none;">
                            <h4>You're all caught up!</h4>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="helpNav">
            <i class="fa fa-question" onclick="toggleHelp()" id="question"></i>
            <div class="helpContainer">
                <div class="helpCard">
                    <div class="card card1" onclick="location.href='../Support/help'">
                        <h4>Help & Support</h4>
                    </div>
                    <div class="card card2" onclick="location.href='../Support/guides'">
                        <h4>Why EZWork</h4>
                    </div>
                    <div class="card card3" onclick="location.href='../Support/contact'">
                        <h4>Contact Us</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="profileImage" onclick="toggleSession()">
            <img src="<?php echo $avatarFetch['avatar']; ?>" id="profileImage1" alt="">
            <div class="sessionCardContainer">
                <div class="sessionCard">
                    <div class="card card1">
                        <div class="image">
                            <img src="<?php echo $avatarFetch['avatar']; ?>" id="profileImage3" alt="">
                        </div>
                        <div class="name">
                            <span id="name"><?php echo $_SESSION['userid']; ?></span>
                            <span id="type">Client</span>
                        </div>
                    </div>
                    <div class="card card2" onclick="location.href='../Settings/settings'">
                        <p>
                            <i class="fa fa-cog" aria-hidden="true"></i> Settings
                        </p>
                    </div>
                    <div class="card card3" onclick="location.href='../components/logout.php'">
                        <p>
                            <i class="fa fa-sign-out-alt"></i> Sign Out
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <i class="fa fa-search" id="mobileSearch"></i>
        <i class="fa fa-times" id="ExitmobileSearch"></i>
    </div>
</div>



<!--nav bar script -->
<script type="text/javascript">
    function readNotification(id) {
        $.ajax({
            type: "POST",
            url: "../api/readNotification.php",
            processData: false,
            contentType: "application/json",
            data: '{ "notificationID": "' + id + '" }',
            success: function(data) {
                var obj = JSON.parse(data);
                console.log(obj);
                if (obj.Success.length > 0) {
                    if (id == 0) {
                        $(".noti").hide();
                        $("#notifications").empty();
                    }
                } else if (obj.Error.length > 0) {
                    //$('#status').html(obj.Error);
                }

            },
            error: function(r) {
                console.log(r);
            }
        });
    }

    var job = document.querySelector('.jobCard');
    var talent = document.querySelector('.talentCard');
    //var project = document.querySelector('.projectCard');
    var help = document.querySelector('.helpCard');
    var notification = document.querySelector('.notificationCard');
    var session = document.querySelector('.sessionCard');

    function toggleJob() {
        var job = document.querySelector('.jobCard');
        if (getComputedStyle(job).display === 'none') {
            job.style.display = 'inline-block';
            talent.style.display = 'none';
            //project.style.display = 'none';
            notification.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        } else {
            job.style.display = 'none';

        }
    }

    function toggleTalent() {
        var talent = document.querySelector('.talentCard');
        if (getComputedStyle(talent).display === 'none') {
            talent.style.display = 'inline-block';
            job.style.display = 'none';
            //project.style.display = 'none';
            notification.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        } else {
            talent.style.display = 'none';
        }
    }

    function toggleHelp() {
        var help = document.querySelector('.helpCard');
        if (getComputedStyle(help).display === 'none') {
            help.style.display = 'inline-block';
            talent.style.display = 'none';
            //project.style.display = 'none';
            job.style.display = 'none';
            notification.style.display = 'none';
            session.style.display = 'none';
        } else {
            help.style.display = 'none';
        }
    }

    function toggleNotifications() {
        var notification = document.querySelector('.notificationCard');
        if (getComputedStyle(notification).display === 'none') {
            notification.style.display = 'inline-block';
            help.style.display = 'none';
            talent.style.display = 'none';
            //project.style.display = 'none';
            job.style.display = 'none';
            session.style.display = 'none';
        } else {
            notification.style.display = 'none';
        }
    }

    function toggleSession() {

        if (getComputedStyle(session).display === 'none') {
            session.style.display = 'inline-block';
            talent.style.display = 'none';
            //project.style.display = 'none';
            notification.style.display = 'none';
            help.style.display = 'none';
            job.style.display = 'none';
        } else {
            session.style.display = 'none';
        }
    }

    //Toggle the nav burger button and mobile nav bar js

    const navIcon = document.getElementById("nav-burger");
    const profileMobileNav = document.querySelector(".profile-mobile-nav");

    function myFunction(x) {
        x.classList.toggle("change");
        if (x.classList.contains('change')) {
            profileMobileNav.style.display = "inline-block";
            //searchIcon.style.opacity = '0';
        } else {
            profileMobileNav.style.display = 'none';
            //searchIcon.style.opacity = '1';
        }
    }

    const sortDownBtn = document.getElementById('jobArrow');
    async function toggleJobCard() {
        var mobileJobCard = document.querySelector(".mobileJobCard");
        if (getComputedStyle(mobileJobCard).display === "none") {
            sortDownBtn.style.transform = "rotate(180deg)";
            mobileJobCard.style.display = "inline-block";
        } else {
            mobileJobCard.style.display = "none";
            sortDownBtn.style.transform = "rotate(360deg)";
        }
    }


    const sortDownBtn2 = document.getElementById('freelanceArrow');
    async function toggleFreelanceCard() {
        var mobileFreelanceCard = document.querySelector(".mobileFreelanceCard");
        if (getComputedStyle(mobileFreelanceCard).display === "none") {
            sortDownBtn2.style.transform = "rotate(180deg)";
            mobileFreelanceCard.style.display = "inline-block";
        } else {
            mobileFreelanceCard.style.display = "none";
            sortDownBtn2.style.transform = "rotate(360deg)";
        }
    }

    const sortDownBtn3 = document.getElementById('projectsArrow');
    async function toggleProjectsCard() {
        var mobileProjectsCard = document.querySelector(".mobileProjectsCard");
        if (getComputedStyle(mobileProjectsCard).display === "none") {
            sortDownBtn3.style.transform = "rotate(180deg)";
            mobileProjectsCard.style.display = "inline-block";
        } else {
            mobileProjectsCard.style.display = "none";
            sortDownBtn3.style.transform = "rotate(360deg)";
        }
    }

    async function toggleHelpCard() {
        var mobileHelpCard = document.querySelector(".mobileHelpCard");
        if (getComputedStyle(mobileHelpCard).display === "none") {
            mobileHelpCard.style.display = "inline-block";
        } else {
            mobileHelpCard.style.display = "none";
        }
    }
</script>