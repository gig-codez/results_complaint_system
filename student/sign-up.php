<?php
# here we are adding the connection functionality to this page
include("includes/connect.php");
session_start();
# here we check if our data is submited via the post
if (isset($_POST["submit"])) {

    $username = $_POST["st_name"];

    $deptID = $_POST["st_reg"];

    $course = $_POST["st_cs"];

    $password = $_POST["st_pass"];
# this code below selects all the data in a table called users
    $sql =  "INSERT INTO students ()VALUES('$username','$deptID','$password')";
   # here we execute the sql code and perform the database connection
    $query = mysqli_query($conn,$sql);
    if($query){
        $_SESSION["lect"] = $username;
        
        $_SESSION["id"] = $deptID;
    }
    header("location:../index.php");
}else{
    header("location:signview.php");
}
?>