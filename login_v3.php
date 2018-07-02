<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CatEye</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Expletus+Sans:400,400i,600,700|Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .cateye.login-page {
            background-image: url(../img/backgrounds/cateye_bg_1.png);
            background-size: 57%;
            background-repeat: no-repeat;
            background-position: center 70px;
        }
    </style>
  </head>
  <body>

    <div class="login-page cateye">
        <img src="img/icons/cateye.png" class="img-responsive">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- <img src="img/backgrounds/cateye_bg.png" class="img-responsive"> -->
                    <div class="mini_container_sigin">
                        <h1 class="title"><strong>Cat</strong>Eyes for JD Edwards</h1>
                        <form class="signin-form" method="post" action="index.php">
                            <div class="form-group siginusername">
                                <input type="text" class="form-control" placeholder="Username" name="">
                            </div>
                            <div class="form-group siginpassword">
                                <input type="password" class="form-control" placeholder="Password" name="">
                            </div>
                            <ul class="list-inline sign_remember_grid">
                                <li>
                                    <div class="checkbox cus_check">
                                        <input type="checkbox" name="" id="remember">
                                        <label for="remember">Remember me</label>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Forgot Username?</a>
                                </li>
                                <li>
                                    <a href="#">Forgot Password?</a>
                                </li>
                            </ul>
                            <div class="text-center">
                                <button type="submit" class="btn btn-green">Sign in</button>
                                <p class="form_text">Not signed up yet? <a href="#">Register now</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>