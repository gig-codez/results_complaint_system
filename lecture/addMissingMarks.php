<?php
    session_start();
    include("includes/header.php");
    include("includes/connect.php");
   
?>
<body>
    <div class="wrapper">
    <?php
            if (isset($_SESSION["lect"])) {
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
                            <center class="card-title">Approved complaints</center>
                        </div>
               <!-- <div class=""> -->
                <div class=" card-body table-responsive">
                        <table class="table">
                    <tr>
                        <th>Complaint</th>
                        <th>Status</th>
                    </tr>
                        <?php
                        $id = $_SESSION["dept"];
                        // var_dump($id);
                        $query = mysqli_query($conn,"SELECT * FROM complaint_remarks WHERE status='approved' and deptId='$id'");
                        if (mysqli_num_rows($query) < 1) {
                            echo("<tr>"); 
                            echo("<td colspan='2'> <center>No Results found</center></td>");
                            echo("<tr>");
                        } else {
                            $exe = mysqli_query($conn,"SELECT * FROM cases WHERE deptId='$id'");
                        while ($row = mysqli_fetch_assoc($exe)) {
                            echo("<tr>");
                            $qy = mysqli_query($conn,"SELECT * FROM students WHERE id='".$row["userId"]."'");
                            $tg = mysqli_fetch_assoc($qy);
                            echo("<td>".$tg["student_name"]."</td>");
                            // echo("<td>".$row["reason"]."</td>");
                            echo("<td>".$row["status"]."</td>");

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
                        <div class="card-header">
                            <h4 class="card-title">Add Missing Marks</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="missing.php" method="post">
                                    <div class="form-group">
                                        <label for="">Choose Course Unit</label>
                                            <select name="course_unit" class="form-control">
                                                <option value="">Choose course unit</option>
                                                <?php
                                                  $dp = $_SESSION["dept"];
                                                  $pt = mysqli_query($conn,"SELECT * FROM courses WHERE dept='$dp'");
                                                  var_dump($dp);
                                                  while ($lp = mysqli_fetch_assoc($pt)) {
                                                      echo("<option value='".$lp["course_name"]."'>".$lp["course_name"]."</option>");
                                                      }
                                                  ?>
                                            
                                            </select>
                                          </div>
<!-- course_name	course_work	exam	final_mark	dept	student -->
                                          <div class="form-group">
                                        <label for="">Student Name</label>
                                       <select name="student" class="form-control">
                                       <?php
                                        $dep = $_SESSION["dept"];
                                            $opt = mysqli_query($conn,"SELECT * FROM students WHERE dept='$dep'");
                                            while ($lop = mysqli_fetch_assoc($opt)) {
                                                echo("<option value='".$lop["student_name"]."'>".$lop["student_name"]."</option>");
                                                }
                                            ?>
                                       </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Course Work Mark</label>
                                        <?php
                                            $mcw = mysqli_query($conn,"SELECT * FROM results WHERE dept='$id'");
                                        // var_dump($mcw);
                                            $res = mysqli_fetch_assoc($mcw);
                                           
                                        ?>
                                       <input type="text" value="<?php echo htmlentities($res["course_work"]);?>" name="course_mark" id="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Exam  Mark</label>
                                       <input type="text" value="<?php echo htmlentities($res["exam"]);?>" name="exam_mark" id="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Final Mark</label>
                                       <input type="text" name="final_mark" value="<?php echo htmlentities($res["final_mark"]);?>" id="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Add Missing Mark" class="btn btn-primary-outline btn-block">
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
