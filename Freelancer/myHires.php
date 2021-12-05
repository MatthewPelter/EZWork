<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

$username = $_SESSION['userid'];
$userID = $_SESSION['user_id'];

    $sql = "SELECT * FROM jobs WHERE user_id='$userID'";
    $jobResult = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
                if (mysqli_num_rows($jobResult) > 0) {
                    while ($r = mysqli_fetch_assoc($jobResult)) {
?>
                     <span><?php echo $r['title']; ?></span>               
<?php
                    }
                }
?>

    
</body>
</html>