<?php include('./php/server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/login_register.css">
    <script src="https://kit.fontawesome.com/3d7a902bb5.js" crossorigin="anonymous"></script>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/login_register.js"></script>
    <title>FYP Management System</title>
</head>
<body>
    <header>
        <div class="container__header">
                <img class="header__logo" src="./images/thesis.png" alt="FYP Logo">
                <h1>FYP Management and Monitoring System</h1>
        </div>
    </header>

    <div class="container__form">
        <form class="form"  id="login" method="POST" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Welcome!</h1>
            <h3 class="form__title">Sign in to continue</h3>
            
            <div class="form__message form__message--error"><?php echo $loginErr;?></div>
           
            <div class="form__input-group">
                <i class="fa-solid fa-user form__input-icon"></i>
                <input type="text" id="signinEmail" class="form__input" autofocus placeholder="Username" name="username">
                <div class="form__input-error-message"><?php echo $usernameErr;?></div>
            </div>

            <div class="form__input-group">
                <i class="fa-solid fa-unlock-keyhole form__input-icon"></i>
                <input type="password" id="signinPassword" class="form__input" autofocus placeholder="Password" name="password">
                <div class="form__input-error-message"><?php echo $passwordErr ;?></div>
            </div>

            <div id="select-usertype" class="form__input-group">
                <label for="usertypeSignin">Are you a..</label>
                <div class="container__dropdown">
                    <i class="fa-solid fa-user-group"></i>
                    <select name="usertypeSignin" id="usertypeSignin">
                        <option value="student">Student</option>
                        <option value="supervisor">Supervisor</option>
                    </select>
                </div>
            </div>

            <div class="container__button">
                <button class="form__button" type="submit" value="login" name="login_user">Sign In</button>
            </div>

            <p class="form__text">
                Don't have an account? 
                <a class="form__link" href="register.php">Sign Up</a>
            </p>
        </form>
    </div>
 </body>
</html>