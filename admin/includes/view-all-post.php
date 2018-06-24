<?php

if (isset($_POST['checkBoxArray'])) {
  
  foreach ($_POST['checkBoxArray'] as $checkedPostId) {
   $bulkOption = $_POST['bulkOption'];

    switch ($bulkOption) {
      case 'Publish':
        
        $query = "UPDATE posts SET post_status = '$bulkOption' WHERE post_id = '$checkedPostId' ";
        $bulk_post_publish = mysqli_query($connection, $query); 

        break;

        case 'Draft':
        
        $query = "UPDATE posts SET post_status = '$bulkOption' WHERE post_id = '$checkedPostId' ";
        $bulk_post_draft = mysqli_query($connection, $query); 

        break;
      
        case 'Delete':
        
        $query = "DELETE FROM posts WHERE post_id = '$checkedPostId' ";
        $bulk_post_delete = mysqli_query($connection, $query); 

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
        <li class="breadcrumb-item active">All Post</li>
      </ol>


      <div class="row">

          <div class="col-12">          
          
          <form action="" method="post">

          <table class="table table-bordered table-hover">



<div id="bulkoptionsec">
<div class="input-group bulkoption">
  <select class="custom-select" name="bulkOption">
    <option selected>Choose...</option>
    <option value="Publish">Publish</option>
    <option value="Draft">Draft</option>
    <option value="Delete">Delete</option>
  </select>
  <div class="input-group-append">

    <input type="submit" name="submit" class="btn btn-purple" value="Apply">
  </div>
</div>
<a class="btn btn-purple" href="posts.php?source=add-post">Add New</a>

</div>




  <thead>
    <tr>
      <th scope="col"><input id="checkBoxAll" type="checkbox"></th>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Status</th>
      <th scope="col">Category</th>
      <th scope="col">Tags</th>
      <th scope="col">Comments</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  
  
  <?php
      
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection,$query);
      
        while($row = mysqli_fetch_assoc($select_posts)) {
            
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_tag = $row['post_tag'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            
            
            echo "<tr>";

            echo "<td><input class='checkbox' type='checkbox' name='checkBoxArray[]' value='$post_id'></th>";

            echo "<td>$post_id</th>";
            echo "<td><img class='admin-post-thumb' src='..//asset/images/$post_image' alt=''></td>";
            echo "<td><p>$post_title</p>
            <small class='post-action'><a href='posts.php?source=edit-post&post-id={$post_id}'>Edit</a></small> |
            <small class='post-action'><a href='posts.php?delete={$post_id}'>Delete</a></small>
            </td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_status</td>";
            
            
            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            
            $get_cat_id = mysqli_query($connection,$query);
            
            while($row = mysqli_fetch_assoc($get_cat_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            
            
            echo "<td>$cat_title</td>";
                
            }

            
            echo "<td>$post_tag</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo "</tr>";
           
        }

        ?>
   
   
        
   


  </tbody>
</table>
</form>

</div>
</div>