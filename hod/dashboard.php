<?php 
session_start();
include("includes/header.php");
include("includes/connect.php");
?>

<body>
    <?php
        if (isset($_SESSION["hod"])) {
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
                                    <!-- <span class="li_news"></span> -->
                                    <?php 
                                        // echo $_SESSION["hod_id"];
                                        $rt = mysqli_query($conn, "SELECT * FROM apeal where userId='".$_SESSION['hod_id']."' and status='is null'");
                                    
                                        $num1 = mysqli_num_rows($rt);
                                    ?>
                                    <h3><?php echo htmlentities($num1);?> </h3>
                                <p>Available apeals</p>
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
 <?php
        }else {
            
            header("location:index.php");
        }
 ?>
</body>
<?php include("includes/scripts.php"); ?>

</html>
