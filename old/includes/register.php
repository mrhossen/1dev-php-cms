<?php ob_start(); ?>
<?php include "config.php"; ?>
<?php session_start(); ?>
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

  while ($row = mysqli_fetch_array($select_randsalt)) {
    $randsalt = $row['randSalt'];
    $cryptPassword = crypt($userPassword, $randsalt);
  }

} else {
  $errorMessage =  "
  
  <div class='alert alert-success' role='alert'>
        Registration has been submitted.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>
  
  ";
}


} else {

  $errorMessage = "<div class='alert alert-danger' role='alert'>
  All fileds are required.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
  </button>
  </div>";

}



?>
