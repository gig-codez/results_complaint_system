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
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <h4 class="title">File a complaint</h4>
                                            <!-- <p class="category">Are you looking for more components? Please check our Premium Version of Light Bootstrap Dashboard.</p> -->
                                            <br>
                                        </div>
                                        <!-- <div class="content table-responsive table-upgrade"> -->
                            <form class="card-body" action="handlecomplaint.php" method="post" name="complaint">
                                    <div class="form-group">
                                        <label class="control-label">Select Course unit</label>
                                        <select name="course_unit" class="form-control" >
                                            <option value="">Select course unit</option>
                                          <?php
                                        $dep = $_SESSION["dept"];
                                            $opt = mysqli_query($conn,"SELECT * FROM courses WHERE dept='$dep'");
                                            while ($lop = mysqli_fetch_assoc($opt)) {
                                                echo("<option value='".$lop["id"]."'>".$lop["course_name"]."</option>");
                                                }
                                            ?>
                                        </select>
                                    </div>

                            <div class="form-group">
                                    <label class="control-label">Nature of Complaint</label>
                                    <select name="nature" required="required" class="form-control">
                                        <option value="">Select nature of Complaint</option>
                                        <option value="Missing Marks">Missing Marks</option>
                                        <option value="Missing Course Work">Missing Course Work</option>
                                        <option value="Miss Counting">Miss Counting</option>
                                    </select>
                            </div>

                        <div class="form-group">
                            <label class="control-label">Complaint Details (max 2000 words) </label>
                            <textarea  name="details" required="required" cols="20" rows="10" class="form-control" maxlength="2000"></textarea>
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
    }else {header("location:../index.php");}

?>

</html>
