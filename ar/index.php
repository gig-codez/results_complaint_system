<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR - login</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet"/>
    <style type="text/css">
        body{
            display:flex;
            flex-direction:column;
            justify-content:center;
            algin-items:center;
            margin:30px;
        }
        .shadow{
            box-shadow:0px 0px 6px 0px #44444;
        }
    </style>
    </head>
    <body>

        <div class="container">
            <!-- <div class="row"> -->
                <div class="col-md-6">
                    <div class="card card-price">
                        <div class="card-header">
                            <h4>AR Login</h4>
                        </div>
                        <form class="card-body" action="login.php" method="post">
                        <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="">Passcode</label>
                                <input type="text" name="passcode" class="form-control"/>
                            </div>
                                <label for=""></label>
                            <div class="form-group">
                                <!-- <label for="">Username</label> -->
                                <input type="submit" name="submit" value="Login" class="form-control"/>
                            </div>


                    </form>
                    </div>
                    
                </div>
            <!-- </div> -->
        </div>

    </body>
    </html>