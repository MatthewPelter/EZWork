<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <title>EZWork | Why EZWork</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="icon" href="../logo/logo.svg">
    <link rel="stylesheet" href="../Styles/style.css">
</head>

<body>

    <?php include '../navbar.php'; ?>
    
    <div class="whyEZWork">
        <div class="whyEZWorkHeader">
            <h2>Why EZWork?</h2>
        </div>

        <div class="whyEZWorkContainer">
            <div class="mission">
                <h3>Our Mission</h3>
                <i id="missionUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="missionWrapper">
                <div class="missionCard">
                    <p>
                            Today, it is difficult finding business as a solo entrepreneur. It’s also just as challenging to find people to perform needed work. EZWork believes that this is because of oversaturation of job posting sites, as well as lack of opportunities. EZWork wants people to earn a steady income finding work through our site, and also wants the public to hire talented people for their own services. The site allows direct communication between both people needing services and those offering services, and allows for profile and job descriptions, as well as direct payment to the individual after the work has been completed.
                    </p>
                    
                    <p>
                            EZWork has decided to work on this problem of matching those looking for work with those needing services. There’s so much undiscovered and unappreciated talent in the world. There are creators on websites like YouTube, Instagram, and Twitter that try to get recognized for their talents, but there’s too many of them. The site will serve to give these creators and innovators an opportunity. They’ll be able to be hired for their work. This won’t be limited to online things; skilled laborers will also find that our website is friendly towards them. Handymen can find a steady number of jobs that will keep them busy. This site have user profiles, and users can post their skills. Others looking to hire can also post what they are looking for.
                    </p>
                </div>
            </div>

            <div class="whatIsEZWork">
                <h3>What is EZWork?</h3>
                <i id="whatUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="whatWrapper">
                <div class="whatCard">
                    <p>
                            The web application EZWork was created to provide a platform for skilled workers and talented people to freelance, and easily find projects to work on as an extra way to earn income. We found that consumers go to big companies like Home Depot, Best Buy’s geek squad because there is a dedicated place/platform to find skilled workers. Big corporations like the one previously mentioned take a high cut of what a freelancer worker would get. Now we bring the option of hiring skilled freelancers, or the people that work at geek squad to the consumers/employers, not only does consumers benefit from paying less, but the worker also takes the full payout (minus our small service fee) for their hard work!
                    </p>
                </div>
            </div>

            <div class="community">
                <h3>EZWork Community</h3>
                <i id="communityUp" class="fas fa-chevron-up"></i>
            </div>

            <div class="communityWrapper">
                <div class="communityCard">
                    <img src="../Image/community-guidelines.png" alt="community">
                    <div class="communityText">
                        <p>
                                The EZWork community is composed of thousands of clients and freelancers from all over the world. From clients looking for skilled freelancers to do work for an affordable price to freelancers looking for job opportunities based on their special skill. The EZWork system allows us to create a large awesome community full of hard workers.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="userStories">
                <h3>Success Stories</h3>
                <i id="userUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="userWrapper">
                <div class="userCard">
                    <div class="user">
                        <div class="usernameBar">
                            <img src="../Users/leo.JPG" alt="user">
                            <span>Leonel B.</span>
                        </div>
                        <div class="story">
                            <p>&#8220;I’ve been using this website as a freelancer since it was first released and it has helped me so much. I loved how easy it was to set up a profile and get my resume out there to thousands of potential jobs. I found my first job out of college within weeks of using the site. I am truly forever grateful&#8221;.</p>
                        </div>
                        
                    </div>

                    <div class="user2">
                        <div class="usernameBar2">
                            <span>Dustin P.</span>
                            <img src="../Users/dustin.jpg" alt="user">
                        </div>
                        <div class="story2">
                            <p>&#8220;As someone that had always used craigslist to find freelancers, this site 100 percent an upgrade. I no longer get applications from people who aren’t equipped with the right skill, which makes the hiring process even easier, and has overall better the company&#8221;.</p>
                        </div>
                        
                    </div>

                    <div class="user">
                        <div class="usernameBar">
                            <img src="../Users/john.jpg" alt="user">
                            <span>Jon Jones</span>
                        </div>
                        <div class="story">
                            <p>&#8220; landed my dream job using this site, and I can still do mini side jobs to keep pushing my skills to the limit&#8221;.</p>
                        </div>             
                    </div>

                    <div class="user2">
                        <div class="usernameBar2">
                            <span>Connor McGregor</span>
                            <img src="../Users/connor.jpg" alt="user">
                        </div>
                        <div class="story2">
                            <p>&#8220;Being able to sift through the different type of freelancers based on their skill base is extremely useful and has helped me find exactly what I needed&#8221;.</p>
                        </div>
                    </div>

                    <div class="user">
                        <div class="usernameBar">
                            <img src="../Users/user.svg" alt="user">
                            <span>John Cena</span>
                        </div>
                        <div class="story">
                            <p>&#8220;I had a horrible time using going through other companies trying to get my window fixed before it got cold this winter, but when I found EZWorks it only took 3 days to find then get my window replaced&#8221;.</p>
                        </div>
                        
                    </div>
                </div>
            </div>

            
            <div class="reviews">
                <h3>Reviews</h3>
                <i id="reviewUp" class="fas fa-chevron-up"></i>
            </div>
            <div class="reviewWrapper">
                <div class="reviewsCard">
                    <div class="card">

                        <img src="../Users/hasbulla.png" alt="user">
                        <div class="starsWrapper">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p>&#8220;Simple, clean and makes life a little easier , I love using the site&#8221;.</p>
                    </div>

                    <div class="card2">

                        <img src="../Users/beyonce.jpg" alt="user">
                        <div class="starsWrapper">
                            <div class="stars" style="color: #32557f;display: flex;flex-direction: row;align-items: center;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>

                        <p>&#8220;This site makes my profile look amazing&#8221;.</p>
                    </div>

                    <div class="card">

                        <img src="../Users/dustin.jpg" alt="user">
                        <div class="starsWrapper">
                      
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
  
                        <p>&#8220;Hiring people has become so easy, I can’t believe this site is free&#8221;.</p>
                    </div>

                    <div class="card2">

                        <img src="../Users/john.jpg" alt="user">
                        <div class="starsWrapper">
                            
                            <div class="stars" style="color: #32557f;display: flex;flex-direction: row;align-items: center;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>

                        <p>&#8220;If you’re in need of talented freelancers with this is the place to go. Its great&#8221;.</p>
                    </div>

                    <div class="card">

                        <img src="../Users/joseAldo.jpg" alt="user">
                        <div class="starsWrapper">
                        
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p>&#8220;Will never use another site to apply to jobs again. EZWorks is top tier&#8221;.</p>
                    </div>

                    <div class="card2">

                        <img src="../Users/drake.png" alt="user">
                        <div class="starsWrapper">
                       
                            <div class="stars" style="color: #32557f;display: flex;flex-direction: row;align-items: center;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>

                        <p>&#8220;My company has grown tremendously since I’ve been able to find good people to work for me&#8221;.</p>
                    </div>

                    <div class="card">

                        <img src="../Users/kanyeEast.jpeg" alt="user">
                        <div class="starsWrapper">
                          
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>

                        <p>&#8220;Forbes should list site as one of the top growing applications of 2021, its amazing&#8221;.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>

