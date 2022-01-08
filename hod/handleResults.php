<?php
    include("includes/connect.php");
    session_start();

    if (isset($_POST["submit"])) {

        $student = $_POST["std_name"];

        $approve = $_POST["manage"];
        $dept = $_SESSION["hod_id"];
        // var_dump($approve);
        $SQL ="UPDATE results SET approved='$approve', student='$student' WHERE dept='$dept';";
    //    var_dump($SQL);
        mysqli_query($conn,$SQL);

        header("location:dashboard.php");

    } else {
        
    }
    

?>