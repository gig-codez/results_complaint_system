<?php
    include("includes/connect.php");
    session_start();

    if (isset($_POST["submit"])) {

        $cs_name = $_POST["course_unit"];
// var_dump($cs_name);
        $st = $_POST["st_name"];

        $cs_work = $_POST["cw"];

        $exam_work = $_POST["exam_mark"];
      
        $final_work = $_POST["final_mark"];

        $dept = $_SESSION["dept"];
        
        $SQL ="INSERT INTO results (course_name,course_work,exam,final_mark,dept,student,approved)VALUES('$cs_name','$cs_work','$exam_work','$final_work','$dept','$st','rejected');";
       
        mysqli_query($conn,$SQL);

        // header("location:dashboard.php");

    } else {
        
    }
    

?>