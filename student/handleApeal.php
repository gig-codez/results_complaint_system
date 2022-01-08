<?php
    include("includes/connect.php");
    session_start();

    if (isset($_POST["submit"])) {

        // var_dump($_POST);
        $course = $_POST["course"];

        $nature = $_POST["nature"];

        $details = $_POST["details"];

        $dept =  $_SESSION["dept"];

        $userId =  $_SESSION["user_id"];
        # userId	nature	reason	course_name	dept_name
        $sql ="INSERT INTO apeal (userId,nature,reason,course_name,dept_name)VALUES('$userId','$nature','$details','$course','$dept');";
    //    var_dump($sql);
       $query = mysqli_query($conn,$sql);
var_dump($query);
        header("location:appeal.php");

    } else {
        
    }
    

?>