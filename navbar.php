<?php
$user_id = $_SESSION['user_id'];
$avatarResult = mysqli_query($conn, "SELECT avatar, freelancer_id FROM clients WHERE id = '$user_id'");
$avatarFetch = mysqli_fetch_assoc($avatarResult);
?>
<style type="text/css">
    @import 'https://fonts.googleapis.com/css?family=Material+Icons';

    .notification-container {
        cursor: default;
        position: absolute;
        z-index: 999;
        top: 0;
        right: 10rem;
        width: 400px;
        font-weight: 300;
        background: white;
        border-radius: 0.5rem;
        box-sizing: border-box;
        box-shadow: 0.5rem 0.5rem 2rem 0 rgba(0, 0, 0, 0.2);
        animation-name: dropPanel;
        animation-iteration-count: 1;
        animation-timing-function: all;
        animation-duration: 0.75s;
    }

    .notification-container:before {
        content: "";
        position: absolute;
        top: 1px;
        right: 0;
        width: 0;
        height: 0;
        transform: translate(-1rem, -100%);
        border-left: 0.75rem solid transparent;
        border-right: 0.75rem solid transparent;
        border-bottom: 0.75rem solid white;
    }

    .notification-container h3 {
        text-transform: uppercase;
        font-size: 75%;
        font-weight: 700;
        color: #84929f;
        padding: 1.5rem 2rem;
    }

    .notification-container i {
        color: #b5c4d2;
        font-size: 140%;
        @vertical-align (50%);
        position: absolute;
    }

    .notification-container i.right {
        right: 2rem;
    }

    .notification-container i.right:hover {
        opacity: 0.8;
        cursor: pointer;
    }

    .notification-container em {
        margin-right: 0.75rem;
        font-weight: 700;
        font-size: 115%;
        color: #b5c4d2;
        vertical-align: bottom;
        display: inline-block;
    }

    @keyframes dropPanel {
        0% {
            opacity: 0;
            transform: translateY(-100px) scaleY(0.5);
        }
    }

    .num-count {
        position: absolute;
        user-select: none;
        cursor: default;
        font-size: 0.6rem;
        background: #e74c3c;
        width: 1.2rem;
        height: 1.2rem;
        color: #ecf0f1;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        top: -0.33rem;
        right: -0.66rem;
        box-sizing: border-box;
    }

    .notification {
        box-sizing: border-box;
    }

    .notification.new {
        background: #f3f9fd;
    }

    input.checkbox[type=checkbox] {
        display: none;
    }

    input.checkbox[type=checkbox]+label {
        display: block;
    }

    input.checkbox[type=checkbox]:not(:checked)+label {
        transition: height 0.25s;
        height: 0;
        padding: 0;
        font-size: 0;
        border: none;
    }

    input.checkbox[type=checkbox]:not(:checked)+label * {
        display: none;
    }

    input.checkbox[type=checkbox]:checked+label {
        height: 3.25rem;
        padding: 1.125rem 4rem 0.75rem 2rem;
        font-size: 75%;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .red {
        color: #f8b2a6 !important;
    }

    .teal {
        color: #7fa6ec;
    }

    .gray {
        color: rgba(255, 255, 255, 0.2);
    }

    .gray-bg {
        background: rgba(255, 255, 255, 0.2) !important;
    }

    .primary-button {
        background: cornflowerblue;
        border: 2px solid cornflowerblue;
    }

    .secondary-button {
        border: 2px solid #B2B9C5;
        background: none;
        color: #B2B9C5;
    }

    .left {
        margin-right: 0.75rem;
        float: left;
    }

    .right {
        margin-left: 0.75rem;
        float: right;
    }


    .notification-icon {
        position: relative;
        margin-right: 1em;
        border-radius: 5px;
        background: #ecf0f1;
    }

    .notification-icon i {
        margin: 0.5rem;
    }

    .notification-icon:nth-of-type(1) i {
        background: -webkit-linear-gradient(300deg, #acccea, #6495ed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .notification-icon:nth-of-type(2) i {
        background: -webkit-linear-gradient(300deg, #fff9ab, #00b8ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .switch {
        position: relative;
        display: inline-block;
        margin: 0.75rem 0 0;
    }

    .switch>span {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        pointer-events: none;
        font-weight: bold;
        font-size: 9px;
        text-transform: uppercase;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.06);
        width: 50%;
        text-align: center;
    }

    input.check-toggle-round-flat:checked~.off {
        color: #98b6ec;
    }

    input.check-toggle-round-flat:checked~.on {
        color: #fff;
    }

    .switch>span.on {
        left: 2px;
        color: #98b6ec;
    }

    .switch>span.off {
        right: 2px;
        color: #fff;
    }

    .check-toggle {
        display: none;
    }

    .check-toggle+label {
        display: block;
        position: relative;
        cursor: pointer;
    }

    input.check-toggle-round-flat+label {
        width: 90px;
        height: 26px;
        background: #7fa6ec;
        border-radius: 5px;
    }

    input.check-toggle-round-flat+label:before,
    input.check-toggle-round-flat+label:after {
        display: block;
        position: absolute;
        content: "";
    }

    input.check-toggle-round-flat+label:after {
        top: 2px;
        left: 2px;
        bottom: 2px;
        width: 50%;
        background-color: white;
        border-radius: 3px;
        transition: margin 0.2s;
        cursor: default;
    }

    input.check-toggle-round-flat:checked+label:after {
        margin-left: 41px;
    }
</style>

<div class="profile-mobile-nav">
    <div class="profile-nav-search">
        <form id="searchContainer">
            <input type="text" list="allskills" autocomplete="off" name="searchNAV" placeholder="Search">
            <input type="submit" value="Find">
        </form>
    </div>
    <div class="mobileNavCard" id="navProfile">
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
                <li>My Jobs</li>
            </a>
            <a href="../newPostJob/myJobs.php">
                <li>All My Job Posts</li>
            </a>
            <a href="#/">
                <li>All Contracts</li>
            </a>
            <a href="../newPostJob/length.php">
                <li>Post A Job</li>
            </a>
        </ul>
    </div>
    <?php if ($avatarFetch['freelancer_id'] != NULL) { ?>
        <div class="mobileNavCard" onclick="toggleFreelanceCard(this)">
            <p>Freelancer</p>
            <i class="fa fa-sort-down" id="freelanceArrow"></i>
        </div>
        <div class="mobileFreelanceCard">
            <ul>
                <a href="../newPostJob/jobs.php">
                    <li>Discover</li>
                </a>
                <a href="#/">
                    <li>Your Hires</li>
                </a>
                <a href="#/">
                    <li>Freelance History</li>
                </a>
                <a href="../Profile/register.php">
                    <li>Become Freelancer</li>
                </a>
            </ul>
        </div>
    <?php } ?>

    <div class="mobileNavCard" onclick="toggleProjectsCard(this)">
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


    <div class="mobileNavCard" onclick="location.href='../message/messages'">
        <p>Messages</p>
    </div>
    <div class="mobileNavCard">
        <p>Help</p>
        <i class="fa fa-question" title="Help"></i>
    </div>
    <div class="mobileNavCard">
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
        <div class="searchBar">
            <form id="searchContainer">
                <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search">
                <input type="submit" value="Find">
            </form>
        </div>
        <div class="jobsNav">
            <span onclick="toggleJob()" id="jobs">Jobs</span>
            <div class="jobCardContainer">
                <div class="jobCard">
                    <div class="card card1" onclick="location.href='../ClientProfile/index.php'">
                        <h4>My Jobs</h4>
                    </div>
                    <div class="card card2" onclick="location.href='../newPostJob/myJobs.php'">
                        <h4>All Job Posts</h4>
                    </div>
                    <div class="card card3" onclick="location.href='../newPostJob/contracts.php'">
                        <h4>All Contracts</h4>
                    </div>
                    <div class="card card4" onclick="location.href='../newPostJob/length.php'">
                        <h4>Post A Job</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($avatarFetch['freelancer_id'] != NULL) { ?>
            <div class="freelancerNav">
                <span onclick="toggleTalent()" id="talents">Freelancer</span>
                <div class="talentCardContainer">
                    <div class="talentCard">
                        <div class="card card1">
                            <h4>Discover</h4>
                        </div>
                        <div class="card card2" onclick="location.href='../newPostJob/contracts.php'">
                            <h4>Your Hires</h4>
                        </div>
                        <div class=" card card4">
                            <h4>Freelance History</h4>
                        </div>
                        <div class="card card4" onclick="location.href='../Profile/register.php'">
                            <h4>Become Freelancer</h4>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="projectsNav">
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
        <div class="messagesNav">
            <a style="color: white; text-decoration: none;" href="https://ez-work.herokuapp.com/message/messages">Messages</a>
        </div>
        <div class="guide">
            <div class="notification-icon right">
                <i class="material-icons dp48">notifications</i>
                <span class="num-count">13</span>

                <div class="notification-container">
                    <h3>Notifications
                        <i class="material-icons dp48 right">settings</i>
                    </h3>

                    <input class="checkbox" type="checkbox" id="size_1" value="small" checked />
                    <label class="notification new" for="size_1"><em>1</em> new <a href="">guest account(s)</a> have been created.<i class="material-icons dp48 right">clear</i></label>

                    <input class="checkbox" type="checkbox" id="size_2" value="small" checked />
                    <label class="notification new" for="size_2"><em>3</em> new <a href="">lead(s)</a> are available in the system.<i class="material-icons dp48 right">clear</i></label>

                    <input class="checkbox" type="checkbox" id="size_3" value="small" checked />
                    <label class="notification" for="size_3"><em>5</em> new <a href="">task(s)</a>.<i class="material-icons dp48 right">clear</i></label>

                    <input class="checkbox" type="checkbox" id="size_4" value="small" checked />
                    <label class="notification" for="size_4"><em>9</em> new <a href="">calendar event(s)</a> are scheduled for today.<i class="material-icons dp48 right">clear</i></label>

                    <input class="checkbox" type="checkbox" id="size_5" value="small" checked />
                    <label class="notification" for="size_5"><em>1</em> blog post <a href="">comment(s)</a> need approval.<i class="material-icons dp48 right">clear</i></label>

                </div>
            </div>
            <!-- <a href="https://ez-work.herokuapp.com/notifications"><i class="fa fa-bell" title="Notification"></i></a> -->



            <!-- <i class="fa fa-question" onclick="toggleHelp()" id="question"></i> -->
            <div class="helpContainer">
                <div class="helpCard">
                    <div class="card card1">
                        <h4>Help & Support</h4>
                    </div>
                    <div class="card card2">
                        <h4>Guides</h4>
                    </div>
                    <div class="card card3">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.1/react.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.1/react-dom.min.js"></script>
<script src="https://unpkg.com/react-motion/build/react-motion.js"></script>
<script type="text/javascript">
    var job = document.querySelector('.jobCard');
    var talent = document.querySelector('.talentCard');
    var project = document.querySelector('.projectCard');
    var help = document.querySelector('.helpCard');
    var session = document.querySelector('.sessionCard');

    function toggleJob() {
        var job = document.querySelector('.jobCard');
        if (getComputedStyle(job).display === 'none') {
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
        if (getComputedStyle(talent).display === 'none') {
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
        if (getComputedStyle(project).display === 'none') {
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
        if (getComputedStyle(help).display === 'none') {
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

        if (getComputedStyle(session).display === 'none') {
            session.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
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
            searchIcon.style.opacity = '0';
        } else {
            profileMobileNav.style.display = 'none';
            searchIcon.style.opacity = '1';
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
</script>