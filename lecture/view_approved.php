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
                        $id = $_SESSION["lect_dept"];
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="manageApeal.php" method="post">
                                    <div class="form-group">
                                        <label for="">Choose appeal</label>
                                            <select name="apeal" class="form-control">
                                                <option value=""></option>
                                            </select>
                                          </div>
                                    <div class="form-group">
                                        <label for="">Manage Appeal</label>
                                        <select class="form-control" name="manage">
                                            <option value="rejected">Rejected</option>
                                            <option value="approved">Approved</option>
                                            <!-- <option value=""></option> -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Date of approval</label>
                                        <input type="date" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Manage Appeal" class="btn btn-primary-outline btn-block">
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
