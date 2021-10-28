<?php
session_start();
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['length'])) {
    if (empty($_POST['length'])) {
        // Setting error message
        $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
        header("location: length.php"); // Redirecting to first page 
    } else {
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page2'])) {
        header("location: length.php"); //redirecting to first page
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
    <?php include '../../navbar.php'; ?>
    <div class="container">
        <div class="main">
            <h2>Post a Job</h2>
            <hr />
            <span id="error">
                <?php
                // To show error of page 2.
                if (!empty($_SESSION['error_page2'])) {
                    echo $_SESSION['error_page2'];
                    unset($_SESSION['error_page2']);
                }
                ?>
            </span>
            <form action="scope.php" method="post">
                <label>Write a title for your job post :<span>*</span></label>
                <input name="title" id="title" type="text" placeholder="I need my garage door installed..." value="">
                <input name="description" id="description" type="text" placeholder="My son drove into my garage door and completely ruined my beautiful door..." value="">


                <input type="reset" value="Reset" />

                <input type="submit" value="Next" />
            </form>
        </div>
    </div>

    <?php include '../../footer.php'; ?>
</body>

</html>


<?php
/* We can use this for the registration to improve input validation


$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
 if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
 // Validating Contact Field using regex.
 if (!preg_match("/^[0-9]{10}$/", $_POST['contact'])){ 
 $_SESSION['error'] = "10 digit contact number is required.";
 header("location: page1_form.php");
 } else {
 if (($_POST['password']) === ($_POST['confirm'])) {
 
 } else {
 $_SESSION['error'] = "Password does not match with Confirm Password.";
 header("location: page1_form.php"); //redirecting to first page
 }
 }
 } else {
 $_SESSION['error'] = "Invalid Email Address";
 header("location: page1_form.php");//redirecting to first page
 }
 */
?>