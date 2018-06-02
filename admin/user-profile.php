<?php include "includes/admin-header.php"; ?>

  <!-- Navigation-->
  <?php include "includes/admin-nav.php"; ?>


<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE user_username = '$username'";

    $get_user_profile_data = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($get_user_profile_data)) {
      $user_id = $row['user_id'];
      $user_username = $row['user_username'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_image = $row['user_image'];
      $user_role = $row['user_role'];
      $user_bio =  $row['user_bio'];
    }



    if(isset($_POST['update_profile'])) {

      $user_username = $_POST['user_username'];
      $user_password = $_POST['user_password'];
      $user_firstname = $_POST['user_firstname'];
      $user_lastname = $_POST['user_lastname'];
      $user_email = $_POST['user_email'];
      $user_image = $_FILES['user_image']['name'];
      $user_image_loc = $_FILES['user_image']['tmp_name'];
      $user_role = $_POST['user_role'];
      $user_bio = $_POST['user_bio'];
    
    
        move_uploaded_file($user_image_loc, "../images/$user_image");
    
    
         if(empty($user_image)) {
    
            $query = "SELECT * FROM users WHERE user_username = '$username'";
            $select_user_image = mysqli_query($connection,$query);
    
            while($row = mysqli_fetch_assoc($select_user_image)) {
    
               $user_image = $row['user_image'];
    
        }
        }
    
    
        $query = "UPDATE users SET ";
        $query .= "user_username = '$user_username', ";
        $query .= "user_password = '$user_password', ";
        $query .= "user_firstname = '$user_firstname', ";
        $query .= "user_lastname = '$user_lastname', ";
        $query .= "user_email = '$user_email', ";
        $query .= "user_image = '$user_image', ";
        $query .= "user_role = '$user_role', ";
        $query .= "user_bio = '$user_bio' ";
        $query .= "WHERE user_username = '$username'";
    
    
    
        $update_user_query = mysqli_query($connection, $query);
    
    
        if(!$update_user_query) {
    
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            echo "User Update successfully.";
        }
    
    }


}

?>

<?php




?>


  <div class="content-wrapper">
    <div class="container">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Your Profile</li>
      </ol>
      <div class="row">




          <div class="col-12">


     <form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
   <label for="title">Username</label>
   <input value="<?php echo $user_username; ?>" type="text" class="form-control" name="user_username">
</div>

<div class="form-group">
   <label for="title">FIrst Name</label>
   <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
   <label for="title">Last Name</label>
   <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
</div>

<div class="form-group">
   <label for="title">Email</label>
   <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
   <label for="title">Password</label>
   <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
</div>

<div class="form-group">
  <label for="post_image">User Image</label>
  <input value="<?php echo $user_image; ?>" type="file" class="form-control" name="user_image">
</div>

<div class="form-group">
   <label for="user_role">User Role</label>


   <select name="user_role" id="">


    <option value="deafult"><?php echo $user_role; ?></option>

    <?php
    if($user_role == 'admin') {
      echo "<option value='subscriber'>Subscriber</option>";
      echo "<option value='editor'>Editor</option>";
    } elseif($user_role == 'editor') {
      echo "<option value='admin'>Admin</option>";
      echo "<option value='subscriber'>Subscriber</option>";
    } else {
      echo "<option value='admin'>Admin</option>";
      echo "<option value='editor'>Editor</option>";
    }
   ?>



   </select>
 </div>

 <div class="form-group">
    <label for="post_image">User Bio</label>
    <textarea name="user_bio" id="" cols="30" rows="10" class="form-control"><?php echo $user_bio; ?></textarea>
 </div>



<div class="form-group">
   <input class="btn btn-purple" value="Update Profile" type="submit" class="form-control" name="update_profile">
</div>


</form>



        </div>



      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <p>CDOS CMS</p>
        </div>
      </div>
    </footer>
    
    




<?php include "includes/admin-footer.php"; ?>
