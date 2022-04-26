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
                        VALUES ('$title','$description', '$datetime', '$sv_id','$meeting_location')";
            mysqli_query($link, $query);

            $createMssg = "Create Meeting Success!";
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
        echo '<option value="">Select Student..</option>';

        $query = "SELECT stud_id, concat(COALESCE(stud_fname,\"\"),\" \",COALESCE(stud_lname, \"\")) AS FullName FROM student WHERE sv_id = $_SESSION[id]";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<option value="'.$row['stud_id'].'">' .$row['stud_id']. ' - ' .$row['FullName']. '</option>';
        }
    }
?>