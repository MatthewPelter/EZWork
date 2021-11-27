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
                <a href="./index.html">
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
                    <div class="client-map-link" id="client-pulldown-link1" onclick="location.href='../login/index.php'">
                        <h3>Post A Job & Hire a Freelancer</h3>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <p>View EzWork Marketplace</p>
                    </div>
                    <div class="client-map-link" id="client-pulldown-link2" onclick="location.href='../login/index.php'">
                        <h3>Browse & Choose By Projects</h3>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <p>Projects Marketplace</p>
                    </div>
                    <div class="client-map-link" id="client-pulldown-link3" onclick="location.href='../login/index.php'">
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
                            <button>See All Skills<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
    <!--Intro Begin-->
    <div class="intro-container">
        <div class="intro-title">
            <h2>Find work in the work marketplace</h2>
            <h3>Find the best talent. Build your portfolio. Build your career to the next level.</h3>
            <button onclick="location.href='../login/index.php'">Find Freelancer</button>
            <button class="find-work-btn" onclick="location.href='../login/index.php'">Find Work</button>
        </div>
        <div class="intro-image">
            <img src="./Image/introCartoon.jpg" alt="Cheerful guy earning money for his idea">
        </div>
    </div>
    <!--Intro End-->
    <div class="clients">
        <div class="clients-container">
            <div class="content">
                <p id="for-client">For Clients</p>
                <h2>Hire the best talent your way</h2>
                <p id="description-for-client">Connect with the largest network of freelancers from around the world and get things done.</p>
                <div class="card-container">
                    <div class="card" onclick="location.href='../login/index.php'">
                        <h4>Post a job and hire professionals</h4>
                        <p>
                            Post a job
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="card" onclick="location.href='../login/index.php'">
                        <h4>Browse and select through our talent</h4>
                        <p>
                            View our Talent
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </p>
                    </div>
                    <div class="card" onclick="location.href='../login/index.php'">
                        <h4>View our talent's projects.</h4>
                        <p>
                            View Projects
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="skills">
        <div class="skills-container">
            <div class="skills-title">
                <h3>Hire Talent with any skill</h3>
            </div>
            <div class="skills-container-content">
                <div class="card1">
                    <div class="skills-tree">
                        <a id="developement_IT" class="current" href="#/">Development & IT</a>
                        <a id="design_creative " href="#/">Design & Creative</a>
                        <a id="sales_marketing" href="#/">Sales & Marketing</a>
                        <a id="writing_translation" href="#/">Writing & Translation</a>
                        <a id="admin_customer" href="#/">Admin & Customer Support</a>
                        <a id="finance_accounting" href="#/">Finance & Accounting</a>
                        <a id="see_all_skills" href="#/">See all skills</a>
                    </div>
                </div>
                <div class="card2">
                    <div class="skills-result">
                        <div class="image-container">
                            <img id="image1" class="show" src="./Image/dev_IT.jpg" alt="Development and IT">
                            <img id="image2" class="hide" src="./Image/design.jpg" alt="Creative and Design">
                            <img id="image3" class="hide" src="./Image/sales_marketing.jpg" alt="Sales & Marketing">
                            <img id="image4" class="hide" src="./Image/essay.jpg" alt="Writing & Translation">
                            <img id="image5" class="hide" src="./Image/customerService.jpg" alt="Admin & Customer Service">
                            <img id="image6" class="hide" src="./Image/finance_accounting.jpg" alt="Finance & Accounting">
                        </div>
                        <div class="results1 show2">
                            <a href="/404Page/index.html">Back-End Development</a>
                            <a href="/404Page/index.html">CMS Development</a>
                            <a href="/404Page/index.html">DevOps Engineering</a>
                            <a href="/404Page/index.html">Ecommerce Development</a>
                            <a href="/404Page/index.html">Front-End Development</a>
                            <a href="/404Page/index.html">Full Stack Development</a>
                            <a href="/404Page/index.html">Mobile App Development</a>
                            <a href="/404Page/index.html">Systems Administration</a>
                        </div>
                        <div class="results2 hide">
                            <a href="/404Page/index.html">2D Animation</a>
                            <a href="/404Page/index.html">3D Animation</a>
                            <a href="/404Page/index.html">AR/VR Design</a>
                            <a href="/404Page/index.html">Acting</a>
                            <a href="/404Page/index.html">Art Direction</a>
                            <a href="/404Page/index.html">Audio Editing</a>
                            <a href="/404Page/index.html">Audio Production</a>
                            <a href="/404Page/index.html">Brand Identity Design</a>
                            <a href="/404Page/index.html">Caricatures & Portraits</a>
                            <a href="/404Page/index.html">Cartoons & Comics</a>
                        </div>
                        <div class="results3 hide">
                            <a href="/404Page/index.html">Brand Strategy</a>
                            <a href="/404Page/index.html">Campaign Management</a>
                            <a href="/404Page/index.html">Community Management</a>
                            <a href="/404Page/index.html">Content Strategy</a>
                            <a href="/404Page/index.html">Digital Marketing</a>
                            <a href="/404Page/index.html">Email Marketing</a>
                            <a href="/404Page/index.html">Lead Generation</a>
                            <a href="/404Page/index.html">Market Research</a>
                            <a href="/404Page/index.html">Marketing Automation</a>
                        </div>
                        <div class="results4 hide">
                            <a href="/404Page/index.html">Business Writing</a>
                            <a href="/404Page/index.html">Career Coaching</a>
                            <a href="/404Page/index.html">Content Writing</a>
                            <a href="/404Page/index.html">Copywriting</a>
                            <a href="/404Page/index.html">Creative Writing</a>
                            <a href="/404Page/index.html">Editing & Proofreading</a>
                            <a href="/404Page/index.html">Ghostwriting</a>
                            <a href="/404Page/index.html">Grant Writing</a>
                            <a href="/404Page/index.html">Language Localization</a>
                            <a href="/404Page/index.html">Language Tutoring</a>
                        </div>
                        <div class="results5 hide">
                            <a href="/404Page/index.html">Customer Service</a>
                            <a href="/404Page/index.html">Data Entry</a>
                            <a href="/404Page/index.html">Online Research</a>
                            <a href="/404Page/index.html">Order Processing</a>
                            <a href="/404Page/index.html">Project Management</a>
                            <a href="/404Page/index.html">Tech Support</a>
                            <a href="/404Page/index.html">Transcription</a>
                            <a href="/404Page/index.html">Virtual/Administrative Assistance</a>
                        </div>
                        <div class="results6 hide">
                            <a href="/404Page/index.html">Accounting</a>
                            <a href="/404Page/index.html">Bookkeeping</a>
                            <a href="/404Page/index.html">Business Analysis</a>
                            <a href="/404Page/index.html">Financial Analysis & Modeling</a>
                            <a href="/404Page/index.html">Financial Management/CFO</a>
                            <a href="/404Page/index.html">HR Administration</a>
                            <a href="/404Page/index.html">Instructional Design</a>
                            <a href="/404Page/index.html">Lifestyle Coaching</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="talent-section">
        <div class="talent-container">
            <div class="image-card">
                <img src="./Image/talent-card-image.jpg" alt="freelance-jose">
            </div>
            <div class="text-card">
                <p id="card-title-name">For Talent</p>
                <h2>Find Great Work</h2>
                <p id="card-text">Connect with clients you want to work with and build your portfolio.</p>
                <div class="card-container">
                    <div class="card">
                        <p>Find oppurtunites to boosts your freelance career</p>
                    </div>
                    <div class="card">
                        <p>Earn money from anywhere</p>
                    </div>
                    <div class="card">
                        <p>Choose when, where, and how you work</p>
                    </div>
                </div>
                <button onclick="location.href='../login/index.php'">Find Jobs</button>
            </div>
        </div>
    </div>
    <div class="reviews">
        <div class="reviews-container">
            <div class="card card1">
                <h2>Customer Reviews</h2>
            </div>
            <div class="card card2">
                <div class="review">
                    <div class="comment">
                        <p>"This is one of my favorite websites to use when looking for quick freelancing jobs.
                            I am able to develop websites for people all around the world, get paid, and keep most of my profit".
                        </p>
                    </div>
                    <div class="review-info">
                        <div class="profile-pic">
                            <img src="../Users/leo.JPG" alt="profile-pic">
                        </div>
                        <div class="profile-info">
                            <p>Leonel Barrientos</p>
                            <p>Web Developer</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card3">
                <div id="green-review" class="review">
                    <div class="comment">
                        <p>"Wow, i joined EZWork to earn some extra cash doing what i love, writing. This site allows me to connect
                            with people around the world, needing a professional author to revise or write something for them".
                        </p>
                    </div>
                    <div class="review-info">
                        <div class="profile-pic">
                            <img src="../Users/john.jpg" alt="profile">
                        </div>
                        <div class="profile-info">
                            <p>John Doe</p>
                            <p>Author</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card4">
                <div class="review">
                    <div class="comment">
                        <p>"Many people don't know that i enjoy helping other people create music. I use this site to connect
                            with my fans, artists, and others to do anything from writing lyrics to making a beat".
                        </p>
                    </div>
                    <div class="review-info">
                        <div class="profile-pic">
                            <img src="../Users/beyonce.jpg" alt="profile">
                        </div>
                        <div class="profile-info">
                            <p>Beyonce</p>
                            <p>Artist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ezwork-about">
        <div class="ezwork-about-container">
            <div class="text-section">
                <div class="title">
                    <h2>We connect our clients to the best talent.</h2>
                </div>
                <p>No Middlemen</p>
                <div class="card-container">
                    <div class="card">
                        <p>Over 250,000 Freelancers</p>
                        <p>Over 700,000 Clients</p>
                    </div>
                    <div class="card">
                        <p>35,312 reviews</p>
                        <div class="star-container">
                            <p>4.0</p>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i id="empty" class="fa fa-star" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-section">
                <img src="../Image/design.jpg" alt="coder">
            </div>
        </div>
    </div>
    <div class="skills-directory">
        <div class="popular-skills-container">
            <div class="sort">
                <i class="fa fa-chevron-left" id="skills-directory-left" aria-hidden="true"></i>
                <h3 class="current" id="topSkill">Top Skills</h3>
                <h3 id="trendingSkills">Trending Skills</h3>
                <i class="fa fa-chevron-right" id="skills-directory-right" aria-hidden="true"></i>
                <h3 id="topSkillsUs">Top Skills in US</h3>
                <h3 id="projects">Projects</h3>
            </div>
            <div class="results">
                <div class="skills-list-1 show">
                    <a href="/404Page/index.html">Data Entry Specialists</a>
                    <a href="/404Page/index.html">Video Editors</a>
                    <a href="/404Page/index.html">Data Analyst</a>
                    <a href="/404Page/index.html">Shopify Developer</a>
                    <a href="/404Page/index.html">Ruby on Rails Developer</a>
                    <a href="/404Page/index.html">Android Developer</a>
                    <a href="/404Page/index.html">Bookkeeper</a>
                    <a href="/404Page/index.html">Content Writer</a>
                    <a href="/404Page/index.html">Copywriter</a>
                    <a href="/404Page/index.html">Database Administrator</a>
                    <a href="/404Page/index.html">Data Scientist</a>
                    <a href="/404Page/index.html">Front-End Developer</a>
                    <a href="/404Page/index.html">Game Developer</a>
                    <a href="/404Page/index.html">Graphic Designer</a>
                    <a href="/404Page/index.html">iOS Developer</a>
                    <a href="/404Page/index.html">Java Developer</a>
                </div>
                <div class="TrendingSkills-list-1 hide">
                    <a href="/404Page/index.html">Blockchain</a>
                    <a href="/404Page/index.html">Go Development</a>
                    <a href="/404Page/index.html">Node.js</a>
                    <a href="/404Page/index.html">Vue.js</a>
                    <a href="/404Page/index.html">HR consulting</a>
                    <a href="/404Page/index.html">Microsoft Power BI</a>
                    <a href="/404Page/index.html">Instructional design</a>
                    <a href="/404Page/index.html">React.js</a>
                    <a href="/404Page/index.html">Videographers</a>
                    <a href="/404Page/index.html">HTML5 Developers</a>
                    <a href="/404Page/index.html">Ghostwriters</a>
                    <a href="/404Page/index.html">Unity 3D Developers</a>
                    <a href="/404Page/index.html">Business Consultants</a>
                    <a href="/404Page/index.html">Coders</a>
                    <a href="/404Page/index.html">Marketing Consultants</a>
                    <a href="/404Page/index.html">Web Developers</a>
                </div>
                <div class="UsTop-list-1 hide">
                    <a href="/404Page/index.html">Graphic Designers in US</a>
                    <a href="/404Page/index.html">Web Designers in US</a>
                    <a href="/404Page/index.html">Writers in US</a>
                    <a href="/404Page/index.html">Curriculum Developer in US</a>
                    <a href="/404Page/index.html">Fashion Designers in US</a>
                    <a href="/404Page/index.html">ECommerce Developers in US</a>
                    <a href="/404Page/index.html">Vue.js Developers in US</a>
                    <a href="/404Page/index.html">SquareSpace Developers in US</a>
                    <a href="/404Page/index.html">Ghostwriters in US</a>
                    <a href="/404Page/index.html">Shopify Developers in US</a>
                    <a href="/404Page/index.html">Technical Support Agents in US</a>
                    <a href="/404Page/index.html">Accountants in US</a>
                    <a href="/404Page/index.html">Virtual Assistants in US</a>
                    <a href="/404Page/index.html">Product Developers in US</a>
                    <a href="/404Page/index.html">Ebook Designers in US</a>
                    <a href="/404Page/index.html">Tax Preparers in US</a>
                    <a href="/404Page/index.html">Google Adwords Experts in US</a>
                </div>
                <div class="projects-list-1 hide">
                    <a href="/404Page/index.html">Resume Writing Services</a>
                    <a href="/404Page/index.html">SEO Services</a>
                    <a href="/404Page/index.html">Translation Services</a>
                    <a href="/404Page/index.html">Transcription Services</a>
                    <a href="/404Page/index.html">Virtual Assistant Services</a>
                    <a href="/404Page/index.html">Email Marketing Services</a>
                    <a href="/404Page/index.html">Web Design Services</a>
                    <a href="/404Page/index.html">Proofreading Services</a>
                    <a href="/404Page/index.html">Business Consulting Services</a>
                    <a href="/404Page/index.html">Logo Design Services</a>
                    <a href="/404Page/index.html">Architecture/Interior Design Services</a>
                    <a href="/404Page/index.html">Branding Services</a>
                    <a href="/404Page/index.html">Social Media Management Services</a>
                    <a href="/404Page/index.html">Video Editing Services</a>
                    <a href="/404Page/index.html">Lead Generation Services</a>
                    <a href="/404Page/index.html">Content Marketing Services</a>
                </div>
                <div class="skills-list-2 show">
                    <a href="/404Page/index.html">JavaScript Developer</a>
                    <a href="/404Page/index.html">Logo Designer</a>
                    <a href="/404Page/index.html">Mobile App Developer</a>
                    <a href="/404Page/index.html">PHP Developer</a>
                    <a href="/404Page/index.html">Resume Writer</a>
                    <a href="/404Page/index.html">SEO Expert</a>
                    <a href="/404Page/index.html">Social Media Manager</a>
                    <a href="/404Page/index.html">Software Developer</a>
                    <a href="/404Page/index.html">Software Engineer</a>
                    <a href="/404Page/index.html">Technial Writer</a>
                    <a href="/404Page/index.html">UI Designer</a>
                    <a href="/404Page/index.html">UX Designer</a>
                    <a href="/404Page/index.html">Virtual Assistant</a>
                    <a href="/404Page/index.html">Web Designer</a>
                    <a href="/404Page/index.html">Wordpress Developer</a>
                    <a href="/404Page/index.html">Python Developer</a>
                </div>
                <div class="TrendingSkills-list-2 hide">
                    <a href="/404Page/index.html">Illustrator</a>
                    <a href="/404Page/index.html">Google AdWords Experts</a>
                    <a href="/404Page/index.html">Digital Marketers</a>
                    <a href="/404Page/index.html">Arduino Programmers</a>
                    <a href="/404Page/index.html">Project Managers</a>
                    <a href="/404Page/index.html">Ruby Developers</a>
                    <a href="/404Page/index.html">AngularJS Developers</a>
                    <a href="/404Page/index.html">Full Stack Developers</a>
                    <a href="/404Page/index.html">Email Marketing Consultant</a>
                    <a href="/404Page/index.html">React Native Developers</a>
                    <a href="/404Page/index.html">Swift Native Developers</a>
                    <a href="/404Page/index.html">CSS Developers</a>
                    <a href="/404Page/index.html">Google Sketchup Freelancers</a>
                    <a href="/404Page/index.html">Back End Developers</a>
                    <a href="/404Page/index.html">Smartsheet Freelancer</a>
                    <a href="/404Page/index.html">Zoom Video Conferencing Freelancers</a>
                </div>
                <div class="UsTop-list-2 hide">
                    <a href="/404Page/index.html">Atlanta, GA Freelancers</a>
                    <a href="/404Page/index.html">Austin, TX Freelancers</a>
                    <a href="/404Page/index.html">Brooklyn, NY Freelancers</a>
                    <a href="/404Page/index.html">Charlotte, NC Freelancers</a>
                    <a href="/404Page/index.html">Chicago, IL Freelancers</a>
                    <a href="/404Page/index.html">Dallas, TX Freelancers</a>
                    <a href="/404Page/index.html">Denver, CO Freelancers</a>
                    <a href="/404Page/index.html">Houston, TX Freelancers</a>
                    <a href="/404Page/index.html">Los Angeles, CA Freelancers</a>
                    <a href="/404Page/index.html">Miami, FL Freelancers</a>
                    <a href="/404Page/index.html">New York, NY Freelancers</a>
                    <a href="/404Page/index.html">Orlando, FL Freelancers</a>
                    <a href="/404Page/index.html">Philadelphia, PA Freelancers</a>
                    <a href="/404Page/index.html">Phoenix, AZ Freelancers</a>
                    <a href="/404Page/index.html">Portland, OR Freelancers</a>
                    <a href="/404Page/index.html">San Diego, CA Freelancers</a>
                    <a href="/404Page/index.html">San Francisco, CA Freelancers</a>
                    <a href="/404Page/index.html">San Jose, CA Freelancers</a>
                    <a href="/404Page/index.html">Seattle, WA Freelancers</a>
                </div>
                <div class="projects-list-2 hide">
                    <a href="/404Page/index.html">Survey Services</a>
                    <a href="/404Page/index.html">Landscape Design Services</a>
                    <a href="/404Page/index.html">Photoshop Services</a>
                    <a href="/404Page/index.html">Mobile App Development Services</a>
                    <a href="/404Page/index.html">Data Entry Services</a>
                    <a href="/404Page/index.html">Building Information Modeling Services</a>
                    <a href="/404Page/index.html">Podcast Editing Services</a>
                    <a href="/404Page/index.html">Wellness Services</a>
                    <a href="/404Page/index.html">HR Consulting Services</a>
                    <a href="/404Page/index.html">Video Marketing Services</a>
                    <a href="/404Page/index.html">WordPress Development Services</a>
                    <a href="/404Page/index.html">Ecommerce Services</a>
                    <a href="/404Page/index.html">Influencer Marketing Services</a>
                    <a href="/404Page/index.html">Public Relations Services</a>
                    <a href="/404Page/index.html">QA Services</a>
                </div>
            </div>
        </div>
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
<script src="./SkillsContainer/searchMainPage.js"></script>
<script src="./js/mainPage.js"></script>
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