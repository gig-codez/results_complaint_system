<?php
# here we are adding the connection functionality to this page
include("includes/connect.php");
session_start();
# here we check if our data is submited via the post
if (isset($_POST["submit"])) {

  
   
    $username = $_POST["username"];

    $password = $_POST["passcode"];
# this code below selects all the data in a table called users
    $sql =  "SELECT * FROM students WHERE student_name='$username' AND password='$password'";
   # here we execute the sql code and perform the database connection
    $query = mysqli_query($conn,$sql);
    if($query){

        $_SESSION["user"] = $username;

         $row = mysqli_fetch_assoc($query);

        $_SESSION["user_id"] = $row["id"];

        $_SESSION["dept"] = $row["dept"];
        if ($username == $row["student_name"] && $password == $row["password"]) {
            # code.
          header("location:dashboard.php");
        }else {
            header("location:../index.php");
        }
    }
}else{
    header("location:../index.php");
}
?>