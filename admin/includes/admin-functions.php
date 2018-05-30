<?php


// Add categories


function add_category() {
    
    global $connection;
    
    
     if(isset($_POST['submit'])) {
        
        $cat_title = $_POST['cat_title'];
        
        if ($cat_title == "" || empty($cat_title)) {
            
            echo "This filed should not be empty.";
            
        } else {
            
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            
            $create_cat_query = mysqli_query($connection, $query);
            
            if (!$create_cat_query) {
                
                die('QUERY FAILED' . mysqli_error($connection));
            } else {
                
                echo "
                
                <div class='alert alert-success' role='alert'>
                Category update successfully.
      
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>
                
                ";
            }
            
            
            
        }
        
    }
    
    
}



// Edit category 


function edit_category() {
    
    global $connection;
    
      if (isset($_GET['edit'])) {
                
                $cat_id = $_GET['edit'];
                
                include "includes/update-cat.php";
                
            }
            
    
}



// Delete category 


function delete_category() {
    
    global $connection;
      
       if(isset($_GET['delete'])) {
            
            $cat_id = $_GET['delete'];
            
            $query = "DELETE FROM categories WHERE cat_id = {$cat_id} ";
            
            $delete_query = mysqli_query ($connection, $query);
            
            header("Location: categories.php") ;
            
        }
    
}

// Delete Post

function deletePost() {
    
      global $connection;
    
      if(isset($_GET['delete'])) {
                  
                  $post_id = $_GET['delete'];
                  
                  $query = "DELETE FROM posts WHERE post_id = {$post_id}";
                  
                  $delete_query = mysqli_query ($connection, $query);
                  
                  header("Location: posts.php") ;
                  
              }
    
}






?>