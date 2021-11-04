<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$uname = $_GET['name'];
$cleanuname = mysqli_real_escape_string($conn, $uname);

if ($cleanuname == $_SESSION['userid']) {
    header('Location: ../ClientProfile/index');
}

$sql = "SELECT * FROM clients WHERE username='$cleanuname'";
$result = mysqli_query($conn, $sql);
$dataFound = false;

if (mysqli_num_rows($result) > 0) {
    $dataFound = true;
    $row = mysqli_fetch_assoc($result);
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
        <style type="text/css">
            @import url("https://fonts.googleapis.com/css?family=Quicksand:400,500,700&subset=latin-ext");

            html {
                position: relative;
                overflow-x: hidden !important;
            }

            * {
                box-sizing: border-box;
            }

            body {
                font-family: "Quicksand", sans-serif;
                color: #324e63;
            }

            a,
            a:hover {
                text-decoration: none;
            }

            .icon {
                display: inline-block;
                width: 1em;
                height: 1em;
                stroke-width: 0;
                stroke: currentColor;
                fill: currentColor;
            }

            @media screen and (max-width: 768px) {
                .wrapper {
                    height: auto;
                    min-height: 100vh;
                    padding-top: 100px;
                }
            }

            .wrapper {
                margin-top: 100px;
            }

            .profile-card {
                width: 100%;
                min-height: 460px;
                margin: auto;
                box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);
                background: #fff;
                border-radius: 12px;
                max-width: 700px;
                position: relative;
            }

            .profile-card.active .profile-card__cnt {
                filter: blur(6px);
            }

            .profile-card.active .profile-card-message,
            .profile-card.active .profile-card__overlay {
                opacity: 1;
                pointer-events: auto;
                transition-delay: 0.1s;
            }

            .profile-card.active .profile-card-form {
                transform: none;
                transition-delay: 0.1s;
            }

            .profile-card__img {
                width: 150px;
                height: 150px;
                margin-left: auto;
                margin-right: auto;
                transform: translateY(-50%);
                border-radius: 50%;
                overflow: hidden;
                position: relative;
                z-index: 4;
                box-shadow: 0px 5px 50px 0px #1d4354, 0px 0px 0px 7px rgb(29, 67, 84, 0.5);
                ;
            }

            @media screen and (max-width: 576px) {
                .profile-card__img {
                    width: 120px;
                    height: 120px;
                }
            }

            .profile-card__img img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 50%;
            }

            .profile-card__cnt {
                margin-top: -35px;
                text-align: center;
                padding: 0 20px;
                padding-bottom: 40px;
                transition: all 0.3s;
            }

            .profile-card__name {
                font-weight: 700;
                font-size: 24px;
                color: #1d4354;
                margin-bottom: 15px;
            }

            .profile-card__txt {
                font-size: 18px;
                font-weight: 500;
                color: #324e63;
                margin-bottom: 15px;
            }

            .profile-card__txt strong {
                font-weight: 700;
            }

            .profile-card-loc {
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 18px;
                font-weight: 600;
            }

            .profile-card-loc__icon {
                display: inline-flex;
                font-size: 27px;
                margin-right: 10px;
            }

            .profile-card-inf {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                align-items: flex-start;
                margin-top: 35px;
            }

            .profile-card-inf__item {
                padding: 10px 35px;
                min-width: 150px;
            }

            @media screen and (max-width: 768px) {
                .profile-card-inf__item {
                    padding: 10px 20px;
                    min-width: 120px;
                }
            }

            .profile-card-inf__title {
                font-weight: 700;
                font-size: 27px;
                color: #324e63;
            }

            .profile-card-inf__txt {
                font-weight: 500;
                margin-top: 7px;
            }

            .profile-card-social {
                margin-top: 25px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
            }

            .profile-card-social__item {
                display: inline-flex;
                width: 55px;
                height: 55px;
                margin: 15px;
                border-radius: 50%;
                align-items: center;
                justify-content: center;
                color: #fff;
                background: #405de6;
                box-shadow: 0px 7px 30px rgba(43, 98, 169, 0.5);
                position: relative;
                font-size: 21px;
                flex-shrink: 0;
                transition: all 0.3s;
            }

            @media screen and (max-width: 768px) {
                .profile-card-social__item {
                    width: 50px;
                    height: 50px;
                    margin: 10px;
                }
            }

            @media screen and (min-width: 768px) {
                .profile-card-social__item:hover {
                    transform: scale(1.2);
                }
            }

            .profile-card-social__item.facebook {
                background: linear-gradient(45deg, #3b5998, #0078d7);
                box-shadow: 0px 4px 30px rgba(43, 98, 169, 0.5);
            }

            .profile-card-social__item.twitter {
                background: linear-gradient(45deg, #1da1f2, #0e71c8);
                box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.7);
            }

            .profile-card-social__item.instagram {
                background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
                box-shadow: 0px 4px 30px rgba(120, 64, 190, 0.6);
            }

            .profile-card-social__item.behance {
                background: linear-gradient(45deg, #1769ff, #213fca);
                box-shadow: 0px 4px 30px rgba(27, 86, 231, 0.7);
            }

            .profile-card-social__item.github {
                background: linear-gradient(45deg, #333333, #626b73);
                box-shadow: 0px 4px 30px rgba(63, 65, 67, 0.6);
            }

            .profile-card-social__item.codepen {
                background: linear-gradient(45deg, #324e63, #414447);
                box-shadow: 0px 4px 30px rgba(55, 75, 90, 0.6);
            }

            .profile-card-social__item.link {
                background: linear-gradient(45deg, #d5135a, #f05924);
                box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.6);
            }

            .profile-card-social .icon-font {
                display: inline-flex;
            }

            .profile-card-ctr {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 40px;
            }

            @media screen and (max-width: 576px) {
                .profile-card-ctr {
                    flex-wrap: wrap;
                }
            }

            .profile-card__button {
                background: none;
                border: none;
                font-family: "Quicksand", sans-serif;
                font-weight: 700;
                font-size: 19px;
                margin: 15px 35px;
                padding: 15px 40px;
                min-width: 201px;
                border-radius: 50px;
                min-height: 55px;
                color: #fff;
                cursor: pointer;
                backface-visibility: hidden;
                transition: all 0.3s;
            }

            @media screen and (max-width: 768px) {
                .profile-card__button {
                    min-width: 170px;
                    margin: 15px 25px;
                }
            }

            @media screen and (max-width: 576px) {
                .profile-card__button {
                    min-width: inherit;
                    margin: 0;
                    margin-bottom: 16px;
                    width: 100%;
                    max-width: 300px;
                }

                .profile-card__button:last-child {
                    margin-bottom: 0;
                }
            }

            .profile-card__button:focus {
                outline: none !important;
            }

            @media screen and (min-width: 768px) {
                .profile-card__button:hover {
                    transform: translateY(-5px);
                }
            }

            .profile-card__button:first-child {
                margin-left: 0;
            }

            .profile-card__button:last-child {
                margin-right: 0;
            }

            .profile-card__button.button--blue {
                background: linear-gradient(45deg, #1da1f2, #0e71c8);
                box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.4);
            }

            .profile-card__button.button--blue:hover {
                box-shadow: 0px 7px 30px rgba(19, 127, 212, 0.75);
            }

            .profile-card__button.button--orange {
                background: linear-gradient(45deg, #d5135a, #f05924);
                box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.35);
            }

            .profile-card__button.button--orange:hover {
                box-shadow: 0px 7px 30px rgba(223, 45, 70, 0.75);
            }

            .profile-card__button.button--gray {
                box-shadow: none;
                background: #dcdcdc;
                color: #142029;
            }

            .profile-card-message {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                padding-top: 130px;
                padding-bottom: 100px;
                opacity: 0;
                pointer-events: none;
                transition: all 0.3s;
            }

            .profile-card-form {
                box-shadow: 0 4px 30px rgba(15, 22, 56, 0.35);
                max-width: 80%;
                margin-left: auto;
                margin-right: auto;
                height: 100%;
                background: #fff;
                border-radius: 10px;
                padding: 35px;
                transform: scale(0.8);
                position: relative;
                z-index: 3;
                transition: all 0.3s;
            }

            @media screen and (max-width: 768px) {
                .profile-card-form {
                    max-width: 90%;
                    height: auto;
                }
            }

            @media screen and (max-width: 576px) {
                .profile-card-form {
                    padding: 20px;
                }
            }

            .profile-card-form__bottom {
                justify-content: space-between;
                display: flex;
            }

            @media screen and (max-width: 576px) {
                .profile-card-form__bottom {
                    flex-wrap: wrap;
                }
            }

            .profile-card textarea {
                width: 100%;
                resize: none;
                height: 210px;
                margin-bottom: 20px;
                border: 2px solid #dcdcdc;
                border-radius: 10px;
                padding: 15px 20px;
                color: #324e63;
                font-weight: 500;
                font-family: "Quicksand", sans-serif;
                outline: none;
                transition: all 0.3s;
            }

            .profile-card textarea:focus {
                outline: none;
                border-color: #8a979e;
            }

            .profile-card__overlay {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                pointer-events: none;
                opacity: 0;
                background: rgba(22, 33, 72, 0.35);
                border-radius: 12px;
                transition: all 0.3s;
            }
        </style>
    </head>
</head>

<body>

    <?php include '../navbar.php'; ?>


    <div class="profile">
        <!-- <div class="user-profile-header">
            <h2 id="username"><?php echo $row['username']; ?></h2>
            <div class="quick-links">
                <?php if ($dataFound) { ?>
                    <button id="quick-link-job" onclick="location.href='../message/messages?mid=<?php echo $row['id']; ?>'">Message User</button>
                <?php } ?>
            </div>
        </div> -->

        <!-- <div class="user-profile-body">
            <div class="user-postings user-info">
                <div class="card title">
                    <h3>User Information</h3>
                </div>
                <div class="card result"> -->
        <?php
        if ($dataFound) {
        ?>
            <div class="wrapper">
                <div class="profile-card js-profile-card">
                    <div class="profile-card__img">
                        <img src="<?php echo $row['avatar']; ?>" alt="profile card">
                    </div>

                    <div class="profile-card__cnt js-profile-cnt">
                        <div class="profile-card__name"><?php echo $row['firstname'] . " " . $row['lastname']; ?></div>
                        <div class="profile-card__txt"><strong><?php if ($row['freelancer_id'] != NULL) {
                                                                    echo "Freelancer";
                                                                } else {
                                                                    echo "Client";
                                                                } ?></strong></div>
                        <div class="profile-card-loc">
                            <span class="profile-card-loc__icon">
                                <svg class="icon">
                                    <use xlink:href="#icon-location"></use>
                                </svg>
                            </span>
                            <!--                                         
                                        <span class="profile-card-loc__txt">
                                            Istanbul, Turkey
                                        </span> -->
                        </div>

                        <div class="profile-card-inf">

                            <!-- if freelancer -->

                            <?php if ($row['freelancer_id'] != NULL) { ?>
                                <div class="profile-card-inf__item">
                                    <div class="profile-card-inf__title">not configured yet</div>
                                    <div class="profile-card-inf__txt">Completed Freelance Jobs</div>
                                </div>
                            <?php } ?>

                            <div class="profile-card-inf__item">
                                <div class="profile-card-inf__title">not configured yet</div>
                                <div class="profile-card-inf__txt">Jobs Requested</div>
                            </div>

                            <div class="profile-card-inf__item">
                                <div class="profile-card-inf__title">not configured yet</div>
                                <div class="profile-card-inf__txt">Rating</div>
                            </div>
                        </div>

                        <div class="profile-card-social">

                            <?php if ($row['freelancer_id'] != NULL) { ?>
                                <a href="https://github.com/muhammederdem" class="profile-card-social__item github" target="_blank">
                                    <span class="icon-font">
                                        <svg class="icon">
                                            <use xlink:href="#icon-github"></use>
                                        </svg>
                                    </span>
                                </a>
                            <?php } ?>
                            <a href="../404Page/index.html" class="profile-card-social__item link" target="_blank">
                                <span class="icon-font">
                                    <svg class="icon">
                                        <use xlink:href="#icon-link"></use>
                                    </svg>
                                </span>
                            </a>

                        </div>

                        <div class="profile-card-ctr">
                            <button class="profile-card__button button--blue js-message-btn">Message</button>

                        </div>
                        <span id="status"></span>
                    </div>

                    <div class="profile-card-message js-message">
                        <form class="profile-card-form">
                            <div class="profile-card-form__container">
                                <textarea id="messagecontent" placeholder="Say something..." required></textarea>
                            </div>

                            <div class="profile-card-form__bottom">
                                <button name="send-message" id="sendmessage" class="profile-card__button button--blue js-message-close">
                                    Send
                                </button>

                                <button class="profile-card__button button--gray js-message-close">
                                    Cancel
                                </button>
                            </div>
                        </form>

                        <div class="profile-card__overlay js-message-close"></div>
                    </div>

                </div>

            </div>

            <svg hidden="hidden">
                <defs>
                    <symbol id="icon-github" viewBox="0 0 32 32">
                        <title>github</title>
                        <path d="M16.192 0.512c-8.832 0-16 7.168-16 16 0 7.072 4.576 13.056 10.944 15.168 0.8 0.16 1.088-0.352 1.088-0.768 0-0.384 0-1.632-0.032-2.976-4.448 0.96-5.376-1.888-5.376-1.888-0.736-1.856-1.792-2.336-1.792-2.336-1.44-0.992 0.096-0.96 0.096-0.96 1.6 0.128 2.464 1.664 2.464 1.664 1.44 2.432 3.744 1.728 4.672 1.344 0.128-1.024 0.544-1.728 1.024-2.144-3.552-0.448-7.296-1.824-7.296-7.936 0-1.76 0.64-3.168 1.664-4.288-0.16-0.416-0.704-2.016 0.16-4.224 0 0 1.344-0.416 4.416 1.632 1.28-0.352 2.656-0.544 4-0.544s2.72 0.192 4 0.544c3.040-2.080 4.384-1.632 4.384-1.632 0.864 2.208 0.32 3.84 0.16 4.224 1.024 1.12 1.632 2.56 1.632 4.288 0 6.144-3.744 7.488-7.296 7.904 0.576 0.512 1.088 1.472 1.088 2.976 0 2.144-0.032 3.872-0.032 4.384 0 0.416 0.288 0.928 1.088 0.768 6.368-2.112 10.944-8.128 10.944-15.168 0-8.896-7.168-16.032-16-16.032z"></path>
                        <path d="M6.24 23.488c-0.032 0.064-0.16 0.096-0.288 0.064-0.128-0.064-0.192-0.16-0.128-0.256 0.032-0.096 0.16-0.096 0.288-0.064 0.128 0.064 0.192 0.16 0.128 0.256v0z"></path>
                        <path d="M6.912 24.192c-0.064 0.064-0.224 0.032-0.32-0.064s-0.128-0.256-0.032-0.32c0.064-0.064 0.224-0.032 0.32 0.064s0.096 0.256 0.032 0.32v0z"></path>
                        <path d="M7.52 25.12c-0.096 0.064-0.256 0-0.352-0.128s-0.096-0.32 0-0.384c0.096-0.064 0.256 0 0.352 0.128 0.128 0.128 0.128 0.32 0 0.384v0z"></path>
                        <path d="M8.384 26.016c-0.096 0.096-0.288 0.064-0.416-0.064s-0.192-0.32-0.096-0.416c0.096-0.096 0.288-0.064 0.416 0.064 0.16 0.128 0.192 0.32 0.096 0.416v0z"></path>
                        <path d="M9.6 26.528c-0.032 0.128-0.224 0.192-0.384 0.128-0.192-0.064-0.288-0.192-0.256-0.32s0.224-0.192 0.416-0.128c0.128 0.032 0.256 0.192 0.224 0.32v0z"></path>
                        <path d="M10.912 26.624c0 0.128-0.16 0.256-0.352 0.256s-0.352-0.096-0.352-0.224c0-0.128 0.16-0.256 0.352-0.256 0.192-0.032 0.352 0.096 0.352 0.224v0z"></path>
                        <path d="M12.128 26.4c0.032 0.128-0.096 0.256-0.288 0.288s-0.352-0.032-0.384-0.16c-0.032-0.128 0.096-0.256 0.288-0.288s0.352 0.032 0.384 0.16v0z"></path>
                    </symbol>
                    <symbol id="icon-link" viewBox="0 0 32 32">
                        <title>link</title>
                        <path d="M17.984 11.456c-0.704 0.704-0.704 1.856 0 2.56 2.112 2.112 2.112 5.568 0 7.68l-5.12 5.12c-2.048 2.048-5.632 2.048-7.68 0-1.024-1.024-1.6-2.4-1.6-3.84s0.576-2.816 1.6-3.84c0.704-0.704 0.704-1.856 0-2.56s-1.856-0.704-2.56 0c-1.696 1.696-2.624 3.968-2.624 6.368 0 2.432 0.928 4.672 2.656 6.4 1.696 1.696 3.968 2.656 6.4 2.656s4.672-0.928 6.4-2.656l5.12-5.12c3.52-3.52 3.52-9.248 0-12.8-0.736-0.672-1.888-0.672-2.592 0.032z"></path>
                        <path d="M29.344 2.656c-1.696-1.728-3.968-2.656-6.4-2.656s-4.672 0.928-6.4 2.656l-5.12 5.12c-3.52 3.52-3.52 9.248 0 12.8 0.352 0.352 0.8 0.544 1.28 0.544s0.928-0.192 1.28-0.544c0.704-0.704 0.704-1.856 0-2.56-2.112-2.112-2.112-5.568 0-7.68l5.12-5.12c2.048-2.048 5.632-2.048 7.68 0 1.024 1.024 1.6 2.4 1.6 3.84s-0.576 2.816-1.6 3.84c-0.704 0.704-0.704 1.856 0 2.56s1.856 0.704 2.56 0c1.696-1.696 2.656-3.968 2.656-6.4s-0.928-4.704-2.656-6.4z"></path>
                    </symbol>
                </defs>
            </svg>

        <?php
        } else {
        ?>
            <span>User does not Exists</span>
        <?php
        }
        ?>

        <!-- </div>
    </div>
    </div>
    </div> -->



        <!-- ENTER PORTFOLIO SECTION HERE -->




</body>
<?php include '../footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../SkillsContainer/searchProfile.js"></script>
<script src="./app.js"></script>
<script>
    $(document).ready(function() {

        var messageBox = document.querySelector('.js-message');
        var btn = document.querySelector('.js-message-btn');
        var card = document.querySelector('.js-profile-card');
        var closeBtn = document.querySelectorAll('.js-message-close');

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            card.classList.add('active');
        });

        closeBtn.forEach(function(element, index) {
            console.log(element);
            element.addEventListener('click', function(e) {
                e.preventDefault();
                card.classList.remove('active');
            });
        });

        <?php
        if (isset($_GET['name'])) {
            $receiver = $_GET['name'];
        }

        ?>

        $('#sendmessage').click(function() {
            $.ajax({
                type: "POST",
                url: "../api/message.php",
                processData: false,
                contentType: "application/json",
                data: '{ "body": "' + $("#messagecontent").val() + '", "receiver": "<?php echo $receiver; ?>" }',
                success: function(data) {
                    var obj = JSON.parse(data);
                    //console.log(obj.success);
                    $("#messagecontent").val('');
                    $('#status').html(obj.Success);
                },
                error: function(r) {
                    var obj = JSON.parse(data);
                    //console.log(obj.success);
                    $('#status').html(obj.Error);
                }
            });
        });








        var job = document.querySelector('.jobCard');
        var talent = document.querySelector('.talentCard');
        var project = document.querySelector('.projectCard');
        var help = document.querySelector('.helpCard');
        var session = document.querySelector('.sessionCard');

        function toggleJob() {
            var job = document.querySelector('.jobCard');
            if (job.style.display === 'none') {
                job.style.display = 'inline-block';
                talent.style.display = 'none';
                project.style.display = 'none';
                help.style.display = 'none';
                session.style.display = 'none';
            } else {
                job.style.display = 'none';

            }
        }

        function toggleTalent() {
            var talent = document.querySelector('.talentCard');
            if (talent.style.display === 'none') {
                talent.style.display = 'inline-block';
                job.style.display = 'none';
                project.style.display = 'none';
                help.style.display = 'none';
                session.style.display = 'none';
            } else {
                talent.style.display = 'none';
            }
        }

        function toggleProject() {
            var project = document.querySelector('.projectCard');
            if (project.style.display === 'none') {
                project.style.display = 'inline-block';
                talent.style.display = 'none';
                job.style.display = 'none';
                help.style.display = 'none';
                session.style.display = 'none';
            } else {
                project.style.display = 'none';
            }
        }

        function toggleHelp() {
            var help = document.querySelector('.helpCard');
            if (help.style.display === 'none') {
                help.style.display = 'inline-block';
                talent.style.display = 'none';
                project.style.display = 'none';
                job.style.display = 'none';
                session.style.display = 'none';
            } else {
                help.style.display = 'none';
            }
        }

        function toggleSession() {

            if (session.style.display === 'none') {
                session.style.display = 'inline-block';
                talent.style.display = 'none';
                project.style.display = 'none';
                help.style.display = 'none';
                job.style.display = 'none';
            } else {
                session.style.display = 'none';
            }
        }

        const navIcon = document.getElementById("nav-burger");
        const profileMobileNav = document.querySelector(".profile-mobile-nav");

        function myFunction(x) {
            x.classList.toggle("change");
            if (x.classList.contains('change')) {
                profileMobileNav.style.display = "inline-block";
                searchIcon.style.opacity = '0';
            } else {
                profileMobileNav.style.display = 'none';
                searchIcon.style.opacity = '1';
            }
        }

        const sortDownBtn = document.getElementById('jobArrow');
        async function toggleJobCard() {
            var mobileJobCard = document.querySelector(".mobileJobCard");
            if (mobileJobCard.style.display === "none") {
                sortDownBtn.style.transform = "rotate(180deg)";
                mobileJobCard.style.display = "inline-block";
            } else {
                mobileJobCard.style.display = "none";
                sortDownBtn.style.transform = "rotate(360deg)";
            }
        }
    });
</script>

</html>