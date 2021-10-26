<div class="profile-mobile-nav">
    <div class="profile-nav-search">
        <form id="searchContainer">
            <input type="text" list="allskills" autocomplete="off" name="searchNAV" placeholder="Search">
            <input type="submit" value="Find">
        </form>
    </div>
    <div class="mobileNavCard" id="navProfile">
        <img src="../Users/user.svg" alt="">
        <span id="user"><?php echo $_SESSION['userid']; ?></span>
        <i class="fa fa-sort-down" style="opacity: 0;"></i>
    </div>
    <div class="mobileNavCard" id="mobile-job-card" onclick="toggleJobCard(this)">
        <p>Jobs</p>
        <i class="fa fa-sort-down" id="jobArrow"></i>
    </div>
    <div class="mobileJobCard">
        <ul>
            <a href="#/">
                <li>My Jobs</li>
            </a>
            <a href="#/">
                <li>All Job Posts</li>
            </a>
            <a href="#/">
                <li>All Contracts</li>
            </a>
            <a href="../PostAJob/PostAJob.html">
                <li>Post A Job</li>
            </a>
        </ul>
    </div>
    <div class="mobileNavCard" onclick="toggleFreelanceCard(this)">
        <p>Freelancer</p>
        <i class="fa fa-sort-down" id="freelanceArrow"></i>
    </div>
    <div class="mobileFreelanceCard">
        <ul>
            <a href="./index">
                <li>Discover</li>
            </a>
            <a href="#/">
                <li>Your Hires</li>
            </a>
            <a href="#/">
                <li>Freelance History</li>
            </a>
        </ul>
    </div>

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
    <div class="mobileNavCard mobileNavSettings" onclick="location.href='../Settings/settings.html'">
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
            <a href="../ClientProfile/index">
                <h2>E<span>z</span>Work</h2>
            </a>
        </div>
        <div class="searchBar">
            <form id="searchContainer">
                <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search">
                <input type="submit" value="Find">
            </form>
        </div>
        <ul>
            <li onclick="toggleJob()" id="jobs">Jobs</li>
            <div class="jobCardContainer">
                <div class="jobCard">
                    <div class="card card1">
                        <h4>My Jobs</h4>
                    </div>
                    <div class="card card2">
                        <h4>All Job Posts</h4>
                    </div>
                    <div class="card card3">
                        <h4>All Contracts</h4>
                    </div>
                    <div class="card card4" onclick="location.href='../PostAJob/PostAJob.html'">
                        <h4>Post A Job</h4>
                    </div>
                </div>
            </div>
            <li onclick="toggleTalent()" id="talents">Talents</li>
            <div class="talentCardContainer">
                <div class="talentCard">
                    <div class="card card1">
                        <h4>Discover</h4>
                    </div>
                    <div class="card card2">
                        <h4>Your Hires</h4>
                    </div>
                    <div class="card card4">
                        <h4>Talent History</h4>
                    </div>
                </div>
            </div>
            <li onclick="toggleProject()" id="projects">Projects</li>
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
            <!-- Style tags are temporary -->
            <li><a style="color: white; text-decoration: none;" href="../message/messages">Messages</a></li>
        </ul>
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
            <img src="../Users/user.svg" id="profileImage1" alt="">
            <div class="sessionCardContainer">
                <div class="sessionCard">
                    <div class="card card1">
                        <div class="image">
                            <img src="../Users/user.svg" id="profileImage3" alt="">
                        </div>
                        <div class="name">
                            <span id="name"><?php echo $_SESSION['userid']; ?></span>
                            <span id="type">Client</span>
                        </div>
                    </div>
                    <div class="card card2" onclick="location.href='../Settings/settings.html'">
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