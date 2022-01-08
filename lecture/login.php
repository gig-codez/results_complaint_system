<?php
# here we are adding the connection functionality to this page
include("includes/connect.php");
session_start();
# here we check if our data is submited via the post
if (isset($_POST["submit"])) {

    $username = $_POST["username"];

    $password = $_POST["passcode"];
# this code below selects all the data in a table called users
    $sql =  "SELECT * FROM Lecturer WHERE lect_name='$username' AND lect_pass='$password'";
   # here we execute the sql code and perform the database connection
    $query = mysqli_query($conn,$sql);
    if($query){

        $_SESSION["lect"] = $username;

        $row = mysqli_fetch_assoc($query);

        $_SESSION["lect_id"] = $row["id"];

        $_SESSION["dept"] = $row["lect_dept"];

        if ($username == $row["lect_name"] && $password == $row["lect_pass"]) {
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