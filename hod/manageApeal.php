<?php
    error_reporting(0);
    include("includes/connect.php");
   session_start();

   if (isset($_POST["submit"])) {

       $apealID = $_POST["apeal"];

       $state = $_POST["manage"];

       $course = $_POST["course"];

       $date = $_POST["date"];

       $sq = "INSERT INTO apealStatus (apealId,status,date) VALUES('$apealID','$state','$date')";
       mysqli_query($conn,$sq);

       mysqli_close($conn);
       
       header("location:view_apeal.php");
   }
?>