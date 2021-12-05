<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$username = $_SESSION['userid'];
//$getUserID = "SELECT id FROM clients WHERE username = '$username'";
// $getResult = mysqli_query($conn, $getUserID);
// $userrow = mysqli_fetch_assoc($getResult);
$userID = $_SESSION['user_id'];
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
            <title>EZWork | My Postings</title>
            <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet"> 
            <link rel="icon" href="../logo/logo.svg">
            <link rel="stylesheet" href="../Styles/style.css">
        </head>
    </head>
<body>

    <!-- NAV BAR -->
    <?php include '../navbar.php'; ?>
    <!-- END NAVBAR -->

    <div class="myJobs">
        <div class="myJobs-header">
            <ul>
                <li><a href="../ClientProfile/index.php">My Profile</a></li>
                <li>/</li>
                <li>Job Postings</li>
            </ul>
            <button onclick="location.href='../newPostJob/length.php'">Post a New Job</button>
        </div>
        <div class="myJobs-parent">
            <div class="sortMenu">
                <button id="resetSortFilter" onclick="resetOptions()">Reset</button>
                <div class="sort" onclick="toggleSortCard()">
                    <h3>Sort</h3>
                    <i class="fa fa-sort-desc" id="sortArrow" aria-hidden="true"></i>
                </div>
                <div class="sortCard">
                    <div class="sortAtoZ" onclick="sort('AtoZ')">
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                        <p>A to Z</p>
                    </div>
                    <div class="sortZtoA" onclick="sort('ZtoA')">
                        <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                        <p>Z to A</p>
                    </div>
                    <!--
                   <div class="sortPriceLowHigh" onclick="sort('lowHigh')">
                        <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                        <p>Price: Low to High</p>
                    </div>
                    <div class="sortPriceHighLow" onclick="sort('highLow')">
                        <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                        <p>Price: High to Low</p>
                    </div>
                    -->
 
                </div>
                <div class="filter" onclick="toggleFilterCard()">
                    <h3>Filter</h3>
                    <i class="fa fa-sort-desc" id="filterArrow" aria-hidden="true"></i>
                </div>
                <div class="filterCard">
                    <form id="filterForm" action="javascript:void(0);">
                        <div class="FilterExperience">
                            <h3>By Experience</h3>
                            <div class="experienceCard">

                                <div class="entry">
                                    <input type="radio" name="experience" id="entry" value="entry">
                                    <label for="entry">Entry</label>
                                </div>
                                <div class="intermediate">
                                    <input type="radio" name="experience" id="intermediate" value="intermediate">
                                    <label for="intermediate">Intermediate</label>
                                </div>
                                <div class="expert">
                                    <input type="radio" name="experience" id="expert" value="expert">
                                    <label for="expert">Expert</label>
                                </div>

                            </div>
                        </div>
                        <div class="FilterBudget">
                            <h3>By Budget</h3>
                            <div class="filterBudgetCard">
                                <div class="hourly">
                                    <input type="radio" name="budgetType" onclick="toggleHourlyCard()" id="hourly">
                                    <label for="hourly">Hourly</label>
                                </div>
                                <div class="hourlyCard">
                                    <div class="ZeroToTwentyFive">
                                        <input type="radio" name="hourly" id="ZeroToTwentyFive" value="0to25">
                                        <label for="ZeroToTwentyFive">$0 - $25</label>
                                    </div>
                                    <div class="TwentySixToFifty">
                                        <input type="radio" name="hourly" id="TwentySixToFifty" value="26to50">
                                        <label for="TwentySixToFifty">$26 - $50</label>
                                    </div>
                                    <div class="FiftyOneToSeventyfive">
                                        <input type="radio" name="hourly" id="FiftyOneToSeventyfive" value="51to75">
                                        <label for="FiftyOneToSeventyfive">$51 - $75</label>
                                    </div>
                                    <div class="seventySixToOneHundred">
                                        <input type="radio" name="hourly" id=" seventySixToOneHundred" value="76to100">
                                        <label for="seventySixToOneHundred">$76 - $100</label>
                                    </div>
                                    <div class="more">
                                        <input type="radio" name="hourly" id="oneHundredPlus" value="100plus">
                                        <label for="oneHundredPlus">$100+</label>
                                    </div>
                                </div>
                                <div class="budget">
                                    <input type="radio" onclick="toggleBudgetCard()" name="budgetType" id="budget">
                                    <label for="budget">Budget</label>
                                </div>
                                <div class="budgetCard">
                                    <div class="ZeroToNinetyNine">
                                        <input type="radio" name="budget" id="ZeroToNinetyNine" value="0to99">
                                        <label for="ZeroToNinetyNine">$0 - $99</label>
                                    </div>
                                    <div class="OneHundredOneToOneHundredNinetyNine">
                                        <input type="radio" name="budget" id="OneHundredOneToOneHundredNinetyNine" value="100to199">
                                        <label for="OneHundredOneToOneHundredNinetyNine">$100 - $199</label>
                                    </div>
                                    <div class="TwoHundredOneToTwoeHundredNinetyNine">
                                        <input type="radio" name="budget" id="TwoHundredOneToTwoeHundredNinetyNine" value="200to299">
                                        <label for="TwoHundredOneToTwoeHundredNinetyNine">$200 - $299</label>
                                    </div>
                                    <div class="threeHundredToThreeHundredNinetyNine">
                                        <input type="radio" name="budget" id="threeHundredToThreeHundredNinetyNine" value="300to399">
                                        <label for="threeHundredToThreeHundredNinetyNine">$300 - $399</label>
                                    </div>
                                    <div class="fourHundredToFourHundredNinetyNine">
                                        <input type="radio" name="budget" id="fourHundredToFourHundredNinetyNine" value="400to499">
                                        <label for="fourHundredToFourHundredNinetyNine">$400 - $499</label>
                                    </div>
                                    <div class="fiveHundredPlus">
                                        <input type="radio" name="budget" id="fiveHundredPlus" value="500plus">
                                        <label for="fiveHundredPlus">$500+</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="FilterSkill">
                            <h3>By Skill</h3>
                            <div class="filterSkillCard">
                                <select name="skills" id="filterSkills">
                                    <option disabled selected value>--Please choose an skill--</option>
                                </select>
                            </div>
                        </div>
                        <div class="FilterLocation">
                            <h3>By Location</h3>
                            <div class="filterLocationCard">

                                <div class="worldwide">
                                    <input type="radio" name="location" id="worldwide" value="world">
                                    <label for="worldwide">Worldwide</label>
                                </div>
                                <div class="us">
                                    <input type="radio" name="location" id="us" value="us">
                                    <label for="us">United States</label>
                                </div>
                            </div>
                        </div>
                        <div class="FilterProjectSize">
                            <h3>By Project Size</h3>
                            <div class="filterProjectSizeCard">

                                <div class="small">
                                    <input type="radio" name="size" id="small" value="small">
                                    <label for="small">Small</label>
                                </div>
                                <div class="medium">
                                    <input type="radio" name="size" id="medium" value="medium">
                                    <label for="medium">Medium</label>
                                </div>
                                <div class="large">
                                    <input type="radio" name="size" id="large" value="large">
                                    <label for="large">Large</label>
                                </div>

                            </div>
                        </div>
                        <div class="FilterProjectType">
                            <h3>By Project Type</h3>
                            <div class="filterProjectTypeCard">
                                <div class="shortTerm">
                                    <input type="radio" name="length" id="shortTerm" value="s">
                                    <label for="shortTerm">Short Term</label>
                                </div>
                                <div class="longTerm">
                                    <input type="radio" name="length" id="longTerm" value="l">
                                    <label for="longTerm">Long Term</label>
                                </div>
                            </div>
                        </div>
                        <button id="submitFilter">Submit Filter</button>
                    </form>
                </div>
            </div>
            <div class="myJobs-grid">
                <div class="myJobs-container">
                    <div class="myJobs-container-header">
                        <div class="searchBar">
                            <h3>All Jobs Postings</h3>
                        </div>
        
                    </div>
        
                    <div class="postedJob">
                        <span>
                            <?php
                            $jobSQL = "SELECT * FROM jobs WHERE user_id='$userID' ORDER BY id DESC";
                            $jobResult = mysqli_query($conn, $jobSQL) or die(mysqli_errno($conn));
                            if (mysqli_num_rows($jobResult) == 0) {
                                echo "You currently have no job postings listed.";
                            }
                            ?>
                        </span>
                        <?php
                        if (mysqli_num_rows($jobResult) > 0) {
                            while ($r = mysqli_fetch_assoc($jobResult)) {
                        ?>
                                <div class="allJobsCard" style="overflow-y: scroll;">

                                    <div class="postedJob" data-postid="<?php echo $r['id']; ?>">
                                        <div class="jobTitle">
                                            <h4 id="jobTitle"><a href="../newPostJob/job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a></h4>
        
                                        </div>
                                        <p>Status:
                                            <?php if ($r['status'] == 0) { ?>
                                                <span style="color: lightgreen;"><?php echo "Open"; ?></span>
                                            <?php } else if($r['status'] == 1) { ?>
                                                <span style="color: red;"><?php echo "Closed"; ?></span>                         
                                            <?php }else{ ?>
                                                <span style="color: yellow;"><?php echo "In-Progress"; ?></span>                                              
                                            <?php } ?>
                                        </p>
                                        <p>Job Posted on <span id="date"><?php echo $r['datePosted']; ?></span> by <span id="postedBy">Me</span></p>
                                    </div>
                                </div>
        
                        <?php
                            }
                        }
                        ?>
                    </div>
        
        
                    <div class="spacer">
                        <h3>SPACER</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
  
    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->

        <!--DataList-->
        <datalist id="allskills">
        
        </datalist>
