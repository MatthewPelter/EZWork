<?php
session_start();
require_once('../classes/DB.php');
if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Post a Job</title>
    <!-- <link rel="stylesheet" href="../Styles/style.css" /> -->
</head>

<body>
    <?php //include '../navbar.php'; 
    ?>
    <div class="PostAJob">
        <div class="PostAJobContainer">
            <h2>Post a Job</h2>
            <?php
            if (isset($_POST['budgetoption'])) {
                if (!empty($_SESSION['post'])) {
                    if (empty($_POST['budgetoption'])) {
                        // Setting error for page 5.
                        $_SESSION['error_page6'] = "Mandatory field(s) are missing, Please fill it again";
                        header("location: budget.php"); // Redirecting to sixth page.
                    } else {
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
                        $datePosted = date("Y-m-d");
                        $sql = "INSERT INTO jobs(length,title,skills,size,location,budget,rate,description,image,user_id,freelancer_id,status, datePosted) VALUES('$length','$title','$skills','$size','$location','$maxbudget','$hourrate', '$description', '$image', '$userID',0,0, '$datePosted')";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                        if ($query) {
                            unset($_SESSION['post']);
                            header("location: https://ez-work.herokuapp.com/ClientProfile/index");
                        } else {
            ?>
                            <p><span>Form Submission Failed..!!</span></p>
            <?php
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
    <?php //include '../footer.php'; 
    ?>
</body>
<script src="../ClientProfile/app.js"></script>

</html>