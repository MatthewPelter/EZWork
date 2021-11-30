<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");
include('./classes/Mail.php');

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM clients WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


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

    <!-- NAV BAR -->
    <?php include '../navbar.php'; ?>
    <!-- END NAVBAR -->


    <div class="settings">
        <div class="settings-nav">
            <ul>
                <li style="background: lightgrey;" id="myInfo">
                    <div class="tab"></div><a href="#/"><i class="fa fa-user"></i> My Info</a>
                </li>
                <li id="passwordSecurity"><a href="#/"><i class="fa fa-lock"></i> Password & Security</a></li>
                <li id="billingMethods"><a href="#/"><i class="fa fa-credit-card-alt"></i> Billing Methods</a></li>
            </ul>
        </div>
        <div class="settings-container">
            <div class="settings-container-title">
                <h2 id="settings-title">My Info</h2>
            </div>
            <div class="settings-account-container">
                <div class="settings-account-card">
                    <h3>Account</h3>
                    <i class="fa fa-pencil" onclick="openCard()" id="editAccountIcon" aria-hidden="true"></i>
                </div>
                <div class="settings-account-profile-image">
                    <div class="image-card">
                        <img id="img" src="<?php echo $row['avatar']; ?>" alt="Avatar">
                    </div>

                    <form action="javascript:void(0);" class="avatar">

                        <label for="file">Select New Avatar:</label>

                        <input type="file" onchange="loadFile(event)" name="file" id="file" accept="image/gif, image/jpeg, image/png">

                        <input type="submit" name="changeAvatar" id="changeAvatar" value="Upload Photo">

                        <p id="url"></p>
                    </form>
                </div>
                <div class="settings-account-profile-info">
                    <p>UserName: <span id="settingsName"><?php echo $row['username']; ?></span></p>
                    <p>Account Type: <span><?php if ($row['freelancer_id'] == NULL) {
                                                echo "Client";
                                            } else {
                                                echo "Freelancer";
                                            } ?></span></p>
                    <p>Phone Number: <span id="settingsPhone"><?php echo $row['phone']; ?></span></p>
                    <p>Email: <span id="settingsEmail"><?php echo $row['email']; ?></span></p>
                </div>
            </div>
            <div class="settings-account-godMode">
                <?php if ($row['freelancer_id'] == NULL) {
                ?>
                    <p>This is a <span id="accountType">Client</span> account.</p>

                    <button id="becomeFreelancer" onclick="location.href='../Profile/register.php'">Become Freelancer</button>
                <?php
                } ?>
                <button id="deleteAccount" onclick="openCard()">Delete Account</button>
            </div>
        </div>

        <!--Password section-->
        <div class="settings-password">
            <div class="settings-container-title">
                <h2 id="settings-title">Password & Security</h2>
            </div>
            <div class="settings-password-container">
                <div class="settings-password-card">
                    <h3>Password</h3>
                    <!-- <i class="fa fa-pencil" onclick="openCard()" id="changePasswordIcon" aria-hidden="true"></i> -->
                </div>
                <div class="settings-password-card2">
                    <p>Use this section to view and edit your current password.</p>
                    <h4>Change your password:</h4>
                    <form action="javascript:void(0);" method="post">
                        <input type="password" id="currentPassword" name="currentPassword" minlength="8" placeholder="Current Password" required><br />

                        <input type="password" id="password" name="password" minlength="8" autocomplete="off" placeholder="New Password" required><br />

                        <input type="password" id="password2" name="password2" minlength="8" autocomplete="off" placeholder="Match New Password" required><br />

                        <span id="result"></span>

                        <input id="changePassBTN" type="submit" name="changepassword" class="changePasswordBtn" value="Change Password">
                    </form>
                </div>
            </div>
            <div class="settings-password-twoStep">
                <div class="settings-password-twoStep-card">
                    <h3>Two-step verification options</h3>
                    <p>Add an extra layer of security to prevent unauthorized access.</p>
                </div>
                <div class="settings-password-twoStep-option">
                    <div class="option-card">
                        <h3>Text Message</h3>
                        <p>Recieve a six digit code by text message to confirm it's you.</p>
                    </div>
                    <button onclick="guidGenerator()">Enable</button>
                </div>
                <div class="settings-password-twoStep-option">
                    <div class="option-card">
                        <h3>Email</h3>
                        <p>Recive a six digit code by email to confirm it's you.</p>
                    </div>
                    <button onclick="guidGenerator()">Enable</button>
                </div>
                <div class="settings-password-twoStep-option" style="border: none;">
                    <div class="option-card">
                        <h3>Security Question</h3>
                        <p>Answer a question you choose to confirm it's you.</p>
                    </div>
                    <button onclick="guidGenerator()">Enable</button>
                </div>
            </div>
        </div>
        <div class="settings-billing">
            <div class="settings-container-title">
                <h2 id="settings-title">Billing Methods & Payments</h2>
            </div>
            <div class="settings-balance-container">
                <div class="settings-balance-card">
                    <h3>Balance Due</h3>
                </div>
                <div class="settings-balance-card2">
                    <p>Your balance due is <span>$</span><span id="balance">0.00</span></p>
                    <button id="payBalance">Pay Now</button>
                </div>
            </div>
            <div class="settings-billing-container">
                <div class="settings-billing-card">
                    <h3>Billing Methods</h3>
                    <button id="addCard">Add a New Billing Method</button>
                </div>
                <div class="settings-billing-option">
                    <?php
                    $getCards = mysqli_query($conn, "SELECT card FROM clients WHERE id='$user_id'");
                    $getCards = mysqli_fetch_assoc($getCards);
                    $getCards = $getCards['card'];
                    if ($getCards == NULL) { ?>
                        <p>You have not set up any billing methods yet.</p>
                        <span>Set up your billing methods so you'll be able to hire right away when you're ready.</span>
                    <?php } else { ?>
                        <p>My Credit Card.</p>
                        <span>You are all set up to pay.</span>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
        <div id="myOverlay" class="overlay">
            <span class="closebtn" onclick="closeCard()" title="Close Overlay">×</span>
            <form id="editForm">
                <label for="password">Confirm Password</label>
                <input type="password" name="password" id="password" required placeholder="Confirm your password">
                <input type="button" id="continueBtn" value="Continue">
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END NAVBAR -->


    <!--DataList-->
    <datalist id="allskills"></datalist>
</body>
<script src="./settings.js"></script>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>
<script>
    // Change password handler
    $("#changePassBTN").click(function() {
        $.ajax({
            url: "../components/settings-change-password.php",
            data: {
                currentPassword: $("#currentPassword").val(),
                password: $("#password").val(),
                password2: $("#password2").val()
            },
            type: "POST",
            success: function(data) {
                $("#result").html(data);
            },
            error: function(data) {
                $("#result").html(data);
            }
        });
    });


    const cards = [
        "3583178707603109",
        "3571124704299826",
        "5893341317087676671",
        "5048370878983022",
        "377856894357623",
        "3542756748442577",
        "30094653929163",
        "374283836755157",
        "3563173528221185",
        "4041375380672",
        "3583035128161010",
        "676388901157804103",
        "3584423522417064",
        "3550827159145469",
        "4175002551915439",
        "501837642450004812",
        "6761036046409348",
        "3568384580968432",
        "3542414637940240",
        "6331108146710574331",
        "4041593647589",
        "5602231600293027674",
        "3542719056551934",
        "3541767582525519",
        "56022405933571413",
        "5602232046321360",
        "3584025049915825",
        "3579360553655054",
        "3549391743413317",
        "4026653922321730",
        "4903662109233950780",
        "3564462840354520",
        "5602216195042547",
        "5280975091492358",
        "3553524085166605",
        "30300311556185",
        "3566930822315493",
        "3552706344485071",
        "36319513444150",
        "6304732671986518010",
        "56104295501468089",
        "3559330046929832",
        "560224138559774915",
        "5511555217191075",
        "3583074574852137",
        "30453504206561",
        "3553746788264615",
        "3535149079647049",
        "6771974431953579",
        "3543689426877310",
        "3586651423029434",
        "3534917470976584",
        "4917388015868022",
        "3551330839819602",
        "201868391935878",
        "633355690087820194",
        "3536265742778281",
        "3581861843491339",
        "3576763255861669",
        "3572259262846763",
        "3558716144264661",
        "3577298969138475",
        "3559581774513863",
        "560221499125127761",
        "5221379720802966",
        "201587883143193",
        "5556607060341905",
        "5610329212246650",
        "5602240069801184",
        "3573203602191596",
        "3541033599458537",
        "3530011929541894",
        "3570165271010717",
        "374288569617011",
        "4911792561180367",
        "4405964307382895",
        "06046658109871499",
        "3565719045141500",
        "3546153532343789",
        "4041598627626209",
        "677148935316933816",
        "5602255489997842",
        "6334227004454008",
        "36345384586571",
        "6761141768609049039",
        "3572607342042086",
        "5602232076974559",
        "3565853146455699",
        "3578755555957872",
        "3568904947499241",
        "3577356131402011",
        "30234391828570",
        "63049256352855687",
        "5108754207794423",
        "3582200482632193",
        "4917010756440767",
        "5002359241818027",
        "30188242319918",
        "3556535807131450",
        "56022328864541413"
    ];

    $("#addCard").click(function() {
        var randomMonth = parseInt(Math.random() * (12 - 1) + 1);
        var randomYear = Math.floor(Math.random() * 7 + 21);
        var randomCVV = Math.floor(Math.random() * 999);
        var randomDate = randomMonth + "/" + randomYear;

        (async () => {
            const {
                value: formValues
            } = await Swal.fire({
                title: "Enter Card Information",
                html: '<input id="swal-input1" class="swal2-input" name="card" type="tel" inputmode="numeric" pattern="[0-9s]{13,19}" autocomplete="cc-number" maxlength="19" value="' +
                    cards[Math.floor(Math.random() * cards.length)] +
                    '">' +
                    '<input id="swal-input2" class="swal2-input" placeholder="Expiration" maxlength="5" value="' +
                    randomDate +
                    '">' +
                    '<input id="swal-input3" maxlength="4" class="swal2-input" placeholder="CVV" value="' +
                    randomCVV +
                    '">',
                focusConfirm: false,
                preConfirm: () => {
                    return document.getElementById("swal-input1").value;
                }
            });

            if (formValues) {
                $.ajax({
                    url: "../api/addCard.php",
                    data: {
                        card: formValues[0]
                    },
                    type: "POST",
                    success: function(data) {
                        // $("#url").html(data);
                        Swal.fire(
                            'Card Added!',
                            'You card has been added and you are all set to pay!',
                            'success'
                        )
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        })();
    });



    const file = document.getElementById("file");
    const img = document.getElementById("img");
    const btn = document.getElementById("changeAvatar");
    const url = document.getElementById("url");
    var post;
    btn.addEventListener("click", function() {

        if (file.files.length != 0) {
            const formdata = new FormData()
            formdata.append("image", file.files[0])
            fetch("https://api.imgur.com/3/image/", {
                method: "post",
                headers: {
                    Authorization: "Client-ID 9f482e3edae002b"
                },
                body: formdata
            }).then(data => data.json()).then(data => {
                post = data.data.link;
                img.src = data.data.link
                $.ajax({
                    url: "../components/update-avatar.php",
                    data: {
                        avatar_link: post
                    },
                    type: "POST",
                    success: function(data) {
                        $("#url").html(data);
                    },
                    error: function(data) {
                        $("#url").html(data);
                    }
                });
            });
        } else {
            url.innerText = "No File Selected";
        }
    });


    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };


    function openCard() {
        document.getElementById("myOverlay").style.display = "block";
    }

    function closeCard() {
        document.getElementById("myOverlay").style.display = "none";
    }

    function guidGenerator() {
        var S4 = function() {
            return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
        };
        console.log((S4() + S4() + "-" + S4() + S4()));
    }
</script>

</html>