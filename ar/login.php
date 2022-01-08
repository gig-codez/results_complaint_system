<?php
# here we are adding the connection functionality to this page
include("includes/connect.php");
session_start();
# here we check if our data is submited via the post
if (isset($_POST["submit"])) {

  
   
    $username = $_POST["username"];

    $password = $_POST["passcode"];
# this code below selects all the data in a table called users
    $sql =  "SELECT * FROM AR WHERE ar_name='$username' AND ar_pass='$password'";
   # here we execute the sql code and perform the database connection
    $query = mysqli_query($conn,$sql);

    if($query){

        $_SESSION["ar"] = $username;

         $row = mysqli_fetch_assoc($query);

        $_SESSION["ar_id"] = $row["id"];

        if ($username == $row["ar_name"] && $password == $row["ar_pass"]) {
            # code.
          header("location:dashboard.php");
        }else {
            header("location:index.php");
        }
    }
    header("location:dashboard.php");
}else{
    header("location:index.php");
}
?>