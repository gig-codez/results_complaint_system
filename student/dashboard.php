<?php 
session_start();
include("includes/header.php");
include("includes/connect.php");
?>

<body>
    <?php
        if (isset($_SESSION["user"])) {
    ?>
    <div class="wrapper">
    
     <?php include("includes/sidebar.php");?>

        <div class="main-panel">
          <!-- navbar -->
          <?php include("includes/navbar.php");?>
            <!-- End Navbar -->
            <div class="content">
            <div class="row">
                  <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                    <span class="li_news"></span>
                                    <?php 
                                        $rt = mysqli_query($conn, "SELECT * FROM cases where userId='".$_SESSION['user_id']."' and status is null");
                                        $nul = mysqli_num_rows($rt);
                                    ?>
                                    <h3><?php echo htmlentities($nul);?></h3>
                                     <p>Complaints submited</p>
                                </div>
                        </div>

                      <div class="col-md-8">
                        <div class="card">
                             <div class="card-body">
                            <?php 
                                $status="in Process";                   
                                $rt = mysqli_query($conn, "SELECT * FROM cases where userId='".$_SESSION['user_id']."' and  status='$status'");
                                $prog = mysqli_num_rows($rt);
                                ?>
                   <h3><?php echo htmlentities($prog);?></h3>
                   <p> Complaints resolved</p>

                        </div>
                   </div>
             </div>

                 <div class="col-md-8">
                     <div class="card">
                        <div class="card-body">
                                <?php
                                        $status="closed";                   
                                        $rt = mysqli_query($conn, "SELECT * FROM cases where userId='".$_SESSION['user_id']."' and  status='$status'");
                                        $closed = mysqli_num_rows($rt);
                                ?>
                                 <h3><?php echo htmlentities($closed);?></h3>
                             <p> Complaint terminated</p>
                        </div>
                      </div>
                  	</div><!-- /row mt -->	 
            </div>
            <?php include("includes/footer.php");?>
        </div>
    </div>
    </div>
</div>
 <?php
        }else {
            
            header("location:../index.php");
        }
 ?>
</body>
<?php include("includes/scripts.php"); ?>

</html>