</body>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
<!-- This script is used to function the filer section-->
<script type="text/javascript">
    var url = "https://ez-work.herokuapp.com/newPostJob/myJobs";

    // this function is such a mess but it works 
    function sort(by) {
        var newpage = "";
        var text = window.location.href;
        if (text.indexOf("sort") > 0) {
            var remove = text.substring(text.indexOf("sort") - 1, text.length);
            text = text.replace(remove, "");
            if (text == "https://ez-work.herokuapp.com/newPostJob/myJobs") {
                newpage = text + "?sort=" + by;
            } else {
                newpage = text + "&sort=" + by;
            }

            window.location = newpage;
        } else {
            if (window.location.href == "https://ez-work.herokuapp.com/newPostJob/myJobs") {
                newpage = window.location.href + "?sort=" + by;
            } else {
                newpage = text + "&sort=" + by;
            }
            window.location = newpage;
        }

    }

    $('#submitFilter').click(function() {

        window.location = "https://ez-work.herokuapp.com/newPostJob/myJobs" + $('#filterForm').serialize();
    });

    function resetOptions() {
        window.location = "https://ez-work.herokuapp.com/newPostJob/myJobs";
    }

    function toggleHourlyCard() {
        var hourlyCard = document.querySelector(".hourlyCard");
        if (getComputedStyle(hourlyCard).display === "none") {
            hourlyCard.style.display = "inline-block";
        } else {
            hourlyCard.style.display = "none";
        }
    }

    function toggleBudgetCard() {
        var budgetCard = document.querySelector(".budgetCard");
        if (getComputedStyle(budgetCard).display === "none") {
            budgetCard.style.display = "inline-block";
        } else {
            budgetCard.style.display = "none";
        }
    }
</script>
</html>