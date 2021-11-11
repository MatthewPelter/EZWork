<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../login/index');
    echo "NOT LOGGED IN";
} else {
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM clients WHERE username = '$username' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
    }
}

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
            <title>EZWork | Find Jobs or Freelancers</title>
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

    <div class="PostAJob">
        <div class="PostAJobContainer">
            <div class="PostAJobTitle">
                <h3>Getting Started</h3>
            </div>
            <div class="PostAJobQuestion">
                <h4>Choose a Job Length<span>*Mandatory</span></h4>

                <div class="options">
                    <span id="error" style="color: red;">
                        <!---- Initializing Session for errors --->
                        <?php
                        if (!empty($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                    <form action="postTitle.php" method="post" style="width: 100%;">
                        <div class="lengthContainers">
                            <div class="short">
                                <div class="header">
                                    <div class="card1">
                                        <i class="fa fa-clock" aria-hidden="true"></i>
                                    </div>
                                    <div class="card2">
                                        <input type="radio" id="short" name="length" value="s" required>
                                    </div>
                                    
                                </div>
                                <span class="checkmark"></span>
                                <label for="short">Short term or part time work</label>
                                <div class="description">
                                    <p>Less than 30hrs/week</p>
                                    <p>Less than 3 months</p>
                                </div>
                            </div>
                            <div class="long">
                                <div class="header">
                                    <div class="card1">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                    <div class="card2">
                                        <input type="radio" id="long" name="length" value="l">
                                    </div>
                                </div>
                                <label for="long">Designated, longer term work</label>   
                                <div class="description">
                                    <p>More than 30hrs/week</p>
                                    <p>3+ months</p>
                                </div>
                            </div>
                        </div>
        
                        <div class="PostAJobCancel0rContinue">
                
                            <input type="submit" value="Next: Title" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '../footer.php'; ?>

    <!--DataList-->
    <datalist id="allskills"></datalist>

</body>

</html>
