<?php 
session_start();

include("includes/header.php");
include("includes/connect.php");

    if (isset($_SESSION["lect"])) {
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
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <h4 class="title">Add student results</h4>
                                            <br>
                                        </div>
                            <form class="card-body" action="results.php" method="post" name="complaint">
                                    <div class="form-group">
                                        <label class="control-label">Select Course unit</label>
                                        <select name="course_unit" class="form-control" >
                                            <option value="">Select course unit</option>
                                          <?php
                                        $dep = $_SESSION["dept"];
                                            $opt = mysqli_query($conn,"SELECT * FROM courses WHERE dept='$dep'");
                                            while ($lop = mysqli_fetch_assoc($opt)) {
                                                echo("<option value='".$lop["course_name"]."'>".$lop["course_name"]."</option>");
                                                }
                                            ?>
                                        </select>
                                    </div>

                            <div class="form-group">
                                    <label class="control-label">Student name</label>
                                    <input type="text" name="st_name" required="required" value="" required="required" class="form-control">
                            </div>

                            <div class="form-group">
                            <label class="control-label">Course Work</label>
                            <input type="text" name="cw" required="required" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Exam mark</label>
                            <input type="text" name="exam_mark" required="required" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Final mark</label>
                            <input type="text" name="final_mark" required="required" class="form-control" required/>
                        </div>
        
                        <div class="form-group">
                                <!-- <div class="" style="padding-left:25% "> -->
                                <input type="submit" name="submit" class="btn-block form-control btn btn-primary" value="Submit"/>
                            <!-- </div> -->
                                </div>
                                </form>
                          <!-- </div> -->
                          </div>
                          </div>  
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>

    <?php include("includes/footer.php");?>

                        </div>
                    </div>
                   

            </div>

        </div>
        
</body>

<?php 
    }else {header("location:index.php");}

?>

</html>
