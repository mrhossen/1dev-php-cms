<?php

if (isset($_POST['checkBoxArray'])) {

    foreach ($_POST['checkBoxArray'] as $bulkCommentId) {
        $bulkComment = $_POST['bulkComment'];

        switch ($bulkComment) {
            case 'Approve':
                
            $query = "UPDATE comments SET comment_status = '$bulkComment' WHERE comment_id = '$bulkCommentId' ";
            $bulk_comment_approve = mysqli_query($connection, $query);

                break;

                case 'Unapprove':
                
                $query = "UPDATE comments SET comment_status = '$bulkComment' WHERE comment_id = '$bulkCommentId' ";
                $bulk_comment_unapprove = mysqli_query($connection, $query);
    
                    break;

                    case 'Delete':
                
                    $query = "DELETE FROM comments WHERE comment_id = '$bulkCommentId' ";
                    $bulk_comment_delete = mysqli_query($connection, $query);
        
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
        <li class="breadcrumb-item active">All Comments</li>
      </ol>

      
      <div class="row">

          <div class="col-12">
 
          <form action="" method="post">
          
          <table class="table table-bordered">


<div id="bulkoptionsec">
<div class="input-group bulkoption">
  <select class="custom-select" name="bulkComment">
    <option selected>Choose...</option>
    <option value="Approve">Approve</option>
    <option value="Unapprove">Unapprove</option>
    <option value="Delete">Delete</option>
  </select>
  <div class="input-group-append">

    <input type="submit" name="submit" class="btn btn-outline-secondary" value="Apply">
  </div>
</div>

</div>



  <thead>
    <tr>
    <th scope="col"><input type="checkbox" id="checkBoxAll"></th>
      <th scope="col">ID</th>
      <th scope="col">Comment</th>
      <th scope="col">Commented Post</th>
      <th scope="col">Author</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  
  
  <?php
      
        $query = "SELECT * FROM comments";
        $select_comments = mysqli_query($connection,$query);
      
        while($row = mysqli_fetch_assoc($select_comments)) {
            
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_date = $row['comment_date'];
            $comment_status = $row['comment_status'];
            $comment_status = $row['comment_status'];
            
            
            echo "<tr>";
            echo "<td><input class='checkbox' type='checkbox' name='checkBoxArray[]' value='$comment_id'></th>";
            echo "<td>$comment_id</td>";
            echo "<td><p>$comment_content</p>
            <small class='post-action'><a href='comments.php?approve=$comment_id'>Approve</a></small> |
            <small class='post-action'><a href='comments.php?unapprove=$comment_id'>Unapprove</a></small> |
            <small class='post-action'><a href='comments.php?source=edit-post&post-id=$comment_id'>Edit</a></small> |
            <small class='post-action'><a href='comments.php?delete=$comment_id'>Delete</a></small>
            </td>";
            
            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            
            $select_commented_post = mysqli_query($connection,$query);
            
            while($row = mysqli_fetch_assoc($select_commented_post)){
                
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                
                echo "<td><a target='_blank' href='../post.php?post-id=$post_id'>$post_title</a></td>"; 
                
            }
            
            
            echo "<td><p>$comment_author</p></td>";
            echo "<td>$comment_email</td>";
            echo "<td>$comment_status</td>";

            
            echo "<td>$comment_date</td>";
            echo "</tr>";
            
           
        }

        ?>
   
        <?php
      
        if(isset($_GET['delete'])) {
            
            $get_comment_id  = $_GET['delete'];
            
            $query = "DELETE FROM comments WHERE comment_id = $get_comment_id ";
            
            $delete_query = mysqli_query ($connection, $query);
            
            header("Location: comments.php") ;
            
        }
      
      
      if(isset($_GET['approve'])) {
            
            $get_comment_id  = $_GET['approve'];
            
            $query = "UPDATE comments SET comment_status = 'Approve' WHERE comment_id = $get_comment_id ";
            
            $approve_comment_query = mysqli_query ($connection, $query);
            
            header("Location: comments.php") ;
            
        }
      
      if(isset($_GET['unapprove'])) {
            
            $get_comment_id  = $_GET['unapprove'];
            
            $query = "UPDATE comments SET comment_status = 'Unapprove' WHERE comment_id = $get_comment_id ";
            
            $unapprove_comment_query = mysqli_query ($connection, $query);
            
            header("Location: comments.php") ;
            
        }

        ?>
   
        
   


  </tbody>
</table>

</form>

</div>
</div>