<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if user is logged in. If not send them to the log in.
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
    die();
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' limit 1";
    $result = mysqli_query($conn, $sql);
    $userfetch = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
        die();
    }
}


$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$jobsSQL = "SELECT * FROM jobs WHERE status != 1 AND status != -1";

foreach ($queries as $x => $val) {
    if ($x != "sort") {
        $jobsSQL .= " AND " . $x . "='" . $val . "'";
    }
}

if (isset($_GET['sort']) && !empty($_GET['sort'])) {
    $sort = securityscan($_GET['sort']);
    switch ($sort) {
        case "AtoZ":
            $jobsSQL .= " ORDER BY title ASC";
            break;
        case "ZtoA":
            $jobsSQL .= " ORDER BY title DESC";
            break;
        case "lowHigh":
            $jobsSQL .= " ORDER BY budget ASC, rate ASC";
            break;
        case "highLow":
            $jobsSQL .= " ORDER BY budget DESC, rate DESC";
            break;
        default:
            $jobsSQL .= " ORDER BY id DESC";
            break;
    }
} else {
    $jobsSQL .= " ORDER BY id DESC";
}

$jobsQuery = mysqli_query($conn, $jobsSQL);

?>

<!-- ----------------------------------------- -->
<!-- JOB STATUS -->
<!-- 0 : OPEN -->
<!-- 1 : CLOSED -->
<!-- -1 : IN PROGRESS -->
<!-- ----------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <title>EZWork | MarketPlace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="icon" href="../logo/logo.svg">
    <link rel="stylesheet" href="../Styles/style.css">

    <style type="text/css">
        yellow {
            color: #e1b12c;
        }

        red {
            color: #e74c3c;
        }
    </style>
</head>

