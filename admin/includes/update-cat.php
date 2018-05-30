  
          <form action="" method="post">
            
            
            
                    <?php
              
              
              if (isset($_GET['edit'])) {
                  
                  $cat_id = $_GET['edit'];
                  
                  
                           $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            
            $select_cat_edit_admin = mysqli_query ($connection, $query);
      
      while ($row = mysqli_fetch_assoc ($select_cat_edit_admin)) {
          
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          
          
           ?>
           
           
           <div class="form-group">
                 <label for="cat-title">Edit Category</label>
                
                  <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">
              </div>
              
              <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="update_cat" value="Update Category">
              </div>
          
                  
                  
            <?php } } ?>
                   
                   
                   
                    <?php
              
                      if(isset($_POST['update_cat'])) {
            
            $cat_title = $_POST['cat_title'];
            
            $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
        
            $update_query = mysqli_query ($connection, $query);
            
            header("Location: categories.php") ;
                          
                          
                          if (!$update_query) {
                              
                              die("QUERY FAILED" . mysqli_error($connection, $query));
                          }
            
        }
              
              

                    ?>
                    
        
              
              
              
          </form>