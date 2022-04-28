<?php
    require 'config.php';

    $titleErr = $descriptionErr = $datetimeErr =  $studentsErr = "";
    $successMssg = $errorMssg = $title =  $description = $datetime = $students = $sv_id = "";
    $errors = array();

    if (isset($_POST['add_goals'])) {
        // receive all input values from the form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $datetime = $_POST['datetime'];
        $students = $_POST['students'];
        $sv_id = $_SESSION['id'];

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($title)) {
            $titleErr = "Title is required!";
            array_push($errors, "Title is required!");
        }

        if (empty($description)) {
            $descriptionErr = "Please enter some descrption";
            array_push($errors, "Please enter some descrption");
        }

        if (empty($datetime)) {
            $datetimeErr = "Please choose the date and time for meeting!";
            array_push($errors, "Please choose the date and time for meeting!");
        }

        if (empty($students)) {
            $studentsErr = "Please select a student!";
            array_push($errors, "Please select a student!");
        }

        if (count($errors) === 0) {
            $query = "INSERT INTO goals(goal_title, goal_desc, due_date, sv_id)
                        VALUES ('$title','$description','$datetime', '$sv_id');";
            $run1 = mysqli_query($link, $query);

            if ($run1) {
                foreach ($students as $student) {
                    $query2 = "INSERT INTO student_goals(goals_id, stud_id) VALUES (LAST_INSERT_ID(), '$student');";
                    $run2 = mysqli_query($link, $query2);
                }

                if ($run2) {
                    $errorMssg = "yes";
                } else {
                    $errorMssg = "nope2";
                }

                $successMssg = "Add Goal Success!";
                header('location: Supervisor_Goals.php');
            } else {
                $errorMssg = "nope";
            }
        }
    }

    function displayGoalsCard($link) {
        $query = "SELECT goals_id, goal_title, goal_desc, due_date FROM goals 
                    WHERE sv_id = $_SESSION[id];";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $date = date_create($row['due_date']);

            $query2 = "SELECT sg.stud_id FROM goals g, student_goals sg , student s 
                        WHERE g.goals_id = sg.goals_id AND s.stud_id = sg.stud_id AND g.goals_id = $row[goals_id];";
            $result2 = mysqli_query($link, $query2);

            echo '<div class="card">';
                echo '<div>';
                    echo '<h3 class="card__title"><i class="fa-solid fa-square-pen icon card__icon"></i>'.$row['goal_title'].'</h3>';
                echo '</div>';
                echo '<p class="card_detail">Description: '.$row['goal_desc'].'</p>';
                echo '<p class="card_detail card__duedate">Duedate: '.date_format($date, 'l \, jS F Y \, g:i A').'</p>';
                echo '<p class="card_detail">Student:</p>';

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo '<p>'.$row2['stud_id'].'</p>';
                }
            echo '</div>';
        }
    }

    function displayStudents($link) {
        echo '<option value=""  disabled selected>Select Student..</option>';

        $query = "SELECT stud_id, concat(COALESCE(stud_fname,\"\"),\" \",COALESCE(stud_lname, \"\")) AS FullName FROM student WHERE sv_id = $_SESSION[id]";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'.$row['stud_id'].'">' .$row['stud_id']. ' - ' .$row['FullName']. '</option>';
        }
    }

    // $goals = $link->query("SELECT * FROM goal");

    // while ($goal = $goals->fetch_assoc()) {

    //     $goal_title = $goal['goal_title'];
    //     $description = $goal['goal_description'];
    //     $goal_duedate = $goal['goal_duedate'];
    //     $goal_status = $goal['goal_status'];
        
    //     $one = '<div class="card"><div><h3 class="card__title"><i class="fa-solid fa-bullseye icon card__icon"></i>';
    //     $two = '</h3></div><p class="card_detail">';
    //     $three = '</p><p class="card_detail card__duedate">';
    //     $four = '</p></div>';
    //     echo $one.$goal_title.$two.$description.$three.$goal_duedate.$four;
    // }
?>