<?php
session_start(); // Session starts here.
//include '../../components/session-checker.php';

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Post a Job</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
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
</body>

</html>