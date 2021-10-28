<?php
session_start();
// Checking second page values for empty, If it finds any blank field then redirected to second page.
if (isset($_POST['title'])) {
    if (empty($_POST['title']) || empty($_POST['description'])) {
        $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
        header("location: postTitle.php"); // Redirecting to second page. 
    } else {
        // Fetching all values posted from second page and storing it in variable.
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page3'])) {
        header("location: length.php"); // Redirecting to first page.
    }
}
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
            <hr />
            <span id="error">
                <?php
                if (!empty($_SESSION['error_page3'])) {
                    echo $_SESSION['error_page3'];
                    unset($_SESSION['error_page3']);
                }
                ?>
            </span>
            <form action="location.php" method="post">
                <b>Next, estimate the scope of your work :</b>

                <label>Project Size :<span>*</span></label>
                <select name="size">
                    <option value="">----Select----</options>
                    <option value="large" value="">Large </options>
                    <option value="medium" value="">Medium </options>
                    <option value="small" value="">Small </options>
                </select>


                <label>How long will your work take? :<span>*</span></label>
                <select name="months">
                    <option value="">----Select----</options>
                    <option value="3to6" value="">3-6 Months </options>
                    <option value="1to3" value="">1-3 Months </options>
                    <option value="less1" value="">Less than 1 Month</options>
                </select>

                <label>What level of experience will you need? :<span>*</span></label>
                <select name="experience">
                    <option value="">----Select----</options>
                    <option value="entry" value="">Entry </options>
                    <option value="intermediate" value="">Intermediate </options>
                    <option value="expert" value="">Expert</options>
                </select>

                <input type="reset" value="Reset" />
                <input type="submit" value="Next" />
            </form>
        </div>
    </div>
</body>

</html>