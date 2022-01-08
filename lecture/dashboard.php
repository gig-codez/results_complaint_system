<?php 
session_start();
include("includes/header.php");
include("includes/connect.php");
?>

<body>
    <?php
        if (isset($_SESSION["lect"])) {
    ?>
    <div class="wrapper">
    
     <?php include("includes/sidebar.php");?>

        <div class="main-panel">
          <!-- navbar -->
          <?php include("includes/navbar.php");?>
            <!-- End Navbar -->
            <div class="content">
            <div class="row">
                  <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body col-sm-2 box0">
                                <div class="box1">
                                    <span class="li_news"></span>
                                    <?php 
                                        $rt = mysqli_query($conn, "SELECT * FROM cases where userId='".$_SESSION['user_id']."' and status='null'");
                                    
                                        $num1 = mysqli_num_rows($rt);
                                    ?>
                                    <h3>
                                    <!-- <?php //echo htmlentities($num1);?> -->
                                </h3>

                                </div>
                                    <p>
                                    <?php //echo htmlentities($num1);?> Complaints not Process yet</p>
                  		        </div>
                        </div>

                      <div class="col-md-8 card">
                        <div class="box1">
                             <span class="li_news"></span>
                            <?php 
                                $status="in Process";                   
                                $rt = mysqli_query($conn, "SELECT * FROM cases where userId='".$_SESSION['user_id']."' and  status='$status'");
                                $num1 = mysqli_num_rows($rt);
                                ?>
                   <h3><?php //echo htmlentities($num1);?></h3>

                        </div>
                   <p><?php// echo //htmlentities($num1);?> Complaints Status in process</p>
                      </div>
  <?php //}?>
                      <div class="col-md-8 card">
                        <div class="box1">
                  <span class="li_news"></span>
                       <?php
                            $status="closed";                   
                            $rt = mysqli_query($conn, "SELECT * FROM cases where userId='".$_SESSION['user_id']."' and  status='$status'");
                            $num1 = mysqli_num_rows($rt);
                      ?>
                  <h3>
                      <?php //echo htmlentities($num1);?></h3>
                        </div>
                  <p><?php //echo htmlentities($num1);?> Complaint has been closed</p>
                      </div>

            <?php //}?>
                  	</div><!-- /row mt -->	 
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
