<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>1DEV CMS Login</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="asset/css/entrypage.css" rel="stylesheet">

    <link href="asset/vendor/font-awesome/css/fontawesome-all.css" rel="stylesheet" type="text/css">

  </head>

  <body>
 

    <!-- Login Page Content -->

    <section class="entrypage">

    <div class="container">
        <div class="row">
        
            <div class="col-6 entrysec">
            <h1> <i class="fas fa-bullseye fa-lg"></i> 1DEV CMS </h1>
                <div class="form-wrap">
                <h2>Login</h2>
                    <form action="includes/login.php" method="post" method="post">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div>
                         
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="login" id="btn-login" class="btn btn-purple btn-lg" value="Login">
                    </form>

                    <a class="entryfoolink" href="registration.php">Create New Account</a>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
 
        </div> <!-- /.row -->
    </div> <!-- /.container -->
    </section>


    <!-- Bootstrap core JavaScript -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/popper/popper.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>

