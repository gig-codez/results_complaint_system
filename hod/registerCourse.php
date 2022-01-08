<?php
    error_reporting(0);
    include("includes/connect.php");
   session_start();

   if (isset($_POST["submit"])) {

       $course = $_POST["course"];

       $deptId = $_SESSION["hod_dept"];

       $sq = "INSERT INTO courses (course_name,dept) VALUES('$course','$deptId')";

       mysqli_query($conn,$sq);

       mysqli_close($conn);
       
       header("location:view_apeal.php");
   }
   
?>