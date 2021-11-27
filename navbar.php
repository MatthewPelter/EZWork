<?php
$user_id = $_SESSION['user_id'];
$avatarResult = mysqli_query($conn, "SELECT avatar, freelancer_id FROM clients WHERE id = '$user_id'");
$avatarFetch = mysqli_fetch_assoc($avatarResult);
?>
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
            <i class="fa fa-bell" title="Notification"></i>
            <i class="fa fa-question" onclick="toggleHelp()" id="question"></i>
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