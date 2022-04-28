<?php
    require 'config.php';

    $stud_id = $_SESSION['id'];

    function upcomingMeetingCard($link, $stud_id) {

        $query = "SELECT `meeting_title`, `meeting_desc`, `meeting_datetime`, `room_name` FROM `student_meeting` sm, `meeting` m, `meeting_room` mr 
                    WHERE sm.stud_id = $stud_id 
                        AND sm.meeting_id = m.meeting_id 
                        AND m.room_id = mr.room_id 
                        AND `meeting_datetime` >= CURRENT_TIMESTAMP 
                            ORDER BY m.meeting_datetime ASC;";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $date = date_create($row['meeting_datetime']);

            echo '<div class="card">';
                echo '<div>';
                    echo '<h3 class="card__title"><i class="fa-solid fa-square-pen card__icon"></i>'.$row['meeting_title'].'</h3>';
                echo '</div>';
                echo '<p>'.$row['meeting_desc'].'</p>';
                echo '<p>'.date_format($date, 'l \, jS F Y').'</p>';
                echo '<p>'.date_format($date, 'g:i A').'</p>';
                echo '<p>'.$row['room_name'].'</p>';
            echo '</div>';
        }
    }

    function pastMeetingCard($link, $stud_id) {

        $query = "SELECT `meeting_title`, `meeting_desc`, `meeting_datetime`, `room_name` FROM `student_meeting` sm, `meeting` m, `meeting_room` mr 
                    WHERE sm.stud_id = $stud_id 
                        AND sm.meeting_id = m.meeting_id 
                        AND m.room_id = mr.room_id 
                        AND `meeting_datetime` <= CURRENT_TIMESTAMP 
                            ORDER BY m.meeting_datetime DESC;";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $date = date_create($row['meeting_datetime']);
            echo '<div class="card">';
                echo '<div>';
                    echo '<h3 class="card__title"><i class="fa-solid fa-square-pen card__icon"></i>'.$row['meeting_title'].'</h3>';
                echo '</div>';
                echo '<p>'.$row['meeting_desc'].'</p>';
                echo '<p>'.date_format($date, 'l \, jS F Y').'</p>';
                echo '<p>'.date_format($date, 'g:i A').'</p>';
                echo '<p>'.$row['room_name'].'</p>';
            echo '</div>';
        }
    }

    function upcomingMeetingTable($link, $stud_id) {
        $query = "SELECT `meeting_title`, `meeting_desc`, `meeting_datetime`, `room_name` FROM `student_meeting` sm, `meeting` m, `meeting_room` mr 
                    WHERE sm.stud_id = $stud_id 
                        AND sm.meeting_id = m.meeting_id 
                        AND m.room_id = mr.room_id 
                        AND `meeting_datetime` >= CURRENT_TIMESTAMP 
                            ORDER BY m.meeting_datetime ASC;";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $date = date_create($row['meeting_datetime']);
            echo '<tr>';
                echo "<td>".$row['meeting_title']."</td>";
                echo "<td>".$row['meeting_desc']."</td>";
                echo "<td>".date_format($date, 'l \, jS F Y')."</td>";
                echo "<td>".date_format($date, 'g:i A')."</td>";
                echo "<td>".$row['room_name']."</td>";
            echo '<tr>';
        }
    }
?>