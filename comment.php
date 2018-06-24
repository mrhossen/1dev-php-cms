 <?php

        if(isset($_POST['create_comment'])) {
            
            $the_post_id = $_GET['post-id'];

           $comment_author = $_POST['comment_author'];
           $comment_email = $_POST['comment_email'];
           $comment_content = $_POST['comment_content'];


           if (!empty($comment_email) && !empty($comment_author) && !empty($comment_content)) {
             
            $query = "INSERT INTO comments (comment_post_id, comment_content, comment_author, comment_email, comment_status, comment_date)";

            $query .= "VALUES ($the_post_id, '$comment_content', '$comment_author', '$comment_email', 'Approve', now())";
            
            
            $create_comment_query = mysqli_query($connection,$query);
            
            if (!$create_comment_query) {
                die('QUERY FAILED' . mysqli_error($connection));
                
            } else {
                echo "
                
                <div class='alert alert-success' role='alert'>
                Comment done successfully.
        
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
            }


           } else {
             echo "
             
             <div class='alert alert-danger' role='alert'>
             All filed should be required.
        
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>
             
             ";
           }


           $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
           $query .= "WHERE post_id = $the_post_id ";

           $increase_comment_count = mysqli_query($connection, $query);

           
            
            
            
        }

        ?>




<div class="comment-sec">

<div class="comment-title">

  <h4>Leave a Comment:</h4>

</div>

<div class="comment-form">

  <form action="" method="post">

    <div class="form-row">
      <div class="form-group col-md-6">

        <input name="comment_author" type="text" class="form-control" id="inputName" placeholder="Name">
      </div>
      <div class="form-group col-md-6">

        <input name="comment_email" type="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>


      <div class="form-group col-md-12">

        <textarea name="comment_content" class="form-control" placeholder="Write your comment"></textarea>
      </div>


    </div>

    <button name="create_comment" type="submit" class="btn btn-gray btn-block">Submit</button>

  </form>
</div>


</div>


          
          
        <?php

        $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
            $query .= "AND comment_status = 'Approve' ";
            $query .= "ORDER BY comment_id DESC ";

            $select_comment_query = mysqli_query($connection, $query);
            
            if(!$select_comment_query) {
                die('Query Failed' . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($select_comment_query)) {
                $comment_author = $row['comment_author'];
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];


           ?>
       
         <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $comment_author; ?> <small><?php echo $comment_date; ?></small></h5>
              <?php echo $comment_content; ?>
            </div>
          </div>
       
        
          <?php } ?>
          
    

