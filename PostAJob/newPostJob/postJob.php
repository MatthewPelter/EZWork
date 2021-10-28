<!DOCTYPE HTML>
<html>

<head>
    <title>Post a Job</title>
    <!-- <!--<link rel="stylesheet" href="style.css" /> -->
</head>

<body>
    <?php include '../../navbar.php'; ?>
    <div class="container">
        <div class="main">
            <h2>Post a Job</h2>
            <?php
            session_start();
            if (isset($_POST['budgetoption'])) {
                if (!empty($_SESSION['post'])) {
                    if (empty($_POST['budgetoption'])) {
                        // Setting error for page 5.
                        $_SESSION['error_page5'] = "Mandatory field(s) are missing, Please fill it again";
                        header("location: budget.php"); // Redirecting to fifth page.
                    } else {
                        require_once('../../classes/DB.php');
                        $username = $_SESSION['userid'];
                        $getUserID = "SELECT id FROM clients WHERE username = '$username'";
                        $getResult = mysqli_query($conn, $getUserID);
                        $row = mysqli_fetch_assoc($getResult);
                        $userID = $row['id'];



                        foreach ($_POST as $key => $value) {
                            $_SESSION['post'][$key] = $value;
                        }

                        extract($_SESSION['post']); // Function to extract array.

                        // Clean up values
                        if ($_SESSION['post']['maxbudget'] == 0) {
                            $_SESSION['post']['maxbudget'] = NULL;
                        } else if ($_SESSION['post']['hourrate'] == 0) {
                            $_SESSION['post']['hourrate'] = NULL;
                        }

                        //print_r($_SESSION['post']);

                        $sql = "INSERT INTO jobs(length,title,skills,size,location,budget,rate,description,image,user_id,freelancer_id,status) VALUES('$length','$title','None','$size','$location','$maxbudget','$hourrate', '$description', NULL, '$userID',0,0)";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                        if ($query) {
                            unset($_SESSION['post']);
                            echo '<p><span id="success">Yay you just posted a job..!!</span></p>';
                            header("Refresh:3; url=../../ClientProfile/index");
                        } else {
                            echo '<p><span>Form Submission Failed..!!</span></p>';
                        }
                        unset($_SESSION['post']); // Destroying session.

                    }
                } else {
                    header("location: length.php"); // Redirecting to first page.
                }
            } else {
                header("location: length.php"); // Redirecting to first page.
            }
            ?>
        </div>
    </div>
    <?php include '../../footer.php'; ?>
</body>

</html>