<?php

if(isset($_POST['add_user'])) {

  $user_username = $_POST['user_username'];
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  $user_image = $_FILES['user_image']['name'];
  $user_image_loc = $_FILES['user_image']['tmp_name'];

  $user_role = $_POST['user_role'];
  $user_bio = $_POST['user_bio'];


    move_uploaded_file($user_image_loc, "..//asset/images/$user_image");


    $query = "INSERT INTO users(user_username, user_firstname, user_lastname, user_email, user_password, user_image, user_role, user_bio)";

    $query .= "VALUES ('$user_username', '$user_firstname', '$user_lastname', '$user_email', '$user_password', '$user_image', '$user_role', '$user_bio')";

    $create_user_query = mysqli_query($connection, $query);


    if(!$create_user_query) {

        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        
        header("Location: users.php");
        
        ;
    }

}

?>


 <!-- Breadcrumbs-->
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add User</li>
      </ol>

      <div class="row">

          <div class="col-6">



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
   <label for="title">Username</label>
   <input type="text" class="form-control" name="user_username">
</div>

<div class="form-group">
   <label for="title">FIrst Name</label>
   <input type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
   <label for="title">Last Name</label>
   <input type="text" class="form-control" name="user_lastname">
</div>

<div class="form-group">
   <label for="title">Email</label>
   <input type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
   <label for="title">Password</label>
   <input type="password" class="form-control" name="user_password">
</div>

<div class="form-group">
  <label for="post_image">User Image</label>
  <input type="file" class="form-control" name="user_image">
</div>

<div class="form-group">
   <label for="user_role">User Role</label>




   <select name="user_role" id="">


    <option value="admin">Admin</option>
    <option value="subscriber">Subscriber</option>
    <option value="editor">Editor</option>

   </select>
 </div>

 <div class="form-group">
    <label for="post_image">User Bio</label>
    <textarea name="user_bio" id="" cols="30" rows="10" class="form-control"></textarea>
 </div>



<div class="form-group">
   <input class="btn btn-purple" value="Add User" type="submit" class="form-control" name="add_user">
</div>


</form>

</div>
</div>