<body>

    <?php include '../navbar.php'; ?>
    <div class="market-container-header">
        <h4>EZWork MarketPlace</h4>
        <p>Browse through all jobs posted by thousands of our users or view all of our amazing freelancers.</p>
        <div class="scroll">
            <a href="#all_jobs">Browse Jobs</a>
            <a href="#all_freelancers">Browse Freelancers</a>
        </div>
        <!-- Scrap the search bar... Too much work not enough time -->
        <!-- <div class="searchBar2">
            <form id="searchContainer2">
                <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search" id="search2">
                <input type="submit" value="Not Configured Yet :)" id="find2" disabled>
            </form>
        </div> -->
    </div>
    <div class="market-container">

        <div class="jobs-container" id="#all_jobs">


            <div class="sortMenu">
                <button id="resetSortFilter" onclick="resetOptions()">Reset</button>
                <div class="sort">
                    <h3>Sort</h3>
                   
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
                <div class="filter">
                    <h3>Filter</h3>
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

            <div class="allJobs">

                <div class="allJobsContainer">
                    <div class="JobsHeader">
                        <h3>All Jobs</h3>
                    </div>
                    <?php
                    if (mysqli_num_rows($jobsQuery) > 0) {
                        while ($r = mysqli_fetch_assoc($jobsQuery)) {
                            $uid = $r['user_id'];
                            $unameSQL = "SELECT username, avatar FROM clients WHERE id='$uid'";
                            $unameResult = mysqli_query($conn, $unameSQL);
                            $unameFetched = mysqli_fetch_assoc($unameResult);
                    ?>

                            <div class="jobPost" onclick="location.href=`../newPostJob/job.php?id=<?php echo $r['id']; ?>`">
                                <div class="job-title">
                                    <a href="../newPostJob/job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a>
                                </div>

                                <!-- ----------------------------------------- -->
                                <!-- JOB STATUS -->
                                <!-- 0 : OPEN -->
                                <!-- 1 : CLOSED -->
                                <!-- -1 : IN PROGRESS -->
                                <!-- ----------------------------------------- -->

                                <div class="status">
                                    <p>Status:</p>
                                    <span>
                                        <?php if ($r['status'] == 0) { ?>
                                            <green><?php echo "Open"; ?></green>
                                        <?php } else if ($r['status'] == 1) { ?>
                                            <red><?php echo "Closed"; ?></red>
                                        <?php } else if ($r['status'] == -1) { ?>
                                            <yellow><?php echo "In-Progress"; ?></yellow>
                                        <?php } ?>
                                    </span>
                                </div>
                                <div class="card1">
                                    <div class="postedOn">
                                        <p>Posted on:</p>
                                        <span>
                                            <?php echo $r['datePosted']; ?>
                                        </span>
                                    </div>
                                    <div class="postedBy">
                                        <p>Posted By:</p>
                                        <img style="width: 16px; border-radius:50%; margin-right: 0.5rem;" src="<?php echo $unameFetched['avatar']; ?>" alt="Avatar">
                                        <span>
                                            <?php if ($unameFetched['username'] != $_SESSION['userid']) {
                                                echo "<a href='../Profile/userprofile.php?name=" . $unameFetched['username'] . "'>" . $unameFetched['username'] . "</a>";
                                            } else {
                                                echo $unameFetched['username'];
                                            }  ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="card2">
                                    <div class="location">
                                        <p>Location: </p>
                                        <span> <?php echo ucfirst($r['location']); ?></span>
                                    </div>

                                    <div class="price">
                                        <p>Pay: </p>
                                        <?php if ($r['rate'] > 0) { ?>
                                            <span>$<?php echo $r['rate']; ?> / hr - </span>
                                            <span><?php echo "Hourly Rate" ?></span>
                                        <?php } else if ($r['budget'] > 0) { ?>
                                            <span>$ <?php echo $r['budget']; ?> - </span>
                                            <span><?php echo "Project Budget" ?></span>
                                        <?php } else { ?>
                                            <p></p>
                                            <span> <?php echo "No budget or pay rate set yet..."; ?></span>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>

                        <?php
                        }
                    } else { ?>
                        <div class="postedJob">
                            <div class="jobTitle">
                                <h4 id="jobTitle">There are no jobs based on your filter set. :(</h4>
                            </div>
                        </div>
                    <?php }
                    ?>

                    <div class="JobsFooter">
                        <p>SPACER</p>
                    </div>
                </div>

            </div>

            <div class="myProfile">

                <div class="header">
                    <img src="<?php echo $userfetch['avatar']; ?>" alt="Avatar">
                    <h4>My Profile</h4>
                </div>

                <div class="view">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <a href="https://ez-work.herokuapp.com/ClientProfile/index">View my Profile</a>
                </div>

            </div>
        </div>   
        <div class="AllFreelancers" id="#all_freelancers>

            <div class="AllFreelancersHeader">
                <h2>All <span>EZWork</span> Freelancers</h2>
            </div>
            <div class="AllFreelancersContainer">
            <?php
                        $sql = "SELECT username, avatar, freelancer_id FROM clients";
                        $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['username'] != $_SESSION['userid']) {
    
                                    if ($row['freelancer_id'] != NULL) {
                        ?>
                         
                        <a href="../Profile/userprofile.php?name=<?php echo $row['username']; ?>">
                            <div class="freelancerCard" onclick="location.href=`" >
                                <div class="freelancerImg">
                                    <img src="<?php echo $row['avatar']; ?>" alt=`<?php echo $row['username']; ?>`>
                                </div>
                                <div class="freelancerInfo">
                                    <h2><?php echo $row['username']; ?></h2>
                                    
                                    <!-- Couldn't get the data such as expertise for each freelacner
                                    <h3>
                                        Software Developer                                
                                    </h3>
                                    <h4>$ 
                                        <span>
                                            10
                                        </span>
                                         per hour
                                    </h4>
                                    
                                    <h5>
                                       
                                    </h5>
                                    -->
                                    <?php
                                        $freeID = $row['freelancer_id'];
                                        $pullJobs = mysqli_query($conn, "SELECT COUNT(*) AS completedJobs FROM jobs WHERE freelancer_id = '$freeID' AND status=1");
                                        $pullJobCount = mysqli_fetch_assoc($pullJobs);                            
                                    ?>
                                    <p><?php echo $pullJobCount['completedJobs']; ?> jobs completed</p>
                                </div>
                            </div>
                        </a>
    
    
    
    
                            <?php
                                    }
                                }
                            }
                        }
                        ?>             
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- This script is used to function the filer section-->
<script type="text/javascript">
    var url = "https://ez-work.herokuapp.com/Market/market?";

    // this function is such a mess but it works 
    function sort(by) {
        var newpage = "";
        var text = window.location.href;
        if (text.indexOf("sort") > 0) {
            var remove = text.substring(text.indexOf("sort") - 1, text.length);
            text = text.replace(remove, "");
            if (text == "https://ez-work.herokuapp.com/Market/market") {
                newpage = text + "?sort=" + by;
            } else {
                newpage = text + "&sort=" + by;
            }

            window.location = newpage;
        } else {
            if (window.location.href == "https://ez-work.herokuapp.com/Market/market") {
                newpage = window.location.href + "?sort=" + by;
            } else {
                newpage = text + "&sort=" + by;
            }
            window.location = newpage;
        }

    }

    $('#submitFilter').click(function() {

        window.location = "https://ez-work.herokuapp.com/Market/market?" + $('#filterForm').serialize();
    });

    function resetOptions() {
        window.location = "https://ez-work.herokuapp.com/Market/market";
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