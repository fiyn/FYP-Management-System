<?php include('./php/logout-action.php') ?>
<?php include('./php/supervisor_goals-action.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/nav-bar.css">
    <link rel="stylesheet" href="./css/supervisor_goals.css">
    <link rel="stylesheet" href="./css/hamburger.css">
    <script src="https://kit.fontawesome.com/3d7a902bb5.js" crossorigin="anonymous"></script>
    <script src="./js/supervisor_goals.js"></script>
    <script src="./js/nav-bar.js"></script>
    <script src="./js/hamburger.js"></script>
    <title>Goals</title>
</head>
<body>
    <?php include 'includes/../php/supervisor_nav-bar.inc.php'; ?>    
    <?php include 'includes/../php/hamburger.inc.php'; ?>
    <?php 
    // include 'php/supervisor_goals.php'; 
    ?>

    <div id="goalsContainer" class="container__content">
        <?php echo $errorMssg;?>
        <div class="container__goals">
            <h1 class="content-title">Goals</h1>
            <div class="wrapper__button">
                <div>
                    <button id="goalsBtn" class="button button-active">Goals</button>
                </div>
                <div>
                    <button id="addGoalsBtn" class="button button-add"><span class="icon"><i class="fa-solid fa-plus"></i></span></i>Add Goal</button>
                </div>
            </div>
            <hr>
            <div id="goalsList" class="content__goals">
                <div class="goals-list">
                    <div>
                        <h3 class="goals-list__header">Goals List</h3>
                    </div>
                    <div class="container__card--goals">
                        <?php displayGoalsCard($link);?>
                    </div>
                    
                </div>

                <div class="container__progress">
                    <h2 class="title">Student Progress</h2>
                    <div class="container__table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Progress</th>
                                    <th>Set Progress</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Albert Lim</td>
                                    <td>
                                        <progress class="progress-bar" id="progress1" max="100" value="90"></progress>
                                    </td>
                                    <td>
                                        <input class="progress" type="number" min="0" max="100" name="">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Chris Rock</td>
                                    <td>
                                        <progress class="progress-bar" max="100" value="25"></progress>
                                    </td>
                                    <td>
                                        <input class="progress" type="number" min="0" max="100" name="" id="" >
                                    </td>
                                    <td>
                                </tr>

                                <tr>
                                    <td>CWK</td>
                                    <td>
                                        <progress class="progress-bar" max="100" value="55"></progress>
                                    </td>
                                    <td>
                                        <input class="progress" type="number" min="0" max="100" name="" id="" >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="container__progress-button">
                        <button id="set-progress" class="table-edit-button">
                            <span class="icon table-edit-icon">
                            <i class="fa-solid fa-floppy-disk"></i>
                            </span>
                            Save
                        </button>
                    </div>
                </div>
            </div>

            <div id="addGoals" class="content__goals--add hidden">
                <form action="Supervisor_Goals.php" method="POST" class="form form__goals--add">
                    <h3 class="form__title">Add Goal</h3>
                    <div class="form__message form__message--success"><?php echo $successMssg;?></div>
                    <div class="form__message form__message--error"><?php echo $errorMssg;?></div>

                    <div class="form__input-group">
                        <label class="form__input-label" for="title">Title</label><br>
                        <i class="fa-solid fa-square-pen form__input-icon"></i>
                        <input type="text" id="title" name="title" class="form__input" autofocus placeholder="Enter goal's title...">
                        <div class="form__input-error-message"><?php echo $titleErr;?></div>
                    </div>

                    <div class="form__input-group">
                        <label class="form__input-label" for="description">Description</label><br>
                        <div class="container__dropdown">
                            <i class="fa-solid fa-file-lines form__input-icon"></i>
                            <textarea name="description" id="description" class="form__textarea" cols="30" rows="10" placeholder="Enter Goals Description...."></textarea>
                        </div>
                        <div class="form__input-error-message"><?php echo $descriptionErr;?></div>
                    </div>
                    
                    <div class="form__input-group">
                        <label class="form__input-label" for="datetime">Due Date and Time</label><br>
                        <i class="fa-solid fa-calendar-days form__input-icon"></i>
                        <input name="datetime" type="datetime-local" id="datetime" class="form__input" autofocus>
                        <div class="form__input-error-message"><?php echo $datetimeErr;?></div>
                    </div>

                    <div class="">
                        <label class="form__input-label" for="students">Assign to</label><br>
                        <i class="fa-solid fa-users form__input-icon"></i>
                        <select name="students[]" id="students" multiple>
                            <?php displayStudents($link);?>
                            <!-- <option>Select Students</option>
                            <option value="1">Sam</option>
                            <option value="2">Oliver</option>
                            <option value="3" >Student Name 3</option> -->
                        </select>
                        <div class="form__input-error-message"><?php echo $studentsErr;?></div>
                    </div>

                    <div class="container__button">
                        <button name="add_goals" id="submitGoal" class="form__button form__button--create" type="submit"><span class="icon"><i class="fa-solid fa-circle-plus"></i></span>Add</button>
                        <button class="form__button form__button--clear" type="reset" value="Clear Form"><span class="icon"><i class="fa-solid fa-delete-left"></i></span>Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>