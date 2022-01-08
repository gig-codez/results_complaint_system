<?php
    session_start();
    include("includes/header.php");
    include("includes/connect.php");
    if (isset($_SESSION["user"])) {
    ?>

<body>
    <div class="wrapper">

       <?php include("includes/sidebar.php");?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include("includes/navbar.php");?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">My Results</h4>
                                    <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th>CourseName</th>
                                            <th>CourseWork</th>
                                            <th>Exam mark</th>
                                            <th>Final Grade</th>
                                            </tr>
                                           
                                            <!-- <th>Grade</th> -->
                                        </thead>
                                        <tbody>
                                           <?php
                                           $dp = $_SESSION["dept"];
                                             $data = mysqli_query($conn,"SELECT * FROM results WHERE dept='$dp' AND approved='resolved'");
                                        //  var_dump($conn);
                                             if (mysqli_num_rows($data) < 1) {
                                            echo("<tr>");
                                            echo("<td colspan='4'><center>No Record Founds!!!</center></td>");
                                            echo("</tr>");
                                          } else {
                                              
                                            while ($dt = mysqli_fetch_assoc($data)) {
                                                echo("<tr>");
                                                echo("<td>".$dt["course_name"]."</td>");
                                                echo("<td>".$dt["course_work"]."</td>");
                                                echo("<td>".$dt["exam"]."</td>");
                                                echo("<td>".$dt["final_mark"]."</td>");
                                                echo("</tr>");
                                            }
                                        }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php include("includes/footer.php");?>
        </div>
    </div>

</body>
<?php 
  }else {
    header("location:../index.php");
}
include("includes/scripts.php");?>

</html>
