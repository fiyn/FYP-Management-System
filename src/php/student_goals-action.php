<?php
    require 'config.php';

    function displayGoalsCard($link) {
        $query = "SELECT goal_title, goal_desc, due_date FROM goals g, student_goals sg 
                        WHERE g.goals_id = sg.goals_id AND sg.stud_id = $_SESSION[id];";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $date = date_create($row['due_date']);
            echo '<div class="card">';
                echo '<div>';
                    echo '<h3 class="card__title"><i class="fa-solid fa-square-pen icon card__icon"></i>'.$row['goal_title'].'</h3>';
                echo '</div>';
                echo '<p class="card_detail">Description: '.$row['goal_desc'].'</p>';
                echo '<p class="card_detail card__duedate">Duedate: '.date_format($date, 'l \, jS F Y \, g:i A').'</p>';
            echo '</div>';
        }
    }
?>