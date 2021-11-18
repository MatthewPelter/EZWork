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

$jobsSQL = "SELECT * FROM jobs";

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
}
$jobsQuery = mysqli_query($conn, $jobsSQL);

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
        <title>EZWork | MarketPlace</title>
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

    <?php include '../navbar.php'; ?>

    <div class="all-jobs-container">
        <div class="all-jobs-container-header">
            <h4>Find Work</h4>
            <div class="searchBar2">
                <form id="searchContainer2">
                    <input type="text" list="allskills" autocomplete="off" name="search" placeholder="Search" id="search2">
                    <input type="submit" value="Search" id="find2">
                </form>
            </div>
        </div>

        <div class="jobs-container">
            <div class="sortMenu">
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
                    <div class="sortPriceLowHigh" onclick="sort('lowHigh')">
                        <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                        <p>Price: Low to High</p>
                    </div>
                    <div class="sortPriceHighLow" onclick="sort('highLow')">
                        <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                        <p>Price: High to Low</p>
                    </div>
                </div>
                <div class="filter" onclick="toggleFilterCard()">
                    <h3>Filter</h3>
                    <i class="fa fa-sort-desc" id="filterArrow" aria-hidden="true"></i>
                </div>
                <div class="filterCard">
                    <div class="FilterExperience">
                        <h3>By Experience</h3>
                        <div class="experienceCard">
                            <div class="entry">
                                <input type="checkbox" name="entry" id="entry" onclick="filter('entry', 'experience')">
                                <label for="entry">Entry</label>
                            </div>
                            <div class="intermediate">
                                <input type="checkbox" name="intermediate" id="intermediate" onclick="filter('intermediate', 'experience')">
                                <label for="intermediate">Intermediate</label>
                            </div>
                            <div class="expert">
                                <input type="checkbox" name="expert" id="expert" onclick="filter('expert', 'experience')">
                                <label for="expert">Expert</label>
                            </div>

                        </div>
                    </div>
                    <div class="FilterBudget">
                        <h3>By Budget</h3>
                        <div class="filterBudgetCard">
                            <div class="hourly">
                                <input type="checkbox" onclick="toggleHourlyCard()" name="hourly" id="hourly">
                                <label for="hourly">Hourly</label>
                            </div>
                            <div class="hourlyCard">
                                <div class="ZeroToTwentyFive">
                                    <input type="checkbox" name="ZeroToTwentyFive" id="ZeroToTwentyFive" onclick="filter('0to25', 'hourly')">
                                    <label for="ZeroToTwentyFive">$0 - $25</label>
                                </div>
                                <div class="TwentySixToFifty">
                                    <input type="checkbox" name="TwentysixToFifty" id="TwentySixToFifty" onclick="filter('26to50', 'hourly')">
                                    <label for="TwentySixToFifty">$26 - $50</label>
                                </div>
                                <div class="FiftyOneToSeventyfive">
                                    <input type="checkbox" name="FiftyOneToSeventyfive" id="FiftyOneToSeventyfive" onclick="filter('51to75', 'hourly')">
                                    <label for="FiftyOneToSeventyfive">$51 - $75</label>
                                </div>
                                <div class="seventySixToOneHundred">
                                    <input type="checkbox" name="seventySixToOneHundred"" id=" seventySixToOneHundred" onclick="filter('76to100', 'hourly')">
                                    <label for="seventySixToOneHundred"">$76 - $100</label>
                                </div>
                                <div class=" more">
                                        <input type="checkbox" name="oneHundredPlus" id="oneHundredPlus" onclick="filter('100plus', 'hourly')">
                                        <label for="oneHundredPlus">$100+</label>
                                </div>
                            </div>
                            <div class="budget">
                                <input type="checkbox" onclick="toggleBudgetCard()" name="budget" id="budget">
                                <label for="budget">Budget</label>
                            </div>
                            <div class="budgetCard">
                                <div class="ZeroToNinetyNine">
                                    <input type="checkbox" name="ZeroToNinetyNine" id="ZeroToNinetyNine" onclick="filter('0to99', 'budget')">
                                    <label for="ZeroToNinetyNine">$0 - $99</label>
                                </div>
                                <div class="OneHundredOneToOneHundredNinetyNine">
                                    <input type="checkbox" name="OneHundredOneToOneHundredNinetyNine" id="OneHundredOneToOneHundredNinetyNine" onclick="filter('100to199', 'budget')">
                                    <label for="OneHundredOneToOneHundredNinetyNine">$100 - $199</label>
                                </div>
                                <div class="TwoHundredOneToTwoeHundredNinetyNine">
                                    <input type="checkbox" name="TwoHundredOneToTwoeHundredNinetyNine" id="TwoHundredOneToTwoeHundredNinetyNine" onclick="filter('200to299', 'budget')">
                                    <label for="TwoHundredOneToTwoeHundredNinetyNine">$200 - $299</label>
                                </div>
                                <div class="threeHundredToThreeHundredNinetyNine">
                                    <input type="checkbox" name="threeHundredToThreeHundredNinetyNine" id="threeHundredToThreeHundredNinetyNine" onclick="filter('300to399', 'budget')">
                                    <label for="threeHundredToThreeHundredNinetyNine">$300 - $399</label>
                                </div>
                                <div class="fourHundredToFourHundredNinetyNine">
                                    <input type="checkbox" name="fourHundredToFourHundredNinetyNine" id="fourHundredToFourHundredNinetyNine" onclick="filter('400to499', 'budget')">
                                    <label for="fourHundredToFourHundredNinetyNine">$400 - $499</label>
                                </div>
                                <div class="fiveHundredPlus">
                                    <input type="checkbox" name="fiveHundredPlus" id="fiveHundredPlus" onclick="filter('500plus', 'budget')">
                                    <label for="fiveHundredPlus">$500+</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="FilterSkill">
                        <h3>By Skill</h3>
                        <div class="filterSkillCard">
                            <select name="filterSkills" id="filterSkills">
                            </select>
                        </div>
                    </div>
                    <div class="FilterLocation">
                        <h3>By Location</h3>
                        <div class="filterLocationCard">
                            <div class="worldwide">
                                <input type="checkbox" name="worldwide" id="worldwide" onclick="filter('world', 'location')">
                                <label for="worldwide">Worldwide</label>
                            </div>
                            <div class="us">
                                <input type="checkbox" name="us" id="us" onclick="filter('us', 'location')">
                                <label for="us">United States</label>
                            </div>
                        </div>
                    </div>
                    <div class="FilterProjectSize">
                        <h3>By Project Size</h3>
                        <div class="filterProjectSizeCard">
                            <div class="small">
                                <input type="checkbox" name="small" id="small" onclick="filter('small', 'size')">
                                <label for="small">Small</label>
                            </div>
                            <div class="medium">
                                <input type="checkbox" name="medium" id="medium" onclick="filter('medium', 'size')">
                                <label for="medium">Medium</label>
                            </div>
                            <div class="large">
                                <input type="checkbox" name="large" id="large" onclick="filter('large', 'size')">
                                <label for="large">Large</label>
                            </div>
                        </div>
                    </div>
                    <div class="FilterProjectType">
                        <h3>By Project Type</h3>
                        <div class="filterProjectTypeCard">
                            <div class="shortTerm">
                                <input type="checkbox" name="shortTerm" id="shortTerm" onclick="filter('short', 'type')">
                                <label for="shortTerm">Short Term</label>
                            </div>
                            <div class="longTerm">
                                <input type="checkbox" name="longTerm" id="longTerm" onclick="filter('long', 'type')">
                                <label for="longTerm">Long Term</label>
                            </div>
                        </div>
                    </div>
                    <button id="submitFilter" onclick="submitFilter()">Submit Filter</button>
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

                            <div class="jobPost" onclick="location.href=`job.php?id=<?php echo $r['id']; ?>`">
                                <div class="job-title">
                                    <a href="job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a>
                                </div>
                                <div class="status">
                                    <p>Status:</p>
                                    <span>
                                        <?php if ($r['status'] == 0) { ?>
                                            <green><?php echo "Open"; ?></green>
                                        <?php } else { ?>
                                            <red><?php echo "Closed"; ?></red>
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
                                <h4 id="jobTitle">There are no jobs. :(</h4>
                                <i class="fa fa-ellipsis-v" id="jobGodMode" aria-hidden="true"></i>
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
    </div>


    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>

<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/allJobsSkills.js"></script>


<!-- This script is used to function the filer section-->
<script type="text/javascript">
    var url = window.location.href;

    function sort(by) {
        url = url + "sort=" + by;
        window.location = url;
    }

    function filter(by, type) {
        // messy but it works
        if (url[url.length - 1] != "?") {
            url = url + "&";
        }
        if (type == "experience") {
            url = url + "experience=" + by;
        } else if (type == "hourly") {
            url = url + "hourly=" + by;
        } else if (type == "budget") {
            url = url + "budget=" + by;
        } else if (type == "skill") {
            url = url + "skill=" + by;
        } else if (type == "location") {
            url = url + "location=" + by;
        } else if (type == "size") {
            url = url + "size=" + by;
        } else if (type == "type") {
            url = url + "type=" + by;
        }
    }

    function submitFilter() {
        window.location = url;
    }

    const sortArrow = document.getElementById('sortArrow');

    function toggleSortCard() {
        const sortCard = document.querySelector('.sortCard');
        if (getComputedStyle(sortCard).display === "none") {
            sortArrow.style.transform = "rotate(180deg)";
            sortCard.style.display = "inline-block";
        } else {
            sortCard.style.display = "none";
            sortArrow.style.transform = "rotate(360deg)";
        }
    }


    const filterArrow = document.getElementById('filterArrow');

    function toggleFilterCard() {
        const filterCard = document.querySelector('.filterCard');
        if (getComputedStyle(filterCard).display === "none") {
            filterArrow.style.transform = "rotate(180deg)";
            filterCard.style.display = "inline-block";
        } else {
            filterCard.style.display = "none";
            filterArrow.style.transform = "rotate(360deg)";
        }
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