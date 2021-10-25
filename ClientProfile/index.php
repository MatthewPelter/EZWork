<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");
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

        <style type="text/css">
            .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
                opacity: 1;
                transition: opacity 0.6s;
                margin-bottom: 15px;
                position: fixed;
                top: 5rem;
                right: 2rem;
            }

            .alert.success {
                background-color: #04AA6D;
            }

            .alert.info {
                background-color: #2196F3;
            }

            .alert.warning {
                background-color: #ff9800;
            }

            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: black;
            }
        </style>
    </head>
</head>

<body>
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
            <i class="fa fa-sort-down"></i>
        </div>
        <div class="mobileNavCard" id="mobile-job-card" onclick="toggleJobCard(this)">
            <p>Jobs</p>
            <i class="fa fa-sort-down" id="jobArrow"></i>
        </div>
        <div class="mobileJobCard">
            <ul>
                <a href="./index">
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
        <div class="mobileNavCard">
            <p>Talent</p>
            <i class="fa fa-sort-down"></i>
        </div>
        <div class="mobileNavCard">
            <p>Projects</p>
            <i class="fa fa-sort-down"></i>
        </div>
        <div class="mobileNavCard">
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

    <div class="profile">
        <div class="user-profile-header">
            <h2 id="username"><?php echo $_SESSION['userid']; ?></h2>
            <div class="quick-links">
                <button id="quick-link-job" onclick="location.href='../PostAJob/PostAJob.html'">Post A Job</button>
                <button id="quick-link-market">Browse Marketplace</button>
            </div>
        </div>
        <div class="user-profile-body">
            <div class="user-postings">
                <div class="card title">
                    <h3>My Postings</h3>
                    <span>All Postings</span>
                </div>
                <div class="card result">
                    <button id="quick-link-job2" onclick="location.href='../PostAJob/PostAJob.html'">Post A Job</button>
                    <span>
                        You currently have no job postings listed.
                    </span>
                </div>
                <div class="postedJob">
                    <div class="jobTitle">
                        <h4 id="jobTitle"></h4>
                        <i class="fa fa-ellipsis-v" id="jobGodMode" aria-hidden="true"></i>
                        <div class="jobEdit">
                            <div class="exit">
                                <i class="fa fa-times" id="exitJobEdit"></i>
                            </div>
                            <button onclick="location.href='../PostAJob/reviewJobPost.html'">Edit</button>
                            <button style="color: red;" id="deleteJob">Delete</button>
                        </div>
                    </div>
                    <p>Status: <span id="status">Open</span></p>
                    <p>Job Posted on <span id="date"></span> by <span id="postedBy"></span></p>
                </div>
            </div>
            <div class="profile-skills-container">
                <div class="profile-skills">
                    <div class="profile-skills-images">
                        <img src="../Image/videoEditing.jpg" alt="">
                    </div>
                    <div class="profile-skills-content">
                        <span>We think you might like help with</span>
                        <div class="skill-title">
                            <i class="fa fa-angle-left" onclick='plusSlides(-1,0)'></i>
                            <h4 class="skill">Video Editing</h4>
                            <i class="fa fa-angle-right" onclick='plusSlides(1,0)'></i>
                        </div>
                        <button>Learn More</button>
                    </div>
                </div>

                <div class="profile-skills">
                    <div class="profile-skills-images">
                        <img src="../Image/websiteDesign.jpg" alt="">
                    </div>
                    <div class="profile-skills-content">
                        <span>We think you might like help with</span>
                        <div class="skill-title">
                            <i class="fa fa-angle-left" onclick='plusSlides(-1,0)'></i>
                            <h4 class="skill">Web Design</h4>
                            <i class="fa fa-angle-right" onclick='plusSlides(1,0)'></i>
                        </div>
                        <button>Learn More</button>
                    </div>
                </div>
                <div class="profile-skills">
                    <div class="profile-skills-images">
                        <img src="../Image/appDeveloper.jpg" alt="">
                    </div>
                    <div class="profile-skills-content">
                        <span>We think you might like help with</span>
                        <div class="skill-title">
                            <i class="fa fa-angle-left" onclick='plusSlides(-1,0)'></i>
                            <h4 class="skill">App Development</h4>
                            <i class="fa fa-angle-right" onclick='plusSlides(1,0)'></i>
                        </div>
                        <button>Learn More</button>
                    </div>
                </div>
            </div>
            <div class="how-to-work">
                <div class="htw-title">
                    <h3>How to work with Freelancers</h3>
                    <span>Connect with thousands of freelancers, fast and at low cost.</span>
                </div>
                <div class="step step1">
                    <div class="step-image">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    </div>
                    <div class="step-content">
                        <h4>1. Post a job to the marketplace</h4>
                        <span>What would like to get done? Provide as much details for freelancers to identify if they are right for the job.</span>
                    </div>
                </div>
                <div class="step step2">
                    <div class="step-image">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="step-content">
                        <h4>2. Freelancers sends you offers</h4>
                        <span>With a strong job post, you should recieve offers within hours. You can always edits to your post, or send a personal request to a freelancer.</span>
                    </div>
                </div>
                <div class="step step3">
                    <div class="step-image">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="step-content">
                        <h4>3. Review Offers</h4>
                        <span>Here is your chance to communicate with the freelancers, set expectations for the job, and discuss on agreements.</span>
                    </div>
                </div>
                <div class="step step4">
                    <div class="step-image">
                        <i class="far fa-handshake"></i>
                    </div>
                    <div class="step-content">
                        <h4>4. Accept Offer and Start Working</h4>
                        <span>Once both parties accept on terms, start working together by using the EZWork chat box. Strong communication ensures you get what you want.</span>
                    </div>
                </div>
                <div class="htw-questions">
                    <h3>Questions?</h3>
                    <p>Visit our <span>Help Center</span> for help.</p>
                </div>
            </div>

            <div class="activeUsers profile-categories-container">
                <div class="categories-title">
                    <h3><i class="fa fa-users" aria-hidden="true"></i> Current Users</h3>
                </div>


                <?php
                $sql = "SELECT * FROM clients";
                $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['username'] != $_SESSION['userid']) {
                ?>

                            <a style="color: black; text-decoration: none;" href="../Profile/userprofile.php?name=<?php echo $row['username']; ?>">
                                <div class="categoryCard">
                                    <p><?php echo $row['username']; ?></p>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </a>

                    <?php
                        }
                    }
                } else {
                    ?>
                    <div class="categoryCard">
                        <p>That's sad.. There are no users on this site yet.</p>
                    </div>
                <?php
                }
                ?>
                    <div class="categoryCardEnd" style="border-bottom: none; padding: 1rem;">
                        
                    </div>
            </div>
            <!--Categories Card
            <div class="profile-categories-container">
                <div class="categories-title">
                    <h3>Categories</h3>
                </div>
                <div class="categoryCard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M18 10c-3.313 0-6 2.687-6 6s2.687 6 6 6 6-2.687 6-6-2.687-6-6-6zm.5 8.474v.526h-.5v-.499c-.518-.009-1.053-.132-1.5-.363l.228-.822c.478.186 1.114.383 1.612.27.574-.13.692-.721.057-1.005-.465-.217-1.889-.402-1.889-1.622 0-.681.52-1.292 1.492-1.425v-.534h.5v.509c.362.01.768.073 1.221.21l-.181.824c-.384-.135-.808-.257-1.222-.232-.744.043-.81.688-.29.958.856.402 1.972.7 1.972 1.773.001.858-.672 1.315-1.5 1.432zm-7.911-5.474h-2.589v-2h3.765c-.484.602-.881 1.274-1.176 2zm-.589 3h-2v-2h2.264c-.166.641-.264 1.309-.264 2zm2.727-6h-4.727v-2h7v.589c-.839.341-1.604.822-2.273 1.411zm2.273-6h-7v-2h7v2zm0 3h-7v-2h7v2zm-4.411 12h-2.589v-2h2.069c.088.698.264 1.369.52 2zm-10.589-11h7v2h-7v-2zm0 3h7v2h-7v-2zm12.727 11h-4.727v-2h3.082c.438.753.994 1.428 1.645 2zm-12.727-5h7v2h-7v-2zm0 3h7v2h-7v-2zm0-6h7v2h-7v-2z" />
                    </svg>
                    <p>Finance & Accouting</p>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="categoryCard">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M15.517 24h-11.646c.522-3.035.897-6.162-.422-8.028-1.666-2.357-2.43-4.742-2.449-6.883-.045-5.19 4.231-9.114 10.203-9.089 7.236.03 9.328 6.156 9.773 7.943.34 1.369-.898 1.869-.166 2.702.596.679 1.035 1.364 1.789 2.177.292.315.405.646.401.943-.006.434-.291.798-.748.958-.429.15-.76.32-1.215.443-.145 1.16-.521 2.572-.798 3.557-.737 2.62-2.896 1.059-3.881 2.607-.426.668-.64 1.738-.841 2.67zm-4.293-8.316c.117-.001.23-.04.307-.109l.594-.391h-2.25l.594.391c.077.069.19.109.308.109h.447zm.922-1c.138-.001.25-.112.25-.25s-.112-.25-.25-.25h-2.279c-.138 0-.25.112-.25.25s.112.25.25.25h2.279zm.247-1c0-2.003 1.607-2.83 1.607-4.614 0-1.86-1.501-2.886-3.001-2.886s-2.999 1.024-2.999 2.886c0 1.784 1.607 2.639 1.607 4.614h2.786zm2.477-3.615l1.349.612-.413.911-1.299-.588c.151-.3.276-.608.363-.935zm-7.739 0c.087.332.208.631.36.935l-1.296.588-.414-.911 1.35-.612zm9.369-.885v-1h-1.594c.073.327.103.665.093 1h1.501zm-9.498 0v-.003c-.01-.334.02-.67.092-.997h-1.594v1h1.502zm7.02-2.714l1.242-.882.579.816-1.252.888c-.146-.291-.336-.566-.569-.822zm-6.044-.001c-.23.252-.418.525-.569.823l-1.251-.888.578-.816 1.242.881zm4.435-1.046l.663-1.345.897.443-.664 1.345c-.278-.184-.58-.332-.896-.443zm-2.826-.001c-.315.11-.618.258-.897.442l-.663-1.343.897-.443.663 1.344zm1.913-.208c-.334-.039-.654-.041-1-.001v-1.529h1v1.53z" />
                    </svg>
                    <p>Admin & Customer Support</p>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="categoryCard">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M24 23h-20c-2.208 0-4-1.792-4-4v-15.694c.313-1.071 1.285-2.306 3-2.306 1.855 0 2.769 1.342 2.995 2.312l.005 1.688h18v18zm-1-17h-17v13s-.665-1-2-1c-1.104 0-2 .896-2 2s.896 2 2 2h19v-16zm-18-2.68c-.427-.971-1.327-1.325-2-1.32-.661.005-1.568.3-2 1.32v16.178c.394-1.993 2.245-2.881 4-2.401v-13.777zm15 15.68h-12v-10h12v10zm-8-9h-3v8h10v-4h-2v3h-1v-3h-3v3h-1v-7zm7 0h-6v3h6v-3z" />
                    </svg>
                    <p>Design & Creative</p>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="categoryCard">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M3 10h18l-7.492 9.094v4.906l-3.016-2v-2.906l-7.492-9.094zm9.251 1h-.502v.533c-.978.134-1.501.744-1.501 1.425 0 1.219 1.432 1.405 1.9 1.622.638.284.52.875-.058 1.005-.501.113-1.14-.084-1.621-.27l-.229.822c.45.231.988.355 1.509.364v.499h.502v-.527c.833-.116 1.51-.573 1.509-1.432 0-1.072-1.122-1.371-1.983-1.773-.522-.27-.456-.914.292-.958.416-.025.843.098 1.229.233l.181-.824c-.455-.138-.864-.201-1.228-.21v-.509zm-9.25-2h3.376c-.016-3.659 1.685-2.068 1.685-4.979 0-1.124-.737-1.734-1.686-1.734-1.402 0-2.377 1.333-1.05 3.826.436.819-.465 1.013-1.432 1.236-.839.192-.894.6-.894 1.306l.001.345zm17.105-1.651c-.968-.223-1.868-.417-1.432-1.236 1.327-2.493.352-3.826-1.05-3.826-.948 0-1.686.61-1.686 1.734 0 2.911 1.701 1.32 1.685 4.979h3.375l.002-.345c0-.706-.055-1.114-.894-1.306zm-3.608 1.651h-8.997l-.001-.465c0-.938.075-1.48 1.191-1.737 1.263-.29 2.508-.549 1.909-1.647-1.775-3.255-.506-5.101 1.399-5.101 1.868 0 3.17 1.777 1.4 5.101-.582 1.092.619 1.351 1.908 1.647 1.118.257 1.192.8 1.192 1.74l-.001.462z" />
                    </svg>
                    <p>Sales & Marketing</p>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="categoryCard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M22 17v-11.8c0-.663-.537-1.2-1.2-1.2h-17.6c-.663 0-1.2.537-1.2 1.2v11.8h20zm-18-11h16v9h-16v-9zm20 12v.8c0 .663-.537 1.2-1.2 1.2h-21.6c-.663 0-1.2-.537-1.2-1.2v-.8h10c0 .276.224.5.5.5h3c.276 0 .5-.224.5-.5h10z" />
                    </svg>
                    <p>Development & IT</p>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="categoryCard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M19.099 11.136c-1.449 1.97-3.599 3.914-6.021 3.597-.655.916-1.387 2.194-2.199 3.678l-1.879.589c1.589-3.101 3.712-6.53 5.989-9.136-.986.642-2.606 2.023-4.016 3.479-1.271-2.656.069-5.115 2.012-6.994-.056.885.337 1.692.631 2.107-.05-.74.036-2.062.576-3.207 1.082-.913 2.039-1.57 3.132-2.145-.177.647-.025 1.423.182 1.907.095-.67.494-1.937.955-2.462 1.364-.88 3.384-1.584 5.539-1.548-.238 1.328-.936 3.484-1.877 4.821-.761.489-1.766.775-2.566.913.663.186 1.407.24 2.052.192-.469.987-.946 1.891-1.667 3-.995.555-2.267.8-3.135.846.607.319 1.714.505 2.292.363zm-1.099 4.009v5.855h-16v-12h6.875c.229-.673.547-1.342.979-2h-9.854v16h20v-9.788c-.574.679-1.239 1.355-2 1.933z" />
                    </svg>
                    <p>Writing & Translation</p>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="categoryCard">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M24 24h-24v-2h24v2zm-1-3h-22v-1h22v1zm-17-1.999h-4v-7.001c-.552 0-1-.448-1-1s.448-1 1-1h4c.552 0 1 .448 1 1s-.448 1-1 1v7.001zm8 0h-4v-7.001c-.552 0-1-.448-1-1s.448-1 1-1h4c.552 0 1 .448 1 1s-.448 1-1 1v7.001zm8 0h-4v-7.001c-.552 0-1-.448-1-1s.448-1 1-1h4c.552 0 1 .448 1 1s-.448 1-1 1v7.001zm-10-19.001l-12 9h24.001l-12.001-9zm0 3c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2z" />
                    </svg>
                    <p>Legal</p>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="categoryCard">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M7 16.488l1.526-.723c1.792-.81 2.851-.344 4.349.232 1.716.661 2.365.883 3.077 1.164 1.278.506.688 2.177-.592 1.838-.778-.206-2.812-.795-3.38-.931-.64-.154-.93.602-.323.818 1.106.393 2.663.79 3.494 1.007.831.218 1.295-.145 1.881-.611.906-.72 2.968-2.909 2.968-2.909.842-.799 1.991-.135 1.991.72 0 .23-.083.474-.276.707-2.328 2.793-3.06 3.642-4.568 5.226-.623.655-1.342.974-2.204.974-.442 0-.922-.084-1.443-.25-1.825-.581-4.172-1.313-6.5-1.6v-5.662zm-1 6.538h-4v-8h4v8zm1-7.869v-1.714c-.006-1.557.062-2.447 1.854-2.861 1.963-.453 4.315-.859 3.384-2.577-2.761-5.092-.787-7.979 2.177-7.979 2.907 0 4.93 2.78 2.177 7.979-.904 1.708 1.378 2.114 3.384 2.577 1.799.415 1.859 1.311 1.853 2.879 0 .13-.011 1.171 0 1.665-.483-.309-1.442-.552-2.187.106-.535.472-.568.504-1.783 1.629-1.75-.831-4.456-1.883-6.214-2.478-.896-.304-2.04-.308-2.962.075l-1.683.699z" />
                    </svg>
                    <p>HR & Training</p>
                    <i class="fa fa-angle-right"></i>
                </div>
                <div class="categoryCard" style="border: none;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M2.178 11h-1.178v-2.209c.468 0 .774-.474.944-.997.587-1.803 1.59-4.513 4.056-6.212v3.418c0 .552.448 1 1 1s1-.448 1-1v-4.437c.868-.309 1.861-.516 3-.585v3.022c0 .552.448 1 1 1s1-.448 1-1v-3c1.134.094 2.128.327 3 .661v4.339c0 .552.448 1 1 1s1-.448 1-1v-3.269c2.391 1.7 3.463 4.304 4.057 6.063.175.52.475.997.943.997v2.209h-1.179c.575.459 1.179 1.36 1.179 3.131 0 1.63-.904 3.686-2.877 4.531-2.153 3.445-5.027 5.338-8.123 5.338-3.096 0-5.97-1.893-8.124-5.338-1.973-.845-2.876-2.901-2.876-4.531 0-1.771.603-2.672 1.178-3.131zm12.022 7.459h-4.4c.004.012.626 1.74 2.2 1.74 1.634 0 2.196-1.728 2.2-1.74zm4.517-7.459h-13.435l-.013.515c0 .668-.682 1.114-1.288.844-.169-.075-.43-.073-.617.049-.917.601-.819 3.864 1.425 4.629.916.313 2.364 3.103 3.93.398.542-.934 2.251-1.039 3.281-.297 1.029-.742 2.739-.637 3.28.297 1.566 2.705 3.014-.085 3.93-.398 2.244-.765 2.342-4.028 1.425-4.629-.215-.14-.487-.106-.616-.049-.606.271-1.289-.176-1.289-.844l-.013-.515zm-9.696.996c-.634 0-1.146.62-1.146 1.385s.512 1.385 1.146 1.385c.632 0 1.146-.62 1.146-1.385s-.514-1.385-1.146-1.385zm7.104 1.385c0 .765-.513 1.385-1.146 1.385-.633 0-1.146-.62-1.146-1.385s.513-1.385 1.146-1.385c.633 0 1.146.62 1.146 1.385z" />
                    </svg>
                    <p>Engineering & Architecture</p>
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
            -->            
        </div>
    </div>
    <div class="profileFooter">
        <div class="profile-links">
            <div class="links">
                <ul>
                    <a href="../PostAJob/PostAJob.html">Post a Job</a>
                    <a href="#/">Find Talent</a>
                    <a href="#/">Browse Projects</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">About Us</a>
                    <a href="#/">Developers</a>
                    <a href="#/">Contact Us</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">Help & Support</a>
                    <a href="#/">EZWork Reviews</a>
                    <a href="#/">Trust & Security</a>
                </ul>
            </div>
            <div class="links">
                <ul>
                    <a href="#/">Terms of Service</a>
                    <a href="#/">Privacy Policy</a>
                    <a href="#/">Accessibility</a>
                </ul>
            </div>
        </div>
        <div class="profile-social-links">
            <p>Follow Us</p>
            <a href="https://github.com/leobarrientos02/" target="_blank" rel="noopener noreferrer"><i class="fa fa-github" aria-hidden="true"></i></a>
            <a href="https://twitter.com/L3O_BARRI3nT0S" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/in/leonel-barrientos-519b5a152/" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/channel/UCnLwo3-caCdv6eOjGzJ0eEg" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/leo_barrientos182/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <div class="copyright">
            <p>
                &copy Copyright. 2021-
                <script>
                    document.write(new Date().getFullYear())
                </script>
                EzWork&trade; Global Inc.
            </p>
        </div>
    </div>

    <?php
    if (isset($_GET['messagestatus'])) {
        if ($_GET['messagestatus'] == 1) {
    ?>
            <div class="alert success">
                <span class="closebtn">&times;</span>
                <strong>Success!</strong> Your message was sent sucessfully!.
            </div>

    <?php
        }
    }
    ?>


    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>
