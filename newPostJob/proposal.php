<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    die("NOT LOGGED IN");
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
        die();
    }
    $myData = mysqli_fetch_assoc($result);
    if ($myData['freelancer_id'] == NULL) {
        die("You are not a freelancer...");
    }
}

$job_id = $_GET['id'];
$job_id = mysqli_real_escape_string($conn, $job_id);
$job_id = htmlspecialchars($job_id);

$jobSQL = "SELECT jobs.*, clients.username AS uname FROM jobs INNER JOIN clients ON jobs.user_id = clients.id WHERE jobs.id='$job_id' LIMIT 1";
$jobResult = mysqli_query($conn, $jobSQL) or die(mysqli_error($conn));


if (mysqli_num_rows($jobResult) > 0) {
    $r = mysqli_fetch_assoc($jobResult);

    $receiver = $r['user_id'];
    if ($receiver == $user_id) {
        die("You can't Accept your Own Job...");
    }

    $receiver = $r['uname'];
} else {
    header("location: ./jobs.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo/logo.svg">
    <title>Submit Proposal</title>
</head>

<body>
    <div id="proposal">
        <?php
        $checkProposal = mysqli_query($conn, "SELECT * FROM messages WHERE jobID='$job_id' AND sender='$user_id'") or die(mysqli_error($conn));
        if (mysqli_num_rows($checkProposal) > 0) {
        ?>
            <h1>You already sent a request...</h1>
        <?php } else { ?>

            <h1>Are you willing to accept this job?</h1>
            <h2>By submitting a proposal, you agree that you are fully capable of completing this task.</h2>
            <h2>By hitting agree, you will be sending a proposal to the client and they will decide if they will accept your request.</h2>
            <p><span>optional:</span> Message</p><br />
            <textarea name="chat" id="chat" cols="30" rows="10"></textarea>
            <button id="sendmessage">Agree</button>
            <button onclick="cancel()">Cancel</button>


        <?php } ?>
    </div>
    <div id="result"></div>

    <!-- <div id="offer">
        <h1>Are you willing to pay for this service?</h1>
        <h2>If this freelancer has what you are looking for, click Pay now and pay for your service.</h2>
        <h2>The freelancer will be notified and will you can message them what you need done.</h2>
        <button onclick="agreeOffer()">Pay</button>
        <button onclick="cancel(this)">Cancel</button>
    </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('#sendmessage').click(function() {
            $.ajax({
                type: "POST",
                url: "../api/message.php",
                processData: false,
                contentType: "application/json",
                data: '{ "body": "' + $("#chat").val() + '", "receiver": "<?php echo $receiver; ?>", "jobID": "<?php echo $job_id; ?>" }',
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    $("#chat").val('');
                    if (obj.Success.length > 0) {
                        $('#result').html(obj.Success);
                        $('#proposal').hide();
                        setTimeout(function() {
                            window.location.href = "./job?id=<?php echo $job_id; ?>";
                        }, 3000);
                    } else if (obj.Error.length > 0) {
                        $('#result').html(obj.Error);
                    }

                },
                error: function(r) {
                    console.log(r);
                }
            });
        });

        function cancel() {
            window.location = "https://ez-work.herokuapp.com/newPostJob/jobs.php";
        }
    </script>


</body>

</html>