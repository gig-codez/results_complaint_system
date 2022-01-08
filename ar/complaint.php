<?php
session_start();
    include("includes/header.php");
    include("includes/connect.php");

?>
<body>
    <div class="wrapper">
    <?php
            if (isset($_SESSION["ar"])) {
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
                            <center class="card-title">Available Complaints</center>
                        </div>
               <!-- <div class=""> -->
                <div class=" card-body table-responsive">
                        <table class="table">
                    <tr>
                        <th>Complaint</th>
                        <th>Status</th>
                    </tr>
                        <?php
                        $di = $_SESSION["ar_id"];
                        $query = mysqli_query($conn,"SELECT * FROM cases WHERE deptId='$di'");
                        if (mysqli_num_rows($query) < 1) {
                            echo("<tr>"); 
                            echo("<td colspan='2'> <center>No Results found</center></td>");
                            echo("<tr>");
                        } else {
                             
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo("<tr>");
                            $qy = mysqli_query($conn,"SELECT * FROM students WHERE id='".$row["userId"]."'");
                            $tg = mysqli_fetch_assoc($qy);
                            echo("<td>".$tg["student_name"]."</td>");
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
                                <form action="manageComplaint.php" method="post">
                                <div class="form-group">
                                        <label for="">Choose appeal</label>
                                            <select name="apeal" class="form-control">
                                                <option value="">Choose Appeal</option>
                                                <?php
                                                    $dep = $_SESSION["ar_id"];
                                                    // var_dump($dep);
                                                    $opt = mysqli_query($conn,"SELECT * FROM cases WHERE deptId='$dep'");
                                                    while ($lop = mysqli_fetch_assoc($opt)) {
                                                    echo("<option value='".$lop["id"]."'>".$lop["course_name"]."</option>");
                                                    }
                                            ?>
                                            </select>
                                          </div>


                                    <div class="form-group">
                                        <label for="">Course Unit</label>
                                        <?php
                                             $p = $_SESSION["ar_id"];
                                            //  var_dump($p);

                                             $pt = mysqli_query($conn,"SELECT * FROM cases WHERE deptId='$p'");
                                            $fl = mysqli_fetch_assoc($pt);
                                        ?>
                                           <input type="text" name="course" value="<?php echo htmlentities($fl["course_name"]);?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Handle Complaint</label>
                                        <select class="form-control" name="manage">
                                            <option value="rejected">Rejected</option>
                                            <option value="approved">Approved</option>
                                            <!-- <option value=""></option> -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Date of approval</label>
                                        <input type="date" name="date" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Submit" class="btn btn-primary-outline btn-block">
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
