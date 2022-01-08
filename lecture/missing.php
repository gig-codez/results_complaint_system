<?php
    include("includes/connect.php");
    session_start();

    if (isset($_POST["submit"])) {

        $cs_name = $_POST["course_unit"];
        var_dump($cs_name);
        $st = $_POST["student"];

        $cs_work = $_POST["course_mark"];

        $exam_work = $_POST["exam_mark"];
      
        $final_work = $_POST["final_mark"];

        $dept = $_SESSION["dept"];
        
        $SQL ="UPDATE results SET course_name='$cs_name', course_work='$cs_work', exam='$exam_work', final_mark='$final_work',student='$st' WHERE dept='$dept';";
       
        mysqli_query($conn,$SQL);

        // header("location:dashboard.php");

    } else {
        
    }
    

?>