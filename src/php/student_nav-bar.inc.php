<div id="nav-bar">
    <div class="nav-bar__user-div">
        <div>
            <img class="" src="./images/User.png" alt="User Icon">
        </div>
        <div id="userType"><?php echo $_SESSION['username'];?></div>
        <div id="container__close" class="container__close">
            <button id="close-nav"><i class="fa-solid fa-xmark fa-lg"></i></button>
         </div>
    </div>
    <div class="wrapper__page-button">
        <div class="nav-bar__page-list">
            <ul id="myDiv">
                <li><a class="page-button" href="./Student_Dashboard.php"><span class="page-icon"><i class="fa-brands fa-trello"></i></span>Dashboard</a></li>
                <li><a class="page-button" href="./Student_Project.php"><span class="page-icon"><i class="fa-solid fa-briefcase"></i></span>Projects</a></li>
                <li><a class="page-button" href="./Student_Meeting.php"><span class="page-icon"><i class="fa-solid fa-calendar-days"></i></span>Meetings</a></li>
                <li><a class="page-button" href="./Student_Goals.php"><span class="page-icon"><i class="fa-solid fa-bullseye"></i></span>Goals</a></li>
                <li><a class="page-button" href="./Student_Assessment.php"><span class="page-icon"><i class="fa-solid fa-clipboard-list"></i></span>Assessment</a></li>
            </ul>
        </div>
        <div class="wrapper__sign-out">
            <?php echo '<a id="signout" href="'.$curPageName.'?logout="1"">Sign Out</a>';?>
            <!-- <a id="signout" href="login.php">Sign Out</a> -->
        </div>
    </div>
</div>