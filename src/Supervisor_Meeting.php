<?php include('./php/logout-action.php') ?>
<?php include('./php/supervisor_meeting-action.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/supervisor_meeting.css">
    <link rel="stylesheet" href="./css/hamburger.css">
    <script src="https://kit.fontawesome.com/3d7a902bb5.js" crossorigin="anonymous"></script>
    <script src="./js/supervisor_meeting.js"></script>
    <script src="./js/nav-bar.js"></script>
    <script src="./js/hamburger.js"></script>
    <title>Meetings</title>
</head>
<body>
    <?php include 'includes/../php/supervisor_nav-bar.inc.php'; ?>
    <?php include 'includes/../php/hamburger.inc.php'; ?>

    <div class="container__content">
        <?php 
            // echo $_SESSION['status'];
            echo $createMssg;
        ?>
        <div class="container__meeting">
            <h1 class="content-title">Meetings</h1>
            <div class="wrapper__button">
                <div class="button--left-group">
                    <div>
                        <button id="upcomingBtn" class="button button-active">Upcoming</button>
                    </div>
                    <div>
                        <button id="pastBtn" class="button">Past</button>
                    </div>
                </div>
                <div class="button--right-group">
                    <div>
                        <button id="createMeetingBtn" class="button button-add"><span class="icon"><i class="fa-solid fa-plus"></i></span></i>Create Meeting</button>
                    </div>
                </div>
            </div>
            <hr>
            
            <div id="upcomingTable" class="card card__upcoming">
                <h3 class="title">Upcoming Meeting</h3>
                <div class="container__table">
                    <table class="table table-upcoming">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Location</th>
                                <!-- <th>Student</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php upcomingMeeting($link);?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="pastTable" class="card card__past hidden">
                <h3 class="title">Past Meeting</h3>
                <div class="container__table">
                    <table class="table table-past">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Location</th>
                                <!-- <th>Participants</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php pastMeeting($link);?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="createMeeting" class="card card__create-meeting hidden">
                <form  action="Supervisor_Meeting.php" method="POST" class="form form__create--meeting ">
                    <h3 class="form__title">Create a Meeting</h3>
                    <div class="form__message form__message--success"><?php echo $createMssg; ?></div>
                    <div class="form__message form__message--error"></div>
        
                    <div class="form__input-group">
                        <label class="form__input-label" for="title">Title</label><br>
                        <i class="fa-solid fa-square-pen form__input-icon"></i>
                        <input name="title" type="text" id="title" class="form__input" autofocus placeholder="Enter meeting title...">
                        <div class="form__input-error-message"><?php echo $titleErr;?></div>
                    </div>

                    <div class="form__input-group">
                        <label class="form__input-label" for="description">Description</label><br>
                        <div class="container__dropdown">
                            <i class="fa-solid fa-file-lines form__input-icon"></i>
                            <textarea name="description" id="description" class="form__textarea" cols="30" rows="10" placeholder="Enter Meeting Description...."></textarea>
                        </div>
                        <div class="form__input-error-message"><?php echo $descriptionErr;?></div>
                    </div>
                    
                    <div class="form__input-group">
                        <label class="form__input-label" for="datetime">Date and Time</label><br>
                        <i class="fa-solid fa-calendar-days form__input-icon"></i>
                        <input name="datetime" type="datetime-local" id="datetime" class="form__input" autofocus>
                        <div class="form__input-error-message"><?php echo $datetimeErr;?></div>
                    </div>

                    <div class="form__input-group">
                        <label class="form__input-label" for="meeting_location">Location</label><br>
                        <div class="container__dropdown">
                            <i class="fa-solid fa-location-dot form__input-icon"></i>
                            <select name="meeting_location" id="meeting_location">
                                <?php displayMeetingLocation($link);?>
                                <!-- <option value="500">FCI Room 122</option> -->
                            </select>
                        </div>
                        <div class="form__input-error-message"><?php echo $meeting_locationErr;?></div>
                    </div>

                    <div class="">
                        <label class="form__input-label" for="students">Students</label><br>
                        <div class="container__dropdown">
                            <i class="fa-solid fa-users form__input-icon"></i>
                            <select name="students[]" id="students" multiple>
                                <?php displayStudents($link);?>
                                <!-- <option value="200">Sam</option> -->
                            </select>
                        </div>
                        <div class="form__input-error-message"><?php echo $studentsErr;?></div>
                    </div>
                    
                    <div class="container__button">
                        <button class="form__button form__button--create" type="submit" name="create_meeting"><span class="icon"><i class="fa-solid fa-circle-plus"></i></span>Create</button>
                        <button class="form__button form__button--clear" type="reset" value="Clear Form"><span class="icon"><i class="fa-solid fa-delete-left"></i></span>Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>