<script src="../SkillsContainer/searchProfile.js"></script>

<script src="./app.js"></script>
<!--nav bar script -->
<script>
    var job = document.querySelector('.jobCard');
    var talent = document.querySelector('.talentCard');
    var project = document.querySelector('.projectCard');
    var help = document.querySelector('.helpCard');
    var session = document.querySelector('.sessionCard');
    function toggleJob(){
        var job = document.querySelector('.jobCard');
        if(job.style.display === 'none'){
            job.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            job.style.display='none';
            
        }
    }
    function toggleTalent(){
        var talent = document.querySelector('.talentCard');
        if(talent.style.display==='none'){
            talent.style.display = 'inline-block';
            job.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            talent.style.display = 'none';
        }
    }
    function toggleProject(){
        var project = document.querySelector('.projectCard');
        if(project.style.display==='none'){
            project.style.display = 'inline-block';
            talent.style.display = 'none';
            job.style.display = 'none';
            help.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            project.style.display = 'none';
        }
    }
    function toggleHelp(){
        var help = document.querySelector('.helpCard');
        if(help.style.display==='none'){
            help.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            job.style.display = 'none';
            session.style.display = 'none';
        }
        else{
            help.style.display = 'none';
        }
    }
    function toggleSession(){
       
        if(session.style.display==='none'){
            session.style.display = 'inline-block';
            talent.style.display = 'none';
            project.style.display = 'none';
            help.style.display = 'none';
            job.style.display = 'none';
        }
        else{
            session.style.display = 'none';
        }
    }

</script>
<!--Toggle the nav burger button-->
<script>
    const navIcon = document.getElementById("nav-burger");
    const profileMobileNav = document.querySelector(".profile-mobile-nav");

    function myFunction(x) {
        x.classList.toggle("change");
        if(x.classList.contains('change')){
            profileMobileNav.style.display = "inline-block";
            searchIcon.style.opacity='0';
        }
        else{
            profileMobileNav.style.display='none';
            searchIcon.style.opacity='1';
        }
    }
</script>
</html>