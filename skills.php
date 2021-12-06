<?php
session_start();
require_once("classes/DB.php");
?>

<!--
HOME INDEX
-->

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="./Styles/style.css">
</head>

<body>
    <div class="mobile-nav">
        <div class="mobile-nav-content">
            <div class="mobile-nav-searchBar">
                <input type="search" list="allskills" autocomplete="off" name="search" id="search">
                <input type="button" value="Search" id="submit">
            </div>
            <div class="mobile-nav-links">
                <div class="mobile-nav-links-container">
                    <div class="card" id="MobileNav-Talent">
                        <h6>Find Freelancer</h6>
                        <i class="fa fa-chevron-down" id="mobile-nav-down1" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" id="mobile-nav-up1" aria-hidden="true"></i>
                    </div>
                    <div class="mobile-talent">
                        <div class="mobile-talent-container">
                            <div class="card" id="card1">
                                <h3>Post A Job & Hire a Freelancer</h3>
                                <i class="fa fa-chevron-right" id="mobile-talent-rightArrow1" aria-hidden="true"></i>
                                <p>EzWork Marketplace</p>
                            </div>
                            <div class="MobileFindFreelancer">
                                <div class="MobileFindFreelancerHeader">
                                    <i class="fa fa-chevron-left" id="MobileFreelancerLeftArrow" aria-hidden="true"></i>
                                    <h3>EzWork Marketplace</h3>
                                </div>
                                <div class="MobileFindFreelancerContainer">
                                    <div class="MobileFindFreelancerCard">
                                        <p>Explore the EzWork Marketplace for the most skillful Freelancers. <a href="/404Page/index.html">Hire on EzWork Marketplace</a> </p>
                                    </div>
                                    <div class="MobileFindFreelancerCard">
                                        <ul>
                                            <a href="/404Page/index.html">
                                                <li>Developement & IT</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>Design & Creative</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>Sales & Marketing</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>Writing & Translation</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>Finance & Accounting</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>Admin & Customer Support</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>Find a Freelancer</li>
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="card2">
                                <h3>Browse & Buy By Projects</h3>
                                <i class="fa fa-chevron-right" id="mobile-talent-rightArrow2" aria-hidden="true"></i>
                                <p>View All Projects</p>
                            </div>
                            <div class="MobileProject">
                                <div class="MobileProjectHeader">
                                    <i class="fa fa-chevron-left" id="MobileFreelancerLeftArrow2" aria-hidden="true"></i>
                                    <h3>Project Marketplace</h3>
                                </div>
                                <div class="MobileProjectContainer">
                                    <div class="MobileProjectCard">
                                        <p>Explore and Choose A Project Idea Posted By Our Freelancers.
                                            <a href="/404Page/index.html">View all Projects</a>
                                        </p>
                                    </div>
                                    <div class="MobileProjectCard2">
                                        <div class="image-card">
                                            <img src="./Image/websiteDesign.jpg" alt="website">
                                            <p>Website</p>
                                        </div>
                                        <div class="image-card">
                                            <img src="./Image/design.jpg" alt="Logo Design">
                                            <p>Logo Design</p>
                                        </div>
                                        <div class="image-card">
                                            <img src="./Image/drawing.jpg" alt="drawing">
                                            <p>Drawing</p>
                                        </div>
                                        <div class="image-card">
                                            <img src="./Image/videoEditing.jpg" alt="Video Editing">
                                            <p>Video Editing</p>
                                        </div>
                                        <div class="image-card">
                                            <img src="./Image/carpentry.jpg" alt="Carpentry">
                                            <p>Carpentry</p>
                                        </div>
                                        <div class="image-card">
                                            <img src="./Image/appDeveloper.jpg" alt="app Developer">
                                            <p>App</p>
                                        </div>
                                        <p><a href="/404Page/index.html">View all Projects</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="card3">
                                <h3>Browse All Skills</h3>
                                <i class="fa fa-chevron-right" id="mobile-talent-rightArrow3" aria-hidden="true"></i>
                                <p>View All Skills</p>
                            </div>
                            <div class="MobileSkills">
                                <div class="MobileSkillsHeader">
                                    <i class="fa fa-chevron-left" id="MobileFreelancerLeftArrow3" aria-hidden="true"></i>
                                    <h3>Skills Marketplace</h3>
                                </div>
                                <div class="MobileSkillsContainer">
                                    <div class="MobileSkillsCard">
                                        <p>Browse through our marketplace for all the skills our talented workers haves.
                                            <a href="/404Page/index.html">Search all Skills</a>
                                        </p>
                                    </div>
                                    <div class="MobileSkillsCard">
                                        <ul>
                                            <a href="/404Page/index.html">
                                                <li>Developement & IT</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>Design & Creative</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>Sales & Marketing</li>
                                            </a>
                                            <a href="/404Page/index.html">
                                                <li>And More</li>
                                            </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="MobileNav-Work">
                        <h6>Find Work</h6>
                        <i class="fa fa-chevron-down" id="mobile-nav-down2" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" id="mobile-nav-up2" aria-hidden="true"></i>
                    </div>
                    <div class="mobile-work">
                        <div class="mobile-work-container">
                            <div class="card">
                                <h3>How to earn money</h3>
                                <p>Learn how you can earn money through EzWork</p>
                            </div>
                            <div class="card">
                                <h3>Find work for your skills</h3>
                                <p>View the type of work in your field</p>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="MobileNav-Ezwork">
                        <h6>Why EzWork</h6>
                        <i class="fa fa-chevron-down" id="mobile-nav-down3" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" id="mobile-nav-up3" aria-hidden="true"></i>
                    </div>
                    <div class="mobile-ezwork">
                        <div class="mobile-ezwork-container">
                            <div class="mobile-ezwork-reviews">
                                <div class="card">
                                    <h3>Success Stories</h3>
                                </div>
                                <div class="card">
                                    <h3>Reviews</h3>
                                </div>
                                <div class="card">
                                    <h3>How to Hire</h3>
                                </div>
                                <div class="card">
                                    <h3>How to Find Work</h3>
                                </div>
                            </div>
                            <div class="mobile-ezwork-guides">
                                <h3>User Guides</h3>
                                <div class="guide">
                                    <h4>Guides</h4>
                                    <p>How To Get Start Freelancing</p>
                                </div>
                                <div class="guide">
                                    <h4>Guides</h4>
                                    <p>How To Boosts Your Skills As A Freelancer</p>
                                </div>
                                <div class="guide">
                                    <h4>Guides</h4>
                                    <p>How To Hire And Work With Freelancers</p>
                                </div>
                                <a href="/404Page/index.html">See Resources <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h6 id="MobileNavAbout">About</h6>
                    </div>
                </div>
            </div>
            <div class="mobile-nav-login">
                <button class="nav-sign-up-btn" onclick="location.href='./register/index'">Sign Up</button>
            </div>
        </div>
    </div>
    <header>
        <div class="header-container">
            <div class="burger" id="nav-burger" onclick='myFunction(this)'>
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <div class="logo">
                <a href="./index">
                    <h3><span>E</span>z<span>Work</span></h3>
                </a>
            </div>
            <div class="links">
                <ul>
                    <li id="clients">Find Freelancer<i id="arrow1" class="fa fa-sort-down"></i> <i id="arrow1UP" class="fa fa-sort-up hide"></i></li>
                    <li id="worker">Find Work<i id="arrow2" class="fa fa-sort-down"></i> <i id="arrow2UP" class="fa fa-sort-up hide"></i></li>
                    <li id="why">Why EzWork<i id="arrow3" class="fa fa-sort-down"></i> <i id="arrow3UP" class="fa fa-sort-up hide"></i></li>
                    <li>About</li>
                </ul>
            </div>
            <div class="searchBar">
                <input type="search" list="allskills" autocomplete="off" name="search" id="search">
                <!--DataList-->
                <datalist id="allskills"></datalist>
                <input type="button" value="Search" id="submit">
            </div>

            <?php
            if (!isset($_SESSION['userid'])) {
                //echo "session active";
            ?>
                <div class="login">
                    <button class="login-btn" onclick="location.href='./login/index'">Log In</button>
                    <button class="sign-up-btn" id="signUpBtn" onclick="location.href='./register/index'">Sign Up</button>
                </div>
            <?php
            } else {
            ?>
                <div class="login">
                    <button class="sign-up-btn" id="signUpBtn" onclick="location.href='./ClientProfile/index'">Profile</button>
                </div>
            <?php
            }
            ?>
        </div>
        <div id="categories" class="categories">
            <ul>
                <a href="/404Page/index.html">
                    <li>Developement & IT</li>
                </a>
                <a href="/404Page/index.html">
                    <li>Design & Creative</li>
                </a>
                <a href="/404Page/index.html">
                    <li>Sales & Marketing</li>
                </a>
                <a href="/404Page/index.html">
                    <li>Writing & Translation</li>
                </a>
                <a href="/404Page/index.html">
                    <li>Finance & Accounting</li>
                </a>
                <a href="/404Page/index.html">
                    <li>Admin & Customer Support</li>
                </a>
            </ul>
        </div>
        <!--Arrow Directory Tree nav pull down-->
        <div class="client-pulldown">
            <div class="client-card-container">
                <div class="client-map">
                    <div class="client-map-link" id="client-pulldown-link1">
                        <h3>Post A Job & Hire a Freelancer</h3>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <p>View EzWork Marketplace</p>
                    </div>
                    
                    <div class="client-map-link" id="client-pulldown-link2">
                        <h3>Browse & Choose By Projects</h3>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <p>Projects Marketplace</p>
                    </div>
                    
                    <div class="client-map-link" id="client-pulldown-link3">
                        <h3>Browse through all Skills</h3>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <p>Skills Marketplace</p>
                    </div>
                </div>
                <div class="job-result">
                    <div class="result-container">
                        <div class="job-result-card1">
                            <h4>EzWork Marketplace</h4>
                            <p>Add a job or project to the job marketplace for freelancers to view.</p>
                            <button onclick="location.href='../login/index.php'">Post a Job <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                        <div class="job-result-card2">
                            <ul>
                                <a href="../login/index.php">
                                    <li>Developement & IT</li>
                                </a>
                                <a href="../login/index.php">
                                    <li>Design & Creative</li>
                                </a>
                                <a href="../login/index.php">
                                    <li>Sales & Marketing</li>
                                </a>
                                <a href="../login/index.php">
                                    <li>Writing & Translation</li>
                                </a>
                                <a href="../login/index.php">
                                    <li>Finance & Accounting</li>
                                </a>
                                <a href="../login/index.php">
                                    <li>Admin & Customer Support</li>
                                </a>
                                <a href="../login/index.php">
                                    <li>Find a Freelancer</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="projects-result">
                    <div class="projects-container">
                        <div class="projects-card1">
                            <h4>Projects Marketplace</h4>
                            <p>Explore and Choose A Project Idea Posted By Our Freelancers.</p>
                            <button>View Projects <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                        <div class="projects-card2">
                            <div class="image-card">
                                <img src="./Image/websiteDesign.jpg" alt="website">
                                <p>Website</p>
                            </div>
                            <div class="image-card">
                                <img src="./Image/design.jpg" alt="Logo Design">
                                <p>Logo Design</p>
                            </div>
                            <div class="image-card">
                                <img src="./Image/drawing.jpg" alt="drawing">
                                <p>Drawing</p>
                            </div>
                            <div class="image-card">
                                <img src="./Image/videoEditing.jpg" alt="Video Editing">
                                <p>Video Editing</p>
                            </div>
                            <div class="image-card">
                                <img src="./Image/carpentry.jpg" alt="Carpentry">
                                <p>Carpentry</p>
                            </div>
                            <div class="image-card">
                                <img src="./Image/appDeveloper.jpg" alt="app Developer">
                                <p>App</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="categories-result">
                    <div class="categories-container">
                        <div class="categories-card1">
                            <h4>Skills Marketplace</h4>
                            <p>Browse through our marketplace for all the skills our talented workers haves.</p>
                            <button onclick="location.href='./skills.php'">See All Skills<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                        <div class="categories-card2">
                            <ul>
                                <a href="/404Page/index.html">
                                    <li>Developement & IT</li>
                                </a>
                                <a href="/404Page/index.html">
                                    <li>Design & Creative</li>
                                </a>
                                <a href="/404Page/index.html">
                                    <li>Sales & Marketing</li>
                                </a>
                                <a href="/404Page/index.html">
                                    <li>And More</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="freelance-pulldown">
            <div class="card-container2">
                <div class="card2">
                    <h3>How to earn money</h3>
                    <p>Learn how you can earn money through EzWork</p>
                </div>
                <div class="card2" onclick="location.href='../login/index.php'">
                    <h3>Find work for your skills</h3>
                    <p>View the type of work in your field</p>
                </div>
            </div>
        </div>
        <div class="ezwork-pulldown">
            <div class="ezwork-main-container">
                <div class="card-container3-reviews">
                    <div class="card3">
                        <h3>Success Stories</h3>
                        <p>Read on how EzWork help many people find success in their career</p>
                    </div>
                    <div class="card3">
                        <h3>Reviews</h3>
                        <p>Read what users and freelancers got to say about EzWork</p>
                    </div>
                    <div class="card3">
                        <h3>How to Hire</h3>
                        <p>Learn on how to use EzWork to find talented people around the world</p>
                    </div>
                    <div class="card3">
                        <h3>How to Find Work</h3>
                        <p>Learn how to use EzWork to find work, earn money, and boosts your skills</p>
                    </div>
                </div>
                <div class="card-container3-guides">
                    <h3>User Guides</h3>
                    <div class="guide">
                        <h4>Guides</h4>
                        <p>How To Get Start Freelancing</p>
                    </div>
                    <div class="guide">
                        <h4>Guides</h4>
                        <p>How To Boosts Your Skills As A Freelancer</p>
                    </div>
                    <div class="guide">
                        <h4>Guides</h4>
                        <p>How To Hire And Work With Freelancers</p>
                    </div>
                    <a href="/404Page/index.html">See Resources <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class="allSkills">

    </div>

    <div class="footer">
        <div class="footer-container">
            <div class="mobile-directory-tree">
                <div class="mobile-directory-container">
                    <div class="card">
                        <h6>For Users</h6>
                        <i class="fa fa-chevron-down" id="mobile-footer-down1" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" id="mobile-footer-up1" aria-hidden="true"></i>
                    </div>
                    <div class="mobile-user-footer">
                        <div class="mobile-user-links">
                            <a href="./login/index.php">Find Freelancer</a>
                            <a href="./login/index.php">See Projects</a>
                            <a href="./register/index.php">Create Account</a>
                            <a href="/404Page/index.html">How To See Progress</a>
                            <a href="/404Page/index.html">How To Pay Freelancer?</a>
                            <a href="./login/index.php">View Current Listings</a>
                            <a href="./login/index.php">Report</a>
                            <a href="./login/index.php">Settings</a>
                        </div>
                    </div>
                    <div class="card">
                        <h6>For Freelancer</h6>
                        <i class="fa fa-chevron-down" id="mobile-footer-down2" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" id="mobile-footer-up2" aria-hidden="true"></i>
                    </div>
                    <div class="mobile-talent-footer">
                        <div class="mobile-talent-links">
                            <a href="/404Page/index.html">How To Find Work</a>
                            <a href="/404Page/index.html">Agree Job</a>
                            <a href="/404Page/index.html">How to get pay</a>
                            <a href="./login/index.php">Check Balance</a>
                            <a href="./login/index.php">Manage Jobs</a>
                            <a href="./login/index.php">Report</a>
                            <a href="./login/index.php">Settings</a>
                        </div>
                    </div>
                    <div class="card">
                        <h6>Resource</h6>
                        <i class="fa fa-chevron-down" id="mobile-footer-down3" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" id="mobile-footer-up3" aria-hidden="true"></i>
                    </div>
                    <div class="mobile-resource-footer">
                        <div class="mobile-resource-links">
                            <a href="/404Page/index.html">Help & Support</a>
                            <a href="/404Page/index.html">EzWork Reviews</a>
                            <a href="/404Page/index.html">Trust & Security</a>
                        </div>
                    </div>
                    <div class="card">
                        <h6>About</h6>
                        <i class="fa fa-chevron-down" id="mobile-footer-down4" aria-hidden="true"></i>
                        <i class="fa fa-chevron-up" id="mobile-footer-up4" aria-hidden="true"></i>
                    </div>
                    <div class="mobile-about-footer">
                        <div class="mobile-about-links">
                            <a href="/404Page/index.html">About Us</a>
                            <a href="/404Page/index.html">Developers</a>
                            <a href="/404Page/index.html">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="directory-tree">
                <div class="directory-tree-user">
                    <h6>For Users</h6>
                    <a href="./login/index.php">Find Freelancer</a>
                    <a href="./login/index.php">See Projects</a>
                    <a href="./register/index.php">Create Account</a>
                    <a href="/404Page/index.html">How To See Progress</a>
                    <a href="/404Page/index.html">How To Pay Freelancer?</a>
                    <a href="./login/index.php">View Current Listings</a>
                    <a href="./login/index.php">Report</a>
                    <a href="./login/index.php">Settings</a>
                </div>
                <div class="directory-tree-talent">
                    <h6>For Freelancer</h6>
                    <a href="/404Page/index.html">How To Find Work</a>
                    <a href="/404Page/index.html">Agree Job</a>
                    <a href="/404Page/index.html">How to get pay</a>
                    <a href="./login/index.php">Check Balance</a>
                    <a href="./login/index.php">Manage Jobs</a>
                    <a href="./login/index.php">Report</a>
                    <a href="./login/index.php">Settings</a>
                </div>
                <div class="directory-tree-resource">
                    <h6>Resource</h6>
                    <a href="/404Page/index.html">Help & Support</a>
                    <a href="/404Page/index.html">EzWork Reviews</a>
                    <a href="/404Page/index.html">Trust & Security</a>
                </div>
                <div class="directory-tree-ezwork">
                    <h6>About</h6>
                    <a href="/404Page/index.html">About Us</a>
                    <a href="/404Page/index.html">Developers</a>
                    <a href="/404Page/index.html">Contact Us</a>
                </div>
            </div>
            <div class="social-links">
                <p>Follow Us</p>
                <a href="https://github.com/leobarrientos02/" target="_blank" rel="noopener noreferrer"><i class="fa fa-github" aria-hidden="true"></i></a>
                <a href="https://twitter.com/L3O_BARRI3nT0S" target="_blank" rel="noopener noreferrer"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/in/leonel-barrientos-519b5a152/" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/channel/UCnLwo3-caCdv6eOjGzJ0eEg" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/leo_barrientos182/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="copyright-section">
                <p id="copyright">
                    &copy Copyright. 2021-
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    EzWork&trade; Global Inc.
                </p>
                <p id="copyright-line">|</p>
                <a href="/404Page/index.html">Terms of Service</a>
                <a href="/404Page/index.html">Privacy Policy</a>
                <a href="/404Page/index.html">Accesibility</a>
            </div>
            <div class="mobile-copyright">
                <div class="card1">
                    <p id="copyright">
                        &copy Copyright. 2021-
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        EzWork&trade; Global Inc.
                    </p>
                </div>
                <div class="card2">
                    <a href="/404Page/index.html">Terms of Service</a>
                    <a href="/404Page/index.html">Privacy Policy</a>
                    <a href="/404Page/index.html">Accesibility</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./SkillsContainer/allSkillsPage.js"></script>
<!--Toggle the nav button-->
<script>
    const navIcon = document.getElementById("nav-burger");
    const mobileNav = document.querySelector(".mobile-nav");

    function myFunction(x) {
        x.classList.toggle("change");
        if (x.classList.contains('change')) {
            mobileNav.style.display = "inline-block";
        } else {
            mobileNav.style.display = 'none';
        }
    }
</script>
<!--<script src="/js/api.js"></sc>
 onclick="window.location='page_name.php';"
-->

</html>