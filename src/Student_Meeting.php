<?php include('./php/logout-action.php') ?>
<?php include('./php/student_meeting-action.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/student_meeting.css">
    <link rel="stylesheet" href="./css/hamburger.css">
    <script src="https://kit.fontawesome.com/3d7a902bb5.js" crossorigin="anonymous"></script>
    <script src="./js/student_meeting.js"></script>
    <script src="./js/nav-bar.js"></script>
    <script src="./js/hamburger.js"></script>
    <title>Meetings</title>
</head>
<body>

    <?php include 'includes/../php/student_nav-bar.inc.php'; ?>
    <?php include 'includes/../php/hamburger.inc.php'; ?>


    <div class="container__content">
        <div class="container__meeting">
            <h1 class="content-title">Meetings</h1>
            <div class="wrapper__button">
                <div class="button-group">
                    <div>
                        <button id="upcomingBtn" class="button button-active">Upcoming</button>
                    </div>
                    <div>
                        <button id="pastBtn" class="button">Past</button>
                    </div>
                </div> 
            </div> <hr>

            <div id="upcomingCard" class="container__card">
                <?php upcomingMeetingCard($link, $stud_id);?>
            </div>

            <div id="pastCard" class="container__card hidden">
                <?php pastMeetingCard($link, $stud_id);?>
            </div>

        </div>
        
    </div>
</body>
</html>