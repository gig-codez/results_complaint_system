<?php
error_reporting(0);
session_start();
    include("includes/connect.php");
if (isset($_POST["submit"])) {

    $cs_description = $_POST["details"];

    $cs_name = $_POST["course_unit"];

    $nature = $_POST["nature"];

    $deptId = $_SESSION["dept"];

    $userId = $_SESSION["user_id"];
# nature	course_name	reason	userId	deptId
    $sql = "INSERT INTO cases (nature,course_name,reason,userId,deptId)VALUES('$nature','$cs_name','$cs_description','$userId','$deptId');";
    mysqli_query($conn,$sql);
    if ($query) {
        $_SESSION["success"] = "Complaint submitted";
    }
    mysqli_close($conn);

    header("location:complaint.php");
}
?>