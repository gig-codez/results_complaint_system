<?php 
session_start();

include("includes/header.php");
include("includes/connect.php");

    if (isset($_SESSION["hod"])) {
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
                            <form class="card-body" action="registerCourse.php" method="post" name="complaint">
                                    <div class="form-group">
                                        <label class="control-label">Course name</label>
                                        <input type="text" name="course" id="" class="form-control">
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
