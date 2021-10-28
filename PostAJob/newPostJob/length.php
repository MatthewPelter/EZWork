<?php
session_start(); // Session starts here.
require_once('../../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../../login/index');
    echo "NOT LOGGED IN";
} else {
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM clients WHERE username = '$username' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../../login/index');
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
            <span id="error">
                <!---- Initializing Session for errors --->
                <?php
                if (!empty($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </span>
            <form action="postTitle.php" method="post">
                <label>Chose an Option :<span>*</span></label><br />
                <input type="radio" id="short" name="length" value="s" required>
                <label for="short">Short term or part time work</label><br>
                <input type="radio" id="long" name="length" value="l">
                <label for="long">Designated, longer term work</label><br>
                <input type="submit" value="Next" />
            </form>
        </div>
    </div>

    <?php include '../../footer.php'; ?>
</body>

</html>