<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/allJobsSkills.js"></script>

<script>
    const missionArrowUp = document.getElementById('missionUp');

    missionArrowUp.addEventListener('click',()=>{
        var missionWrapper = document.querySelector('.missionWrapper');

        if(getComputedStyle(missionWrapper).display === 'block'){
            missionWrapper.style.display = 'none';
            missionArrowUp.style.transform = "rotate(180deg)";
        }else{
            missionWrapper.style.display = 'block';
            missionArrowUp.style.transform = "rotate(360deg)";
        }

    });


    const whatArrowUp = document.getElementById('whatUp');

    whatArrowUp.addEventListener('click',()=>{
        var whatWrapper = document.querySelector('.whatWrapper');

        if(getComputedStyle(whatWrapper).display === 'block'){
            whatWrapper.style.display = 'none';
            whatArrowUp.style.transform = "rotate(180deg)";
        }else{
            whatWrapper.style.display = 'block';
            whatArrowUp.style.transform = "rotate(360deg)";
        }

    });

    const communityArrowUp = document.getElementById('communityUp');

    communityArrowUp.addEventListener('click',()=>{
        var communityWrapper = document.querySelector('.communityWrapper');

        if(getComputedStyle(communityWrapper).display === 'block'){
            communityWrapper.style.display = 'none';
            communityArrowUp.style.transform = "rotate(180deg)";
        }else{
            communityWrapper.style.display = 'block';
            communityArrowUp.style.transform = "rotate(360deg)";
        }

    }); 
    
    const userArrowUp = document.getElementById('userUp');

    userArrowUp.addEventListener('click',()=>{
        var userWrapper = document.querySelector('.userWrapper');

        if(getComputedStyle(userWrapper).display === 'block'){
            userWrapper.style.display = 'none';
            userArrowUp.style.transform = "rotate(180deg)";
        }else{
            userWrapper.style.display = 'block';
            userArrowUp.style.transform = "rotate(360deg)";
        }

    });  
    
    const reviewArrowUp = document.getElementById('reviewUp');

    reviewArrowUp.addEventListener('click',()=>{
        var reviewWrapper = document.querySelector('.reviewWrapper');

        if(getComputedStyle(reviewWrapper).display === 'block'){
            reviewWrapper.style.display = 'none';
            reviewArrowUp.style.transform = "rotate(180deg)";
        }else{
            reviewWrapper.style.display = 'block';
            reviewArrowUp.style.transform = "rotate(360deg)";
        }

    });      

</script>

</html>