<?php

  if (isset($_GET['update_user'])) {

    $get_user_id = $_GET['update_user'];
  }

$query = "SELECT * FROM users WHERE user_id = $get_user_id";

        $select_users_for_update = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_users_for_update)) {

          $user_id = $row['user_id'];
          $user_username = $row['user_username'];
          $user_password = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_image = $row['user_image'];
          $user_role = $row['user_role'];
          $user_bio = $row['user_bio'];

        }


if(isset($_POST['update_user'])) {

  $user_username = $_POST['user_username'];
  $user_password = $_POST['user_password'];
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_email = $_POST['user_email'];
  $user_image = $_FILES['user_image']['name'];
  $user_image_loc = $_FILES['user_image']['tmp_name'];
  $user_role = $_POST['user_role'];
  $user_bio = $_POST['user_bio'];


  $query = "SELECT randSalt FROM users";
  $select_randsalt = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($select_randsalt);
  $randSalt = $row['randSalt'];
  $user_password = crypt($user_password, $randSalt);


    move_uploaded_file($user_image_loc, "../images/$user_image");


     if(empty($user_image)) {

        $query = "SELECT * FROM users WHERE user_id = $get_user_id";
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
    $query .= "WHERE user_id = '$get_user_id' ";



    $update_user_query = mysqli_query($connection, $query);


    if(!$update_user_query) {

        die("QUERY FAILED" . mysqli_error($connection));
    } else {
      header("Location: users.php");
    }

}



?>

 <!-- Breadcrumbs-->
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit User</li>
      </ol>

      <div class="row">

          <div class="col-6">



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


    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

    <?php
    if($user_role == 'Admin') {
      echo "<option value='Subscriber'>Subscriber</option>";
      echo "<option value='Editor'>Editor</option>";
    } elseif ($user_role == 'Editor') {
      echo "<option value='Admin'>Admin</option>";
      echo "<option value='Subscriber'>Subscriber</option>";
    } elseif ($user_role == 'Subscriber') {
      echo "<option value='Admin'>Admin</option>";
      echo "<option value='Editor'>Editor</option>";
    } else {
      echo "<option value='Admin'>Admin</option>";
      echo "<option value='Editor'>Editor</option>";
      echo "<option value='Subscriber'>Subscriber</option>";
    }
   ?>



   </select>
 </div>

 <div class="form-group">
    <label for="post_image">User Bio</label>
    <textarea name="user_bio" id="" cols="30" rows="10" class="form-control"><?php echo $user_bio; ?></textarea>
 </div>



<div class="form-group">
   <input class="btn btn-primary" value="Update User" type="submit" class="form-control" name="update_user">
</div>


</form>



</div>
</div>