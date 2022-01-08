<?php
# here we are adding the connection functionality to this page
include("includes/connect.php");
session_start();
# here we check if our data is submited via the post
if (isset($_POST["submit"])) {

    $username = $_POST["username"];

    $deptID = $_POST["dept"];

    $password = $_POST["passcode"];
# this code below selects all the data in a table called users
    $sql =  "INSERT INTO Lecturer(lect_name,lect_pass,lect_dept)VALUES('$username','$deptID','$password')";
   # here we execute the sql code and perform the database connection
    $query = mysqli_query($conn,$sql);
    if($query){
        $_SESSION["lect"] = $username;
        
        $_SESSION["id"] = $deptID;
    }
    header("location:dashboard.php");
}else{
    header("location:signview.php");
}
?>