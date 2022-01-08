<?php
    $conn = mysqli_connect("localhost","root","","results_complaint");
    if (!$conn) {
        echo("Error ".mysqli_connect_error($conn));
    }else {
        
        // echo("Connected");
    }
?>