<?php
    session_start();
    include("includes/connect.php");
    include("includes/header.php");
?>
<body>
    <div class="wrapper">
       <?php include("includes/sidebar.php");
    if (isset($_SESSION["user"])){
       ?>
        <div class="main-panel">
            <!-- navbar -->
        <?php include("includes/navbar.php");?>
            <!-- End Navbar -->
            
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Apply for Apeal</h4>
                                    <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                                </div>
                                <div class="card-body">
                                <form class="form-horizontal style-form" action="handleApeal.php" method="post" name="complaint">
                        <div class="form-group">
                            <label class="control-label">Select Course unit</label>
                            <select name="course" id="subcategory" class="form-control" >
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
                            <!-- <input type="text" name="nature" required="required" value="" required="" class="form-control"> -->
                            <select name="nature" required="required" class="form-control">
                                        <option value="">Select nature of Complaint</option>
                                        <option value="Missing Marks">Missing Marks</option>
                                        <option value="Missing Course Work">Missing Course Work</option>
                                        <option value="Miss Counting">Miss Counting</option>
                                    </select>
                        </div>

                            <div class="form-group">
                                <label class="control-label">Complaint Details (max 2000 words) </label>
                                <textarea  name="details" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                            </div>
            
                   <div class="form-group">
                          <div class="col-md-10" style="padding-left:25% ">
                    <input  type="submit" name="submit" class="form-control btn btn-block btn-primary" value="Submit"/>
                    </div>
                        </div>
                          </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php 
            }else {
                header("location:../index.php");
            }
            include("includes/footer.php");?>
        </div>
    </div>
</body>
<?php include("includes/scripts.php");?>

</html>
