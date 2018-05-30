<?php

if (isset($_POST['checkBoxArray'])) {
  
  foreach ($_POST['checkBoxArray'] as $checkUserID) {

    $bulkDelete = $_POST['bulkDelete'];

    switch ($bulkDelete) {
      case 'Delete':
        
      $query = "DELETE FROM users WHERE user_id = '$checkUserID' ";
      $bulk_Delete_User = mysqli_query($connection, $query);


        break;

    }

    $bulkRoleId = $_POST['bulkRoleId'];

    switch ($bulkRoleId) {

      case 'Subscriber':
        
      $query = "UPDATE users SET user_role = '$bulkRoleId' WHERE user_id = '$checkUserID' ";
      $bulk_Role_Subscriber = mysqli_query($connection, $query);


        break;

        case 'Editor':
        
      $query = "UPDATE users SET user_role = '$bulkRoleId' WHERE user_id = '$checkUserID' ";
      $bulk_Role_Editor = mysqli_query($connection, $query);



        break;

        case 'Admin':
        
        $query = "UPDATE users SET user_role = '$bulkRoleId' WHERE user_id = '$checkUserID' ";
        $bulk_Role_Admin = mysqli_query($connection, $query);

  
          break;
      
    }




  }



}


?> 
 
 
 <!-- Breadcrumbs-->
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All Users</li>
      </ol>

      <div class="row">

          <div class="col-12">

<form action="" method="post">


          <table class="table table-bordered">

<div id="bulkoptionsec">
<div class="input-group bulkoption">
  <select class="custom-select" name="bulkDelete">
    <option selected>Choose...</option>
    <option value="Delete">Delete</option>
  </select>
  <div class="input-group-append">
    <input type="submit" name="submit" class="btn btn-outline-secondary" value="Apply">
  </div>
</div>

<div class="input-group bulkoption">
  <select class="custom-select" name="bulkRoleId">
    <option selected>Change Role</option>
    <option value="Subscriber">Subscriber</option>
    <option value="Editor">Editor</option>
    <option value="Admin">Admin</option>
  </select>
  <div class="input-group-append">
    <input type="submit" name="submit" class="btn btn-outline-secondary" value="Change">
  </div>
  
</div>



<a class="btn btn-outline-success" href="users.php?source=add-user">Add New</a>

</div>


  <thead>
    <tr>
      <th scope="col"> <input id="checkBoxAll" type="checkbox"> </th>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Username</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Edit | Delete</th>
    </tr>
  </thead>
  <tbody>


  <?php

        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_users)) {

          $user_id = $row['user_id'];
          $user_username = $row['user_username'];
          $user_password = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_image = $row['user_image'];
          $user_role = $row['user_role'];


          echo "<tr>";
          echo "<td><input class='checkbox' name='checkBoxArray[]' type='checkbox' value='$user_id'></td>";
          echo "<td>$user_id</td>";
          echo "<td><img class='admin-post-thumb' src='../images/$user_image' alt=''></td>";
          echo "<td>$user_username</td>";
          echo "<td>$user_firstname $user_lastname</td>";
          echo "<td>$user_email</td>";
          echo "<td>$user_role</td>";
          echo "<td><a href='users.php?source=edit-user&update_user=$user_id'>Edit</a> | <a href='users.php?delete=$user_id'>Delete</a></td>";
          echo "</tr>";



        }

        ?>

        <?php

        if(isset($_GET['delete'])) {

            $get_user_id  = $_GET['delete'];

            $query = "DELETE FROM users WHERE user_id = $get_user_id ";

            $delete_query = mysqli_query ($connection, $query);

            header("Location: users.php") ;

        }


      

        ?>





  </tbody>
</table>

</form>


</div>
</div>