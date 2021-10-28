<?php
session_start();
// Checking second page values for empty, If it finds any blank field then redirected to second page.
if (isset($_POST['location'])) {
    if (empty($_POST['location'])) {
        $_SESSION['error_page4'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
        header("location: location.php"); // Redirecting to second page. 
    } else {
        // Fetching all values posted from second page and storing it in variable.
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page5'])) {
        header("location: length.php"); // Redirecting to first page.
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Post a Job</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
</head>

<body>
    <?php include '../../navbar.php'; ?>
    <div class="container">
        <div class="main">
            <h2>Post a Job</h2>
            <hr />
            <span id="error">
                <?php
                if (!empty($_SESSION['error_page5'])) {
                    echo $_SESSION['error_page5'];
                    unset($_SESSION['error_page5']);
                }
                ?>
            </span>
            <form action="postJob.php" method="post">
                <b>Select your preferred freelance location :</b>

                <input type="radio" id="rate" name="budgetoption" value="rate" required>
                <label for="rate">Hourly Rate</label>
                <input type="radio" id="budget" name="budgetoption" value="budget">
                <label for="budget">Project Budget</label><br>

                <div id="rateChecked" style="display: none;">
                    <label>Optional </label><br />
                    <label>Hourly Rate ($ / hour): </label>
                    <input name="hourrate" id="hourrate" type="number" placeholder="Enter $ Amount" value="">
                </div>

                <div id="budgetChecked" style="display: none;">
                    <label>Optional </label><br />
                    <label>Maximum Budget ($): </label>
                    <input name="maxbudget" id="maxbudget" type="number" placeholder="Enter $ Amount" value="">
                </div>

                <input type="submit" value="Next" />
            </form>
        </div>
    </div>
    <?php include '../../footer.php'; ?>
</body>


<script type="text/javascript">
    var ratebtn = document.getElementById('rate');
    var budgetbtn = document.getElementById('budget');

    ratebtn.addEventListener("click", function() {
        document.getElementById('budgetChecked').style.display = "none";
        document.getElementById('rateChecked').style.display = "block";
    });
    budgetbtn.addEventListener("click", function() {
        document.getElementById('rateChecked').style.display = "none";
        document.getElementById('budgetChecked').style.display = "block";
    });
</script>

</html>