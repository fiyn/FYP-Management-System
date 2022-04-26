<?php include('./php/logout-action.php')?>
<?php include('./php/student_meeting-action.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/student_dashboard.css" type="text/css">
    <link rel="stylesheet" href="./css/hamburger.css" type="text/css">
    <script src="https://kit.fontawesome.com/3d7a902bb5.js" crossorigin="anonymous"></script>
    <script src="./js/nav-bar.js"></script>
    <script src="./js/hamburger.js"></script>
    <title>Dashboard</title>
</head>
<body>

    <?php include 'includes/../php/student_nav-bar.inc.php'; ?>
    <?php include 'includes/../php/hamburger.inc.php'; ?>

    <div class="container__content">
        <div class="container__dashboard">
            <h1 class="content-title">Dashboard</h1>
            <hr>
            <div class="container__card">
                <div class="card card-left">
                    <h2 class="card__title">My Projects</h2>
                    <div class="container__table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Supervisor</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Project X</td>
                                    <td>Mr. Euwern</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card card-right">
                    <h2 class="card__title">Upcoming Meetings</h2>
                    <div class="container__table">
                        <table class="table table-upcoming">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php upcomingMeetingTable($link, $stud_id);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>