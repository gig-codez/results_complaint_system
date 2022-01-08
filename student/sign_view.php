<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="signup.php" method="post">
                <div class="form-group">
                        <label for="">Username*</label>
                        <input type="text" name="lect_name" class="form-control"required/>
                    </div>

                    <div class="form-group">
                        <label for="">Department*</label>
                        <select name="dept" id="" class="form-control">
                            <?php
                                $hp = mysqli_query($conn,"SELECT * FROM dept");
                                while ($dp = mysqli_fetch_assoc($hp)) {
                                    echo "<option value='".$hp["deptId"]."'>".htmlentities($hp["deptId"])."</option>";
                                }
                            ?>
                        </select>
                       
                    </div>

                    <div class="form-group">
                        <label for="">Password*</label>
                        <input type="text" name="passcode" class="form-control"required/>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Register" class="form-control"required/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>