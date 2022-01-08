<?php
session_start();
    include("includes/header.php");
    include("includes/connect.php");

?>
<body>
    <div class="wrapper">
    <?php
            if (isset($_SESSION["hod"])) {
                include("includes/sidebar.php");
        ?>
    <div class="wrapper">
    
    <?php include("includes/sidebar.php");?>

       <div class="main-panel">
         <!-- navbar -->
         <?php include("includes/navbar.php");?>
           <!-- End Navbar -->

           <!-- table -->
           <br>
           <div class="container">
               <div class="row">

                   <!-- appeal view -->
               <div class="col-md-6">
                   <div class="card">
                        <div class="card-header">
                            <center class="card-title">Available results to be approved</center>
                        </div>
               <!-- <div class=""> -->
                <div class=" card-body table-responsive">
                        <table border='2' class="table">
                    <tr>
                        <th>Student name</th>
                        <th>Approval Status</th>
                    </tr>
                        <?php
                        $dId = $_SESSION["hod_id"];
                        $query = mysqli_query($conn,"SELECT * FROM results WHERE dept='$dId' AND approved='rejected'");
                    //    var_dump($query);
                        if (mysqli_num_rows($query) < 1) {
                            echo("<tr>"); 
                            echo("<td> <center>No Results found</center></td>");
                            echo("<tr>");
                        } else {
                             
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo("<tr>");
                            echo("<td>".$row["student"]."</td>");
                            echo("<td>".$row["approved"]."</td>");
                            echo("</tr>");
                        }
                        }
                      
                    ?>
              </table>
                      <!-- </div> -->
                      </div>
                    </div>
                 </div>
                <!-- end table -->

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="handleResults.php" method="post">
                                    <div class="form-group">
                                        <label for="">Student Name</label>

                                            <select name="std_name" class="form-control">
                                                <option value="">Select Appeal</option>
                                                <?php
                                                    $dep = $_SESSION["hod_id"];
                                                    $opt = mysqli_query($conn,"SELECT * FROM students WHERE dept='$dep'");
                                                    while ($lop = mysqli_fetch_assoc($opt)) {
                                                    echo("<option value='".$lop["student_name"]."'>".$lop["student_name"]."</option>");
                                                    }
                                            ?>
                                            </select>
                                          </div>


                                    <div class="form-group">
                                        <label for="">Manage results</label>
                                        <select class="form-control" name="manage">
                                            <option value="rejected">Rejected</option>
                                            <option value="resolved">Approved</option>
                                            <!-- <option value=""></option> -->
                                        </select>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="">Course Unit</label>
                                        <?php
                                            //  $p = $_SESSION["hod_id"];
                                            // //  var_dump($p);
                                            //  $pt = mysqli_query($conn,"SELECT * FROM apeal WHERE dept_name='$p'");
                                            // $fl = mysqli_fetch_assoc($pt);
                                        ?>
                                           <input type="text" name="course" value="<?php //echo htmlentities($fl["course_name"]);?>" class="form-control">
                                    </div> -->


                                    <!-- <div class="form-group">
                                        <label for="">Date of approval</label>
                                        <input type="date" name="date" class="form-control">
                                    </div> -->

                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Approve results" class="btn btn-primary-outline btn-block">
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
           </div>
              
            </div>
        </div>
    </div>
    <?php
        }else {
            header("location:index.php");
        }
    ?>
</body>
