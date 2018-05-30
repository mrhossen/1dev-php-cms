<?php ob_start(); ?>
<?php include "includes/config.php"; ?>
<?php

if (isset($_POST['register'])) {
  
  $userName = $_POST['username'];
  $userEmail = $_POST['email'];
  $userPassword = $_POST['password'];

  if (!empty($userName) && !empty($userEmail) && !empty($userPassword)) {
  

  $userName = mysqli_real_escape_string($connection, $userName);
  $userEmail = mysqli_real_escape_string($connection, $userEmail);
  $userPassword = mysqli_real_escape_string($connection, $userPassword);

  $query = "SELECT randSalt FROM users ";
  $select_randsalt = mysqli_query($connection, $query);

$row = mysqli_fetch_array($select_randsalt);

    $randsalt = $row['randSalt'];

    $userPassword = crypt($userPassword, $randsalt);

    $query = "INSERT INTO users(user_username, user_email, user_password, user_role)";
    
$query .= "VALUES('$userName', '$userEmail', '$userPassword', 'Subscriber')";

$register_user_query = mysqli_query($connection, $query);

if (!$register_user_query) {

  die("QUERY FAILED" . mysqli_error($connection));
}
  

$errorMessage =  "
  
  <div class='alert alert-success' role='alert'>
        Registration Complete.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>
  
  ";


} else {
  $errorMessage =  "
  
  <div class='alert alert-danger' role='alert'>
        All fileds should be required.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>
  
  ";
}

} else {
  $errorMessage = "";
}





?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CDOS CMS Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/entrypage.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/fontawesome-all.css" rel="stylesheet" type="text/css">

  </head>

  <body>
 
    <!-- Page Content -->

    <section class="entrypage">

    <div class="container">
        <div class="row">
        
            <div class="col-6 entrysec">
               
            <h1> <i class="fas fa-bullseye fa-lg"></i> CDOS CMS </h1>
                <div class="form-wrap">
                <h2>Register</h2>
                <form action="registration.php" method="post" method="post">
                <?php echo $errorMessage; ?>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-purple btn-lg" value="Register">
                    </form>

                    <a class="entryfoolink" href="login.php">Already member? Login please.</a>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
 
        </div> <!-- /.row -->
    </div> <!-- /.container -->
    </section>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
