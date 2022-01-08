<?php 
session_start();
include("includes/header.php");
include("includes/connect.php");
?>

<body>
    <?php
        if (isset($_SESSION["ar"])) {
    ?>
    <div class="wrapper">
    
     <?php include("includes/sidebar.php");?>

        <div class="main-panel">
          <!-- navbar -->
          <?php include("includes/navbar.php");?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container">
                <div class="row">

                  <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <span class="nc-icon nc-paper-2"></span>
                                    <?php 
                                        $rt = mysqli_query($conn, "SELECT * FROM complaint_remarks WHERE deptId='".$_SESSION['user_id']."' AND status='rejected'");
                                    
                                        $num1 = mysqli_num_rows($rt);
                                    ?>
                                    <h3><?php echo htmlentities($num1);?></h3>
                                    <p>Complaints not Process yet</p>
                                </div>
                  		     </div>
                         </div>
                     </div>

                      <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                               <div>                      
                                    <center class="nc-icon nc-paper-2 text-xl-center"></center>
                                    <?php                   
                                        $rt2 = mysqli_query($conn, "SELECT * FROM complaint_remarks where deptId='".$_SESSION['ar_id']."' AND status='submit'");
                                        $nu = mysqli_num_rows($rt2);
                                        ?>
                                    <h3><?php echo htmlentities($nu);?></h3>
                                    <p> Complaints Status in process</p>
                                  </div>
                                </div>
                            </div>
                        </div>

                      <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                <h1 class="nc-icon nc-paper-2 text-xl-center"></h1>
                                    <?php      
                                            $rt3 = mysqli_query($conn, "SELECT * FROM complaint_remarks where deptId='".$_SESSION['user_id']."'");
                                            $nu3 = mysqli_num_rows($rt3);
                                    ?>
                                    <h3><?php echo htmlentities($nu3);?></h3>
                                    <p> Complaint has been closed</p>
                                        </div>
                            </div>
                        
                        </div>
                      </div>
                  	</div><!-- /row mt -->
                </div>	 
            </div>
            <?php include("includes/footer.php");?>
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
<?php include("includes/scripts.php"); ?>

</html>
