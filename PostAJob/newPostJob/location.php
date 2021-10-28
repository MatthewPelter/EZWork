<?php
session_start();
// Checking second page values for empty, If it finds any blank field then redirected to second page.
if (isset($_POST['size'])) {
    if (empty($_POST['size']) || empty($_POST['months']) || empty($_POST['experience'])) {
        $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
        header("location: scope.php"); // Redirecting to second page. 
    } else {
        // Fetching all values posted from second page and storing it in variable.
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page4'])) {
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
                if (!empty($_SESSION['error_page4'])) {
                    echo $_SESSION['error_page4'];
                    unset($_SESSION['error_page4']);
                }
                ?>
            </span>
            <form action="budget.php" method="post">
                <b>Select your preferred freelance location :</b>

                <input type="radio" id="us" name="location" value="us" required>
                <label for="us">U.S. only</label><br>
                <input type="radio" id="world" name="location" value="world">
                <label for="world">Worldwide</label><br>

                <input type="submit" value="Next" />
            </form>
        </div>
    </div>
    <?php include '../../footer.php'; ?>
</body>

</html>