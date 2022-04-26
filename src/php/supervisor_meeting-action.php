<?php 
    require 'config.php';

    $titleErr = $descriptionErr = $datetimeErr = $meeting_locationErr = $studentsErr = "";
    $createMssg = $title =  $description = $datetime = $meeting_location = $students = $sv_id = "";
    $errors = array(); 

    if (isset($_POST['create_meeting'])) {
        // receive all input values from the form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $datetime = $_POST['datetime'];
        $meeting_location = $_POST['meeting_location'];
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

        if (empty($meeting_location)) {
            $meeting_locationErr = "Please choose the meeting location!";
            array_push($errors, "Please choose the meeting location!");
        }

        if (empty($students)) {
            $studentsErr = "Please select a student!";
            array_push($errors, "Please select a student!");
        }

        if (count($errors) === 0) {
            
            $query = "INSERT INTO meeting( meeting_title, meeting_desc, meeting_datetime, sv_id, room_id) 
                        VALUES ('$title','$description', '$datetime', $sv_id, $meeting_location);";
            
            $run1 = mysqli_query($link, $query);

            if ($run1) {
                $_SESSION['status'] = "first run ok";
                $createMssg = "Create Meeting Success!";
                header('location: Supervisor_Meeting.php');
            } else {
                $_SESSION['status'] = "first run barai";
                $createMssg = "fail!";
                header('location: Supervisor_Meeting.php');
            }

            if ($run1) {
                foreach ($students as $student) {
                    $query2 = "INSERT INTO `student_meeting`(`meeting_id`, `stud_id`) VALUES (LAST_INSERT_ID(),'$student');";
                    $run2 = mysqli_query($link, $query2);
                }

                $createMssg = "Create Meeting Success!";
                header('location: Supervisor_Meeting.php');

                if ($run2) {
                    $_SESSION['status'] = "2nd run ok";
                    $createMssg = "Create Meeting Success!";
                    header('location: Supervisor_Meeting.php');
                } else {
                    $_SESSION['status'] = "2nd run barai";
                    $createMssg = "fail!";
                    header('location: Supervisor_Meeting.php');
                }
            }
            // $createMssg = "Create Meeting Success!";
            // header('location: Supervisor_Meeting.php');
        }
    }

    function displayMeetingLocation($link) {
        echo '<option value="">Select Meeting Location..</option>';

        $query = "SELECT * FROM meeting_room";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row['room_id'].'">' .$row['room_name']. '</option>';
        }
    }

    function displayStudents($link) {
        echo '<option value=""  disabled selected>Select Student..</option>';

        $query = "SELECT stud_id, concat(COALESCE(stud_fname,\"\"),\" \",COALESCE(stud_lname, \"\")) AS FullName FROM student WHERE sv_id = $_SESSION[id]";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row['stud_id'].'">' .$row['stud_id']. ' - ' .$row['FullName']. '</option>';
        }
    }

    function upcomingMeeting($link) {

        $query = "SELECT `meeting_title`, `meeting_desc`, `meeting_datetime`, `room_name` FROM meeting m, meeting_room mr 
                    WHERE m.room_id = mr.room_id AND sv_id = $_SESSION[id] AND `meeting_datetime` >= CURRENT_TIMESTAMP
                    ORDER BY m.meeting_datetime ASC;";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_array($result)) {
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

    function pastMeeting($link) {

        $query = "SELECT `meeting_title`, `meeting_desc`, `meeting_datetime`, `room_name` FROM meeting m, meeting_room mr 
                    WHERE m.room_id = mr.room_id AND sv_id = $_SESSION[id] AND `meeting_datetime` <= CURRENT_TIMESTAMP
                    ORDER BY m.meeting_datetime DESC;;";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_array($result)) {
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