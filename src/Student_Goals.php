<?php include('./php/logout-action.php') ?>
<?php include('./php/student_goals-action.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/student_goals.css">
    <link rel="stylesheet" href="./css/hamburger.css">
    <script src="https://kit.fontawesome.com/3d7a902bb5.js" crossorigin="anonymous"></script>
    <script src="./js/nav-bar.js"></script>
    <script src="./js/hamburger.js"></script>
    <title>Goals</title>
</head>
<body>
    
    <?php include 'includes/../php/student_nav-bar.inc.php'; ?>
    <?php include 'includes/../php/hamburger.inc.php'; ?>

    <div class="container__content">
        <div class="container__goals">
            <h1 class="content-title">Goals</h1>
            <hr>
            <div class="container__goals-list">
                <h3 class="title">Goals List</h3>
                <div class="container__card">
                    <?php echo displayGoalsCard($link); ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>