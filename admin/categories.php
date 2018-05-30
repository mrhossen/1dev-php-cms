<?php
include "includes/admin-header.php";
?>


  <!-- Navigation-->
  <?php
include "includes/admin-nav.php"
?>


<?php

    if (isset($_POST['checkBoxArray'])) {

      foreach ($_POST['checkBoxArray'] as $bulkCatId) {
        
        $bulkCatUpdate = $_POST['bulkCatUpdate'];

        switch ($bulkCatUpdate) {

          case 'Delete':
            
          $query = "DELETE FROM categories WHERE cat_id = '$bulkCatId' ";
          $bluk_Cat_Delete = mysqli_query($connection, $query);
          
          
            break;

        }

      }
      
    }

?>

  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Categories</li>
      </ol>
      <div class="row">
       
       
        <div class="col-4">
        
        
            <?php add_category(); ?>
        
         
           <form action="" method="post">
              
              <div class="form-group">
                 <label for="cat-title">Add New Category</label>
                  <input class="form-control" type="text" name="cat_title">
              </div>
              
              <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
              </div>
              
              
          </form>
          
          
        
                <?php edit_category(); ?>

          
          
          
        </div>
        
        
        <div class="col-8">
    
        
    <form action="" method="post"> 
        
        <table class="table table-bordered">


<div id="bulkoptionsec">
<div class="input-group bulkoption">
  <select class="custom-select" name="bulkCatUpdate">
    <option selected>Choose...</option>
    <option value="Delete">Delete</option>
  </select>
  <div class="input-group-append">

    <input type="submit" name="deleteBulkCat" class="btn btn-outline-secondary" value="Apply">
  </div>
</div>

</div>


  <thead>
    <tr>
    <th><input id="checkBoxAll" type="checkbox"></th>
      <th>ID</th>
      <th>Category Name</th>
      <th>Category Edit</th>
      <th>Category Delete</th>
    </tr>
  </thead>
  <tbody>


<?php

$query = "SELECT * FROM categories";
            
            $select_cat_admin = mysqli_query ($connection, $query);
      
      while ($row = mysqli_fetch_assoc ($select_cat_admin)) {
          
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          
          
          echo "<tr>";
          echo "<td><input class='checkbox' type='checkbox' name='checkBoxArray[]' value='$cat_id'></th>";
          echo "<th scope='row'>{$cat_id}</th>";
          echo "<td>{$cat_title}</td>";
          echo "<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
          echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
          echo "</tr>";
          
          
          
      }

?>
  
   
   
            <?php delete_category(); ?>   
   
   

 
  </tbody>
</table>

</form>
         
          
        </div>
        
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>CDOS CMS</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    

<?php
include "includes/admin-footer.php";
?>
