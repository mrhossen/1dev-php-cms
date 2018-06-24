<?php

  if (isset($_GET['post-id'])) {
                  
    $get_post_id = $_GET['post-id'];
  }

$query = "SELECT * FROM posts WHERE post_id= $get_post_id";
      
        $select_posts_for_update = mysqli_query($connection,$query);
      
        while($row = mysqli_fetch_assoc($select_posts_for_update)) {
            
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_tag = $row['post_tag'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            $post_content = $row['post_content']; 
            
        }


if(isset($_POST['update_post'])) {
    
    $post_title = $_POST['post_title'];
    $post_category = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['post_image']['name'];
    $post_image_loc = $_FILES['post_image']['tmp_name'];
    
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;
    
    
    move_uploaded_file($post_image_loc, "..//asset/images/$post_image");
    
    
     if(empty($post_image)) {
        
        $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
        $select_image = mysqli_query($connection,$query);
      
        while($row = mysqli_fetch_assoc($select_image)) {
            
           $post_image = $row['post_image'];
        
    }
    }
    
    
  
    $query = "UPDATE posts SET ";
    $query .= "post_title = '$post_title', ";
    $query .= "post_category_id = '$post_category', ";
    $query .= "post_author = '$post_author', ";
    $query .= "post_date = now(), ";
    $query .= "post_image = '$post_image', ";
    $query .= "post_tag = '$post_tag', ";
    $query .= "post_status = '$post_status', ";
    $query .= "post_content = '$post_content' ";
    $query .= "WHERE post_id = '$get_post_id' ";
    
    
    
    $update_post_query = mysqli_query($connection, $query);
    
    
    if(!$update_post_query) {
        
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        echo "
        <div class='alert alert-success' role='alert'>
        Post Updated Successfully.
        <a class='alert-link' target='_blank' href='../post.php?post-id=$get_post_id'>View post</a>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
    }
    
}

            

?>
 
 


      <form action="" method="post" enctype="multipart/form-data">

      <div class="row">
      

          <div class="col-8">

     <!-- Breadcrumbs-->
  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Post</li>
      </ol>
   

    
  <div class="form-group">
      <label for="title">Post Title</label>
      <input value="<?php echo "$post_title"; ?>" type="text" class="form-control" name="post_title">
  </div>  
   
   
   
   <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo "$post_content"; ?></textarea>
  </div> 
  
  
<div class="form-group">
      <input class="btn btn-purple" value="Update Post" type="submit" class="form-control" name="update_post">
  </div>
   
    



</div>


<div class="col-4 post-edit-sidebar">


<div class="form-group">
      <label for="post_status">Post Status</label>

      <select name="post_status" id="">
          <option value="<?php echo $post_status; ?>"> <?php echo $post_status; ?> </option>

            <?php
                if ($post_status == 'Publish' ) {
                    echo "<option value='Draft'>Draft</option>";
                } else {
                    echo "<option value='Publish'>Publish</option>";
                }
            ?>


      </select>

   
  </div>



   
   <div class="form-group">
      <label for="post_author">Post Author</label>
      <input value="<?php echo "$post_author"; ?>" type="text" class="form-control" name="post_author">
  </div> 

  <div class="form-group">
      <label for="post_category">Category</label>
      
      <select name="post_category" id="">
      
        <?php
          
        $query = "SELECT * FROM categories ";
            
            $select_cat_title = mysqli_query ($connection, $query);
      
      while ($row = mysqli_fetch_assoc ($select_cat_title)) {
          
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          
          echo "<option value='$cat_id'>$cat_title</option>";
       
      }
        ?>
      
      </select>
  </div> 
  
  
   
   <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file" class="form-control" name="post_image">
      <img width=200 src="../asset/images/<?php echo "$post_image"; ?>" alt="">
  </div> 
   
   <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input value="<?php echo "$post_tag"; ?>" type="text" class="form-control" name="post_tags">
  </div> 


 </div>



          
 </div>

  </form>